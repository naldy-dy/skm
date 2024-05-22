<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SkmJawaban;
use App\Models\SkmKategori;
use App\Models\Skm;
use Auth;

class SkmController extends Controller
{
    function index(){
    	 $kategori =  $data['list_kategori'] = SkmKategori::where('kategori_opd',561)
    	 ->get();
   
       foreach($kategori as $k){
        $data['list_soal'] = Skm::where('skm_kategori_id', $k->kategori_id)->get();
       }
    	return view('form',$data);
    }

    function save(Request $request){
        for ($i = 0; $i < count($request->jawaban); $i++) {
          $pilihan = new SkmJawaban;
          $pilihan->jawaban = $request->jawaban[$i];
          $pilihan->jawaban_soal_id = $request->jawaban_soal_id[$i];
          $pilihan->save();
      }

      return back();
    }


}
