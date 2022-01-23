@extends("admin.layouts.app")
@section("style")

@endsection
@section("content")
    <div id="app">
        <section class="section">
            {!! import("admin.components.breadcrumb",['content'=>'Site Oluştur']) !!}
            <div class="section-body">
                <form action="{{route("admin.sites.store")}}" method="post">
                @csrf
                <!-- Main Content -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Site Başlık</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control" name="title" >
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Site Kategori</label>
                                        <div class="col-sm-12 col-md-7">
                                            <select name="site_category_id" id="site_category_id" class="form-control">
                                                @foreach(\App\Helpers\Site::get_siteCategories() as $site)
                                                    <option value="{{$site->id}}">{{$site->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Site Kullanıcı</label>
                                        <div class="col-sm-12 col-md-7">
                                            <select name="user_id" id="user_id" class="form-control">
                                                @foreach(\App\Helpers\Site::get_users() as $user)
                                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Site Alan Adı</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control" name="domain" >
                                        </div>
                                    </div>



                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Site Açıklama</label>
                                        <div class="col-sm-12 col-md-7">
                                            <textarea name="description" class="form-control" style="min-height: 100px;" id="" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>


                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Site Durum</label>
                                        <div class="col-sm-12 col-md-7">
                                            <select name="status" id="user_id" class="form-control">
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