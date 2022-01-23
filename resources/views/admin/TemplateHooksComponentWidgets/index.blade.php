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
            {!! import("admin.components.breadcrumb",['content'=>'Tema İlişkileri']) !!}
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped mb-0" id="myTable" style="font-size: 12px;">
                        <thead>
                        <tr>
                            <th style="width: 220px;">Tema Yerleşim Başlığı</th>
                            <th style="width: 220px;">Tema Yerleşim Grubu</th>
                            <th style="width: 220px;">Bileşen Başlığı</th>
                            <th>Bileşen Adı</th>
                            <th>Bileşen Grubu</th>
                            <th>Tema</th>
                            <th>Durum</th>
                            <th>İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($templateHooksComponentWidgets  as $templateHooksComponentWidget)
                            <tr style="border-bottom: solid 1px #ddd;min-height: 30px;">

                                <td style="min-height: 30px;padding: 0px;font-size: 14px;padding-left: 9px;">
                                    {{$templateHooksComponentWidget->action_title}}
                                </td>

                                <td style="min-height: 30px;padding: 0px;font-size: 12px;">
                                    {{$templateHooksComponentWidget->action_group}}
                                </td>

                                <td style="overflow: hidden;min-height: 30px;padding: 0px;font-size: 14px;">
                                    {!! $templateHooksComponentWidget->component_title !!}
                                </td>

                                <td style="overflow: hidden;min-height: 30px;padding: 0px;font-size: 14px;">
                                    {!! $templateHooksComponentWidget->component_name !!}
                                </td>

                                <td style="overflow: hidden;min-height: 30px;padding: 0px;font-size: 14px;">
                                    {!! $templateHooksComponentWidget->component_group !!}
                                </td>


                                <td style="overflow: hidden;min-height: 30px;padding: 0px;font-size: 14px;">
                                    {!! $templateHooksComponentWidget->template_name !!}
                                </td>


                                <td style="overflow: hidden;min-height: 30px;padding: 0px;font-size: 14px;">
                                    {!! $templateHooksComponentWidget->status == "1" ? "Atif" : "Pasif"  !!}
                                </td>


                                <td style="min-height: 30px;padding: 0px;width: 200px;">
                                    <a class="btn btn-primary btn-action m-0 ml-4"  href="{{route("admin.TemplateHooksComponentWidgets.edit",$templateHooksComponentWidget->thcw_id)}}" onclick="confirm('Bu düzenlemek istediğinize eminmisiniz?') ? null :event.preventDefault() " title="Düzenle"><i class="fas fa-pencil-alt"></i></a>
                                    <!-- Bu alan ajax yapılacak -->
                                    <a class="btn btn-danger btn-action m-0 ml-4" href="" onclick="event.preventDefault();  confirm('Bu silmek istediğinize eminmisiniz?') ? document.getElementById('page-form-{{$templateHooksComponentWidget->thcw_id}}').submit() : null " title="Sil"><i class="fas fa-trash"></i></a>
                                    <form id="page-form-{{$templateHooksComponentWidget->thcw_id}}" action="{{ route("admin.TemplateHooksComponentWidgets.destroy",$templateHooksComponentWidget->thcw_id)}}" method="POST" style="display: none;">
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