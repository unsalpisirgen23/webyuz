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
        <!-- breadcrumb -->
    {!! import("admin.components.breadcrumb",['content'=>'Kullanıcı Ekle']) !!}
    <!-- End breadcrumb -->
        <div class="section-body">
            <form action="{{route("admin.users.store")}}" method="post" enctype="multipart/form-data" >
                @csrf
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Kullanıcı Ekle</h4>
                                <div class="card-header-action">
                                    <button class="btn btn-primary">Kaydet</button>
                                    <a href="{{route("admin.users.index")}}" class="btn btn-warning">Vazgeç</a>
                                </div>
                            </div>
                            <div class="card-body">

                                     @if(session("error"))
                                            <div class="alert alert-danger m-4 mt-2">
                                                {{ session("error") }}
                                            </div>
                                    @endif

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
                                            <input type="text"  class="form-control" name="name" >
                                            <input type="text"  class="form-control" name="lastname">
                                        </div>
                                    </div>
                                </div>





                                <div class="form-group">
                                    <div class="section-title mt-0">Kullanıcı Adı</div>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">@</div>
                                        </div>
                                        <input type="text" class="form-control" name="username" id="inlineFormInputGroup" placeholder="Kullanıcı Adı">
                                    </div>
                                </div>



                                <div class="form-group">
                                    <div class="section-title mt-0">E-Posta Adresi</div>
                                    <input type="email" class="form-control" name="email" placeholder="E-Posta Adresi">
                                </div>

                                <div class="form-group">
                                    <div class="section-title mt-0">Şifre</div>
                                    <input type="password" class="form-control" name="password">
                                </div>

                                <div class="form-group">
                                    <div class="section-title mt-0">Durum</div>
                                    <select class="form-control" name="status">
                                        <option class="btn-success" value="1" >Aktif</option>
                                        <option class="btn-warning" value="0" >Pasif</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
@section("script")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.js" integrity="sha512-mh+AjlD3nxImTUGisMpHXW03gE6F4WdQyvuFRkjecwuWLwD2yCijw4tKA3NsEFpA1C3neiKhGXPSIGSfCYPMlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('vendor/file-manager/js/file-manager-js.js') }}"></script>
    <script>
        document.getElementById('image_img').src ="/upload/users/avatar/no-avatar.png";
        document.getElementById('image_label').value = "/upload/users/avatar/no-avatar.png";
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
            ///upload/users/avatar/no-avatar.png
            document.getElementById('image_label').value ="/upload/"+ $url;
            document.getElementById('image_img').src = "/upload/"+ $url;
        }
    </script>
@endsection
