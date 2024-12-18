<?php

use App\Models\Ingatlan;
use App\Models\Kategoriak;
use Illuminate\Container\Attributes\DB;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ingatlans', function (Blueprint $table) {
            $table->id(); // Az elsődleges kulcs
            $table->foreignId('kategoria')->references('id')->on('kategoriaks');// Idegen kulcs
            $table->string('leiras');
            $table->date('hirdetesDatuma')->useCurrent();
            $table->boolean('tehermentes')->default(0);
            $table->integer('ar');
            $table->timestamps();
        });
        Ingatlan::create(['kategoria'=>1, 'leiras'=>'Kertvárosi egyszintes házat kinálunk nyugodt környezetben. nagy telken', 'hirdetesDatuma'=>'2024-11-23', 'tehermentes'=>0, 'ar'=>1200000]);
        Ingatlan::create(['kategoria'=>2, 'leiras'=>'Kertvárosi egyszintes házat kinálunk nyugodt környezetben. nagy telken', 'hirdetesDatuma'=>'2024-11-23', 'tehermentes'=>0, 'ar'=>1200000]);
        Ingatlan::create(['kategoria'=>3, 'leiras'=>'Kertvárosi egyszintes házat kinálunk nyugodt környezetben. nagy telken', 'hirdetesDatuma'=>'2024-11-23', 'tehermentes'=>0, 'ar'=>1200000]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingatlans');
    }
};
