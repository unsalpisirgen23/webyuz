@extends("admin.layouts.app")
@section("style")
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
    <style>
        .img-container {
            position: relative;
            width: 100px;
            height: 85px;
            margin-left: auto;
            margin-right: auto;
        }

        .img-container .image_img {
            position: absolute;
            margin: 0px;
            padding: 0px;
        }

        .img-container .button-image {
            position: absolute;
            width: 100%;
            height: 100%;
            opacity: 0;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
@endsection
@section("content")
    <div id="app">
        <section class="section">
            {!! import("admin.components.breadcrumb",['content'=>'Site Oluştur']) !!}
            <div class="section-body">
                <form action="{{route("admin.site_builder.store")}}" method="post">
                @csrf
                <!-- Main Content -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <div class="form-group">

                                        <div class="form-group row mb-4">
                                            <div class="form-group col-6 ml-auto mr-auto">
                                            <div class="section-title mt-0">Domain</div>

                                                <input type="text" class="form-control" name="domain"
                                                       placeholder="webyuz.net" autofocus>

                                            </div>
                                        </div>


                                        <div class="form-group row mb-4">
                                            <div class="form-group col-6 ml-auto mr-auto mb-4">
                                                <div class="section-title mt-0">Kullanıcı</div>

                                                <select id="userSelect" class="form-control" name="user_id">
                                                    <option value="">Kullanıcı Seçiniz</option>
                                                    @foreach($users as $user)
                                                        <option value="{!! $user->id !!}">{!! $user->name.' '.$user->lastname !!}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <div class="form-group col-6 ml-auto mr-auto mb-4">
                                                <div class="section-title mt-0">Tema</div>

                                                <select id="themeSelect" class="form-control" name="template_id">
                                                    <option value="">Tema Seçiniz</option>
                                                    @foreach($themes as $theme)
                                                        <option value="{!! $theme->id !!}">{!! $theme->name !!}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group row mb-4">
                                            <div class="form-group col-6 ml-auto mr-auto mb-4">
                                                <div class="section-title mt-0">Durum</div>
                                                <select class="form-control" name="status">
                                                    <option value="1">Aktif</option>
                                                    <option value="0">Pasif</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                            <div class="col-sm-12 col-md-7">
                                                <button class="btn btn-primary btn-block">Ekle</button>
                                            </div>
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function (){
            $("#themeSelect").select2({
                placeholder: "Tema Seçin",
                allowClear: true
            });

            $("#userSelect").select2({
                placeholder: "Kullanıcı Seçin",
                allowClear: true
            });
        });
    </script>
@endsection
