<?php

namespace App\Exports;

use App\Buku;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;

class BukuExport implements FromView
{
    public function view(): View
    {
        $buku = DB::table('rak_buku')
                ->join('buku','rak_buku.id','=','buku.id')  
                ->join('jenis_buku','rak_buku.id','=','jenis_buku.id')  
                ->get();
    
                return view('export0113',['buku' => $buku]);
    }
}