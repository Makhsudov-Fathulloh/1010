<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\ProductLog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProductVariation;
use App\Models\Search\LogSearch;
use App\Services\DateFilterService;
use App\Http\Controllers\Controller;
use App\Models\RawMaterialVariation;
use Illuminate\Support\Facades\Schema;

class LogController extends Controller
{
    public function product(Request $request)
    {
        $searchModel = new LogSearch(new DateFilterService());
        $query = $searchModel->productLogSearch($request);

        $sort = $request->get('sort');
        if (!empty($sort)) {
            $direction = 'asc';
            if (Str::startsWith($sort, '-')) {
                $direction = 'desc';
                $sort = ltrim($sort, '-');
            }
            if (Schema::hasColumn('product_log', $sort)) {
                $query->orderBy($sort, $direction);
            }
        }

        $products = ProductVariation::whereIn('id', ProductLog::select('product_variation_id')->distinct())->orderBy('title')->pluck('title', 'id');
        $users = User::whereIn('id', ProductLog::distinct()->pluck('user_id'))->pluck('username', 'id');

        $isFiltered = count($request->get('filters', [])) > 0;

        if ($isFiltered) {
            $productLogCount = $query->distinct()->count('product_variation_id');
        } else {
            $productLogCount = ProductLog::distinct()->count('product_variation_id');
        }

        $productLogs = $query->with([
            'productVariation:id,code,title,count,unit'
        ])->paginate(20)->withQueryString();

        return view('backend.log.product', compact(
            'productLogs',
            'products',
            'users',
            'isFiltered',
            'productLogCount'
        ));
    }
}
