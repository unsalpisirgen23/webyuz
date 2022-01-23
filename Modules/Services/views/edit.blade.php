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
            {!! import("admin.components.breadcrumb",['content'=>'Bileşen Güncelle']) !!}
            <div class="section-body">
                <form action="{{services_route("update",$service->id)}}" method="post">
                @csrf
                <!-- Main Content -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header" >
                                    <h4>Hizmet Düzenle</h4>
                                </div>
                                <div class="card-body">
                                  <div class="form-group">

                                      <div class="row">
                                          <div class="form-group row mb-4 ml-auto mr-auto">
                                              <label class="col-form-label m-3">Logo</label>
                                              <div class="input-group img-container">
                                                  <input type="hidden" id="site_logo_label" value="{{$service->image}}" class="form-control" name="image" aria-label="Image" aria-describedby="button-image">
                                                  <img src="{{$service->image}}" class="image_img" style="width: 75px;height: 75px;" id="site_logo" >
                                                  <div class="input-group-append">
                                                      <button class="btn btn-outline-secondary button-image" type="button" id="button-image">Select</button>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>

                                      <div class="form-group row mb-4">
                                          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Başlık</label>
                                          <div class="col-sm-12 col-md-7">
                                              <input type="text" class="form-control" name="title" value="{{$service->title}}">
                                          </div>
                                      </div>




                                      <div class="form-group row mb-4">
                                          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Açıklama</label>
                                          <div class="col-sm-12 col-md-7 h-100">
                                              <textarea   name="content" class="form-control h-100" id="content" style="min-height:200px;">{{$service->title}}</textarea>
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
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
@section("script")
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if(session("error"))
        Swal.fire({
            position: 'top',
            icon: 'error',
            title: '{{session("error")}}',
            showConfirmButton: false,
            timer: 1500
        })
        @endif
        @if(session("success"))
        Swal.fire({
            position: 'top',
            icon: 'success',
            title: '{{session("success")}}',
            showConfirmButton: false,
            timer: 1500
        })
        @endif

    </script>
    <script type="text/javascript">
        $('#autoresizing').on('input', function () {
            this.style.height = 'auto';

            this.style.height =
                (this.scrollHeight) + 'px';
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.js" integrity="sha512-mh+AjlD3nxImTUGisMpHXW03gE6F4WdQyvuFRkjecwuWLwD2yCijw4tKA3NsEFpA1C3neiKhGXPSIGSfCYPMlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('vendor/file-manager/js/file-manager-js.js') }}"></script>
    <script>
      //  document.getElementById('site_logo_label').value ="{{$service->image}}";
       // document.getElementById('site_logo').src ="{{$service->image}}";
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById('button-image').addEventListener('click', (event) => {
                event.preventDefault();
                var wi = window.outerWidth / 2;
                var hi = window.outerHeight - 450;
                window.open('/file-manager/fm-button/?leftDisk=public&leftPath=site', 'socialPopupWindow', `width=${wi},height=${hi},position=absolute,left=${wi/2},top=${hi/2}`);
            });
        });
        // set file link
        function fmSetLink($url) {
            $url = $url.split("upload/")[1];
            ///upload/users/avatar/no-avatar.png
            document.getElementById('site_logo_label').value ="/upload/" +$url;
            document.getElementById('site_logo').src ="/upload/"+ $url;
        }
    </script>
@endsection