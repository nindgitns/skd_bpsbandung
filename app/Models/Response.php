<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
     protected $fillable = [
        'pencacah','nama','email','no_hp','jenis_kelamin','pendidikan','umur',
        'disabilitas_status','jenis_disabilitas','pekerjaan','pekerjaan_lainnya',
        'instansi','instansi_lainnya','pemanfaatan','pemanfaatan_lainnya',
        'layanan','sarana','sarana_lainnya',
        'q1','q2','q3','q4','q5','q6','q7','q8','q9','q10','q11','q12','q13',
        'data','perolehan','sumber','judul','tahun','perencanaan','q17',
        'kritik_saran'
    ];

    protected $casts = [
        'layanan' => 'array',
        'sarana' => 'array',
    ];
}
