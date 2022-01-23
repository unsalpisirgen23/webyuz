@extends("admin.layouts.app")
@section("style")
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <style>
        .permission-container{
            display: flex;
            flex-wrap: wrap;
        }
.permission-group{
    background: #f6f6f8;
    display: inline-block;
    padding: 5px 0px;
    border: solid 1px #f3eeee;
    min-width: 130px;
    margin: 2px;
}

.permission-group strong{
    text-align: center;
    display: block;
    background: #f1f3fe;
    border-bottom: solid 1px #ddd;
}

.permission-group .form-check
{
    border-bottom: solid 1px #ddd;
    padding-left: 24px;
}
.permission-group .form-check:last-child{
    border-bottom: 0px;
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
            {!! import("admin.components.breadcrumb",['content'=>'Gruba Politika Atama']) !!}
            <div class="section-body">
                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="table-responsive p-3">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>
                                            {{$user_role->name}}
                                        </strong>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{route("admin.security_policy.GroupPolicyUpdate",$user_role->id)}}" method="post">
                                            @csrf

                            <div class="permission-container">
                                @foreach($permission_domains as $domain)
                                    <div class="permission-group">
                                        <strong>{{$domain->domain}}</strong>
                                        @foreach($permissions as $permission)
                                            @if($permission->permission_domain_id == $domain->id)
                                                <div class="form-check">
                                                    <input class="form-check-input form-check form-control"
                                                           name="permission_id[]" style="width: 13px;height: 13px; font-size: 12px!important;" type="checkbox" value="{{$permission->id}}" id="select-all-{{$permission->id}}">
                                                    <label class="form-check-label"  for="select-all-{{$permission->id}}" style="padding: 2px;font-size: 11px;font-weight: 700;">{{$permission->name}}</label>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>




                                            <br>
                                            <button class="btn btn-success mt-5">Kaydet</button>
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

        $(function (){

            @foreach($user_role_user as $param)
            $('#select-all-{{$param->permission_id}}').prop( "checked", true );
            @endforeach

        });




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

