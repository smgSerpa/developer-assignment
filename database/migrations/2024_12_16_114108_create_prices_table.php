<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->id();
            $table->string('provider');
            $table->string('price');
            $table->timestamp('delivery_start');
            $table->timestamp('delivery_end');
            $table->timestamps();

            $table->unique(['provider', 'delivery_start']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prices');
    }
};
