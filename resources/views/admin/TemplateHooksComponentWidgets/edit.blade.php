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
            {!! import("admin.components.breadcrumb",['content'=>'Tema İlişki Güncelle']) !!}
            <div class="section-body">
                <form action="{{route("admin.TemplateHooksComponentWidgets.update",$id)}}" method="post">
                @csrf
                <!-- Main Content -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                  <div class="form-group">




    <div class="form-group row mb-4">
      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tema Kancaları</label>
      <div class="col-sm-12 col-md-7 h-100">
          <select name="template_hooks_id" id="template_hooks_id" class="form-control">
              @if(isset($template_hooks))
                  @foreach($template_hooks as $template_hook)
                      <option value="{{@$template_hook->id}}" {{@$templateHooksComponentWidget->template_hooks_id ==@$template_hook->id ? "selected" : null }} >{{@$template_hook->action_title}}</option>
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
     <option value="{{@$component_widget->id}}" {{@$templateHooksComponentWidget->component_widget_id ==@$component_widget->id ? "selected" : null }} >{{@$component_widget->component_title}}</option>
                  @endforeach
              @endif
          </select>
      </div>
    </div>




                                      <div class="form-group row mb-4">
                                          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Temalar</label>
                                          <div class="col-sm-12 col-md-7 h-100">
                                              <select name="component_widget_id" id="template_id" class="form-control">
                                                  @php get_template(@$templateHooksComponentWidget->template_id); @endphp
                                              </select>
                                          </div>
                                      </div>




                                      <div class="form-group row mb-4">
  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Özel Stil</label>
  <div class="col-sm-12 col-md-7">
      <textarea  class="form-control" style="width: 100%;min-height: 300px;" name="component_style">{!! @$templateHooksComponentWidget->component_style  !!}</textarea>
  </div>
</div>


<div class="form-group row mb-4">
  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Durum</label>
  <div class="col-sm-12 col-md-7 h-100">
      <select name="status" id="status" class="form-control">
          <option value="1" {{@$templateHooksComponentWidget->status  == 1 ? "selected" : null }} >Aktif</option>
          <option value="0"  {{@$templateHooksComponentWidget->status == 0 ? "selected" : null }}  >Pasif</option>
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

