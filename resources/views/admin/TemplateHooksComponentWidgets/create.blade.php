@extends("admin.layouts.app")
@section("style")
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
<link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
<style>
</style>
@endsection
@section("content")
    @component("admin.TemplateHooksComponentWidgets.components.card-form",['title'=>"Tema İlişki Ekle","route"=>"store"])



        <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tema Kancaları</label>
            <div class="col-sm-12 col-md-7 h-100">
                <select name="template_hooks_id" id="template_hooks_id" class="form-control">
                    @if(isset($template_hooks))
                        @foreach($template_hooks as $template_hook)
                            <option value="{{$template_hook->id}}">{{$template_hook->action_title}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>


        <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tema Bileşenleri</label>
            <div class="col-sm-12 col-md-7 h-100">
                <select name="component_widget_id" id="component_widget_id" class="form-control">
                    @if(isset($component_widgets))
                        @foreach($component_widgets as $component_widget)
                            <option value="{{$component_widget->id}}">{{$component_widget->component_title}}</option>
                        @endforeach
                    @endif
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
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Özel Stil</label>
            <div class="col-sm-12 col-md-7">
<textarea  class="form-control" style="width: 100%;min-height: 300px;" name="component_style"></textarea>
            </div>
        </div>

        <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Durum</label>
            <div class="col-sm-12 col-md-7 h-100">
                <select name="status" id="status" class="form-control">
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