<?php

namespace App\Models;

use App\Traits\AuditedBySoftDelete;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class FotoKegiatan extends Model
{
    use SoftDeletes, AuditedBySoftDelete;

    protected $table = 'foto_kegiatan';

    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'active' => 'boolean',
        ];
    }

    public function kegiatan(): BelongsTo
    {
        return $this->belongsTo(Kegiatan::class);
    }

    public function setNamaAttribute(?string $value): void
    {
        $this->attributes['nama'] = $value;
        $this->attributes['caption'] = $value;
    }

    public function setCaptionAttribute(?string $value): void
    {
        $this->attributes['caption'] = $value;
        $this->attributes['nama'] = $value;
    }
}
