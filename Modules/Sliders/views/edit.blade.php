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
            {!! import("admin.components.breadcrumb",['content'=>'Slider Güncelle']) !!}
            <div class="section-body">
                <form action="{{route("modules.sliders.update",$slider->id)}}" method="post">
                @csrf
                <!-- Main Content -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header" >
                                    <h4>Slider Ekle</h4>
                                </div>
                                <div class="card-body">

                                  <div class="form-group">

                                      <div class="input-group img-container">
                                          <input type="hidden" id="image_label" class="form-control" name="image_url" aria-label="Image" aria-describedby="button-image">
                                          <img src="" class="image_img" style="width: 75px;height: 75px;" id="image_img" >
                                          <div class="input-group-append">
                                              <button class="btn btn-outline-secondary button-image" type="button" id="button-image">Seç</button>
                                          </div>
                                      </div>
                                  </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Başlık</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control" name="title" value="{{$slider->title != null ? $slider->title : null}}">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">İçerik</label>
                                        <div class="col-sm-12 col-md-7">
                                            <textarea class="summernote form-control" style="width: 100%;min-height: 200px;" name="description" id="">{{$slider->description != null ? $slider->description : null}}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Ek Özellik</label>
                                        <div class="col-sm-12 col-md-7">
                                          <small>Bu alan temanız destekliyorsa çalışacaktır.</small>
                                            <input type="text" class="form-control" name="content" value="{{$slider->content != null ? $slider->content : null}}">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <div class="form-group col-6 ml-auto mr-auto mb-4">
                                            <div class="section-title mt-0">Durum</div>
                                            <select class="form-control" name="status">
                                                <option value="1" {{$slider->status==1 ? "selected" : null }} >Aktif</option>
                                                <option value="0" {{$slider->status==0 ? "selected" : null }} >Pasif</option>
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
    <script>


        document.getElementById('image_img').src ="{{$slider->image_url}}";
        document.getElementById('image_label').value = "{{$slider->image_url}}";

        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById('button-image').addEventListener('click', (event) => {
                event.preventDefault();
                var wi = window.outerWidth / 2;
                var hi = window.outerHeight - 450;
                window.open('/file-manager/fm-button/?leftDisk=public&leftPath=sliders', 'socialPopupWindow', `width=${wi},height=${hi},position=absolute,left=${wi/2},top=${hi/2}`);
            });
        });

        function fmSetLink($url) {
            $url = $url.split("upload/")[1];

            document.getElementById('image_label').value ="/upload/"+$url;
            document.getElementById('image_img').src = "/upload/"+ $url;
        }
    </script>
@endsection
