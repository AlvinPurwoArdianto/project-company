<?php

namespace App\Exports;

use App\Models\Pendaftaran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PendaftaranExport implements FromCollection, WithHeadings, WithMapping, WithStyles
{
    public function collection()
    {
        return Pendaftaran::all();
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama',
            'Email',
            'Jenis Kelamin',
            'No Telepon',
            'Tanggal Pendaftaran',
        ];
    }

    public function map($row): array
    {
        static $no = 1;
        return [
            $no++,
            $row->nama,
            $row->email,
            $row->jenis_kelamin,
            $row->no_telepon,
            \Carbon\Carbon::parse($row->tanggal_pendaftaran)->format('d F Y'),
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Bold header row
        $sheet->getStyle('A1:F1')->getFont()->setBold(true);
        // Center header row
        $sheet->getStyle('A1:F1')->getAlignment()->setHorizontal('center');
        // Set auto width for columns
        foreach (range('A', 'F') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }
        // Add border to all cells
        $highestRow = $sheet->getHighestRow();
        $sheet->getStyle("A1:F{$highestRow}")
            ->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

        return [];
    }
}
