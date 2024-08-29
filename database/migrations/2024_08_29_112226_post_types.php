<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('postTypes', function (Blueprint $table) {
            $table->string("id")->primary();
            $table->string('name');
        });

        DB::table('postTypes')->insert([
            ['id' => 0, 'name' => 'Image With URL'],
            ['id' => 1, 'name' => 'Youtube Video With URL'],
            ['id' => 2, 'name' => 'Gif With URL'],
            ['id' => 3, 'name' => 'Just Text'],
            ['id' => 4, 'name' => 'Image With Upload'],
            ['id' => 5, 'name' => 'Video With Upload'],
            ['id' => 6, 'name' => 'Gif With Upload'],
            ['id' => 7, 'name' => 'Just Video With URL'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
