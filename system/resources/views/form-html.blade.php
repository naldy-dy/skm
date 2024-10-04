
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>SKM Ketapang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="colorlib.com">
    <!-- LINEARICONS -->
    <link rel="stylesheet" href="{{url('public')}}/skm/fonts/linearicons/style.css">
    <link rel="icon" type="image/png" href="{{url('public')}}/skm/logo.jpeg" sizes="16x16">

    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet" href="{{url('public')}}/skm/fonts/material-design-iconic-font/css/material-design-iconic-font.css">

    <!-- DATE-PICKER -->
    <link rel="stylesheet" href="{{url('public')}}/skm/vendor/date-picker/css/datepicker.min.css">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="{{url('public')}}/skm/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>
<body>
    <style>

 

    .form-control option { /* Warna latar belakang untuk opsi */
        color: black;            /* Warna teks untuk opsi */
    }

     .soal-container {
        display: flex;
        align-items: flex-start;
    }

    .nomor-soal {
        flex: 0 0 10px; /* Lebar tetap untuk nomor */
        margin-right: 10px; /* Jarak antara nomor dan teks */
    }

    .pilihan-container input[type="radio"] {
        margin-right: 10px; /* Jarak antara radio button */
    }

    .pilihan-container label {
        margin-right: 10px; /* Jarak antara label dengan radio button */
    }

    .teks-soal{
        font-weight: bold !important; 
    }

    .teks-soal p{
        font-weight: bold !important; 
    }

