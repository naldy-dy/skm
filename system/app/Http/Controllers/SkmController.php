<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SkmJawaban;
use App\Models\SkmKategori;
use App\Models\SkmConfig;
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

    function skm(SkmConfig $config){
      $data['config'] = $config;
      $kategori =  $data['list_kategori'] = SkmKategori::where('kategori_opd',$config->opd_id)
      ->get();
  
      foreach($kategori as $k){
       $data['list_soal'] = Skm::where('skm_kategori_id', $k->kategori_id)->get();
      }
      return view('form',$data);
    }

    function save(Request $request,SkmConfig $config){
      $config = $config;
        for ($i = 0; $i < count($request->jawaban); $i++) {
          $pilihan = new SkmJawaban;
          $pilihan->jawaban = $request->jawaban[$i];
          $pilihan->jawaban_opd = $config->opd_id;
          $pilihan->jawaban_tanggal = date('d');
          $pilihan->jawaban_bulan = date('m');
          $pilihan->jawaban_tahun = date('Y');
          $pilihan->jawaban_soal_id = $request->jawaban_soal_id[$i];
          $pilihan->save();
      }

      return back();
    }


}
