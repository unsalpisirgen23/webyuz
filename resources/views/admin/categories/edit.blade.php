@extends("admin.layouts.app")
@section("style")
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

@endsection
@section("content")
    <div id="app">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{route("admin.categories.index")}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Kategori Düzenle</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{route("admin.home")}}">Panel</a></div>
                    <div class="breadcrumb-item"><a href="{{route("admin.categories.index")}}">Kategori</a></div>
                    <div class="breadcrumb-item">Kategori Düzenle</div>
                </div>
            </div>


            <div class="section-body">


                <form action="{{route("admin.categories.update",['id'=>$category->id])}}" method="post">
                @csrf

                <!-- Main Content -->



                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Kategori Düzenleme Alanı</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Resim</label>
                                        <div class="col-sm-12 col-md-7">
                                            <div id="image-preview" class="image-preview">
                                                <label for="image-upload" id="image-label">Resim Seçin</label>
                                                <input type="file" name="image" id="image-upload">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Başlık</label>
                                        <div class="col-sm-12 col-md-7">

                                            <input type="text" class="form-control" value="{{$category->name}}" name="name">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Üst Kategorisi</label>
                                        <div class="col-sm-12 col-md-7">
                                            <select class="form-control selectric" name="parent_id">
                                                <option value="0">Üst Kategorisi Yok</option>
                                                @php \App\Helpers\Category::get_option() @endphp

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Düzenle</label>
                                        <div class="col-sm-12 col-md-7">
                                            <textarea class="summernote" name="description" id="content" required>{{$category->description}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7">
                                            <button class="btn btn-primary btn-block">Kaydet</button>
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
