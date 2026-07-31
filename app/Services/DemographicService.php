<?php

namespace App\Services;

use App\Repositories\Contracts\FamilyRepositoryInterface;
use App\Repositories\Contracts\ResidentRepositoryInterface;
use App\Shared\Enums\FamilyRelation;
use App\Shared\Exceptions\DomainException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DemographicService
{
    public function __construct(
        private FamilyRepositoryInterface $familyRepo,
        private ResidentRepositoryInterface $residentRepo
    ) {}

    public function registerNewFamilyWithHead(array $familyData, array $headResidentData): Model
    {
        if ($this->familyRepo->isKkNumberExists($familyData['kk_number'])) {
            throw new DomainException("Nomor Kartu Keluarga {$familyData['kk_number']} sudah terdaftar.");
        }

        if ($this->residentRepo->isNikExists($headResidentData['nik'])) {
            throw new DomainException("NIK {$headResidentData['nik']} sudah terdaftar di sistem.");
        }

        return DB::transaction(function () use ($familyData, $headResidentData) {
            $family = $this->familyRepo->create($familyData);

            $headResidentData['family_id'] = $family->id;
            $headResidentData['family_relation_status'] = FamilyRelation::Head->value;
            $headResidentData['is_active'] = true;

            $this->residentRepo->create($headResidentData);

            return $family->load('residents');
        });
    }

    public function addFamilyMember(string $familyId, array $residentData): Model
    {
        $family = $this->familyRepo->findById($familyId);
        if (! $family) {
            throw new DomainException('Kartu Keluarga tidak ditemukan.');
        }

        if ($this->residentRepo->isNikExists($residentData['nik'])) {
            throw new DomainException("NIK {$residentData['nik']} sudah terdaftar.");
        }

        if ($residentData['family_relation_status'] === FamilyRelation::Head->value) {
            throw new DomainException('Status Kepala Keluarga hanya boleh satu dalam setiap KK.');
        }

        $residentData['family_id'] = $family->id;
        $residentData['is_active'] = true;

        return $this->residentRepo->create($residentData);
    }
}
