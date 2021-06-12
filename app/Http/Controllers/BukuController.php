<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\BukuExport;
use Maatwebsite\Excel\Facades\Excel;

class BukuController extends Controller
{
    public function index()
    {
        $buku = DB::table('rak_buku')
                ->join('buku','rak_buku.id','=','buku.id')  
                ->join('jenis_buku','rak_buku.id','=','jenis_buku.id')  
                ->get();
        return view('buku0113',['buku' => $buku]);

    }
    public function export() 
    {
        return Excel::download(new BukuExport, 'Data_1461900113.xlsx');
    }
}
