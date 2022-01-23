@extends("admin.layouts.app")
@section("style")
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
@section("content")
    <div id="app">
        <section class="section">
            <!-- breadcrumb -->
             {!! import("admin.components.breadcrumb",['content'=>'İçerik Ekle']) !!}
            <!-- End breadcrumb -->
            <div class="section-body">
                <form action="{{route("admin.posts.store")}}" method="post">
                @csrf
                <!-- Main Content -->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4>İçerik Ekleme</h4>
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

                                                <div class="form-group row mb-4 h-25">
                                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Açıklama</label>
                                                    <div class="col-sm-12 col-md-7  h-25">
                                                        <textarea class="form-control h-25" name="description" rows="4" cols="3"  id="description"></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-4">
                                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kategori Seç</label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <select class="form-control selectric" name="category_id" >
                                                            @php \App\Helpers\Category::get_options() @endphp
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-4">
                                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Durum</label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <select class="form-control selectric" name="status" >
                                                            <option value="1">Aktif</option>
                                                            <option value="0">Pasif</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-4">
                                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                                    <div class="col-sm-12 col-md-7">
                                                        <button class="btn btn-primary">Kaydet</button>
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
