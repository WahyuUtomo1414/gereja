<?php

namespace App\Models;

use App\Traits\AuditedBySoftDelete;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pembicara extends Model
{
    use SoftDeletes, AuditedBySoftDelete;

    protected $table = 'pembicara';

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
