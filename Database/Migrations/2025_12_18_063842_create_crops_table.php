<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('crops', function (Blueprint $t) {
            $t->id();
            $t->string('name', 255);
            $t->string('variety', 255)->nullable();
            $t->string('scientific_name', 255)->nullable();
            $t->timestamp('sowing_date');
            $t->timestamp('estimated_harvest_date')->nullable();
            $t->integer('status')->default(1);
            $t->text('notes')->nullable();
            $t->timestamps();
            $t->softDeletes();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('crops');
    }
};