<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users_admin', function (Blueprint $table) {
            $table->unsignedBigInteger('access_level')->nullable()->change();
            $table->foreign('access_level')->references('id')->on('users_admin_access_level');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users_admin', function (Blueprint $table) {
            //sqlite dont support drop foreign keys, we add this if statement to run migrations unity tests without problems.
            if (DB::getDriverName() !== 'sqlite') {
                Schema::table('teams', function (Blueprint $table) {
                    $table->dropForeign(['access_level']);
                });
            }
            
            $table->unsignedBigInteger('access_level')->nullable()->change(); // Change it back to nullable unsignedBigInteger
        });
    }
};
