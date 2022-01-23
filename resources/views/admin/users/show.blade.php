@extends("admin.layouts.app")
@section("style")

@endsection
@section("content")
    <div id="app">
        <section class="section">
            {!! import("admin.components.breadcrumb",['content'=>'Kullanıcılar']) !!}
            <div class="section-body">
                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header row">
                                    <h4>Son Eklenen Kullanıcı</h4>

                                    <a href="{{route("admin.users.create")}}" class="btn btn-info ml-auto">Yeni Kullanıcı Ekle</a>

                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                    <tr>
                                        <th>Ad</th>
                                        <th>Soyad</th>
                                        <th>Kullanıcı Adı</th>
                                        <th>Durum</th>
                                        <th>İşlemler</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                {{$user->name}}
                                            </td>

                                            <td>
                                                {{$user->lastname}}
                                            </td>

                                            <td>
                                                {{$user->username}}
                                            </td>


                                            <td>
                                                {!! $user->status == 1 ? '<div class="btn bg-success color="" >Onaylı</div>' : '<div class="btn bg-warning" style="color:#eee">Onaysız</div>'  !!}
                                            </td>


                                            <td>
                                                <a class="btn btn-primary btn-action mr-1"  href="{{route('admin.users.edit',$user->id)}}" onclick="confirm('Düzenlemek istediğinize emin misiniz?') ? null :event.preventDefault() " title="Düzenle"><i class="fas fa-pencil-alt"></i></a>

                                                <a class="btn btn-info btn-action mr-1" type="button" data-toggle="modal" data-target="#exampleModal" title="Görünütle"><i class="fas fa-eye"></i></a>
                                                <!-- Bu alan ajax yapılacak -->

                                                <a class="btn btn-danger btn-action" href="" onclick="event.preventDefault();  confirm('Silmek istediğinize eminmisiniz?') ? document.getElementById('user-form-{{$user->id}}').submit() : null " title="Sil"><i class="fas fa-trash"></i></a>
                                                <form id="user-form-{{$user->id}}" action="{{ route('admin.users.destroy',$user->id) }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>

                                            </td>
                                        </tr>

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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if(session("error"))
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: '{{session("error")}}',
            showConfirmButton: false,
            timer: 1500
        })
        @endif
        @if(session("success"))
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: '{{session("success")}}',
            showConfirmButton: false,
            timer: 1500
        })
        @endif
    </script>
@endsection
<!-- Modal -->
<div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kullanıcı Detay</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div class="row">

                <div class="col-md-12">
                    <p><img src="{{ asset("".$user->profile_image)}}" alt="" style="width: 90px;height: 90px;border-radius: 100px;" />
                    </p>
                </div>

                <div class="col-md-6">
                    <p><strong>Ad : </strong>{{$user->name}}</p>
                </div>

                <div class="col-md-6">
                    <p><strong>Soyad : </strong>{{$user->lastname}}</p>
                </div>

                <div class="col-md-6">
                    <p><strong>Kullanıcı Adı : </strong>{{$user->username}}</p>
                </div>

                <div class="col-md-6">
                    <p><strong>E-posta : </strong>{{$user->email}}</p>
                </div>


            </div>


            </div>
            <div class="modal-footer">
                <a class="btn btn-primary btn-action w-100"  href="{{route('admin.users.edit',$user->id)}}" title="Düzenle"><i class="fas fa-pencil-alt"></i></a>
            </div>
        </div>
    </div>
</div>
