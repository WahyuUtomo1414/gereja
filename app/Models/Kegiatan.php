<?php

namespace App\Models;

use App\Enums\StatusKegiatan;
use App\Traits\AuditedBySoftDelete;
use Illuminate\Database\Eloquent\Builder;
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
            'status' => StatusKegiatan::class,
            'tanggal_review' => 'datetime',
            'tanggal_laporan' => 'datetime',
            'active' => 'boolean',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (self $kegiatan): void {
            $kegiatan->status ??= StatusKegiatan::MENUNGGU_REVIEW;
        });
    }

    public function jenisKegiatan(): BelongsTo
    {
        return $this->belongsTo(JenisKegiatan::class);
    }

    public function pembicara(): BelongsTo
    {
        return $this->belongsTo(Pembicara::class);
    }

    public function reviewedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }

    public function fotoKegiatan(): HasMany
    {
        return $this->hasMany(FotoKegiatan::class);
    }

    public function peserta(): HasMany
    {
        return $this->hasMany(Peserta::class);
    }

    public function scopeOwnedBy(Builder $query, User $user): Builder
    {
        return $query->where('created_by', $user->id);
    }

    public function isOwnedBy(User $user): bool
    {
        return (int) $this->created_by === (int) $user->id;
    }

    public function canBeEditedByKetua(): bool
    {
        return in_array($this->status, [
            StatusKegiatan::MENUNGGU_REVIEW,
            StatusKegiatan::PERLU_REVISI,
        ], true);
    }

    public function canManageStatusAsKetua(): bool
    {
        return in_array($this->status, [
            StatusKegiatan::DISETUJUI,
            StatusKegiatan::PENDAFTARAN_DIBUKA,
            StatusKegiatan::PENDAFTARAN_DITUTUP,
            StatusKegiatan::SELESAI,
            StatusKegiatan::LAPORAN,
            StatusKegiatan::DIBATALKAN,
        ], true);
    }

    public function canRegister(): bool
    {
        if (! $this->active || ! $this->status->canRegister()) {
            return false;
        }

        if (is_null($this->kuota)) {
            return true;
        }

        return $this->peserta()->count() < $this->kuota;
    }

    public function canManageReport(): bool
    {
        return $this->status->canManageReport();
    }
}
