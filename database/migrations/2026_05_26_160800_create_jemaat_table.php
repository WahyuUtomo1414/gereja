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
        Schema::create('jemaat', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email', 128);
            $table->string('alamat')->nullable();
            $table->string('foto')->nullable();
            $table->foreignId('user_id')->unique()->constrained('users');
            $this->base($table);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jemaat');
    }
};
