<?php

namespace App\Exports;

use App\Inventory;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class InventoriesExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Inventory::all();
    }

    public function map($inventory): array
    {
        return [
            $inventory->category->name,
            $inventory->place->name,
            $inventory->device->merk,
            $inventory->kode,
            $inventory->device->specification,
            $inventory->device->thn_pengadaan,
            $inventory->status,
        ];
    }

    public function headings(): array
    {
        return [
            'Category Alat',
            'Penempatan',
            'Merk',
            'Kode Inventaris',
            'Spesifikasi Alat',
            'Tahun/Bulan Pengadaan',
            'Status',
        ];
    }

}
