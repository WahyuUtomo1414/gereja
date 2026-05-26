<?php

namespace App\Models;

use App\Traits\AuditedBySoftDelete;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gereja extends Model
{
    use SoftDeletes, AuditedBySoftDelete;

    protected $table = 'gereja';

    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'misi' => 'array',
            'sosial_media' => 'array',
            'active' => 'boolean',
        ];
    }
}
