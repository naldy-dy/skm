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
       $data['list_soal'] = Skm::where('skm_kategori_id', $k->kategori_id)->orderBy('created_at', 'asc')->get();
      }
      return view('form-html',$data);
    }

    public function save(Request $request, $opdId) {
        // Validasi request
        $validatedData = $request->validate([
            'jawaban_soal_id.*' => 'required',
        ]);
        
        // Memproses jawaban
        foreach ($request->input('jawaban_soal_id') as $key => $soalId) {
            $jawaban = '';
            $nilai = 0;
    
            // Memeriksa jenis pertanyaan
            if ($request->has('jawaban_' . $soalId)) {
                $selectedOption = explode('|', $request->input('jawaban_' . $soalId));
                
                if (count($selectedOption) == 2) {  // Ensure we have both jawaban and nilai
                    $jawaban = $selectedOption[0];  // The answer
                    $nilai = $selectedOption[1];    // The associated nilai
                } else {
                    // Handle case where the format is not correct
                    $jawaban = $request->input('jawaban_' . $soalId);
                    $nilai = 0;
                }
            } elseif (isset($request->jawaban[$key])) {
                $jawaban = $request->jawaban[$key];
            }
    
            // Menyimpan jawaban ke database
            $pilihan = new SkmJawaban;
            $pilihan->jawaban = $jawaban;
            $pilihan->jawaban_nilai = $nilai;
            $pilihan->jawaban_nama = request('nama');
            $pilihan->jawaban_group = $request->input('jawaban_group');
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
