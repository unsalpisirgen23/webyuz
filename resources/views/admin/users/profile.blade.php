@extends("admin.layouts.app")
@section("style")
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
    <style>
        .img-container{
            position: relative;
            width: 100px;
            height: 85px;
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
    <section class="section">
        {!! import("admin.components.breadcrumb",['content'=>'Profil Düzenle']) !!}
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                    <div class="card">

                        @if(session("error"))
                            <div class="alert alert-danger m-4 mt-2">
                                {{ session("error") }}
                            </div>
                        @endif

                        <form action="{{route("admin.users.update",$user->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                <h4>{{$user->name}} {{$user->lastname}}</h4>
                                <div class="card-header-action">
                                   <button class="btn btn-primary">Güncelle</button>
                                    <x-link route="admin.users.index"  params="{{$user->id}}" class="btn btn-info" title="İşlemden Vazgeçer">Vazgeç</x-link>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="alert alert-info">
                                    <b>Not!</b> Yaptığınız İşlemler Geri Alınamaz
                                </div>


                                <div class="form-group">
                                    <label class="section-title mt-0">Profil Resmi</label>
                                    <div class="input-group img-container">
                                        <input type="hidden" id="image_label" class="form-control" name="profile_image" aria-label="Image" aria-describedby="button-image">
                                        <img src="" class="image_img" style="width: 75px;height: 75px;" id="image_img" >
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary button-image" type="button" id="button-image">Select</button>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="section-title mt-0">Adı Soyadı</div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">İsim | Soyisim</span>
                                            </div>
                                            <input type="text"  class="form-control" name="name" value="{{$user->name}}">
                                            <input type="text"  class="form-control" name="lastname" value="{{$user->lastname}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="section-title mt-0">Kullanıcı Adı</div>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">@</div>
                                        </div>
                                        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Kullanıcı Adı" name="username" value="{{$user->username}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="section-title mt-0">Rolü</div>
                                    <select class="form-control" name="rank">
                                        <option value="0" {{$user->status == 0 ? "selected" : null }} > Yetki Seçiniz </option>
                                        <option value="1" {{$user->status == 1 ? "selected" : null }} >Admin</option>
                                        <option value="2" {{$user->status == 2 ? "selected" : null }} >Üye</option>
                                        <option value="3" {{$user->status == 3 ? "selected" : null }} >Müşteri</option>
                                        <option value="4" {{$user->status == 4 ? "selected" : null }} >Satıcı</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <div class="section-title mt-0">Durum</div>
                                    <select class="form-control" name="status">
                                        <option class="btn-success" value="1" {{$user->status == 1 ? "selected" : null }}  >Aktif</option>
                                        <option class="btn-warning" value="0"  {{$user->status == 0 ? "selected" : null }} >Pasif</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <div class="section-title mt-0">E-Posta Adresi</div>
                                    <input type="email" class="form-control" name="email" value="{{$user->email}}">
                                </div>


                                <div class="form-group">
                                    <div class="section-title mt-0">Şifre</div>
                                    <input type="password" class="form-control" name="password">
                                </div>



                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
@endsection
@section("script")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.js" integrity="sha512-mh+AjlD3nxImTUGisMpHXW03gE6F4WdQyvuFRkjecwuWLwD2yCijw4tKA3NsEFpA1C3neiKhGXPSIGSfCYPMlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('vendor/file-manager/js/file-manager-js.js') }}"></script>
    <script>

    document.getElementById('image_img').src ="{{$user->profile_image}}";
    document.getElementById('image_label').value = "{{$user->profile_image}}";

        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById('button-image').addEventListener('click', (event) => {
                event.preventDefault();
                var wi = window.outerWidth / 2;
                var hi = window.outerHeight - 450;
                window.open('/file-manager/fm-button/?leftDisk=public&leftPath=users/avatar', 'socialPopupWindow', `width=${wi},height=${hi},position=absolute,left=${wi/2},top=${hi/2}`);
            });
        });
        // set file link
        function fmSetLink($url) {
            $url = $url.split("upload/")[1];
            document.getElementById('image_label').value ="/upload/"+ $url;
            document.getElementById('image_img').src = "/upload/"+ $url;
        }
    </script>
@endsection
