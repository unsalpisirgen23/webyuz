<section id="cta" class="cta com-{{$args->component_name}} hook-{{$args->template_hooks_id}} com-id-{{$args->component_widget_id}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 text-center text-lg-left">
                @if(isset($asset->title))
                <h3>{!! $asset->title !!}</h3>
                @endif
                @if(isset($asset->description))
                <p>{!! $asset->description !!}</p>
                @endif
            </div>
            <div class="col-lg-3 cta-btn-container text-center">
                @if(isset($asset->button_title))
                <a class="cta-btn align-middle" href="{!! $asset->button_link !!}">{{$asset->button_title}}</a>
                @endif
            </div>
        </div>
    </div>
</section>