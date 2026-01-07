<?php

namespace App\Http\Controllers\Backend;

use App\Models\Supplier;
use App\Models\SupplierItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SupplierController extends Controller
{
    public function index(Request $request)
    {
        $suppliers = Supplier::query()
            ->search($request->search)
            ->with('items:id,supplier_id,type,amount,rate') // rate ham kerak
            ->orderBy('title')
            ->paginate(20)
            ->withQueryString();

        $suppliers->getCollection()->transform(function ($supplier) {
            $total_uzs_balance = 0;

            foreach ($supplier->items as $item) {
                // Miqdorni kursga ko'paytirib so'mga aylantiramiz
                $amount_in_uzs = $item->amount * $item->rate;

                if ($item->type == 1) {
                    // Yuk kelsa qarz ko'payadi
                    $total_uzs_balance += $amount_in_uzs;
                } else {
                    // To'lov qilinsa qarz kamayadi
                    $total_uzs_balance -= $amount_in_uzs;
                }
            }

            $supplier->calculated_balance = $total_uzs_balance;
            return $supplier;
        });

        return view('backend.supplier.index', compact('suppliers'));
    }


    public function show(Request $request, Supplier $supplier)
    {
        // 1. Tranzaksiyalar tarixi
        $items = $supplier->items()
            ->filterByDate($request->from_date, $request->to_date)
            ->orderBy('created_at', 'desc')
            ->paginate(25);

        // 2. Jami qarzni hisoblash (Valyutalar bo'yicha ajratib olish yaxshi amaliyot)
        $balances = $supplier->items()
            ->selectRaw('currency,
            SUM(CASE WHEN type = 1 THEN amount ELSE 0 END) as total_yuk,
            SUM(CASE WHEN type = 2 THEN amount ELSE 0 END) as total_tolov')
            ->groupBy('currency')
            ->get();

        return view('backend.supplier.show', compact('supplier', 'items', 'balances'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'    => 'required|string|max:255',
            'address'  => 'nullable|string|max:255',
            'phone'    => 'nullable|string|max:255',
            'amount'   => 'nullable|numeric|min:0', // Formadagi name 'amount'
            'currency' => 'required|integer',
            'rate'     => 'required|numeric|min:1',
            'status'   => 'required|integer',
        ]);

        // 1. Firmani yaratamiz
        $supplier = Supplier::create([
            'title'   => $data['title'],
            'address' => $data['address'],
            'phone'   => $data['phone'],
            'status'  => $data['status'],
        ]);

        // 2. Agar boshlang‘ich balans (amount) bo‘lsa
        if ($request->amount > 0) {
            $supplier->items()->create([
                'type'        => 1, // Boshlang'ich qarz sifatida
                'amount'      => $data['amount'],
                'currency'    => $data['currency'],
                'rate'        => $data['rate'],
                'description' => 'Boshlang‘ich balans',
            ]);
        }

        return back()->with('success', 'Yangi firma qo‘shildi');
    }

    public function update(Request $request, Supplier $supplier)
    {
        $data = $request->validate([
            'title'    => 'required|string|max:255',
            'address'  => 'nullable|string|max:255',
            'phone'    => 'nullable|string|max:255',
            'status'   => 'required|integer',
        ]);

        $supplier->update($data);

        return back()->with('success', 'Firma maʼlumotlari yangilandi');
    }

    public function storeItem(Request $request, Supplier $supplier)
    {
        $data = $request->validate([
            'type'        => 'required|in:1,2',
            'currency'    => 'required|in:1,2',
            'amount'      => 'required|numeric|min:0.001',
            'rate'        => 'required|numeric|min:1',
            'description' => 'nullable|string|max:500',
            'paid_amount' => 'nullable|numeric|min:0'
        ]);

        // 1. Asosiy yukni saqlash
        $supplier->items()->create([
            'type' => $data['type'],
            'currency' => $data['currency'],
            'amount' => $data['amount'],
            'rate' => $data['rate'],
            'description' => $data['description'],
        ]);

        // 2. Agar yuk bo'lsa va to'lov ham qilingan bo'lsa, alohida to'lov qatorini ham qo'shamiz
        if ($request->type == 1 && $request->filled('paid_amount') && $request->paid_amount > 0) {
            $supplier->items()->create([
                'type' => 2, // To'lov
                'currency' => $data['currency'],
                'amount' => $request->paid_amount,
                'rate' => $data['rate'],
                'description' => "Yuk uchun to'lov: " . ($data['description'] ?? ''),
            ]);
        }

        return back()->with('success', 'Amaliyot saqlandi!');
    }

    public function updateItem(Request $request, SupplierItem $item)
    {
        $data = $request->validate([
            'type'        => 'required|in:1,2',
            'currency'    => 'required|in:1,2',
            'amount'      => 'required|numeric|min:0.001',
            'rate'        => 'required|numeric|min:1',
            'description' => 'nullable|string|max:500'
        ]);

        $item->update($data);

        return back()->with('success', 'Amaliyot muvaffaqiyatli yangilandi!');
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect()->route('supplier.index')->with('success', 'Firma o\'chirildi');
    }
}
