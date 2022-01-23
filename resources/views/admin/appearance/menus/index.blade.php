@extends("admin.layouts.app")
@section("style")

@endsection
@section("content")
    <div id="app">
        <section class="section">
            <div class="section-header">
                <h4>Menüler</h4>
            </div>
            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 m-4">
                                <a href="{{route("admin.appearance.menus.create")}}" class="btn btn-info">Menü Ekle</a>
                            </div>
                            <div class="col-md-12">
                                <table class="table table-bordered">

                                    <thead>
                                    <tr>
                                        <th>Menü Adı</th>
                                        <th style="width: 155px;">İşlemler</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($menus as $menu)
                                            <tr>
                                                <td>{{$menu->menu_title}}</td>
                                                <td>
                                                    <div style="width: 100%;display: flex;justify-content: space-evenly;">
                                                        <a class="btn btn-primary btn-action mr-1 w-100 mr-2"  href="{{route('admin.appearance.menus.edit',$menu->id)}}" onclick="confirm('Düzenlemek istediğinize emin misiniz?') ? null :event.preventDefault() " title="Düzenle"><i class="fas fa-pencil-alt"></i></a>
                                                        <a class="btn btn-danger btn-action w-100 " href="" onclick="event.preventDefault();  confirm('Silmek istediğinize eminmisiniz?') ? document.getElementById('menu-form-{{$menu->id}}').submit() : null " title="Sil"><i class="fas fa-trash"></i></a>
                                                        <form id="menu-form-{{$menu->id}}" action="{{ route('admin.appearance.menus.destroy',$menu->id) }}" method="POST" style="display: none;">
                                                            {{ csrf_field() }}
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
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
