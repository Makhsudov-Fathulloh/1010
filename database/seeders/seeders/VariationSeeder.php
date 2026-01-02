<?php

namespace Database\Seeders\seeders;

use App\Models\ProductVariation;
use App\Services\StatusService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VariationSeeder extends Seeder
{
    public function run(): void
    {
        //-------------------------------------------------------
        DB::table('product')->insert([
            'warehouse_id' => 1,
            'title' => 'Bakery',
            'slug' => 'bakery',
            'user_id' => 1,
            'category_id' => 1,
            'status' => StatusService::STATUS_ACTIVE,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_variation')->insert([
            'product_id' => 1,
            'code' => 'Y35961',
            'title' => 'Biskvit 150g',
            'slug' => 'Biskvit-150g',
            'price' => 14990,
            'currency' => StatusService::CURRENCY_UZS,
            'count' => 50,
            'unit' => StatusService::UNIT_PSC,
            'total_price' => 14990 * 50,
            'top' => ProductVariation::TOP_INACTIVE,
            'status' => StatusService::STATUS_ACTIVE,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //-------------------------------------------------------
        DB::table('product')->insert([
            'warehouse_id' => 1,
            'title' => 'Яшкино',
            'slug' => 'yashkino',
            'user_id' => 1,
            'category_id' => 1,
            'status' => StatusService::STATUS_ACTIVE,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_variation')->insert([
            'product_id' => 2,
            'code' => 'B07582',
            'title' => 'Qaqos 750g',
            'slug' => 'qaqos-750g',
            'price' => 22500,
            'currency' => StatusService::CURRENCY_UZS,
            'count' => 30,
            'unit' => StatusService::UNIT_PSC,
            'total_price' => 22500 * 30,
            'top' => ProductVariation::TOP_INACTIVE,
            'status' => StatusService::STATUS_ACTIVE,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //-------------------------------------------------------
        DB::table('product')->insert([
            'warehouse_id' => 1,
            'title' => 'Royal',
            'slug' => 'royal',
            'user_id' => 1,
            'category_id' => 2,
            'status' => StatusService::STATUS_ACTIVE,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_variation')->insert([
            'product_id' => 3,
            'code' => 'R04961',
            'title' => 'Anor 330ml',
            'slug' => 'anor-330ml',
            'price' => 6500,
            'currency' => StatusService::CURRENCY_UZS,
            'count' => 50,
            'unit' => StatusService::UNIT_PSC,
            'total_price' => 6500 * 50,
            'top' => ProductVariation::TOP_INACTIVE,
            'status' => StatusService::STATUS_ACTIVE,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //-------------------------------------------------------
        DB::table('product')->insert([
            'warehouse_id' => 1,
            'title' => 'Chortoq',
            'slug' => 'chortoq',
            'user_id' => 1,
            'category_id' => 2,
            'status' => StatusService::STATUS_ACTIVE,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('product_variation')->insert([
            'product_id' => 4,
            'code' => 'CH52369',
            'title' => 'Gazlangan 750ml',
            'slug' => 'gazlangan-750ml',
            'price' => 11000,
            'currency' => StatusService::CURRENCY_UZS,
            'count' => 30,
            'unit' => StatusService::UNIT_PSC,
            'total_price' => 11000 * 50,
            'top' => ProductVariation::TOP_INACTIVE,
            'status' => StatusService::STATUS_ACTIVE,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
