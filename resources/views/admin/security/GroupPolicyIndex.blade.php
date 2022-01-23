@extends("admin.layouts.app")
@section("style")
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <style>
        #form-all-delete {

        }

        table * tr, td, th {
            padding: 0px !important;
            padding-left: 4px !important;
        }
    </style>
@endsection
@section("content")
    <div id="app">
        <section class="section">
            {!! import("admin.components.breadcrumb",['content'=>'İzin Politikaları']) !!}
            <div class="section-body">
                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="table-responsive p-3">
                                <table class="table table-striped mb-0 p-0" id="myTable">
                                    <thead class="p-0">
                                    <tr class="p-0">
                                        <th class="">Adı</th>
                                        <th>Atama</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($user_role_users as $user_role_user)
                                        <tr class="p-0" style="min-height: 25px!important;height: 25px;border: solid 1px #ddd;margin-bottom: 2px;padding-left: 4px;">

                                            <td style="min-height: 25px!important;line-height: 28px;">
                                                    {{$user_role_user->user_roles_name}}
                                            </td>

                                            <td class="p-0" style="min-height: 25px!important;width:55px;">
                                                <a class=" btn-primary btn-action m-0 mr-1 p-0"
                                                   style="display: block;min-width: 28px!important; width: 58px; min-height: 28px!important; text-align: center;padding: 0px!important;margin: 0px;font-size: 14px;"
                                                   href="{{route('admin.security_policy.GroupPolicyAssignment',$user_role_user->user_roles_id)}}"
                                                   onclick="confirm('Düzenlemek istediğinize emin misiniz?') ? null :event.preventDefault()"
                                                   title="Açıklama Ekle"><i class="fas fa-plus"></i></a>
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
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.11.3/i18n/tr.json"
                },
                "columnDefs": [{
                    "targets": 0,
                    "orderable": false
                }]
            });
        });
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
        $('#select-all').click(function (event) {
            if (this.checked) {
                // Iterate each checkbox
                $(':checkbox').each(function () {
                    this.checked = true;
                });
            } else {
                $(':checkbox').each(function () {
                    this.checked = false;
                });
            }
        });
    </script>
@endsection