</style>
<div class="wrapper">
    <div class="inner" style="overflow-y: scroll; height: 95%">
        <div class="image-holder fixed-top">
            <img src="http://kantorkite.ketapangkab.go.id/public/{{$config->config_foto}}"  class="sticky-top" alt="">
            <!-- <h3>SKM KABUPATEN KEATAPANG</h3> -->
        </div>
        

        <form action="{{url('save')}}/{{$config->opd_id}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="jawaban_group" value="{{$group}}">
            <div id="wizard">

                <!-- SECTION 1 -->

                <h4 class="mb-5 mt-5">BIODATA</h4>
                <section>


                    <div style="margin-bottom: 50px !important">
                        <div class="soal-container">
                            <p class="nomor-soal">1.</p>
                            <p class="teks-soal"><strong>Periode</strong></p>
                        </div>
                        <input type="hidden" name="jawaban_soal_id[]" value="1">
                        <div class="pilihan-container mt-3">
                            <div>
                                <input type="radio" required id="triwulan1" name="jawaban_1" value="Triwulan I Januari - Maret|0"> Triwulan I Januari - Maret
                            </div>
                            <div>
                                <input type="radio" required="" id="triwulan2" name="jawaban_1" value="Triwulan II April - Juni|0"> Triwulan II April - Juni
                            </div>
                            <div>
                                <input type="radio" required="" id="triwulan3" name="jawaban_1" value="Triwulan III Juli - September|0"> Triwulan III Juli - September
                            </div>
                            <div>
                                <input type="radio" required="" id="triwulan4" name="jawaban_1" value="Triwulan IV Oktober - Desember|0"> Triwulan IV Oktober - Desember
                            </div>
                            

                        </div>
                    </div>

                    <div style="margin-bottom: 50px !important">
                        <div class="soal-container">
                            <p class="nomor-soal">2.</p>
                            <p class="teks-soal"><strong>Jenis Layanan Yang Diterima</strong></p>
                        </div>
                        <input type="hidden" name="jawaban_soal_id[]" value="2">
                        <div class="form-row mb-21">
                            <div class="form-holder w-100">
                            <select class="form-control select2" required name="jawaban_2">
                                @foreach(App\Models\SkmLayanan::where('layanan_opd',$config->opd_id)->get() as $l)
                                <option value="{{$l->nama_layanan}}">{{ucwords($l->nama_layanan)}}</option>
                                @endforeach
                            </select>
                         </div>
                     </div>
                 </div>

                 <div style="margin-bottom: 50px !important">
                    <div class="soal-container">
                        <p class="nomor-soal">3.</p>
                        <p class="teks-soal"><strong>Umur</strong></p>
                    </div>
                    <input type="hidden" name="jawaban_soal_id[]" value="3">
                    <div class="pilihan-container mt-3">
                        <div>
                            <input type="radio" required="" name="jawaban_3" value="&lt;18 Tahun|0"> &lt;18 Tahun
                        </div>
                        <div>
                            <input type="radio" required="" name="jawaban_3" value="19-25|0"> 19-25
                        </div>
                        <div>
                            <input type="radio" required="" name="jawaban_3" value="26-35|0"> 26-35
                        </div>
                        <div>
                            <input type="radio" required="" name="jawaban_3" value="36-45|0"> 36-45
                        </div>
                        <div>
                            <input type="radio" required="" name="jawaban_3" value="46-55|0"> 46-55
                        </div>
                        <div>
                            <input type="radio" required="" name="jawaban_3" value="&gt;56|0"> &gt;56
                        </div>


                    </div>
                </div>

                <div style="margin-bottom: 50px !important">
                    <div class="soal-container">
                        <p class="nomor-soal">4.</p>
                        <p class="teks-soal"><strong>Jenis Kelamin</strong></p>
                    </div>
                    <input type="hidden" name="jawaban_soal_id[]" value="4">
                    <div class="pilihan-container mt-3">
                        <div>
                            <input type="radio" required="" name="jawaban_4" value="Laki-laki|0"> Laki-laki
                        </div>
                        <div>
                            <input type="radio" required="" name="jawaban_4" value="Perempuan|0"> Perempuan
                        </div>


                    </div>
                </div>

                <div style="margin-bottom: 50px !important">
                    <div class="soal-container">
                        <p class="nomor-soal">5.</p>
                        <p class="teks-soal"><strong>Pendidikan</strong></p>
                    </div>
                    <input type="hidden" name="jawaban_soal_id[]" value="5">
                    <div class="pilihan-container mt-3">
                        <div>
                            <input type="radio" required="" name="jawaban_5" value="Tidak Sekolah|0"> Tidak Sekolah
                        </div>
                        <div>
                            <input type="radio" required="" name="jawaban_5" value="SD/MI|0"> SD/MI
                        </div>
                        <div>
                            <input type="radio" required="" name="jawaban_5" value="SMP/MTs/Sederajat|0"> SMP/MTs/Sederajat
                        </div>
                        <div>
                            <input type="radio" required="" name="jawaban_5" value="SMA/SMK/MA/Sederajat|0"> SMA/SMK/MA/Sederajat
                        </div>
                        <div>
                            <input type="radio" required="" name="jawaban_5" value="D-1/D-3|0"> D-1/D-3
                        </div>
                        <div>
                            <input type="radio" required="" name="jawaban_5" value="D-4/S-1|0"> D-4/S-1
                        </div>
                        <div>
                            <input type="radio" required="" name="jawaban_5" value="S-2/S-3|0"> S-2/S-3
                        </div>


                    </div>
                </div>

                <div style="margin-bottom: 50px !important">
                    <div class="soal-container">
                        <p class="nomor-soal">6.</p>
                        <p class="teks-soal"><strong>Pekerjaan Utama</strong></p>
                    </div>
                    <input type="hidden" name="jawaban_soal_id[]" value="6">
                    <div class="pilihan-container mt-3">
                        <div>
                            <input type="radio" required="" name="jawaban_6" value="TNI/POLRI|0"> TNI/POLRI
                        </div>
                        <div>
                            <input type="radio" required="" name="jawaban_6" value="Pegawai Swasta|0"> Pegawai Swasta
                        </div>
                        <div>
                            <input type="radio" required="" name="jawaban_6" value="Wiraswasta/Usahawan|0"> Wiraswasta/Usahawan
                        </div>
                        <div>
                            <input type="radio" required="" name="jawaban_6" value="Pelajar/Mahasiswa|0"> Pelajar/Mahasiswa
                        </div>
                        <div>
                            <input type="radio" required="" name="jawaban_6" value="PNS|0"> PNS
                        </div>
                        <div>
                            <input type="radio" required="" name="jawaban_6" value="Lainnya|0"> Lainnya
                        </div>


                    </div>
                </div>

                <div style="margin-bottom: 50px !important">
                    <div class="soal-container">
                        <p class="nomor-soal">7.</p>
                        <p class="teks-soal"><strong>Nama Lengkap</strong></p>
                    </div>
                    <input type="hidden" name="jawaban_soal_id[]" value="7">
                    <div class="form-row mb-21">
                        <div class="form-holder w-100">
                         <textarea name="jawaban_7" required class="form-control" style="height: 35px; margin-left: 20px; max-width: 90%" placeholder="Masukan Jawaban :"></textarea>
                     </div>
                 </div>
             </div>
             <button class="forward">Lanjut <i class="zmdi zmdi-long-arrow-right"></i></button>
         </section>


     </select>
     <h4 class="mb-5 mt-5">PELAYANAN</h4>
     <section>


        <div style="margin-bottom: 50px !important">
            <div class="soal-container">
                <p class="nomor-soal">1.</p>
                <p class="teks-soal"><strong>Bagaimana Pendapat Anda Tentang Kesesuaian Persyaratan Pelayanan Dengan Jenis Pelayanan ?</strong></p>
            </div>
            <input type="hidden" name="jawaban_soal_id[]" value="8">
            <div class="pilihan-container mt-3">
                <div>
                    <input type="radio" required="" name="jawaban_8" value="Tidak Sesuai|1"> Tidak Sesuai
                </div>
                <div>
                    <input type="radio" required="" name="jawaban_8" value="Kurang Sesuai|2"> Kurang Sesuai
                </div>
                <div>
                    <input type="radio" required="" name="jawaban_8" value="Sesuai|3"> Sesuai
                </div>
                <div>
                    <input type="radio" required="" name="jawaban_8" value="Sangat Sesuai|4"> Sangat Sesuai
                </div>


            </div>
        </div>

        <div style="margin-bottom: 50px !important">
            <div class="soal-container">
                <p class="nomor-soal">2.</p>
                <p class="teks-soal"><strong>Bagaimana Pemahaman Anda Tentang Kemudahan Prosedur Pelayanan Di Unit Pelayanan Ini ?</strong></p>
            </div>
            <input type="hidden" name="jawaban_soal_id[]" value="9">
            <div class="pilihan-container mt-3">
                <div>
                    <input type="radio" required="" name="jawaban_9" value="Tidak Mudah|1"> Tidak Mudah
                </div>
                <div>
                    <input type="radio" required="" name="jawaban_9" value="Kurang Mudah|2"> Kurang Mudah
                </div>
                <div>
                    <input type="radio" required="" name="jawaban_9" value="Mudah|3"> Mudah
                </div>
                <div>
                    <input type="radio" required="" name="jawaban_9" value="Sangat Mudah|4"> Sangat Mudah
                </div>


            </div>
        </div>

        <div style="margin-bottom: 50px !important">
            <div class="soal-container">
                <p class="nomor-soal">3.</p>
                <p class="teks-soal"><strong>Bagaimana Pendapat Anda Tentang Kecepatan Waktu Dalam Memberikan Pelayanan ?</strong></p>
            </div>
            <input type="hidden" name="jawaban_soal_id[]" value="10">
            <div class="pilihan-container mt-3">
                <div>
                    <input type="radio" required="" name="jawaban_10" value="Tidak Cepat|1"> Tidak Cepat
                </div>
                <div>
                    <input type="radio" required="" name="jawaban_10" value="Kurang Cepat|2"> Kurang Cepat
                </div>
                <div>
                    <input type="radio" required="" name="jawaban_10" value="Cepat|3"> Cepat
                </div>
                <div>
                    <input type="radio" required="" name="jawaban_10" value="Sangat Cepat|4"> Sangat Cepat
                </div>


            </div>
        </div>

        <div style="margin-bottom: 50px !important">
            <div class="soal-container">
                <p class="nomor-soal">4.</p>
                <p class="teks-soal"><strong>Bagaimana Pendapat Anda Tentang Kewajaran Biaya / Tarif Dalam Pelayanan Atau Kesesuaian Antara Biaya Yang Ditampilkan Dalam Standar Pelayanan Dengan Yang Dimintakan?</strong></p>
            </div>
            <input type="hidden" name="jawaban_soal_id[]" value="11">
            <div class="pilihan-container mt-3">
                <div>
                    <input type="radio" required="" name="jawaban_11" value="Sangat Mahal / Tidak Sesuai|1"> Sangat Mahal / Tidak Sesuai
                </div>
                <div>
                    <input type="radio" required="" name="jawaban_11" value="Cukup Mahal / Kurang Sesuai|2"> Cukup Mahal / Kurang Sesuai
                </div>
                <div>
                    <input type="radio" required="" name="jawaban_11" value="Murah / Sesuai|3"> Murah / Sesuai
                </div>
                <div>
                    <input type="radio" required="" name="jawaban_11" value="Gratis / Tanpa Biaya / Sangat Sesuai Dan Tidak Meminta Tips|4"> Gratis / Tanpa Biaya / Sangat Sesuai Dan Tidak Meminta Tips
                </div>


            </div>
        </div>

        <div style="margin-bottom: 50px !important">
            <div class="soal-container">
                <p class="nomor-soal">5.</p>
                <p class="teks-soal"><strong>Bagaimana Pendapat Anda Tentang Kesesuaian  Produk Pelayanan Antara Yang Tercantum Dalam Standar Pelayanan Dengan Yang Diberikan ?</strong></p>
            </div>
            <input type="hidden" name="jawaban_soal_id[]" value="12">
            <div class="pilihan-container mt-3">
                <div>
                    <input type="radio" required="" name="jawaban_12" value="Tidak Sesuai|1"> Tidak Sesuai
                </div>
                <div>
                    <input type="radio" required="" name="jawaban_12" value="Kurang Sesuai|2"> Kurang Sesuai
                </div>
                <div>
                    <input type="radio" required="" name="jawaban_12" value="Sesuai|3"> Sesuai
                </div>
                <div>
                    <input type="radio" required="" name="jawaban_12" value="Sangat Sesuai|4"> Sangat Sesuai
                </div>


            </div>
        </div>

        <div style="margin-bottom: 50px !important">
            <div class="soal-container">
                <p class="nomor-soal">6.</p>
                <p class="teks-soal"><strong>Bagaimana Pendapat Anda Tentang Kompetensi /  Kemampuan Petugas Dalam Memberikan Pelayanan?</strong></p>
            </div>
            <input type="hidden" name="jawaban_soal_id[]" value="13">
            <div class="pilihan-container mt-3">
                <div>
                    <input type="radio" required="" name="jawaban_13" value="Tidak Kompeten / Tidak Mampu|1"> Tidak Kompeten / Tidak Mampu
                </div>
                <div>
                    <input type="radio" required="" name="jawaban_13" value="Kurang Kompeten / Kurang Mampu|2"> Kurang Kompeten / Kurang Mampu
                </div>
                <div>
                    <input type="radio" required="" name="jawaban_13" value="Kompeten / Mampu|3"> Kompeten / Mampu
                </div>
                <div>
                    <input type="radio" required="" name="jawaban_13" value="Sangat Kompeten / Sangat Mampu|4"> Sangat Kompeten / Sangat Mampu
                </div>


            </div>
        </div>

        <div style="margin-bottom: 50px !important">
            <div class="soal-container">
                <p class="nomor-soal">7.</p>
                <p class="teks-soal"><strong>Bagamana Pendapat Anda Terhadap Perilaku Terkait Kesopanan Dan Keramahan Petugas Dalam  Memberikan Pelayanan ?</strong></p>
            </div>
            <input type="hidden" name="jawaban_soal_id[]" value="14">
            <div class="pilihan-container mt-3">
                <div>
                    <input type="radio" required="" name="jawaban_14" value="Tidak Sopan Dan Tidak Ramah|1"> Tidak Sopan Dan Tidak Ramah
                </div>
                <div>
                    <input type="radio" required="" name="jawaban_14" value="Kurang Sopan Dan Kurang Ramah|2"> Kurang Sopan Dan Kurang Ramah
                </div>
                <div>
                    <input type="radio" required="" name="jawaban_14" value="Sopan Dan Ramah|3"> Sopan Dan Ramah
                </div>
                <div>
                    <input type="radio" required="" name="jawaban_14" value="Sangat Sopan Dan Ramah|4"> Sangat Sopan Dan Ramah
                </div>


            </div>
        </div>

        <div style="margin-bottom: 50px !important">
            <div class="soal-container">
                <p class="nomor-soal">8.</p>
                <p class="teks-soal"><strong>Bagaimana Pendapat Anda Tentang Kualitas Sarana Dan Prasarana ?</strong></p>
            </div>
            <input type="hidden" name="jawaban_soal_id[]" value="15">
            <div class="pilihan-container mt-3">
                <div>
                    <input type="radio" required="" name="jawaban_15" value="Buruk|1"> Buruk
                </div>
                <div>
                    <input type="radio" required="" name="jawaban_15" value="Cukup|2"> Cukup
                </div>
                <div>
                    <input type="radio" required="" name="jawaban_15" value="Baik|3"> Baik
                </div>
                <div>
                    <input type="radio" required="" name="jawaban_15" value="Sangat Baik|4"> Sangat Baik
                </div>


            </div>
        </div>

        <div style="margin-bottom: 50px !important">
            <div class="soal-container">
                <p class="nomor-soal">9.</p>
                <p class="teks-soal"><strong>Bagaimana Pendapat Anda Tentang Penanganan  Pengaduan, Saran Dan Masukan Pengguna Layanan ?</strong></p>
            </div>
            <input type="hidden" name="jawaban_soal_id[]" value="16">
            <div class="pilihan-container mt-3">
                <div>
                    <input type="radio" required="" name="jawaban_16" value="Tidak Ada|1"> Tidak Ada
                </div>
                <div>
                    <input type="radio" required="" name="jawaban_16" value="Ada Tetapi Tidak Berfungsi|2"> Ada Tetapi Tidak Berfungsi
                </div>
                <div>
                    <input type="radio" required="" name="jawaban_16" value="Berfungsi Kurang Maksimal. Lambat Ditindaklanjuti|3"> Berfungsi Kurang Maksimal. Lambat Ditindaklanjuti
                </div>
                <div>
                    <input type="radio" required="" name="jawaban_16" value="Dikelola Dengan Baik, Cepat Ditindaklanjuti|4"> Dikelola Dengan Baik, Cepat Ditindaklanjuti
                </div>


            </div>
        </div>
        <button class="forward">Lanjut <i class="zmdi zmdi-long-arrow-right"></i></button>
    </section>


