<section id="topbar"  class="d-flex align-items-center {{@$args->component_name}}" data-id="{{@$args->thcw_id}}">
    <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
            <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:{!! $settings->site_email !!}">{!! $settings->site_email !!}</a></i>
            <i class="bi bi-phone d-flex align-items-center ms-4"><span>{!! $settings->site_phone !!}</span></i>
        </div>
        <div class="social-links d-none d-md-flex align-items-center">
            <a href="{{ $settings->site_twitter  }}" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="{!! $settings->site_facebook !!}" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="{!! $settings->site_instagram !!}" class="instagram"><i class="bi bi-instagram"></i></a>
        </div>
    </div>
</section>