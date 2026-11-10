<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Extension\CommonMark\Node\Block\BlockQuote;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema:: create('incoming_letters', function(Blueprint $table){
            $table->id();
            $table->string('nomor_surat');
            $table->string('tanggal');
            $table->string('pengirim');
            $table->string('perihal');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incoming_letters');
    }
};
