<?php

namespace Database\Seeders\seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {
            $user = User::whereHas('role', fn($q) => $q->whereIn('title', ['Admin', 'Manager', 'Moderator']))->first();

            if (!$user) {
                throw new \Exception("Admin, Manager yoki Moderator topilmadi — iltimos, avval user seeder ishga tushiring!");
            }

            $сategories = [
                [
                    'title' => '1010 (Qurilish mollari)',
                    'subtitle' => '1010 (Qurilish mollari)',
                    'description' => '1010 (Qurilish mollari)',
                ],
            ];

            foreach ($сategories as $cat) {
                DB::table('category')->insert([
                    'parent_id'   => null,
                    'title'       => $cat['title'],
                    'subtitle'    => $cat['subtitle'],
                    'description' => $cat['description'],
                    'image'       => null,
                    'slug'        => Str::slug($cat['title']),
                    'user_id'     => $user->id,
                    'created_at'  => now(),
                    'updated_at'  => now(),
                ]);
            }
        });
    }
}
