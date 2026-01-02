<?php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Dashboard
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Бошқарув панели', route('dashboard'));
});


// Category
Breadcrumbs::for('category.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Қатегориялар', route('category.index'));
});
Breadcrumbs::for('category.show', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('category.index');
    $trail->push($category->title, route('category.show', $category));
});
Breadcrumbs::for('category.create', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Категория яратиш', route('category.create'));
});
Breadcrumbs::for('category.edit', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('category.index');
    $trail->push($category->title, route('category.edit', $category));
});
Breadcrumbs::for('category.delete', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Категорияни ўчириш', route('category.delete'));
});


// Product
Breadcrumbs::for('product.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Махсулот турлари', route('product.index'));
});
Breadcrumbs::for('product.show', function (BreadcrumbTrail $trail, $product) {
    $trail->parent('product.index');
    $trail->push($product->title, route('product.show', $product));
});
Breadcrumbs::for('product.create', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Махсулот турини яратиш', route('product.create'));
});
Breadcrumbs::for('product.edit', function (BreadcrumbTrail $trail, $product) {
    $trail->parent('product.index');
    $trail->push($product->title, route('product.edit', $product));
});
Breadcrumbs::for('product.delete', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Махсулот турини ўчириш', route('product.delete'));
});

// Product Variation
Breadcrumbs::for('product-variation.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Маҳсулотлар', route('product-variation.index'));
});
Breadcrumbs::for('product-variation.list', function (BreadcrumbTrail $trail, $product_id) {
    $trail->parent('dashboard');
    $product = \App\Models\Product::findOrFail($product_id);
    $trail->push($product->title, route('product-variation.list', $product));
});
Breadcrumbs::for('product-variation.show', function (BreadcrumbTrail $trail, $productVariation) {
    $trail->parent('product-variation.index');
    $trail->push($productVariation->title, route('product-variation.show', $productVariation));
});
Breadcrumbs::for('product-variation.create.custom', function (BreadcrumbTrail $trail, $product_id) {
    $trail->parent('dashboard');
    $trail->push('Маҳсулот яратиш', route('product-variation.create.custom', $product_id));;
});

Breadcrumbs::for('product-variation.edit', function (BreadcrumbTrail $trail, $productVariation) {
    $trail->parent('product-variation.index');
    $trail->push($productVariation->title, route('product-variation.edit', $productVariation));
});
Breadcrumbs::for('product-variation.delete', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Маҳсулотни ўчириш', route('product-variation.delete'));
});

// Log Product
Breadcrumbs::for('log.product', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Маҳсулотлар(кириш)', route('log.product'));
});


// Organization
Breadcrumbs::for('organization.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Филиаллар', route('organization.index'));
});
Breadcrumbs::for('organization.show', function (BreadcrumbTrail $trail, $organization) {
    $trail->parent('organization.index');
    $trail->push($organization->title, route('organization.show', $organization));
});
Breadcrumbs::for('organization.create', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Филиал яратиш', route('organization.create'));
});
Breadcrumbs::for('organization.edit', function (BreadcrumbTrail $trail, $organization) {
    $trail->parent('organization.index');
    $trail->push($organization->title, route('organization.edit', $organization));
});
Breadcrumbs::for('organization.delete', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Филиални ўчириш', route('organization.delete'));
});


// Order
Breadcrumbs::for('order.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Буюртмалар', route('order.index'));
});
Breadcrumbs::for('order.show', function (BreadcrumbTrail $trail, $order) {
    $trail->parent('order.index');
    $trail->push($order->user->username, route('order.show', $order));
});
Breadcrumbs::for('order.create', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Буюртма яратиш', route('order.create'));
});
Breadcrumbs::for('order.edit', function (BreadcrumbTrail $trail, $order) {
    $trail->parent('order.index');
    $trail->push($order->user->username, route('order.edit', $order));
});
Breadcrumbs::for('order.delete', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Буюртмани ўчириш', route('order.delete'));
});

