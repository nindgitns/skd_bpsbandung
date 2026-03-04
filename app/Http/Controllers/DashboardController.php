<?php

namespace App\Http\Controllers;

use App\Exports\ResponseExport;
use App\Models\Response;
use Maatwebsite\Excel\Facades\Excel;

class DashboardController extends Controller
{
    public function index()
    {
        $data = Response::all();
        $total = $data->count();

        /*
        |--------------------------------------------------------------------------
        | JENIS KELAMIN
        | 1=Laki-laki, 2=Perempuan
        |--------------------------------------------------------------------------
        */
        $jkMap = [
            1 => 'Laki-laki',
            2 => 'Perempuan',
        ];

        $jenisKelamin = collect($jkMap)->mapWithKeys(function ($label, $kode) use ($data) {
            return [$label => $data->where('jenis_kelamin', $kode)->count()];
        });

        /*
        |--------------------------------------------------------------------------
        | PENDIDIKAN
        | 1=SLTA,2=D1/D2/D3,3=D4/S1,4=S2,5=S3
        |--------------------------------------------------------------------------
        */
        $pendMap = [
            1 => 'SLTA',
            2 => 'D1/D2/D3',
            3 => 'D4/S1',
            4 => 'S2',
            5 => 'S3',
        ];

        $pendidikan = collect($pendMap)->mapWithKeys(function ($label, $kode) use ($data) {
            return [$label => $data->where('pendidikan', $kode)->count()];
        });

        /*
        |--------------------------------------------------------------------------
        | KELOMPOK UMUR
        | 1=<17,2=17-25,3=26-34,4=34-44,5=45-54,6=55-65,7=>65
        |--------------------------------------------------------------------------
        */
        $umurMap = [
            1 => '<17',
            2 => '17-25',
            3 => '26-34',
            4 => '34-44',
            5 => '45-54',
            6 => '55-65',
            7 => '>65',
        ];

        $umur = collect($umurMap)->mapWithKeys(function ($label, $kode) use ($data) {
            return [$label => $data->where('umur', $kode)->count()];
        });

        /*
        |--------------------------------------------------------------------------
        | PEKERJAAN
        | 1=Pelajar/Mahasiswa,2=Peneliti/Dosen,3=ASN/TNI/Polri,
        | 4=Pegawai BUMN/BUMD,5=Pegawai Swasta,6=Wiraswasta,7=Lainnya
        |--------------------------------------------------------------------------
        */
        $kerjaMap = [
            1 => 'Pelajar/Mahasiswa',
            2 => 'Peneliti/Dosen',
            3 => 'ASN/TNI/Polri',
            4 => 'Pegawai BUMN/BUMD',
            5 => 'Pegawai Swasta',
            6 => 'Wiraswasta',
            7 => 'Lainnya',
        ];

        $pekerjaan = collect($kerjaMap)->mapWithKeys(function ($label, $kode) use ($data) {
            return [$label => $data->where('pekerjaan', $kode)->count()];
        });

        /*
        |--------------------------------------------------------------------------
        | INSTANSI
        | 1=Lembaga Negara
        | 2=Kementerian & Lembaga Pemerintah
        | 3=TNI/Polri/BIN/Kejaksaan
        | 4=Pemerintah Daerah
        | 5=Lembaga Internasional
        | 6=Lembaga Penelitian & Pendidikan
        | 7=BUMN/BUMD
        | 8=Swasta
        | 9=Lainnya
        |--------------------------------------------------------------------------
        */
        $instansiMap = [
            1 => 'Lembaga Negara',
            2 => 'Kementerian & Lembaga Pemerintah',
            3 => 'TNI/Polri/BIN/Kejaksaan',
            4 => 'Pemerintah Daerah',
            5 => 'Lembaga Internasional',
            6 => 'Lembaga Penelitian & Pendidikan',
            7 => 'BUMN/BUMD',
            8 => 'Swasta',
            9 => 'Lainnya',
        ];

        $instansi = collect($instansiMap)->mapWithKeys(function ($label, $kode) use ($data) {
            return [$label => $data->where('instansi', $kode)->count()];
        });

        return view('dashboard', compact(
            'total',
            'jenisKelamin',
            'pendidikan',
            'umur',
            'pekerjaan',
            'instansi'
        ));
    }
    
    public function exportExcel()
    {
        return Excel::download(new ResponseExport, 'data-kuesioner.xlsx');
    }
}