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
            {!! import("admin.components.breadcrumb",['content'=>'Tema Bileşenleri Güncelle']) !!}
            <div class="section-body">
                <form action="{{route("admin.ComponentWidgets.update",$component_widget->id)}}" method="post">
                @csrf
                <!-- Main Content -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header" >
                                    <h4>Bileşen Düzenle</h4>
                                </div>
                                <div class="card-body">
                                  <div class="form-group">


                                      <div class="form-group row mb-4">
                                          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Başlık</label>
                                          <div class="col-sm-12 col-md-7">
                                              <input type="text" class="form-control" value="{{$component_widget->component_title}}" name="component_title">
                                          </div>
                                      </div>


                                      <div class="form-group row mb-4">
                                          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Bileşenler</label>
                                          <div class="col-sm-12 col-md-7 h-100">
                                              <select name="component_name" id="template_id" class="form-control">
                                                  @foreach ($hooks as $hook=>$toHook)
                                                      <option value="{!! $hook !!}" {{$component_widget->component_name == $hook ? "selected" : null}} >{!! $hook !!}</option>
                                                  @endforeach
                                              </select>
                                          </div>
                                      </div>



                                      <div class="form-group row mb-4">
                                          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Grup</label>
                                          <div class="col-sm-12 col-md-7 h-100">
                                              <select name="component_group" id="template_id" class="form-control">
                                                  <option value="headers" {{$component_widget->component_group == "headers" ? "selected" : null}} >Üst Kısımlar</option>
                                                  <option value="contents" {{$component_widget->component_group == "contents" ? "selected" : null}} >Orta Kısımlar</option>
                                                  <option value="footers" {{$component_widget->component_group == "footers" ? "selected" : null}} >Alt Kısımlar</option>
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

