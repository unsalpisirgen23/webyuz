@extends("admin.layouts.app")
@section("style")
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <style>

    </style>
@endsection
@section("content")
    {!! import("admin.components.breadcrumb",['content'=>'Kategoriler']) !!}
    <div class="row">
        <div  class="col-md-5" >
            <div class="card">
                <div class="card-header">
                    <h4 id="title">Kategori Ekle</h4>
                </div>
                <div class="card-body">
                    <form action="" id="categoryForm">
                        <input type="hidden" name="id" id="id" value="">
                        <div class="form-group row mb-2">
                            <label class="col-form-label text-md-left col-md-12">Ad</label>
                            <div class="col-sm-12 col-md-12">
                                <input type="text" class="form-control" name="name">
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label class="col-form-label text-md-left col-md-12 ">Durum</label>
                            <div class="col-md-12">
                                <select class="form-control selectric" name="status" id="status" >
                                        <option value="1">Aktif</option>
                                        <option value="0">Pasif</option>
                                </select>
                            </div>
                        </div>


                    <button class="btn  btn-info w-25 mt-4" id="btnCategoryForm">Ekle</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <h4>Kategori Listesi</h4>
                    <div class="card-header-action">
                        <a href="" id="category_create" class="btn btn-primary">Yeni Ekle</a>
                    </div>
                </div>
                <div class="card-body p-2">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered mb-0 " id="categoryTable" style="width: 100%;">
                            <thead>
                            <tr>
                                <th style="width: 100px;">
                                    <label style="font-size: 13px;margin-left: -5px;">
                              <input type="checkbox"  id="select-all" /> Tümünü Seç
                                    </label>
                                </th>
                                <th>Ad</th>
                                <th style="width: 50px!important;">Durum</th>
                                <th style="width: 90px;">İşlemler</th>
                            </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                        <form action="{{route("admin.categories.all_delete")}}" method="post" id="form-all-delete" class="ml-2">
                            @csrf
                            <button type="submit" onclick="confirm('Seçtiğiniz kullanıcılarınız silinecek onaylıyormusunuz?') ? null :event.preventDefault() " class="btn btn-danger" name="btn-all-delete" id="btn-all-delete" >Seçileni Sil</button>
                        </form>
                    </div>
                </div>
            </div>
        </div></div>

    </div>
