@extends('layouts.app')

@section('content')

            <div class="row mb-4">
                <div class="col">

                    <div class="card">
                        <div class="card-header">
                            <h4>Nome da trilha</h4>
                        </div>
                        <div class="card-body">
                            <div class="slick-trilhas trilhas">

                                <div class="item">
                                    <a href="">
                                        <img src="{{ asset('img/1.webp') }}" alt="">
                                    </a>
                                </div>
                                
                                <div class="item">
                                    <a href="">
                                        <img src="{{ asset('img/2.webp') }}" alt="">
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="">
                                        <img src="{{ asset('img/3.webp') }}" alt="">
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="">
                                        <img src="{{ asset('img/4.webp') }}" alt="">
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="">
                                        <img src="{{ asset('img/1.webp') }}" alt="">
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="">
                                        <img src="{{ asset('img/2.webp') }}" alt="">
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="">
                                        <img src="{{ asset('img/3.webp') }}" alt="">
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="">
                                        <img src="{{ asset('img/4.webp') }}" alt="">
                                    </a>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col">

                    <div class="card">
                        <div class="card-header">
                            <h4>Nome da trilha</h4>
                        </div>
                        <div class="card-body">
                            <div class="slick-trilhas trilhas">
                                <div class="item">
                                    <a href="">
                                        <img src="{{ asset('img/1.webp') }}" alt="">
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="">
                                        <img src="{{ asset('img/2.webp') }}" alt="">
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="">
                                        <img src="{{ asset('img/3.webp') }}" alt="">
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="">
                                        <img src="{{ asset('img/4.webp') }}" alt="">
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="">
                                        <img src="{{ asset('img/1.webp') }}" alt="">
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="">
                                        <img src="{{ asset('img/2.webp') }}" alt="">
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="">
                                        <img src="{{ asset('img/3.webp') }}" alt="">
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="">
                                        <img src="{{ asset('img/4.webp') }}" alt="">
                                    </a>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col">

                    <div class="card">
                        <div class="card-header">
                            <h4>Nome da trilha</h4>
                        </div>
                        <div class="card-body">
                            <div class="slick-trilhas trilhas">
                                <div class="item">
                                    <a href="">
                                        <img src="{{ asset('img/1.webp') }}" alt="">
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="">
                                        <img src="{{ asset('img/2.webp') }}" alt="">
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="">
                                        <img src="{{ asset('img/3.webp') }}" alt="">
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="">
                                        <img src="{{ asset('img/4.webp') }}" alt="">
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="">
                                        <img src="{{ asset('img/1.webp') }}" alt="">
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="">
                                        <img src="{{ asset('img/2.webp') }}" alt="">
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="">
                                        <img src="{{ asset('img/3.webp') }}" alt="">
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="">
                                        <img src="{{ asset('img/4.webp') }}" alt="">
                                    </a>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>


@endsection

@section('scripts')
<script>
   var $trilhas =  $('.slick-trilhas').slick({
  dots: false,
  infinite: false,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 4,

  prevArrow:'<button type="button" class="slick-prev-custom"><i class="fa-solid fa-angle-left"></i></button>',
  nextArrow:'<button type="button" class="slick-next-custom"><i class="fa-solid fa-angle-right"></i></button>',
 
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});


</script>
@endsection