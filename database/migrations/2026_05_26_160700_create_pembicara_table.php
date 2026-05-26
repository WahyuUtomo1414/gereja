<?php

use App\Traits\BaseModelSoftDeleteDefault;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    use BaseModelSoftDeleteDefault;

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pembicara', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 128);
            $table->string('foto')->nullable();
            $table->string('jabatan', 128)->nullable();
            $table->text('latar_belakang')->nullable();
            $this->base($table);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembicara');
    }
};
