<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BendaharaController extends Controller
{
    public function index()
    {
        return view('anggota.bendahara.index', [
            'title' => 'Kas Dashboard'
        ]);
    }
}
