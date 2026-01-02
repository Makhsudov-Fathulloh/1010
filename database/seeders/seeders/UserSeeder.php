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
        // Admin
        DB::table('user')->insert([
            'first_name' => 'Admin1',
            'last_name' => 'Admin1',
            'username' => 'Admin1',
            'password_hash' => Hash::make('castle4525'),
            'email' => 'admin1@gmail.com',
            'email_verified_at' => now(),
            'photo' => null,
            'phone' => '+998000000001',
            'role_id' => $roleMap['Admin'],
            'status' => StatusService::STATUS_ACTIVE,
            'remember_token' => Str::random(10),
            'token' => Str::random(32),
            'auth_key' => Str::random(32),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user')->insert([
            'first_name' => 'Admin2',
            'last_name' => 'Admin2',
            'username' => 'Admin2',
            'password_hash' => Hash::make('castle4525'),
            'email' => 'admin2@gmail.com',
            'email_verified_at' => now(),
            'photo' => null,
            'phone' => '+998000000002',
            'role_id' => $roleMap['Admin'],
            'status' => StatusService::STATUS_ACTIVE,
            'remember_token' => Str::random(10),
            'token' => Str::random(32),
            'auth_key' => Str::random(32),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Manager
        DB::table('user')->insert([
            'first_name' => 'Manager1',
            'last_name' => 'Manager1',
            'username' => 'Manager1',
            'password_hash' => Hash::make('castle4525'),
            'email' => 'meneger1@gmail.com',
            'email_verified_at' => now(),
            'photo' => null,
            'phone' => '+998000000010',
            'role_id' => $roleMap['Manager'],
            'status' => StatusService::STATUS_ACTIVE,
            'remember_token' => Str::random(10),
            'token' => Str::random(32),
            'auth_key' => Str::random(32),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user')->insert([
            'first_name' => 'Manager2',
            'last_name' => 'Manager2',
            'username' => 'Manager2',
            'password_hash' => Hash::make('castle4525'),
            'email' => 'meneger2@gmail.com',
            'email_verified_at' => now(),
            'photo' => null,
            'phone' => '+998000000011',
            'role_id' => $roleMap['Manager'],
            'status' => StatusService::STATUS_ACTIVE,
            'remember_token' => Str::random(10),
            'token' => Str::random(32),
            'auth_key' => Str::random(32),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Moderator
        $moderators = [
            [
                'first_name' => 'Moderator1',
                'last_name'  => 'Moderator1',
                'email'      => 'moderator1@gmail.com',
                'phone'      => '+998000000020',
                'username'   => 'Moderator1',
            ],
            [
                'first_name' => 'Moderator2',
                'last_name'  => 'Moderator2',
                'email'      => 'moderator2@gmail.com',
                'phone'      => '+998000000021',
                'username'   => 'Moderator2',
            ],
            [
                'first_name' => 'Moderator3',
                'last_name'  => 'Moderator3',
                'email'      => 'moderator3@gmail.com',
                'phone'      => '+998000000022',
                'username'   => 'Moderator3',
            ],
        ];

        foreach ($moderators as $m) {
            DB::table('user')->insert([
                'first_name'        => $m['first_name'],
                'last_name'         => $m['last_name'],
                'username'          => $m['username'],
                'password_hash'     => Hash::make('castle4525'),
                'email'             => $m['email'],
                'email_verified_at' => now(),
                'photo'             => null,
                'phone'             => $m['phone'],
                'role_id'           => $roleMap['Moderator'],
                'status'            => StatusService::STATUS_ACTIVE,
                'remember_token'    => Str::random(10),
                'token'             => Str::random(32),
                'auth_key'          => Str::random(32),
                'created_at'        => now(),
                'updated_at'        => now(),
            ]);
        }

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

        $clients = [
            [
                'first_name' => 'Jamshid',
                'last_name'  => 'Qodirov',
                'username'   => 'jamshid.qodirov',
                'email'      => 'jamshid.qodirov@gmail.com',
                'phone'      => '+998000000041',
            ],
            [
                'first_name' => 'Алексей',
                'last_name'  => 'Миронов',
                'username'   => 'aleksey.mironov',
                'email'      => 'aleksey.mironov@gmail.com',
                'phone'      => '+998000000042',
            ],
            [
                'first_name' => 'Michael',
                'last_name'  => 'Steiner',
                'username'   => 'michael.steiner',
                'email'      => 'michael.steiner@gmail.com',
                'phone'      => '+998000000043',
            ],
        ];

        foreach ($clients as $client) {
            DB::table('user')->insert([
                'first_name' => $client['first_name'],
                'last_name' => $client['last_name'],
                'username' => $client['username'],
                'password_hash' => Hash::make('castle4525'),
                'email' => $client['email'],
                'email_verified_at' => now(),
                'photo' => null,
                'phone' => $client['phone'],
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
}
