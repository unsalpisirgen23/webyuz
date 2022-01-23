@extends("admin.layouts.app")
@section("style")
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <style>
        #form-all-delete{

        }
    </style>
@endsection
@section("content")
    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
        <div class="card">
            {!! import("admin.components.breadcrumb",['content'=>'Tema Bileşenleri']) !!}
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped mb-0" id="myTable">
                        <thead>
                        <tr>
                            <th>Başlık</th>
                            <th>Bileşen</th>
                            <th>Grup</th>
                            <th>İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customFields  as $customField)
                            <tr style="border-bottom: solid 1px #ddd;min-height: 30px;">

                                <td style="min-height: 30px;padding: 0px;font-size: 16px;">
                                    {{$customField->component_title}}
                                </td>

                                <td style="overflow: hidden;min-height: 30px;padding: 0px;font-size: 16px;">
                                    {!! $customField->component_name !!}
                                </td>

                                <td style="overflow: hidden;min-height: 30px;padding: 0px;font-size: 16px;">
                                    {!! $customField->component_group !!}
                                </td>

                                <td style="min-height: 30px;padding: 0px;width: 200px;">
                                    <a class="btn btn-primary btn-action m-0 ml-4"  href="{{ route("admin.ComponentWidgets.edit",$customField->id)}}" onclick="confirm('Bu düzenlemek istediğinize eminmisiniz?') ? null :event.preventDefault() " title="Düzenle"><i class="fas fa-pencil-alt"></i></a>
                                    <!-- Bu alan ajax yapılacak -->
                                    <a class="btn btn-danger btn-action m-0 ml-4" href="" onclick="event.preventDefault();  confirm('Bu silmek istediğinize eminmisiniz?') ? document.getElementById('page-form-{{$customField->id}}').submit() : null " title="Sil"><i class="fas fa-trash"></i></a>
                                    <form id="page-form-{{$customField->id}}" action="{{ route("admin.ComponentWidgets.destroy",$customField->id)}}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
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