</select>
<h4 class="mb-5 mt-5">KRITIK &amp; SARAN</h4>
<section>


    <div style="margin-bottom: 50px !important">
        <div class="soal-container">
            <p class="nomor-soal">1.</p>
            <p class="teks-soal"><strong>Saran Dan Masukkan</strong></p>
        </div>
        <input type="hidden" name="jawaban_soal_id[]" value="17">
        <div class="form-row mb-21">
            <div class="form-holder w-100">
             <textarea name="jawaban_17" required="" class="form-control" style="height: 35px; margin-left: 20px; max-width: 90%" placeholder="Masukan Jawaban :"></textarea>
         </div>
     </div>
 </div>
 <button class="forward">Lanjut <i class="zmdi zmdi-long-arrow-right"></i></button>
</section>


</select>


</div>


</form>
</div>
</div>
<!-- 
<script type="text/javascript">
    document.addEventListener('contextmenu', event => event.preventDefault());

</script> -->

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const currentMonth = new Date().getMonth(); // 0 = January, 1 = February, ..., 11 = December
        let selectedTriwulan;

        if (currentMonth >= 0 && currentMonth <= 2) {
            selectedTriwulan = 'triwulan1'; // January - March
        } else if (currentMonth >= 3 && currentMonth <= 5) {
            selectedTriwulan = 'triwulan2'; // April - June
        } else if (currentMonth >= 6 && currentMonth <= 8) {
            selectedTriwulan = 'triwulan3'; // July - September
        } else if (currentMonth >= 9 && currentMonth <= 11) {
            selectedTriwulan = 'triwulan4'; // October - December
        }

        if (selectedTriwulan) {
            document.getElementById(selectedTriwulan).checked = true; // Select the appropriate radio button
        }
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
    $('.select2').select2();
});
</script>


<script src="{{url('public/skm')}}/js/jquery-3.3.1.min.js"></script>

<!-- JQUERY STEP -->
<script src="{{url('public/skm')}}/js/jquery.steps.js"></script>

<!-- DATE-PICKER -->
<script src="{{url('public/skm')}}/vendor/date-picker/js/datepicker.js"></script>
<script src="{{url('public/skm')}}/vendor/date-picker/js/datepicker.en.js"></script>


<script src="{{url('public/skm')}}/js/main.js"></script>
<!-- Template created and distributed by Colorlib -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Notifikasi -->
@foreach(['success', 'warning', 'error', 'info'] as $status)
@if (session($status))
<script>
  Swal.fire({
    icon: "{{ $status }}",
    title: "{{ Str::upper($status) }}",
    text: "{{ session($status) }}!",
    showConfirmButton: false,
    timer: 15000
})
</script>
@endif
@endforeach
</body>
</html>
