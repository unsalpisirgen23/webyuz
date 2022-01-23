@extends("admin.layouts.app")
@section("style")
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
@section("content")
    <div id="app">
        <section class="section">
            {!! import("admin.components.breadcrumb",['content'=>'Yorum Düzenle']) !!}
            <div class="section-body">
                <form action="{{route("admin.comments.update",$comment->id)}}" method="post">
                @csrf
                <!-- Main Content -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>İçerik Düzenle</h4>
                                </div>
                                <div class="card-body">


                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Yorum</label>
                                        <div class="col-sm-12 col-md-7">
                                            <textarea class="form-control "  style="height: 100%;" name="comment" rows="7" cols="7" id="" >{!! $comment->comment !!}</textarea>
                                        </div>
                                    </div>



                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Durum</label>
                                        <div class="col-sm-12 col-md-7">
                                            <select class="form-control selectric" name="status" >
                                                <option value="1" {{$comment->status ==  1 ? "selected" : null}} >Aktif</option>
                                                <option value="0"  {{$comment->status == 0 ? "selected" : null}}  >Pasif</option>
                                            </select>
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