// Order Item
Breadcrumbs::for('order-item.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Буюртма элементлари', route('order-item.index'));
});
Breadcrumbs::for('order-item.list', function (BreadcrumbTrail $trail, $order_id) {
    $trail->parent('dashboard');
    $order = \App\Models\Order::findOrFail($order_id);
    $trail->push($order->user->username, route('order-item.list', $order));
});
Breadcrumbs::for('order-item.show', function (BreadcrumbTrail $trail, $orderItem) {
    $trail->parent('order-item.index');
    $trail->push($orderItem->title, route('order-item.show', $orderItem));
});
Breadcrumbs::for('order-item.create.custom', function (BreadcrumbTrail $trail, $order_id) {
    $trail->parent('dashboard');
    $trail->push('Буюртма элементини яратиш', route('order-item.create.custom', $order_id));;
});
Breadcrumbs::for('order-item.edit', function (BreadcrumbTrail $trail, $orderItem) {
    $trail->parent('order-item.index');
    $trail->push($orderItem->title, route('order-item.edit', $orderItem));
});
Breadcrumbs::for('order-item.delete', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Буюртма элементини ўчириш', route('order-item.delete'));
});


// Pre Order
Breadcrumbs::for('pre-order.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Навбатдаги буюртмалар', route('pre-order.index'));
});
Breadcrumbs::for('pre-order.show', function (BreadcrumbTrail $trail, $preOrder) {
    $trail->parent('pre-order.index');
    $trail->push($preOrder->user->username, route('pre-order.show', $preOrder));
});
Breadcrumbs::for('pre-order.create', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Навбатдаги буюртмани яратиш', route('pre-order.create'));
});
Breadcrumbs::for('pre-order.edit', function (BreadcrumbTrail $trail, $preOrder) {
    $trail->parent('pre-order.index');
    $trail->push($preOrder->user->username, route('pre-order.edit', $preOrder));
});
Breadcrumbs::for('pre-order.delete', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Навбатдаги буюртмани ўчириш', route('pre-order.delete'));
});

// Pre Order Item
Breadcrumbs::for('pre-order-item.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Навбатдаги буюртма элементлари', route('pre-order-item.index'));
});
Breadcrumbs::for('pre-order-item.list', function (BreadcrumbTrail $trail, $order_id) {
    $trail->parent('dashboard');
    $order = \App\Models\PreOrder::findOrFail($order_id);
    $trail->push($order->user->username, route('pre-order-item.list', $order));
});
Breadcrumbs::for('pre-order-item.show', function (BreadcrumbTrail $trail, $orderItem) {
    $trail->parent('pre-order-item.index');
    $trail->push($orderItem->title, route('pre-order-item.show', $orderItem));
});
Breadcrumbs::for('pre-order-item.create.custom', function (BreadcrumbTrail $trail, $order_id) {
    $trail->parent('dashboard');
    $trail->push('Навбатдаги буюртма элементини яратиш', route('pre-order-item.create.custom', $order_id));;
});
Breadcrumbs::for('pre-order-item.edit', function (BreadcrumbTrail $trail, $orderItem) {
    $trail->parent('pre-order-item.index');
    $trail->push($orderItem->title, route('pre-order-item.edit', $orderItem));
});
Breadcrumbs::for('pre-order-item.delete', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Навбатдаги буюртма элементини ўчириш', route('pre-order-item.delete'));
});


// Warehouse
Breadcrumbs::for('warehouse.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Омборлар', route('warehouse.index'));
});
Breadcrumbs::for('warehouse.list', function (BreadcrumbTrail $trail, $warehouse_id) {
    $trail->parent('dashboard');
    $warehouse = \App\Models\Warehouse::findOrFail($warehouse_id);
    $trail->push($warehouse->title, route('warehouse.list', $warehouse));
});
Breadcrumbs::for('warehouse.show', function (BreadcrumbTrail $trail, $warehouse) {
    $trail->parent('warehouse.index');
    $trail->push($warehouse->title, route('warehouse.show', $warehouse));
});
Breadcrumbs::for('warehouse.create', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Омбор яратиш', route('warehouse.create'));
});
Breadcrumbs::for('warehouse.edit', function (BreadcrumbTrail $trail, $warehouse) {
    $trail->parent('warehouse.index');
    $trail->push($warehouse->title, route('warehouse.edit', $warehouse));
});
Breadcrumbs::for('warehouse.delete', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Омборни ўчириш', route('warehouse.delete'));
});


