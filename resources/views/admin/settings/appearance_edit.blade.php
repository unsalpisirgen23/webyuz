@extends("admin.layouts.app")
@section("style")

@endsection
@section("content")
    <div id="app">
        <section class="section">
            <div class="section-header">
                <h1>Görünüm Ayarları</h1>
            </div>
            <div class="section-body">
             <div class="card">
                 <div class="card-body">
                     <form action="" method="post">
                        @csrf
                         <div class="row">

                             <div class="form-group col-md-4">
                                 <label class="col-form-label">Başlık</label>
                                     <input type="text" class="form-control" name="settings[title]">
                             </div>


                             <div class="form-group col-md-4">
                                 <label class="col-form-label">Durum</label>
                                     <select class="form-control selectric" name="settings[status]">
                                         <option value="1">Aktif</option>
                                         <option value="0">Pasif</option>
                                     </select>
                             </div>





                         </div>
                         <button class="btn btn-primary">Güncelle</button>
                     </form>
                 </div>
             </div>
            </div>
        </section>
    </div>
@endsection
@section("script")
@endsection
