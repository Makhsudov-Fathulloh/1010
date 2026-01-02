<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Backend\LogController;
use App\Http\Controllers\Backend\FileController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\StageController;
use App\Http\Controllers\Backend\ExportController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SectionController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\PreOrderController;
use App\Http\Controllers\Backend\TelegramController;
use App\Http\Controllers\Backend\OrderItemController;
use App\Http\Controllers\Backend\WarehouseController;
use App\Http\Controllers\Backend\CashReportController;
use App\Http\Controllers\Backend\RawMaterialController;
use App\Http\Controllers\Backend\ShiftOutputController;
use App\Http\Controllers\Backend\ShiftReportController;
use App\Http\Controllers\Backend\ExchangeRateController;
use App\Http\Controllers\Backend\OrganizationController;
use App\Http\Controllers\Backend\PreOrderItemController;
use App\Http\Controllers\Backend\StageMaterialController;
use App\Http\Controllers\Backend\ProfitAndLossController;
use App\Http\Controllers\Backend\ExpenseAndIncomeController;
use App\Http\Controllers\Backend\ProductVariationController;
use App\Http\Controllers\Backend\ShiftOutputWorkerController;
use App\Http\Controllers\Backend\RawMaterialTransferController;
use App\Http\Controllers\Backend\RawMaterialVariationController;
use App\Http\Controllers\Backend\RawMaterialTransferItemController;

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
Route::get('login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::post('authenticate', [\App\Http\Controllers\AuthController::class, 'authenticate'])->name('authenticate');
Route::post('logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

// Telegram bot
Route::post('/telegram/webhook', [\App\Http\Controllers\Backend\TelegramController::class, 'webhook']);

// Backend
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/', [\App\Http\Controllers\Backend\AdminController::class, 'index'])->name('dashboard')->middleware('role:Admin,Manager,Moderator,Developer');

    Route::resource('category', \App\Http\Controllers\Backend\CategoryController::class)->middleware('role:Admin,Manager,Developer');

    Route::prefix('charts')->group(function () {
        Route::get('diagram', [\App\Http\Controllers\Backend\AdminController::class, 'charts'])->name('charts.diagram')->middleware('role:Admin,Manager,Developer');
    });

    Route::post('/warehouse/add-count', [\App\Http\Controllers\Backend\WarehouseController::class, 'addCount'])->name('warehouse.add-count');
    Route::get('/warehouse/{warehouse_id}/elements', [\App\Http\Controllers\Backend\WarehouseController::class, 'list'])->name('warehouse.list')->middleware('role:Admin,Manager,Moderator,Developer');
    Route::middleware('role:Developer')->group(function () {
        Route::get('warehouse/create', [\App\Http\Controllers\Backend\WarehouseController::class, 'create'])->name('warehouse.create');
        Route::delete('warehouse/{warehouse}', [\App\Http\Controllers\Backend\WarehouseController::class, 'destroy'])->name('warehouse.destroy');
    });
    Route::resource('warehouse', \App\Http\Controllers\Backend\WarehouseController::class)->except(['create', 'destroy'])->middleware('role:Admin,Manager,Moderator,Developer');

    Route::prefix('product')->group(function () {
        Route::get('{product_id}/variations', [\App\Http\Controllers\Backend\ProductVariationController::class, 'list'])->name('product-variation.list')->middleware('role:Admin,Manager,Moderator,Developer');
        Route::get('{product_id}/variations/create', [\App\Http\Controllers\Backend\ProductVariationController::class, 'create'])->name('product-variation.create.custom')->middleware('role:Admin,Manager,Moderator,Developer');
        Route::post('{product_id}/variations', [\App\Http\Controllers\Backend\ProductVariationController::class, 'store'])->name('product-variation.store.custom')->middleware('role:Admin,Manager,Moderator,Developer');
    });
    Route::resource('product', \App\Http\Controllers\Backend\ProductController::class)->middleware('role:Admin,Manager,Moderator,Developer');

    Route::post('product-variation/{variation}/add-count', [\App\Http\Controllers\Backend\ProductVariationController::class, 'addCount'])->name('product-variation.add-count')->middleware('role:Admin,Manager,Moderator,Developer');
    Route::resource('product-variation', \App\Http\Controllers\Backend\ProductVariationController::class)->middleware('role:Admin,Manager,Moderator,Developer');

    Route::prefix('log')->group(function () {
        Route::get('/product', [LogController::class, 'product'])->name('log.product')->middleware('role:Admin,Manager,Moderator,Developer');
    });

    Route::middleware('role:Developer')->group(function () {
        Route::get('organization/create', [\App\Http\Controllers\Backend\OrganizationController::class, 'create'])->name('organization.create');
        Route::delete('organization/{organization}', [\App\Http\Controllers\Backend\OrganizationController::class, 'destroy'])->name('organization.destroy');
    });
    Route::resource('organization', \App\Http\Controllers\Backend\OrganizationController::class)->except(['create', 'destroy'])->middleware('role:Admin,Manager,Moderator,Developer');

    Route::prefix('order')->group(function () {
        Route::get('{order_id}/items', [\App\Http\Controllers\Backend\OrderItemController::class, 'list'])->name('order-item.list')->middleware('role:Admin,Manager,Developer');
        Route::get('{order}/items/create', [\App\Http\Controllers\Backend\OrderItemController::class, 'create'])->name('order-item.create.custom')->middleware('role:Admin,Manager,Developer');
        Route::post('{order}/items', [\App\Http\Controllers\Backend\OrderItemController::class, 'store'])->name('order-item.store.custom')->middleware('role:Admin,Manager,Developer');
        //        Route::get('{order}/items/{item}/edit', [\App\Http\Controllers\Backend\OrderItemController::class, 'edit'])->name('order-item.edit')->middleware('role:Admin,Manager,Developer');
    });
    Route::get('order/create', [\App\Http\Controllers\Backend\OrderController::class, 'create'])->name('order.create')->middleware('role:Admin,Manager,Moderator,Developer');
    Route::post('order', [\App\Http\Controllers\Backend\OrderController::class, 'store'])->name('order.store')->middleware('role:Admin,Manager,Developer,Moderator');

    Route::resource('order', \App\Http\Controllers\Backend\OrderController::class)->except(['create', 'store'])->middleware('role:Admin,Manager,Developer');
    Route::resource('order-item', \App\Http\Controllers\Backend\OrderItemController::class)->middleware('role:Admin,Manager,Moderator,Developer');

    Route::prefix('pre-order')->group(function () {
        Route::get('{pre_order_id}/items', [\App\Http\Controllers\Backend\PreOrderItemController::class, 'list'])->name('pre-order-item.list')->middleware('role:Admin,Manager,Moderator,Developer');;
        Route::post('{preOrder}/complete', [\App\Http\Controllers\Backend\PreOrderController::class, 'complete'])->name('pre-order.complete')->middleware('role:Admin,Manager,Moderator,Developer');;
        Route::get('ajax/product', [\App\Http\Controllers\Backend\PreOrderController::class, 'searchProduct'])->name('ajax.product');
    });

    Route::resource('pre-order', \App\Http\Controllers\Backend\PreOrderController::class)->middleware('role:Admin,Manager,Moderator,Developer');;
    Route::resource('pre-order-item', \App\Http\Controllers\Backend\PreOrderItemController::class)->middleware('role:Admin,Manager,Moderator,Developer');;

    Route::get('/expense-and-income/users-by-currency', [\App\Http\Controllers\Backend\ExpenseAndIncomeController::class, 'getUsersByCurrency'])->name('expense-and-income.users-by-currency')->middleware('role:Admin,Manager,Moderator,Developer');
    Route::resource('expense-and-income', \App\Http\Controllers\Backend\ExpenseAndIncomeController::class)->middleware('role:Admin,Manager,Moderator,Developer');

    Route::prefix('cash-report')->group(function () {
        Route::get('/', [\App\Http\Controllers\Backend\CashReportController::class, 'index'])->name('cash-report.index')->middleware('role:Admin,Manager,Developer');
        Route::post('/open', [\App\Http\Controllers\Backend\CashReportController::class, 'openDailyReport'])->name('cash-report.open')->middleware('role:Admin,Manager,Moderator,Developer');
        Route::post('/close', [\App\Http\Controllers\Backend\CashReportController::class, 'closeDailyReport'])->name('cash-report.close')->middleware('role:Admin,Manager,Developer');
    });

    Route::get('/exchange-rates', [\App\Http\Controllers\Backend\ExchangeRateController::class, 'index'])->name('exchange-rates.index');
    Route::post('/exchange-rates/update', [\App\Http\Controllers\Backend\ExchangeRateController::class, 'update'])->name('exchange-rates.update');

    Route::resource('profit-and-loss', \App\Http\Controllers\Backend\ProfitAndLossController::class)->middleware('role:Admin,Developer');

    Route::resource('file', \App\Http\Controllers\Backend\FileController::class)->middleware('role:Admin,Manager,Moderator,Developer');

    Route::get('/export', [\App\Http\Controllers\Backend\ExportController::class, 'export'])->name('export.file')->middleware('role:Admin,Manager,Moderator,Developer');

    Route::prefix('user')->group(function () {
        Route::get('staff', [\App\Http\Controllers\Backend\UserController::class, 'staff'])->name('user.staff')->middleware('role:Admin,Manager,Moderator,Developer');
    });
    Route::resource('user', \App\Http\Controllers\Backend\UserController::class)->middleware('role:Admin,Manager,Moderator,Developer');

    Route::resource('role', \App\Http\Controllers\Backend\RoleController::class)->middleware('role:Developer');
});


// Frontend

Route::get('/', function () {
    return redirect('/admin');
});

//Route::get('/', [\App\Http\Controllers\Frontend\SiteController::class, 'index'])->name('frontend');
