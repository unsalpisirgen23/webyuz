@extends("admin.layouts.app")
@section("style")
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
<link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
<style>
.component-card{
    margin: 0px;
    width: 100%;
    height: 400px;
    position: relative;
    padding: 0px;
    margin-bottom: 20px;
}
.component-card .card-body{
    padding-top: 0px;
}
.component-view{
    box-sizing: border-box;
    position: relative;
}
.component-view iframe{
    width: 100%;
    position: absolute;
    top: 0px!important;
    bottom: 0px!important;
    height: 380px;
    left: 0px;
    right: 0px;
}
</style>
@endsection
@section("content")
    @component("admin.ComponentWidgets.components.card-form",['title'=>"Tema Bileşeni Ekle","route"=>"store"])



        <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Bileşenler</label>
            <div class="col-sm-12 col-md-7 h-100">
                <select name="component_name" id="template_id" class="form-control">
                    @foreach ($hooks as $hook=>$toHook)
                        @if(\Illuminate\Support\Facades\DB::table("component_widgets")->where("component_name","=",$hook)->get()->count() < 1 && $hook != "get_template_widget_group")
                             <option value="{!! $hook !!}">{!! $hook !!}</option>
                        @endif
                    @endforeach
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
