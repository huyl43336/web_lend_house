@extends('layouts.layout');
@section('content')
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://md-aqil.github.io/images/swiper.min.css">
	<title>Document</title>
<link rel="stylesheet" href="/css/testimonial.css">
		
<section class="spacer">
			
				<div class="testimonial-section">
					<div class="testi-user-img">
					<div class="swiper-container gallery-thumbs"style="background-color: #F2F3EB;">
						  <div class="swiper-wrapper">
							

                            
							@foreach($feedbacks as $feedback)
								  <div class="swiper-slide">
										<img class="u3" src="{{asset('uploads/'.$feedback->users->avatar)}}" alt="">
									</div>
							@endforeach
						 
						 
						  </div>
					  </div>
					</div>
					<div class="user-saying">
						  <div class="swiper-container testimonial">
								  <!-- Additional required wrapper -->
								  <div class="swiper-wrapper ">
									  <!-- Slides -->
									  @foreach($feedbacks as $feedback)
									  <div class="swiper-slide">
										  <div class="quote">
												  <img class="quote-icon" src="https://md-aqil.github.io/images/quote.png" alt="">
											  <p>
													  “{{$feedback->content}}“
											  </p>
											  <div class="name">-{{$feedback->name}}-</div>
											  <div class="designation">Người dùng</div>
											  
										  </div>
									  </div>
									 
									  @endforeach
									  
								  </div>
								  <!-- If we need pagination -->
								  <div class="swiper-pagination swiper-pagination-white"></div>
							  
							  </div>
					</div>
				</div>
			</section>
            <section id="feedback-form">
                <h1>Đánh giá</h1>  
                <div class="form-box"> 
                    <div class="textup"> 
                        <i class="fa fa-solid fa-clock"></i> 
                        Chỉ mất 2 phút thôi mà!! 
                    </div> 
                    <form action="{{route('store_feedback')}}" method="POST">
						@csrf
						@method('POST') 
                        <label for="uname"> 
                            <i class="fa fa-solid fa-user"></i> 
                            Tên
                        </label> 
                        <input type="text" id="uname" 
                               name="name" required> 
              
                        <label for="email"> 
                            <i class="fa fa-solid fa-envelope"></i> 
                            Email
                        </label> 
                        <input type="email" id="email" 
                               name="email" required> 
              
                        <label for="phone"> 
                            <i class="fa-solid fa-phone"></i> 
                            Điện thoại
                        </label> 
                        <input type="tel" id="phone" 
                               name="phone" required> 
              
                        <label> 
                            <i class="fa-solid fa-face-smile"></i> 
                            Dịch vụ của chúng mình có hữu ích không? 
                        </label> 
                        <div class="radio-group"> 
                            <input type="radio" id="yes" 
                                   name="satisfy" value="có hữu ích" checked> 
                            <label for="yes">Có</label> 
              
                            <input type="radio" id="no" 
                                   name="satisfy" value="không hữu ích"> 
                            <label for="no">Không</label> 
                        </div> 
              
                        <label for="msg"> 
                            <i class="fa-solid fa-comments" 
                               style="margin-right: 3px;"></i> 
                            Đóng góp ý kiến để chúng mình phát triển hơn nha! 
                        </label> 
                        <textarea id="msg" name="content" 
                                  rows="4" cols="10" required> 
                        </textarea> 
                        <button type="submit"> 
                            Gửi
                        </button> 
                    </form> 
                </div> 
            </section>
	<script src="https://md-aqil.github.io/images/swiper.min.js"></script>
    <script>

var galleryThumbs = new Swiper('.gallery-thumbs', {
	effect: 'coverflow',
	grabCursor: true,
	centeredSlides: true,
	slidesPerView: '2',
	// coverflowEffect: {
	//   rotate: 50,
	//   stretch: 0,
	//   depth: 100,
	//   modifier: 1,
	//   slideShadows : true,
	// },
	
	coverflowEffect: {
        rotate: 0,
        stretch: 0,
        depth: 50,
        modifier: 6,
        slideShadows : false,
	  },
	  
  });
  
  
var galleryTop = new Swiper('.swiper-container.testimonial', {
	speed: 400,
	spaceBetween: 50,
	autoplay: {
	  delay: 3000,
	  disableOnInteraction: false,
	},
	direction: 'vertical',
	pagination: {
	  clickable: true,
	  el: '.swiper-pagination',
	  type: 'bullets',
	},
	thumbs: {
		swiper: galleryThumbs
	  }
  });
  
    </script>

@endsection