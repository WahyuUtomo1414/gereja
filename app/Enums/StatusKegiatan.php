<?php

namespace App\Enums;

enum StatusKegiatan: string
{
    case MENUNGGU_REVIEW = 'menunggu_review';
    case PERLU_REVISI = 'perlu_revisi';
    case DITOLAK = 'ditolak';
    case DISETUJUI = 'disetujui';
    case PENDAFTARAN_DIBUKA = 'pendaftaran_dibuka';
    case PENDAFTARAN_DITUTUP = 'pendaftaran_ditutup';
    case SELESAI = 'selesai';
    case LAPORAN = 'laporan';
    case DIBATALKAN = 'dibatalkan';

    public function label(): string
    {
        return match ($this) {
            self::MENUNGGU_REVIEW => 'Menunggu Review',
            self::PERLU_REVISI => 'Perlu Revisi',
            self::DITOLAK => 'Ditolak',
            self::DISETUJUI => 'Disetujui',
            self::PENDAFTARAN_DIBUKA => 'Pendaftaran Dibuka',
            self::PENDAFTARAN_DITUTUP => 'Pendaftaran Ditutup',
            self::SELESAI => 'Selesai',
            self::LAPORAN => 'Laporan',
            self::DIBATALKAN => 'Dibatalkan',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::MENUNGGU_REVIEW => 'warning',
            self::PERLU_REVISI => 'info',
            self::DITOLAK => 'danger',
            self::DISETUJUI => 'success',
            self::PENDAFTARAN_DIBUKA => 'success',
            self::PENDAFTARAN_DITUTUP => 'gray',
            self::SELESAI => 'primary',
            self::LAPORAN => 'success',
            self::DIBATALKAN => 'danger',
        };
    }

    public function isFinal(): bool
    {
        return in_array($this, [
            self::DITOLAK,
            self::DIBATALKAN,
            self::LAPORAN,
        ], true);
    }

    public function canRegister(): bool
    {
        return $this === self::PENDAFTARAN_DIBUKA;
    }

    public function isRejectedOrCancelled(): bool
    {
        return in_array($this, [
            self::DITOLAK,
            self::DIBATALKAN,
        ], true);
    }

    public function canManageReport(): bool
    {
        return in_array($this, [
            self::SELESAI,
            self::LAPORAN,
        ], true);
    }
}
