@extends("admin.layouts.app")
@section("style")
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
<link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
<style>
</style>
@endsection
@section("content")
    @component("admin.TemplateHooks.components.card-form",['title'=>"Tema Yerleşimleri Ekle","route"=>"store"])


        <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Başlık</label>
            <div class="col-sm-12 col-md-7">
                <input type="text" class="form-control" name="action_title">
            </div>
        </div>


        <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tema Yerleşim Grubu</label>
            <div class="col-sm-12 col-md-7 h-100">
                <select name="action_group" id="action_group" class="form-control">
                        <option value="headers">Üst Kısımlar</option>
                        <option value="contents">Orta Kısımlar</option>
                        <option value="footers">Alt Kısımlar</option>
                </select>
            </div>
        </div>

        <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Temalar</label>
            <div class="col-sm-12 col-md-7 h-100">
                <select name="template_id" id="template_id" class="form-control">
                    @php get_template(); @endphp
                </select>
            </div>
        </div>



        <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Durum</label>
            <div class="col-sm-12 col-md-7 h-100">
                <select name="action_status" id="action_status" class="form-control">
                    <option value="1">Aktif</option>
                    <option value="0">Pasif</option>
                </select>
            </div>
        </div>





    @endcomponent
@endsection
@section("script")
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.js" integrity="sha512-mh+AjlD3nxImTUGisMpHXW03gE6F4WdQyvuFRkjecwuWLwD2yCijw4tKA3NsEFpA1C3neiKhGXPSIGSfCYPMlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('vendor/file-manager/js/file-manager-js.js') }}"></script>
@endsection