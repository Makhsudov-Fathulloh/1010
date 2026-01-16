<?php

use App\Models\UserDebt;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('user_debt', function (Blueprint $table) {
            $table->tinyInteger('source')->default(UserDebt::SOURCE_ORDER)->after('currency');
        });
    }

    public function down(): void
    {
        Schema::table('user_debt', function (Blueprint $table) {
            $table->dropColumn('source');
        });
    }
};
