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
    @component("services::components.card-form",['title'=>"Hizmet Ekle","route"=>"store"])
        <div class="row">
            <div class="form-group row" style="display: block;margin: 4px auto; ">
                <label class="col-form-label">Logo</label>
                <div class="input-group img-container">
                    <input type="hidden" id="site_logo_label" class="form-control" name="image" aria-label="Image" aria-describedby="button-image">
                    <img src="" class="image_img" style="width: 75px;height: 75px;" id="site_logo" >
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary button-image" type="button" id="button-image">Select</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Başlık</label>
            <div class="col-sm-12 col-md-7">
                <input type="text" class="form-control" name="title">
            </div>
        </div>








        <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Açıklama</label>
            <div class="col-sm-12 col-md-7 h-100">
                <textarea   name="content" class="form-control h-100" id="content" style="min-height:200px;"></textarea>
            </div>
        </div>


    @endcomponent
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
            document.getElementById('site_logo_label').value ="/upload/"+ $url;
            document.getElementById('site_logo').src = "/upload/"+ $url;
        }
    </script>
@endsection