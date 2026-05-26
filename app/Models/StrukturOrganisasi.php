<?php

namespace App\Models;

use App\Traits\AuditedBySoftDelete;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StrukturOrganisasi extends Model
{
    use SoftDeletes, AuditedBySoftDelete;

    protected $table = 'struktur_organisasi';

    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'order' => 'integer',
            'active' => 'boolean',
        ];
    }
}
