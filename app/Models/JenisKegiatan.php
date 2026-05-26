<?php

namespace App\Models;

use App\Traits\AuditedBySoftDelete;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisKegiatan extends Model
{
    use SoftDeletes, AuditedBySoftDelete;

    protected $table = 'jenis_kegiatan';

    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'active' => 'boolean',
        ];
    }

    public function kegiatan(): HasMany
    {
        return $this->hasMany(Kegiatan::class);
    }
}
