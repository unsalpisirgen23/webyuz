@extends("admin.layouts.app")
@section("style")
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
@section("content")
    <div id="app">
        <section class="section">
            {!! import("admin.components.breadcrumb",['content'=>'Tema Düzenle']) !!}
            <div class="section-body">
                <form action="{{route("admin.templates.update",$template->id)}}" method="post">
                @csrf
                <!-- Main Content -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Sayfa Düzenle</h4>
                                </div>
                                <div class="card-body">

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Başlık</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control" name="name" value="{{$template->name}}">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Stil</label>
                                        <div class="col-sm-12 col-md-7">
                                            <textarea class="form-control" style="min-height: 300px; background-color:black; color:green; font-family: 'Arial Black';" name="style">
                                                {!! $style->content !!}
                                            </textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Durum</label>
                                        <div class="col-sm-12 col-md-7">
                                            <select class="form-control selectric" name="status">
                                                <option value="1" {{$template->status==1 ? "selected" : null }} >Aktif</option>
                                                <option value="0" {{$template->status==0 ? "selected" : null }} >Pasif</option>
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
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
@endsection
