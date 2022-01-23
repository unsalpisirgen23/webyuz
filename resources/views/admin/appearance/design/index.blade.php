@extends("admin.layouts.app")
@section("style")

@endsection
@section("content")
<div id="app">
    <section class="section">
        <div class="section-header">
            <h4>Tasarım</h4>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div id="accordion">
                            <div class="card m-0 pt-0">
                                <div class="card-header p-0 m-0" id="headingPages"
                                    style="position:relative;min-height: 50px;">
                                    <button class="btn btn-warning m-0"
                                        style="position: absolute; width: 100%;border-radius: 0px; font-size:18px;height: 100%;"
                                        data-toggle="collapse" data-target="#collapseHeader" aria-expanded="true"
                                        aria-controls="collapseHeader">
                                        Üst Kısım
                                    </button>
                                </div>
                                <div id="collapseHeader" class="collapse" aria-labelledby="headingPages"
                                    data-parent="#accordion">
                                    <div class="card-body pl-3 pr-3 pb-3">

                                      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
<li class="nav-item" role="presentation">
  <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#header-link" role="tab" aria-controls="header-links" aria-selected="true">Bağlantılar</a>
</li>
<li class="nav-item" role="presentation">
  <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
</li>
<li class="nav-item" role="presentation">
  <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
</li>
</ul>
<div class="tab-content" id="pills-tabContent">
<div class="tab-pane fade show active" id="header-links" role="tabpanel" aria-labelledby="header-links-tab">
  <form action="" method="post">
      <div class="from-group">
          <label for="color">Font Rengi</label>
          <input type="color" class="form-control" name="color" id="color">
      </div>
      <div class="from-group">

          <label for="font-fize">Font Büyüklüğü</label>
          <div class="input-group">
          <input type="number" name="font-size" class="form-control" id="font-size" min="0" max="1500">

  <div class="input-group-append">
    <span class="input-group-text">px</span>
  </div></div>
      </div>
      <div class="from-group">
          <label for="tel">Geçerli Font</label>
          <select name="fonts" id="fonts" class="form-control">
              <option value="font-name">Font Name</option>
          </select>
      </div>
      <div class="from-group">
          <label for="font-hover-color">Font Hover Color</label>
          <input type="color" class="form-control" name="font-hover-color" id="font-hover-color">
      </div>
  </form>
</div>
<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...</div>
<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
</div>

                                            <label class="btn btn-info w-50"
                                                style="float: left;margin-right: 4px;margin-left: -6px;">
                                                <input type="checkbox" style="width: 18px;display: none;"
                                                    id="pages-select-all" name="pages-select-all"> Tümünü Seç
                                            </label>
                                            <button class="btn btn-success w-50" style="margin-right: -4px;">Uygula</button>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-9">

                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@section("script")
@endsection
