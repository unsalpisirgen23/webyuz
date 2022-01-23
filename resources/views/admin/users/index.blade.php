@extends("admin.layouts.app")
@section("style")
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <style>
        #form-all-delete{

        }
    </style>
@endsection
@section("content")
    <div id="app">
        <section class="section">
            {!! import("admin.components.breadcrumb",['content'=>'Kullanıcılar']) !!}
            <div class="section-body">
                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                                    <h4>Kullanıcılar</h4>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive p-3">
                                <table class="table table-striped mb-0" id="myTable">
                                    <thead>
                                    <tr>
                                        <th style="width: 110px;">
                                            <label style="font-size: 13px;">
                                                <input type="checkbox"  id="select-all" /> Tümünü Seç
                                            </label>
                                        </th>
                                        <th>Ad</th>
                                        <th>Soyad</th>
                                        <th>Durum</th>

                                        <th>İşlemler</th>
                                    </tr>
                                    </thead>
                                    <tbody>
@php $row = 1; @endphp
                                    @foreach($users  as $user)
                                        <tr>

                                            <td>
                                                <label>
                                                    <input type="checkbox" style="width: 18px;" form="form-all-delete" name="all-delete[]" id="foo{{$user->id}}" value="{{$user->id}}">#{{$row}}
                                                </label>
                                            </td>

                                            <td>
                                                {{$user->name}}
                                            </td>

                                            <td>
                                                {{$user->lastname}}
                                            </td>

                                            <td>
                                                {!! $user->status == 1 ? '<div class="btn bg-success color="" >Onaylı</div>' : '<div class="btn bg-warning" style="color:#eee">Onaysız</div>'  !!}
                                            </td>



                                            <td>

                                                <a class="btn btn-primary btn-action mr-1"  href="{{route('admin.users.edit',$user->id)}}" onclick="confirm('Düzenlemek istediğinize emin misiniz?') ? null :event.preventDefault() " title="Düzenle"><i class="fas fa-pencil-alt"></i></a>

                                                <a class="btn btn-info btn-action mr-1" type="button" data-toggle="modal" data-target="#exampleModal-{{$user->id}}" title="Görünütle"><i class="fas fa-eye"></i></a>
                                                <!-- Bu alan ajax yapılacak -->

     <a class="btn btn-danger btn-action" href="" onclick="event.preventDefault();  confirm('ilmek istediğinize eminmisiniz?') ? document.getElementById('user-form-{{$user->id}}').submit() : null " title="Sil"><i class="fas fa-trash"></i></a>
                                                <form id="user-form-{{$user->id}}" action="{{ route('admin.users.destroy',$user->id) }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>

                                            </td>
                                        </tr>
                                        @php $row+=1; @endphp
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <form action="{{route("admin.users.all_delete")}}" method="post" id="form-all-delete" class="ml-2">
                                @csrf
                                <button type="submit" onclick="confirm('Seçtiğiniz kullanıcılarınız silinecek onaylıyormusunuz?') ? null :event.preventDefault() " class="btn btn-danger" name="btn-all-delete" id="btn-all-delete" >Seçileni Sil</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section("script")
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.11.3/i18n/tr.json"
                },
                "columnDefs": [ {
                    "targets": 0,
                    "orderable": false
                } ]
            });
        } );
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if(session("error"))
        Swal.fire({
            position: 'top-end',
            icon: 'error',
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
        $('#select-all').click(function(event) {
            if(this.checked) {
                // Iterate each checkbox
                $(':checkbox').each(function() {
                    this.checked = true;
                });
            } else {
                $(':checkbox').each(function() {
                    this.checked = false;
                });
            }
        });
    </script>
@endsection
@section("app_modal")
    @foreach($users  as $user)
        <!-- Modal -->
        <div class="modal fade " id="exampleModal-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal-{{$user->id}}" aria-hidden="true">
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
                                <p>
                                    <img src="{{ asset("".$user->profile_image)}}" alt="" style="width: 80px;height: 80px;border-radius:1%;border:solid 1px #ddd;" />
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
    @endforeach
@stop
