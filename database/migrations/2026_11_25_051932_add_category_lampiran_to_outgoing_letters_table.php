<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('outgoing_letters', 'category_id')) {
            Schema::table('outgoing_letters', function (Blueprint $table) {
                $table->foreignId('category_id')->nullable()
                      ->constrained('categories')->nullOnDelete();
            });
        }

        if (! Schema::hasColumn('outgoing_letters', 'lampiran')) {
            Schema::table('outgoing_letters', function (Blueprint $table) {
                $table->string('lampiran')->nullable();
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('outgoing_letters', 'category_id')) {
            Schema::table('outgoing_letters', function (Blueprint $table) {
                $table->dropConstrainedForeignId('category_id');
            });
        }

        if (Schema::hasColumn('outgoing_letters', 'lampiran')) {
            Schema::table('outgoing_letters', function (Blueprint $table) {
                $table->dropColumn('lampiran');
            });
        }
    }
};