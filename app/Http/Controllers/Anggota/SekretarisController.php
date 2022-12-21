<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SekretarisController extends Controller
{
    public function index()
    {
        return view('anggota.sekretaris.index', [
            'title' => 'Manage Dashboard'
        ]);
    }
}
