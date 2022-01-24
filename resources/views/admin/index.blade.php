@extends("admin.layouts.app")
@section("style")
 <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
@section("content")

  <div class="section-header">
   <h1>Anasayfa</h1>
  </div>
  <div class="row">

   <div class="col-lg-4 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
     <div class="card-icon bg-primary">
      <i class="far fa-user"></i>
     </div>
     <div class="card-wrap">
      <div class="card-header">
       <h4>Toplam Kullanıcı</h4>
      </div>
      <div class="card-body">
      {{ $users?->count() }}
      </div>
     </div>
    </div>
   </div>

   <div class="col-lg-4 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
     <div class="card-icon bg-danger">
      <i class="far fa-newspaper"></i>
     </div>
     <div class="card-wrap">
      <div class="card-header">
       <h4>İçerik</h4>
      </div>
      <div class="card-body">
       {{ $posts?->count() }}
      </div>
     </div>
    </div>
   </div>

   <div class="col-lg-4 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
     <div class="card-icon bg-warning">
      <i class="far fa-file"></i>
     </div>
     <div class="card-wrap">
      <div class="card-header">
       <h4>Sayfa</h4>
      </div>
      <div class="card-body">
       {{ $pages?->count() }}
      </div>
     </div>
    </div>
   </div>


  </div>


@endsection
@section("script")
 <!-- Bu alana ajax kodu eklenecek -->
 <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
@endsection
