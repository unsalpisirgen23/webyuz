@extends("admin.layouts.app")
@section("style")

@endsection
@section("content")

    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4>Son İçerik</h4>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped mb-0" id="myTable">
                        <thead>
                        <tr>
                            <th>Başlık</th>
                            <th>Kategori</th>
                            <th style="width: 140px;">Yazar</th>
                            <th style="width: 140px;">Durum</th>
                            <th style="width: 150px;">İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>

                                <td>
                                    {{$post->title}}
                                </td>


                                <td>
                                    {{\App\Helpers\Category::get_category($post->category_id,"name")}}
                                </td>

                                <td>
                                    <a href="{{route('admin.users.show',$post->user_id)}}" class="font-weight-600">{{\App\Helpers\Post::get_user_name($post->user_id)}}</a>
                                </td>


                                <td>
                                    {!! $post->status == 1 ? '<div class="btn bg-success color="" >Onaylı</div>' : '<div class="btn bg-warning" style="color:#eee">Onaysız</div>'  !!}
                                </td>


                                <td>
                                    <a class="btn btn-primary btn-action mr-1" href="{{route('admin.posts.edit',$post->id)}}" title="Düzenle"><i class="fas fa-pencil-alt"></i></a>
                                    <!-- Bu alan ajax yapılacak -->
                                    <a class="btn btn-danger btn-action" href="" onclick="event.preventDefault(); return confirm('Silmek istediğinize eminmisiniz?') ? document.getElementById('post-form-{{$post->id}}').submit() : null " title="Sil"><i class="fas fa-trash"></i></a>
                                    <form id="post-form-{{$post->id}}" action="{{ route('admin.posts.destroy',$post->id) }}" method="POST" style="display: none;">
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
