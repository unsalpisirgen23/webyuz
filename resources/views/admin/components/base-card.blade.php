<div class="col-lg-{{$lg}} col-md-{{$md}} col-sm-{{$sm}}">
    <div class="card  {{$class}}">
        <div class="card-header p-0">
            {{$title}}
        </div>
        <div class="card-body">
            @yield("component-content")
        </div>
    </div>
</div>
