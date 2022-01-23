<div id="app">
    <section class="section">
        <div class="section-body">
            <form action="{{route("admin.TemplateHooksComponentWidgets.".$route)}}" method="post">
            @csrf
            <!-- Main Content -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header" >
                                <h4>{{$title}}</h4>
                            </div>
                            <div class="card-body">
                                {!! $slot !!}
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