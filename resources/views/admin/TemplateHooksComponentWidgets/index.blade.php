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
                    <div style="width: 500px;margin: 5px auto;">
                        <select name="template_id" id="template_id" class="form-control">
                            <option value="0">Tema Seçiniz</option>
                            @php get_template(); @endphp
                        </select>
                    </div>
                    <table class="table table-striped mb-0" id="myTable" style="font-size: 12px;">
                        <thead>
                        <tr>
                            <th style="width: 220px;">Tema Yerleşim Başlığı</th>
                            <th style="width: 220px;">Tema Yerleşim Grubu</th>
                            <th>Bileşen Adı</th>
                            <th>Tema</th>
                            <th>Durum</th>
                            <th>İşlemler</th>
                        </tr>
                        </thead>
                        <tbody id="content_response">
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
            /*
            $('#myTable').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.11.3/i18n/tr.json"
                },
                "columnDefs": [ {
                    "targets": 0,
                    "orderable": false
                } ]
            });
            */
        } );
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).on("change","#template_id",function (){
            var id = $(this).val();
            $.ajax({
                type: "POST",
                url: "{{route("admin.TemplateHooksComponentWidgets.ajax_index")}}",
                data:{"_token": "{{ csrf_token() }}",id:id},
                dataType: "html",
                success: function (myResponse) {
                    $("#content_response").html(myResponse);
                }
            })
        });

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