@endsection
@section("script")
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(function (){

              var dataTable =   $('#categoryTable').DataTable( {
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.11.3/i18n/tr.json"
                    },
                    "processing": true,
                    "serverSide": true,
                    "ajax": {
                        url:"{{route("api.categories.ajax")}}",
                        type:"GET"
                    },
                    columns:[
                        {data:"id"},
                        {data:"name"},
                        {data:"status"},
                        {data:"id"},
                    ],
                    columnDefs:[
                        {
                            render:function (data,type,row){
                                var html = `<label class="p-1">
            <input type="checkbox" name="ids[]" form="form-all-delete" value="${data}" />
                                           </label>
                                            `;
                                return html;
                            },
                            "orderable": false,
                            targets:0
                        },
                        {
                            render:function (data,type,row){
                                var active = `<p class="btn btn-sm btn-success">Aktif</p>`;
                                var noActive = `<p class="btn btn-sm btn-danger">Pasif</p>`;
                                return data == 1 ? active : noActive;
                            },
                            "width": "90px",
                            targets:2
                        },
                        {
                            render:function (data,type,row){
                                var html = `
        <div class="btn-group " role="group" aria-label="Button group with nested dropdown">
        <div class="btn-group" role="group">
        <button id="btnGroupDrop1" type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        İşlemler
        </button>
        <div class="dropdown-menu p-0" aria-labelledby="btnGroupDrop1">
        <a class="dropdown-item btn btn-warning edit"  data-id="${data}" style="border-radius: 0px;" href="#">Düzenle</a>
        <a class="dropdown-item btn btn-danger delete"  data-id="${data}" style="border-radius: 0px;" href="javascript:void">Sil</a>
        </div>
        </div>
        </div>
                                `;
                                return html;
                            },
                            targets:3
                        }
                    ]
                } );

              $("#category_create").on('click',function (){
                  $("#categoryForm input[type=hidden] ").val("0");
                  $("#categoryForm input[name=name] ").val("");
                  $("#title").text("Kategori Ekle");
                  $("#status  option").removeAttr("selected");
                  $("#btnCategoryForm").text("Ekle");
                  return false;
              });


            $("#btnCategoryForm").on("click",function (){
                var name = $("#categoryForm input[name=name]").val();
                var id = $("#categoryForm input[name=id]").val();
                var status = $("#categoryForm select[name=status]").val();
                if (id > 0)
                {
                    if(name == "")
                    {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'Kategori adı boş burakılamaz!',
                            showConfirmButton: false,
                            timer: 1300
                        });
                    }
                    else
                    {
                        $.ajax({
                            method:"POST",
                            url:"{{route("admin.categories.update",0)}}",
                            data:{
                                "_token": "{{ csrf_token() }}",
                                id:id,
                                name:name,
                                status:status
                            },
                            success:function ()
                            {
                                $("#categoryForm input[name=name]").val("");
                                $("#categoryForm input[name=id]").val("");
                                $("#status  option").removeAttr("selected");
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Tebrikler kategori başarıyla güncellendi.',
                                    showConfirmButton: false,
                                    timer: 1300
                                });
                                dataTable.ajax.reload();
                            }
                        });
                    }
                }
                else{
                     name = $("#categoryForm input[name=name]").val();
                     id = $("#categoryForm input[name=id]").val();
                     status = $("#categoryForm select[name=status]").val();

                    if(name == "")
                    {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'Kategori adı boş burakılamaz!',
                            showConfirmButton: false,
                            timer: 1300
                        });
                    }
                    else
                    {
                        $.ajax({
                            method:"POST",
                            url:"{{route("admin.categories.store")}}",
                            data:{
                                "_token": "{{ csrf_token() }}",
                                id:id,
                                name:name,
                                status:status
                            },
                            success:function ()
                            {
                                $("#categoryForm input[name=name]").val("");
                                $("#categoryForm input[name=id]").val("");
                                $("#status  option").removeAttr("selected");
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Tebrikler kategori başarıyla Eklendi.',
                                    showConfirmButton: false,
                                    timer: 1300
                                });
                                dataTable.ajax.reload();
                            }
                        });
                    }
                }
                return false;
            });


            $(document.body).on('click',".edit",function (){
                var id = $(this).attr("data-id");
                $("#title").text("Kategori Düzenle");
                $("#status  option").attr("selected","");
                Swal.fire({
                    title: 'Uyarı',
                    text: "Bu kategoriyi düzenlemek istediğinizden eminmisiniz?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Evet',
                    cancelButtonText:"Hayır"
                }).then((result) => {
                    console.log(result);
                    if (result.isConfirmed==true) {
                        $.ajax({
                            method:"GET",
                            url:"{{route("admin.categories.edit",0)}}",
                            data:{id},
                            dataType:"json",
                            success:function (response) {
                                $("#categoryForm input[name=id]").val(response.id);
                                $("#categoryForm input[name=name]").val(response.name);
                                if(response.status==1){
                                    $("#status  option").removeAttr("selected");
                                    $("#categoryForm #status  option[value=1] ").attr("selected","selected");
                                }else if(response.status==0) {
                                    $("#status  option").removeAttr("selected");
                                    $("#categoryForm #status  option[value=0] ").attr("selected","selected");
                                }
                                $("#btnCategoryForm").text("Güncelle");
                            }
                        });
                    }
                })
            });

            $(document.body).on('click',".delete",function (){
                var id = $(this).attr("data-id");

                Swal.fire({
                    title: 'Uyarı',
                    text: "Bu kategoriyi silmek istediğinizden eminmisiniz?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Evet',
                    cancelButtonText:"Hayır"
                }).then((result) => {
                    console.log(result);
                    if (result.isConfirmed==true) {
                        $.ajax({
                            method:"POST",
                            url:"{{route("admin.categories.destroy",1)}}",
                            data:{ "_token": "{{ csrf_token() }}",id:id},
                            dataType:"json",
                            success:function (response) {
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Tebrikler kategori başarıyla silindi.',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                dataTable.ajax.reload();
                            }
                        });
                    }
                })


            });




        });
    </script>
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
