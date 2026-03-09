<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Response;

class ResponsesController extends Controller
{
    // ==========================
    // Blok 1
    // ==========================
    public function showBlok1()
    {
        return view('blok1');
    }

    public function submitBlok1(Request $request)
    {
        $request->validate([
            'pencacah' => 'nullable|string|max:255',
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_hp' => 'required|string|max:20',
            'jenis_kelamin' => 'required|in:1,2',
            'pendidikan' => 'required|in:1,2,3,4,5',
            'umur' => 'required|in:1,2,3,4,5,6,7',
            'disabilitas_status' => 'required|in:1,2',
            'jenis_disabilitas' => 'nullable|in:1,2,3,4',
            'pekerjaan' => 'required|in:1,2,3,4,5,6,7',
            'pekerjaan_lainnya' => 'nullable|string|max:255',
            'instansi' => 'required|in:1,2,3,4,5,6,7,8,9',
            'instansi_lainnya' => 'nullable|string|max:255',
            'pemanfaatan' => 'required|in:1,2,3,4,5',
            'pemanfaatan_lainnya' => 'nullable|string|max:255',
            'layanan' => 'nullable|array',
            'layanan.*' => 'in:1,2,4,8',
            'sarana' => 'nullable|array',
            'sarana.*' => 'in:1,2,4,8,16,32',
            'sarana_lainnya' => 'nullable|string|max:255',
        ]);

        // Simpan ke session
        session(['blok1' => $request->all()]);

        return redirect()->route('blok2');
    }

    // ==========================
    // Blok 2
    // ==========================
    public function showBlok2()
    {
        return view('blok2');
    }

    public function submitBlok2(Request $request)
    {
        $request->validate([
            'q1'=>'required|integer|min:1|max:10',
            'q2'=>'required|integer|min:1|max:10',
            'q3'=>'required|integer|min:1|max:10',
            'q4'=>'required|integer|min:1|max:10',
            'q5'=>'required|integer|min:1|max:10',
            'q6'=>'required|integer|min:1|max:10',
            'q7'=>'required|integer|min:1|max:10',
            'q8'=>'required|integer|min:1|max:10',
            'q9'=>'required|integer|min:1|max:10',
            'q10'=>'required|integer|min:1|max:10',
            'q11'=>'required|integer|min:1|max:10',
            'q12'=>'required|integer|min:1|max:10',
            'q13'=>'required|integer|min:1|max:10',
            'q14'=>'required|integer|min:1|max:10',
            'q15'=>'required|integer|min:1|max:10',
            'q16'=>'required|integer|min:1|max:10',
        ]);

        session(['blok2' => $request->all()]);

        return redirect()->route('blok3');
    }

    // ==========================
    // Blok 3
    // ==========================
    public function showBlok3()
    {
        return view('blok3');
    }

    public function submitBlok3(Request $request)
    {
        // Validasi awal umum
        $request->validate([
            'data' => 'required|string|max:255',
            'perolehan' => 'required|in:1,2,3,4',
            'sumber' => 'nullable|in:1,2,3,4,5',
            'judul' => 'nullable|string|max:255',
            'tahun' => 'nullable|integer|min:1900|max:2099',
            'perencanaan' => 'nullable|in:1,2',
            'q17' => 'nullable|integer|min:1|max:10',
        ]);

        // Jika perolehan = 1 atau 2, wajib isi field tambahan
        if (in_array($request->perolehan, ['1','2'])) {

            // Atur rules tambahan
            $rules = [
                'sumber' => 'required|in:1,2,3,4,5',
                'judul' => 'required|string|max:255',
                'tahun' => 'required|integer|min:1900|max:2099',
                'q17' => 'required|integer|min:1|max:10',
            ];

            // Perencanaan wajib hanya jika instansi 1-4
            if (in_array(session('blok1.instansi'), ['1','2','3','4'])) {
                $rules['perencanaan'] = 'required|in:1,2';
            }

            // Jalankan validasi tambahan
            $request->validate($rules);
        }

        // Simpan data Blok 3 ke session
        session(['blok3' => $request->all()]);

        // Redirect ke Blok 4
        return redirect()->route('blok4');
    }

    // ==========================
    // Blok 4
    // ==========================
    public function showBlok4()
    {
        return view('blok4');
    }

    public function submitBlok4(Request $request)
    {
        $request->validate([
            'kritik_saran' => 'required|string|max:2000',
        ]);

        session(['blok4' => $request->all()]);

        // Gabungkan semua blok
        $allData = array_merge(
            session('blok1', []),
            session('blok2', []),
            session('blok3', []),
            session('blok4', [])
        );

        // Konversi array layanan & sarana ke JSON (jika ada)
        if (isset($allData['layanan']) && is_array($allData['layanan'])) {
            $allData['layanan'] = json_encode($allData['layanan']);
        }

        if (isset($allData['sarana']) && is_array($allData['sarana'])) {
            $allData['sarana'] = json_encode($allData['sarana']);
        }

        // Simpan ke database
        Response::create($allData);

        // Hapus session survey
        session()->forget(['blok1','blok2','blok3','blok4']);

        // Redirect dengan flash message sukses
        return redirect()->route('welcome')->with('success', 'Data berhasil dikirim!');
    }

}