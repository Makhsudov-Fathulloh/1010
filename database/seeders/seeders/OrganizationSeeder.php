<?php

namespace Database\Seeders\seeders;

use App\Models\User;
use App\Services\StatusService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganizationSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {
            // 1️ Moderatorlarni olish (organization egalari)
            $moderators = User::whereHas('role', fn($q) => $q->where('title', 'Moderator'))->get();
            if ($moderators->count() < 2) {
                throw new \Exception("Kamida 2 ta Moderator kerak!");
            }

            // 2️ Organizationlar yaratamiz
            $organizations = [
                ['title' => 'Asosiy', 'description' => 'Asosiy ombor'],
            ];

            foreach ($organizations as $index => $orgData) {
                $orgId = DB::table('organization')->insertGetId([
                    'user_id'    => $moderators[$index]->id,
                    'title'      => $orgData['title'],
                    'description'=> $orgData['description'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                //3️ Warehouse yaratamiz
                DB::table('warehouse')->insert([
                    'organization_id' => $orgId,
                    'title'           => "{$orgData['title']} omborxona",
                    'description'     => "{$orgData['title']}, barcha mahsulotlar joylanadigan asosiy omborxona",
                    'status' => StatusService::STATUS_ACTIVE,
                    'created_at'      => now(),
                    'updated_at'      => now(),
                ]);
            }
        });
    }
}
