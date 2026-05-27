<?php

namespace App\Filament\Resources\Kegiatans\Pages;

use App\Enums\StatusKegiatan;
use App\Filament\Resources\Kegiatans\KegiatanResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Validation\ValidationException;

class EditKegiatan extends EditRecord
{
    protected static string $resource = KegiatanResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $status = StatusKegiatan::from($data['status']);
        $user = auth()->user();

        if (($user?->isSekertaris() || $user?->isSuperAdmin()) && in_array($status, [
            StatusKegiatan::PERLU_REVISI,
            StatusKegiatan::DITOLAK,
            StatusKegiatan::DISETUJUI,
        ], true)) {
            if (in_array($status, [StatusKegiatan::PERLU_REVISI, StatusKegiatan::DITOLAK], true) && blank($data['catatan_review'] ?? null)) {
                throw ValidationException::withMessages([
                    'data.catatan_review' => 'Catatan review wajib diisi untuk status perlu revisi atau ditolak.',
                ]);
            }

            $data['reviewed_by'] = $user?->id;
            $data['tanggal_review'] = now();
        }

        if ($status === StatusKegiatan::LAPORAN) {
            if (blank($data['laporan'] ?? null) || blank($data['jumlah_peserta_hadir'] ?? null)) {
                throw ValidationException::withMessages([
                    'data.laporan' => 'Laporan dan jumlah peserta hadir wajib diisi sebelum status menjadi laporan.',
                ]);
            }

            $data['tanggal_laporan'] = now();
        }

        return $data;
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