// Expense And Income
Breadcrumbs::for('expense-and-income.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Кирим ва харажат (Касса)', route('expense-and-income.index'));
});
Breadcrumbs::for('expense-and-income.show', function (BreadcrumbTrail $trail, $expenseAndIncomeCount) {
    $trail->parent('expense-and-income.index');
    $trail->push($expenseAndIncomeCount->title, route('expense-and-income.show', $expenseAndIncomeCount));
});
Breadcrumbs::for('expense-and-income.create', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Кирим ва харажат яратиш', route('expense-and-income.create'));
});
Breadcrumbs::for('expense-and-income.edit', function (BreadcrumbTrail $trail, $expenseAndIncomeCount) {
    $trail->parent('expense-and-income.index');
    $trail->push($expenseAndIncomeCount->title, route('expense-and-income.edit', $expenseAndIncomeCount));
});
Breadcrumbs::for('expense-and-income.delete', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Кирим ва харажат ўчириш', route('expense-and-income.delete'));
});

// Profit And Loss
Breadcrumbs::for('profit-and-loss.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Фойда ва зарар савдолар', route('profit-and-loss.index'));
});
Breadcrumbs::for('profit-and-loss.show', function (BreadcrumbTrail $trail, $lossSale) {
    $trail->parent('profit-and-loss.index');
    $trail->push($lossSale->variation->title, route('profit-and-loss.show', $lossSale));
});
Breadcrumbs::for('profit-and-loss.delete', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Фойда ва зарарни ўчириш', route('profit-and-loss.delete'));
});


// Cash report
Breadcrumbs::for('cash-report.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Касса ҳисоботи', route('cash-report.index'));
});

// Shift report
Breadcrumbs::for('shift-report.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Смена ҳисоботи', route('shift-report.index'));
});

// Defect report
Breadcrumbs::for('defect-report.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Брак ҳисоботи', route('defect-report.index'));
});
Breadcrumbs::for('defect-report.show', function (BreadcrumbTrail $trail, $defectReport) {
    $trail->parent('defect-report.index');
    $trail->push($defectReport->stage->title, route('defect-report.show', $defectReport));
});


// Exchange rates
Breadcrumbs::for('exchange-rates.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Валюта курслари', route('exchange-rates.index'));
});


// File
Breadcrumbs::for('file.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Файл', route('file.index'));
});

// Charts
Breadcrumbs::for('charts.diagram', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Диаграмма', route('charts.diagram'));
});


// User
Breadcrumbs::for('user.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Клиентлар', route('user.index'));
});
Breadcrumbs::for('user.staff', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Ҳодимлар', route('user.staff'));
});
Breadcrumbs::for('user.show', function (BreadcrumbTrail $trail, $user) {
    $trail->parent('user.index');
    $trail->push($user->username, route('user.show', $user));
});
Breadcrumbs::for('user.create', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Клиент яратиш', route('user.create'));
});
Breadcrumbs::for('user.edit', function (BreadcrumbTrail $trail, $user) {
    $trail->parent('user.index');
    $trail->push($user->username, route('user.edit', $user));
});
Breadcrumbs::for('user.delete', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Клиентни ўчириш', route('user.delete'));
});


// role
Breadcrumbs::for('role.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Роллар', route('role.index'));
});
Breadcrumbs::for('role.create', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Роль яратиш', route('role.create'));
});
Breadcrumbs::for('role.edit', function (BreadcrumbTrail $trail, $role) {
    $trail->parent('role.index');
    $trail->push($role->title, route('role.edit', $role));
});
Breadcrumbs::for('role.delete', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Ролни ўчириш', route('role.delete'));
});
