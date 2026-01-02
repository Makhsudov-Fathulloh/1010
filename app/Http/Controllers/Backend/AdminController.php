<?php

namespace App\Http\Controllers\Backend;

use App\Models\ExpenseAndIncome;
use App\Models\Order;
use App\Models\User;
use App\Models\UserDebt;
use App\Models\ExchangeRates;
use App\Services\StatusService;
use Illuminate\Routing\Controller as BaseController;

class AdminController extends BaseController
{
    public function index()
    {
        $userCount = User::where('role_id', \App\Models\Role::where('title', 'Клиент')->value('id'))->count();
        $employeeCount = User::where('role_id', '!=', \App\Models\Role::where('title', 'Клиент')->value('id'))->count();

        $exchangeRate = ExchangeRates::where('currency', 'USD')->value('rate');
        
        $expenseTotalUzs = ExpenseAndIncome::where('type', ExpenseAndIncome::TYPE_EXPENSE)->where('currency', StatusService::CURRENCY_UZS)->whereYear('created_at', now()->year)->sum('amount');
        $expenseTotalUsd = ExpenseAndIncome::where('type', ExpenseAndIncome::TYPE_EXPENSE)->where('currency', StatusService::CURRENCY_USD)->whereYear('created_at', now()->year)->sum('amount');

        $orderTotalUzs = Order::where('currency', StatusService::CURRENCY_UZS)->whereYear('created_at', now()->year)->sum('total_price');
        $orderTotalUsd = Order::where('currency', StatusService::CURRENCY_USD)->whereYear('created_at', now()->year)->sum('total_price');

        $userDebtUzs = UserDebt::where('currency', StatusService::CURRENCY_UZS)->sum('amount');
        $userDebtUsd = UserDebt::where('currency', StatusService::CURRENCY_USD)->sum('amount');

        return view('backend.index', compact([
            'userCount',
            'employeeCount',
            'exchangeRate',
            'expenseTotalUzs',
            'expenseTotalUsd',
            'orderTotalUzs',
            'orderTotalUsd',
            'userDebtUzs',
            'userDebtUsd',
        ]));
    }

    public function charts()
    {
        return view('backend.charts.diagram');
    }
}
