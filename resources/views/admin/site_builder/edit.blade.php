@extends("admin.layouts.app")
@section("style")
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
    <style>
        .img-container{
            position: relative;
            width: 100px;
            height: 85px;
            margin-left: auto;
            margin-right: auto;
        }
        .img-container .image_img{
            position: absolute;
            margin: 0px;
            padding: 0px;
        }
        .img-container .button-image{
            position: absolute;
            width: 100%;
            height: 100%;
            opacity: 0;
        }
    </style>
@endsection
@section("content")
    <div id="app">
        <section class="section">
            {!! import("admin.components.breadcrumb",['content'=>'Site Bilgisi Güncelle']) !!}
            <div class="section-body">
                <form action="{{route("admin.site_builder.update",$site->id)}}" method="post">
                @csrf
                <!-- Main Content -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header" >
                                    <h4>Site Düzenle</h4>
                                </div>
                                <div class="card-body">



                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Domain</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control" name="domain" value="{{$site->domain != null ? $site->domain : null}}">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <div class="form-group col-6 ml-auto mr-auto mb-4">
                                            <div class="section-title mt-0">Yetkili Kullanıcı</div>

                                            <select id="userSelect" class="form-control" name="user_id">

                                                @foreach($users as $user)
                                                    <option value="{!! $user->id !!}" {{ $user->id == $site->user_id ? "selected" : null }}>{!! $user->name.' '.$user->lastname !!}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                               
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Database</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control" name="database_name" value="{{$site->database_name}}">
                                        </div>
                                    </div>


                                    <div class="form-group row mb-4">
                                        <div class="form-group col-6 ml-auto mr-auto mb-4">
                                            <div class="section-title mt-0">Durum</div>
                                            <select class="form-control" name="status">
                                                <option value="1" {{$site->status==1 ? "selected" : null }} >Aktif</option>
                                                <option value="0" {{$site->status==0 ? "selected" : null }} >Pasif</option>
                                            </select>
                                        </div>
                                    </div>





                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7">
                                            <button class="btn btn-primary btn-block">Güncelle</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </form>

            </div>
        </section>
    </div>



@endsection
@section("script")
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>






    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.js" integrity="sha512-mh+AjlD3nxImTUGisMpHXW03gE6F4WdQyvuFRkjecwuWLwD2yCijw4tKA3NsEFpA1C3neiKhGXPSIGSfCYPMlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('vendor/file-manager/js/file-manager-js.js') }}"></script>

@endsection
