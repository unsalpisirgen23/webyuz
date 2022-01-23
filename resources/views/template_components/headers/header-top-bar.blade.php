<section id="topbar"  class="d-flex align-items-center {{@$args->component_name}}" data-id="{{@$args->thcw_id}}">
    <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
            <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:{!! @$item->email !!}">{!! @$item->email !!}</a></i>
            <i class="bi bi-phone d-flex align-items-center ms-4"><span>{!! @$item->phone !!}</span></i>
        </div>
        <div class="social-links d-none d-md-flex align-items-center">
            <a href="{{ @$item->twitter  }}" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="{!! @$item->facebook !!}" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="{!! @$item->instagram !!}" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="{!! @$item->linkedin !!}" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
        </div>
    </div>
</section>