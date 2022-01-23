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
            <div class="card-header">
                <h4>Yorumlar</h4>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped mb-0" id="myTable">
                        <thead>
                        <tr>
                            <th>Ad Soyad</th>
                            <th>E-Posta</th>
                            <th style="width: 140px;">Yazar</th>
                            <th style="width: 140px;">Durum</th>
                            <th style="width: 150px;">İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($comments  as $comment)

                            <tr>

                                <td>
                                    {{$comment->fullname}}
                                </td>

                                <td>
                                    {{$comment->email}}
                                </td>

                                <td>
                                    {{\App\Helpers\Post::get_name($comment->post_id)}}
                                </td>

                                <td>
                                    {!! $comment->status == 1 ? '<div class="btn bg-success color="" >Onaylı</div>' : '<div class="btn bg-warning" style="color:#eee">Onaysız</div>'  !!}
                                </td>


                                <td>
                                    <a class="btn btn-primary btn-action mr-1" onclick="return confirm('Düzenlemek istediğinize eminmisiniz?') ? null : event.preventDefault() "  href="{{route('admin.comments.edit',$comment->id)}}" title="Düzenle"><i class="fas fa-pencil-alt"></i></a>
                                    <!-- Bu alan ajax yapılacak -->
                                    <a class="btn btn-danger btn-action" href="" onclick="event.preventDefault(); return confirm('Silmek istediğinize eminmisiniz?') ? document.getElementById('comment-form-{{$comment->id}}').submit() : null " title="Sil"><i class="fas fa-trash"></i></a>
                                    <form id="comment-form-{{$comment->id}}" action="{{ route('admin.comments.destroy',$comment->id) }}" method="POST" style="display: none;">
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
