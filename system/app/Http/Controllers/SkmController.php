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
       $data['group'] = mt_rand(00000001,99999999);
      $kategori =  $data['list_kategori'] = SkmKategori::where('kategori_opd',$config->opd_id)
      ->get();
  
      foreach($kategori as $k){
       $data['list_soal'] = Skm::where('skm_kategori_id', $k->kategori_id)->get();
      }
      return view('form',$data);
    }

    public function save(Request $request, $opdId) {
      // Validasi request
      $validatedData = $request->validate([
          'jawaban_soal_id.*' => 'required',
      ]);
  
      // Memproses jawaban
      foreach ($request->input('jawaban_soal_id') as $key => $soalId) {
          $jawaban = '';
  
          // Memeriksa jenis pertanyaan
          if ($request->has('jawaban_' . $soalId)) {
              $jawaban = $request->input('jawaban_' . $soalId);
          } elseif (isset($request->jawaban[$key])) {
              $jawaban = $request->jawaban[$key];
          }
         
  
          // Menyimpan jawaban ke database
          $pilihan = new SkmJawaban;
          $pilihan->jawaban = $jawaban;
          $pilihan->jawaban_group = request('jawaban_group');
          $pilihan->jawaban_soal_id = $soalId;
          $pilihan->jawaban_opd = $opdId; // Simpan id OPD
          $pilihan->jawaban_tanggal = date('d');
          $pilihan->jawaban_bulan = date('m');
          $pilihan->jawaban_tahun = date('Y');
          $pilihan->save();
      }
  
      return back()->with('success', 'Jawaban berhasil dikirim');
  }


}
