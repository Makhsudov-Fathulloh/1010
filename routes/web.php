<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Backend\LogController;
use App\Http\Controllers\Backend\FileController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ExportController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\TelegramController;
use App\Http\Controllers\Backend\SupplierController;
use App\Http\Controllers\Backend\OrderItemController;
use App\Http\Controllers\Backend\WarehouseController;
use App\Http\Controllers\Backend\CashReportController;
use App\Http\Controllers\Backend\ExchangeRateController;
use App\Http\Controllers\Backend\OrganizationController;
use App\Http\Controllers\Backend\ProductReturnController;
use App\Http\Controllers\Backend\ProductReturnItemController;
use App\Http\Controllers\Backend\ProfitAndLossController;
use App\Http\Controllers\Backend\ExpenseAndIncomeController;
use App\Http\Controllers\Backend\ProductVariationController;
use App\Http\Controllers\Backend\SupplierItemController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Authenticate
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Telegram bot
Route::post('/telegram/webhook', [TelegramController::class, 'webhook']);

// Backend
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard')->middleware('role:Admin,Manager,Moderator,Developer');

    Route::resource('category', CategoryController::class)->middleware('role:Admin,Manager,Developer');

    Route::prefix('charts')->group(function () {
        Route::get('diagram', [AdminController::class, 'charts'])->name('charts.diagram')->middleware('role:Admin,Manager,Developer');
    });

    Route::post('/warehouse/add-count', [WarehouseController::class, 'addCount'])->name('warehouse.add-count');
    Route::get('/warehouse/{warehouse_id}/elements', [WarehouseController::class, 'list'])->name('warehouse.list')->middleware('role:Admin,Manager,Moderator,Developer');
    Route::middleware('role:Developer')->group(function () {
        Route::get('warehouse/create', [WarehouseController::class, 'create'])->name('warehouse.create');
        Route::delete('warehouse/{warehouse}', [WarehouseController::class, 'destroy'])->name('warehouse.destroy');
    });
    Route::resource('warehouse', WarehouseController::class)->except(['create', 'destroy'])->middleware('role:Admin,Manager,Moderator,Developer');

    Route::prefix('product')->group(function () {
        Route::get('{product_id}/variations', [ProductVariationController::class, 'list'])->name('product-variation.list')->middleware('role:Admin,Manager,Moderator,Developer');
        Route::get('{product_id}/variations/create', [ProductVariationController::class, 'create'])->name('product-variation.create.custom')->middleware('role:Admin,Manager,Moderator,Developer');
        Route::post('{product_id}/variations', [ProductVariationController::class, 'store'])->name('product-variation.store.custom')->middleware('role:Admin,Manager,Moderator,Developer');
    });
    Route::resource('product', ProductController::class)->middleware('role:Admin,Manager,Moderator,Developer');

    Route::post('product-variation/{variation}/add-count', [ProductVariationController::class, 'addCount'])->name('product-variation.add-count')->middleware('role:Admin,Manager,Moderator,Developer');
    Route::resource('product-variation', ProductVariationController::class)->middleware('role:Admin,Manager,Moderator,Developer');

    Route::prefix('product-return')->group(function () {
        Route::get('{product_return_id}/items', [ProductReturnItemController::class, 'list'])->name('product-return-item.list')->middleware('role:Admin,Manager,Moderator,Developer');
    });
    Route::resource('product-return', ProductReturnController::class)->middleware('role:Admin,Manager,Moderator,Developer');

    Route::resource('product-return-item', ProductReturnItemController::class)->middleware('role:Admin,Manager,Moderator,Developer');

    Route::prefix('log')->group(function () {
        Route::get('/product', [LogController::class, 'product'])->name('log.product')->middleware('role:Admin,Manager,Moderator,Developer');
    });

    Route::middleware('role:Developer')->group(function () {
        Route::get('organization/create', [OrganizationController::class, 'create'])->name('organization.create');
        Route::delete('organization/{organization}', [OrganizationController::class, 'destroy'])->name('organization.destroy');
    });
    Route::resource('organization', OrganizationController::class)->except(['create', 'destroy'])->middleware('role:Admin,Manager,Moderator,Developer');

    Route::prefix('order')->group(function () {
        Route::get('{order_id}/items', [OrderItemController::class, 'list'])->name('order-item.list')->middleware('role:Admin,Manager,Developer');
        Route::get('{order}/items/create', [OrderItemController::class, 'create'])->name('order-item.create.custom')->middleware('role:Admin,Manager,Developer');
        Route::post('{order}/items', [OrderItemController::class, 'store'])->name('order-item.store.custom')->middleware('role:Admin,Manager,Developer');
        //        Route::get('{order}/items/{item}/edit', [OrderItemController::class, 'edit'])->name('order-item.edit')->middleware('role:Admin,Manager,Developer');
    });
    Route::get('order/create', [OrderController::class, 'create'])->name('order.create')->middleware('role:Admin,Manager,Moderator,Developer');
    Route::post('order', [OrderController::class, 'store'])->name('order.store')->middleware('role:Admin,Manager,Developer,Moderator');

    Route::resource('order', OrderController::class)->except(['create', 'store'])->middleware('role:Admin,Manager,Developer');
    Route::resource('order-item', OrderItemController::class)->middleware('role:Admin,Manager,Moderator,Developer');

    Route::prefix('pre-order')->group(function () {
        Route::get('{pre_order_id}/items', [\App\Http\Controllers\Backend\PreOrderItemController::class, 'list'])->name('pre-order-item.list')->middleware('role:Admin,Manager,Moderator,Developer');;
        Route::post('{preOrder}/complete', [\App\Http\Controllers\Backend\PreOrderController::class, 'complete'])->name('pre-order.complete')->middleware('role:Admin,Manager,Moderator,Developer');;
        Route::get('ajax/product', [\App\Http\Controllers\Backend\PreOrderController::class, 'searchProduct'])->name('ajax.product');
    });

    Route::resource('pre-order', \App\Http\Controllers\Backend\PreOrderController::class)->middleware('role:Admin,Manager,Moderator,Developer');;
    Route::resource('pre-order-item', \App\Http\Controllers\Backend\PreOrderItemController::class)->middleware('role:Admin,Manager,Moderator,Developer');;

    Route::get('/expense-and-income/users-by-currency', [ExpenseAndIncomeController::class, 'getUsersByCurrency'])->name('expense-and-income.users-by-currency')->middleware('role:Admin,Manager,Moderator,Developer');
    Route::resource('expense-and-income', ExpenseAndIncomeController::class)->middleware('role:Admin,Manager,Moderator,Developer');

    Route::prefix('cash-report')->group(function () {
        Route::get('/', [CashReportController::class, 'index'])->name('cash-report.index')->middleware('role:Admin,Manager,Developer');
        Route::post('/open', [CashReportController::class, 'openDailyReport'])->name('cash-report.open')->middleware('role:Admin,Manager,Moderator,Developer');
        Route::post('/close', [CashReportController::class, 'closeDailyReport'])->name('cash-report.close')->middleware('role:Admin,Manager,Developer');
    });

    Route::post('supplier/{supplier}/item', [SupplierController::class, 'storeItem'])->name('supplier.item.store');
    Route::put('supplier-item/{item}', [SupplierController::class, 'updateItem'])->name('supplier.item.update');
    Route::delete('supplier-item/{item}', [SupplierController::class, 'destroyItem'])->name('supplier.item.destroy');
    Route::resource('supplier', SupplierController::class)->except(['create']);

    Route::get('/exchange-rates', [ExchangeRateController::class, 'index'])->name('exchange-rates.index');
    Route::post('/exchange-rates/update', [ExchangeRateController::class, 'update'])->name('exchange-rates.update');

    Route::resource('profit-and-loss', ProfitAndLossController::class)->middleware('role:Admin,Developer');

    Route::resource('file', FileController::class)->middleware('role:Admin,Manager,Moderator,Developer');

    Route::get('/export', [ExportController::class, 'export'])->name('export.file')->middleware('role:Admin,Manager,Moderator,Developer');

    Route::prefix('user')->group(function () {
        Route::post('storeAjax', [UserController::class, 'storeAjax'])->name('user.storeAjax')->middleware('role:Admin,Manager,Moderator,Developer');
        Route::get('staff', [UserController::class, 'staff'])->name('user.staff')->middleware('role:Admin,Manager,Moderator,Developer');
    });
    Route::resource('user', UserController::class)->middleware('role:Admin,Manager,Moderator,Developer');

    Route::resource('role', RoleController::class)->middleware('role:Developer');
});


// Frontend

Route::get('/', function () {
    return redirect('/admin');
});

//Route::get('/', [\App\Http\Controllers\Frontend\SiteController::class, 'index'])->name('frontend');
