@extends("admin.layouts.app")
@section("style")

@endsection
@section("content")
    <div id="app">
        <section class="section">
            {!! import("admin.components.breadcrumb",['content'=>'Sayfa Ekle']) !!}
            <div class="section-body">
                <form action="{{route("admin.pages.store")}}" method="post">
                @csrf
                <!-- Main Content -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header" >
                                    <h4>Sayfa Ekle</h4>
                                </div>
                                <div class="card-body">

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Başlık</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control" name="title" >
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">İçerik</label>
                                        <div class="col-sm-12 col-md-7">
                                            <textarea class="summernote" name="content" id="content"></textarea>
                                        </div>
                                    </div>


                                    <div class="form-group row mb-4">
                                        <div class="form-group col-6 ml-auto mr-auto mb-4">
                                            <div class="section-title mt-0">Durum</div>
                                            <select class="form-control" name="status">
                                                <option value="1">Aktif</option>
                                                <option value="0">Pasif</option>
                                            </select>
                                        </div>
                                    </div>





                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7">
                                            <button class="btn btn-primary btn-block">Ekle</button>
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
    <script>


            CKEDITOR.replace('content', {filebrowserImageBrowseUrl: '/file-manager/ckeditor/'} );


    </script>
@endsection
