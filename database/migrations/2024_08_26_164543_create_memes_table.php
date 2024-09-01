<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    /*
    ! PostType{
    ? 0: Image With URL
    ? 1: Video With URL
    ? 2: Gif With URL
    ? 3: Just Text
    ? 4: Image With Upload
    ? 5: Video With Upload
    ? 6: Gif With Upload
    }
    ! */
    public function up(): void
    {
        Schema::create('memes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('keywords');
            $table->string('imageURL')->nullable();
            $table->integer("postType")->default(0);
            $table->integer("userID")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('memes');
    }
};
