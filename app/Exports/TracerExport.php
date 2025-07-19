<?php

namespace App\Exports;

use App\Models\Tracer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class TracerExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Tracer::with('alumni')->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID Tracer',
            'Nama Alumni',
            'NIM',
            'Email',
            'Jenis Kelamin',
            'Program Studi',
            'Mulai Kerja',
            'Nama Instansi',
            'Jabatan',
            'Kesesuaian Kerja',
            'Kelurahan',
            'Kabupaten/Kota',
            'Provinsi',
            'Kode Pos',
            'Tanggal Update'
        ];
    }

    /**
     * @param mixed $row
     * @return array
     */
    public function map($row): array
    {
        return [
            $row->id,
            $row->alumni->nama ?? 'N/A',
            $row->alumni->nim ?? 'N/A',
            $row->alumni->email ?? 'N/A',
            $row->alumni->jenis_kelamin ?? 'N/A',
            $row->alumni->program_studi ?? 'N/A',
            $row->mulai_kerja ? $row->mulai_kerja->format('d/m/Y') : 'N/A',
            $row->nama_instansi,
            $row->jabatan,
            $row->kesesuaian_kerja,
            $row->kelurahan,
            $row->kab_kota,
            $row->provinsi,
            $row->kode_pos,
            $row->tgl_update ? $row->tgl_update->format('d/m/Y H:i:s') : 'N/A',
        ];
    }

    /**
     * @param Worksheet $sheet
     */
    public function styles(Worksheet $sheet)
    {
        return [
            1 => [
                'font' => ['bold' => true],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['rgb' => 'E2EFDA']
                ]
            ],
        ];
    }
}
