<section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner" role="listbox">
          @if(isset($sliders))
                @php $line = 0; @endphp
              @foreach($sliders as $slider)
                  <!-- Slide 1 -->
                      <div class="carousel-item  {{$line == 0 ? "active" : ""}}" style="background-image: url({{$slider->image_url}});background-size: cover;background-repeat: no-repeat;">
                          <div class="carousel-container">
                              <div class="carousel-content animate__animated animate__fadeInUp">
                                  <h2>{{$slider->title}}</h2>
                                  <p>{!! $slider->description !!}</p>
                              </div>
                          </div>
                      </div>
                      @php $line++; @endphp
              @endforeach
          @endif
        </div>
        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bx bx-left-arrow" aria-hidden="true"></span>
        </a>
        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon bx bx-right-arrow" aria-hidden="true"></span>
        </a>
        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
    </div>
</section>