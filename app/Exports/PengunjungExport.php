<?php

namespace App\Exports;

use App\Models\Visitor;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PengunjungExport implements FromCollection, WithHeadings, WithMapping, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Visitor::orderBy('created_at', 'desc')->get();
    }

    public function map($pengunjung): array
    {
        return [
            $pengunjung->ip_address,
            $pengunjung->user_agent,
            $pengunjung->url,
            \Carbon\Carbon::parse($pengunjung->visited_at)->translatedFormat('d F Y H:i'),
        ];
    }

    /**
     * Header kolom
     */
    public function headings(): array
    {
        return [
            'IP Address',
            'Browser',
            'URL',
            'Tanggal Kunjungan',
        ];
    }

    /**
     * Styling Excel Sheet
     */
    public function styles(Worksheet $sheet)
    {
        // Styling Header
        $sheet->getStyle('A1:D1')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF']
            ],
            'fill' => [
                'fillType' => 'solid',
                'startColor' => ['rgb' => '1E3A8A'] // Dark blue
            ],
            'alignment' => [
                'horizontal' => 'center',
                'vertical' => 'center'
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => 'thin',
                    'color' => ['rgb' => 'CCCCCC']
                ]
            ],
        ]);

        // Auto-size kolom
        foreach (range('A', 'D') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        return [];
    }
}
