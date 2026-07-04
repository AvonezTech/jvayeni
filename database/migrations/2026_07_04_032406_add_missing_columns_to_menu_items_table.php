<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('menu_items', 'description')) {
            Schema::table('menu_items', function (Blueprint $table) {
                $table->text('description')->nullable();
            });
        }

        if (!Schema::hasColumn('menu_items', 'image')) {
            Schema::table('menu_items', function (Blueprint $table) {
                $table->string('image')->nullable();
            });
        }

        if (!Schema::hasColumn('menu_items', 'is_special')) {
            Schema::table('menu_items', function (Blueprint $table) {
                $table->boolean('is_special')->default(false);
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('menu_items', 'description')) {
            Schema::table('menu_items', function (Blueprint $table) {
                $table->dropColumn('description');
            });
        }

        if (Schema::hasColumn('menu_items', 'image')) {
            Schema::table('menu_items', function (Blueprint $table) {
                $table->dropColumn('image');
            });
        }

        if (Schema::hasColumn('menu_items', 'is_special')) {
            Schema::table('menu_items', function (Blueprint $table) {
                $table->dropColumn('is_special');
            });
        }
    }
};