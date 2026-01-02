<?php

namespace Database\Seeders;

use App\Models\User;
use App\Services\StatusService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganizationSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {

            // Moderator (organization egasi) olish
            $moderator = User::whereHas('role', fn($q) => $q->where('title', 'Moderator'))->first();
            if (!$moderator) {
                throw new \Exception("Moderator kerak!");
            }

            // Organization yaratish
            $orgId = DB::table('organization')->insertGetId([
                'user_id'     => $moderator->id,
                'title'       => '1010',
                'description' => '1010 organization',
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);

            // Ombor yaratish
            DB::table('warehouse')->insert([
                'organization_id' => $orgId,
                'title'           => 'Asosiy Ombor',
                'description'     => '1010 organization uchun asosiy ombor',
                'status'          => StatusService::STATUS_ACTIVE,
                'created_at'      => now(),
                'updated_at'      => now(),
            ]);
        });
    }
}
