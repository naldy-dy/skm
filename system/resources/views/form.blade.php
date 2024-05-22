<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>SKM Ketapang</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="colorlib.com">
	<!-- LINEARICONS -->
	<link rel="stylesheet" href="{{url('public/skm')}}/fonts/linearicons/style.css">

	<!-- MATERIAL DESIGN ICONIC FONT -->
	<link rel="stylesheet" href="{{url('public/skm')}}/fonts/material-design-iconic-font/css/material-design-iconic-font.css">

	<!-- DATE-PICKER -->
	<link rel="stylesheet" href="{{url('public/skm')}}/vendor/date-picker/css/datepicker.min.css">

	<!-- STYLE CSS -->
	<link rel="stylesheet" href="{{url('public/skm')}}/css/style.css">
</head>
<body>
	<div class="wrapper">
		<div class="inner" style="overflow-y: scroll; height: 95%">
			<div class="image-holder fixed-top">
				<img src="http://kantorkite.ketapangkab.go.id/public/{{$config->config_foto}}"  class="sticky-top" alt="">
				<!-- <h3>SKM KABUPATEN KEATAPANG</h3> -->
			</div>
			<form action="{{url('save')}}/{{$config->opd_id}}" method="post">
				@csrf
			<div id="wizard">
				<!-- SECTION 1 -->
				@foreach($list_kategori as $kategori)
				<h4 class="mb-5 mt-5">{{ucwords($kategori->kategori_nama)}}</h4>
				<section>
					
					@foreach(App\Models\Skm::where('skm_kategori_id',$kategori->skm_kategori_id)->get() as $soal)
					<p>{{$loop->iteration}}. {!!nl2br(ucwords($soal->skm_soal))!!}</p> <br>

					<div style="margin-bottom: 50px !important">
					@if($soal->skm_type == 1)
						@foreach(App\Models\SkmOption::where('skm_id',$soal->skm_id )->get() as $option )
						<input type="hidden" name="jawaban_soal_id[]"  value="{{$soal->skm_id}}">
						<input type="radio" required="" name="jawaban_{{$soal->skm_id}}" value="{{$option->pilihan}}"> {{ucwords($option->pilihan)}} <br>
						@endforeach
					@else

					<input type="hidden" name="jawaban_soal_id[]"  value="{{$soal->skm_id}}">
					<div class="form-row mb-21">
						<div class="form-holder w-100">
							<textarea name="jawaban[]" required="" id="" class="form-control" style="height: 79px;" placeholder="Masukan Jawaban :"></textarea>
						</div>
					</div>
					@endif
					</div>

					@endforeach
					<button class="forward">Lanjut
						<i class="zmdi zmdi-long-arrow-right"></i>
					</button>
				</section>
				@endforeach
			</div>
			</form>
		</div>
	</div>

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
