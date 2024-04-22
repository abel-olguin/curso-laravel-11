<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            #$table->foreignIdFor(\App\Models\Category::class)->constrained(); #category_id
            $table->foreignIdFor(\App\Models\User::class)->constrained();
            #$table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->string('slug');
            $table->text('description');

            #$table->softDeletes();
            #$table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
