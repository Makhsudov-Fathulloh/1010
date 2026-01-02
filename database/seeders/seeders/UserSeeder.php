<?php

namespace Database\Seeders\seeders;

use App\Models\Role;
use App\Services\StatusService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // roles
        Role::insert([
            ['title' => 'Developer', 'description' => 'Developer - барча ҳуқуқларга эга дастурчи.'],
            ['title' => 'Admin', 'description' => 'Admin - барча ҳуқуқларга эга асосий фойдаланувчи.'],
            ['title' => 'Manager', 'description' => 'Manager - admin томонидан ҳуқуқлари чекланадиган иккинчи фойдаланувчи.'],
            ['title' => 'Moderator', 'description' => 'Moderator - admin томонидан ҳуқуқлари чекланадиган учинчи фойдаланувчи.'],
            ['title' => 'Client', 'description' => 'Client - тизимдан фойдаланувчи оддий мижоз, ҳунинг ҳуқуқлари чекланган.'],
        ]);

        $roleMap = Role::pluck('id', 'title')->toArray();

        // user
        DB::table('user')->insert([
            'first_name' => 'Developer',
            'last_name' => 'Developer',
            'username' => 'Developer',
            'password_hash' => Hash::make('castle4525'),
            'email' => 'developer@gmail.com',
            'email_verified_at' => now(),
            'photo' => null,
            'phone' => '+998944344525',
            'telegram_chat_id' => 994411739,
            'role_id' => $roleMap['Developer'],
            'status' => StatusService::STATUS_ACTIVE,
            'remember_token' => Str::random(10),
            'token' => Str::random(32),
            'auth_key' => Str::random(32),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Admin
        DB::table('user')->insert([
            'first_name' => 'Abdulhodiy',
            'last_name' => 'Abdulhodiy',
            'username' => 'Abdulhodiy',
            'password_hash' => Hash::make('castle4525'),
            'email' => 'abdulhodiy@gmail.com',
            'email_verified_at' => now(),
            'photo' => null,
            'phone' => '+998934760222',
            'role_id' => $roleMap['Admin'],
            'status' => StatusService::STATUS_ACTIVE,
            'remember_token' => Str::random(10),
            'token' => Str::random(32),
            'auth_key' => Str::random(32),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user')->insert([
            'first_name' => 'Islombek',
            'last_name' => 'Islombek',
            'username' => 'Islombek',
            'password_hash' => Hash::make('castle4525'),
            'email' => 'islombek@gmail.com',
            'email_verified_at' => now(),
            'photo' => null,
            'phone' => '+998944314449',
            'role_id' => $roleMap['Admin'],
            'status' => StatusService::STATUS_ACTIVE,
            'remember_token' => Str::random(10),
            'token' => Str::random(32),
            'auth_key' => Str::random(32),
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        // Moderator
        DB::table('user')->insert([
            'first_name' => 'Asadbek',
            'last_name' => 'Asadbek',
            'username' => 'Asadbek',
            'password_hash' => Hash::make('castle4525'),
            'email' => 'asadbek@gmail.com',
            'email_verified_at' => now(),
            'photo' => null,
            'phone' => '+998933470309',
            'role_id' => $roleMap['Moderator'],
            'status' => StatusService::STATUS_ACTIVE,
            'remember_token' => Str::random(10),
            'token' => Str::random(32),
            'auth_key' => Str::random(32),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user')->insert([
            'first_name' => 'Xusaboy',
            'last_name' => 'Xusaboy',
            'username' => 'Xusaboy',
            'password_hash' => Hash::make('castle4525'),
            'email' => 'xusaboy@gmail.com',
            'email_verified_at' => now(),
            'photo' => null,
            'phone' => '+998934780013',
            'role_id' => $roleMap['Moderator'],
            'status' => StatusService::STATUS_ACTIVE,
            'remember_token' => Str::random(10),
            'token' => Str::random(32),
            'auth_key' => Str::random(32),
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        // Client
        DB::table('user')->insert([
            'first_name' => 'Стандарт',
            'last_name' => 'Клиент',
            'username' => 'Стандарт клиент',
            'password_hash' => Hash::make('castle4525'),
            'email' => 'standartclient@gmail.com',
            'email_verified_at' => now(),
            'photo' => null,
            'phone' => '+998000000040',
            'role_id' => $roleMap['Client'],
            'status' => StatusService::STATUS_ACTIVE,
            'remember_token' => Str::random(10),
            'token' => Str::random(32),
            'auth_key' => Str::random(32),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
