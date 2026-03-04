<?php

namespace App\Exports;

use App\Models\Response;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ResponseExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Response::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Pencacah',
            'Nama',
            'Email',
            'No HP',
            'Jenis Kelamin',
            'Pendidikan',
            'Umur',
            'Status Disabilitas',
            'Jenis Disabilitas',
            'Pekerjaan',
            'Pekerjaan Lainnya',
            'Instansi',
            'Instansi Lainnya',
            'Pemanfaatan',
            'Pemanfaatan Lainnya',
            'Layanan',
            'Sarana',
            'Sarana Lainnya',
            'q1',
            'q2',
            'q3',
            'q4',
            'q5',
            'q6',
            'q7',
            'q8',
            'q9',
            'q10',
            'q11',
            'q12',
            'q13',
            'data',
            'perolehan',
            'sumber',
            'judul',
            'tahun',
            'perencanaan',
            'q17',
            'kritik dan saran',
            'Created At',
            'Updated At'
        ];
    }
}