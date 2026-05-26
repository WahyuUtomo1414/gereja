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
        Schema::create('gereja', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('deskripsi')->nullable();
            $table->string('logo')->nullable();
            $table->string('alamat')->nullable();
            $table->text('visi')->nullable();
            $table->json('misi')->nullable();
            $table->string('no_tlpn', 18)->nullable();
            $table->string('email', 128)->nullable();
            $table->json('sosial_media')->nullable();
            $this->base($table);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gereja');
    }
};
