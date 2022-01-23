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
            {!! import("admin.components.breadcrumb",['content'=>'İzin Politikasına Açıklama Ekle']) !!}
            <div class="section-body">
                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="table-responsive p-3">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>
                                            {{$permission->name}}
                                        </strong>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{route("admin.security_policy.permissionPolicyUpdate",$permission->id)}}" method="post">
                                            @csrf
                                            <label for="description">Açıklama</label>
                                            <textarea name="description" class="form-control" style="min-height: 100px;" id="description" cols="30" rows="10">{{$permission->description}}</textarea>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <button class="btn btn-success">Kaydet</button>
                                        </form>
                                    </div>
                                </div>
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

