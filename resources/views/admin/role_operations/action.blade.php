@extends("admin.layouts.app")
@section("style")
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap4-duallistbox/4.0.2/bootstrap-duallistbox.min.css" integrity="sha512-BcFCeKcQ0xb020bsj/ZtHYnUsvPh9jS8PNIdkmtVoWvPJRi2Ds9sFouAUBo0q8Bq0RA/RlIncn6JVYXFIw/iQA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section("content")
    <div id="app">
        <section class="section">
            {!! import("admin.components.breadcrumb",['content'=>'Role Kullanıcı Atama']) !!}
            <div class="section-body">
                <form action="{{route("admin.user_roles.save",$id)}}" method="post" id="demoform">
                @csrf
                <!-- Main Content -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7">
                                            <select multiple="multiple" size="10" id="user-roles-select" name="user_id[]">
                                               @foreach($users as $user)
                                                    <option value="{{$user->id}}" {{userRoleSelect($id,$user->id) ? "selected" : ""}} >{{$user->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7">
                                            <button class="btn btn-primary btn-block">Kaydet</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
@section("script")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap4-duallistbox/4.0.2/jquery.bootstrap-duallistbox.min.js" integrity="sha512-l/BJWUlogVoiA2Pxj3amAx2N7EW9Kv6ReWFKyJ2n6w7jAQsjXEyki2oEVsE6PuNluzS7MvlZoUydGrHMIg33lw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var demo1 = $('select[name="user_id[]"]').bootstrapDualListbox({
            nonSelectedListLabel: 'Non-selected',
            selectedListLabel: 'Selected',
            preserveSelectionOnMove: 'moved',
            moveOnSelect: true,
        });

        /*
        $("#demoform").submit(function() {
             var user_id = $('[name="user_id[]"]').val();
             $.ajax({
                 url:"{{-- route("admin.user_roles.save",4) --}}",
                 type:"POST",
                 data
             })

            return false;
        });
      */

    </script>
@stop