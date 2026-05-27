<?php

namespace App\Models;

use App\Traits\AuditedBySoftDelete;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kegiatan extends Model
{
    use SoftDeletes, AuditedBySoftDelete;

    protected $table = 'kegiatan';

    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'tanggal' => 'date',
            'jam_mulai' => 'string',
            'jam_selesai' => 'string',
            'kuota' => 'integer',
            'foto' => 'array',
            'active' => 'boolean',
        ];
    }

    public function jenisKegiatan(): BelongsTo
    {
        return $this->belongsTo(JenisKegiatan::class);
    }

    public function pembicara(): BelongsTo
    {
        return $this->belongsTo(Pembicara::class);
    }

    public function fotoKegiatan(): HasMany
    {
        return $this->hasMany(FotoKegiatan::class);
    }

    public function peserta(): HasMany
    {
        return $this->hasMany(Peserta::class);
    }
}
