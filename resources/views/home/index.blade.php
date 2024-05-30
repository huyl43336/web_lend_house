@extends('layouts.layout')
@section('title')

Bunny's homes - Sinh thái xanh bên trong thành phố
@endsection
@section('content')
<article class="article">

  <!-- 
    - #HERO
  -->

  <section class="section hero" aria-label="hero">
    <div class="carousel-container">
      <div class="carousel">
        @foreach ($homes as $key => $home)
          <div class="item {{ $key === 0 ? 'active' : '' }}">
            <img src="{{asset('uploads_home/'.$home->carousel)}}" style=""  alt=""/>
            <p class="caption"></p>
          </div>
        @endforeach
      </div>
      
      <button class="btn prev" id="prev"><i class="fa-solid fa-chevron-left"></i></button>
      <button class="btn next" id="next"><i class="fa-solid fa-chevron-right"></i></button>
      <div class="dots"></div>
    </div>
    
      <div class="hero-form-wrapper">
        <div class="form-tab">

          <button class="tab-btn active" data-tab-btn>Thuê nhà</button>
         

        </div>

        <form action="{{route('home_search')}}" class="hero-form" method="GET">

          <div class="input-wrapper">

            <label for="search" class="input-label">Tìm kiếm: *</label>
            
            <input type="search" name="search" id="search" placeholder="Search your home"
              class="input-field">

            <ion-icon name="search-outline"></ion-icon>

          </div>
        
          {{-- <div class="input-wrapper">
            <label for="category" class="input-label">Chọn danh mục:</label>

            <select name="category" id="category" class="dropdown-list">

              <option value="house">House</option>
              <option value="apartment">Apartment</option>
              <option value="offices">Offices</option>
              <option value="townhome">Townhome</option>

            </select>
          </div> --}}
            
          <div class="input-wrapper">
            <label for="bed" class="input-label">Phòng ngủ:</label>
  
            <select name="bed" id="bed" class="dropdown-list">

              <option value="bed">Chọn số phòng</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
             
            </select>
          </div>
          <div class="input-wrapper">
            <label for="bed" class="input-label">Phòng tắm:</label>
  
            <select name="bath" id="bath" class="dropdown-list">

              <option value="bath">Chọn số phòng</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
             
            </select>
          </div>
          <div class="input-wrapper">
            <label for="bed" class="input-label">Diện tích:</label>

            <select name="size" id="bed" class="dropdown-list">

              <option value="size">diện tích</option>
              <option value="1" >12-20 m²</option>
              <option value="2">20-50 m²</option>
              <option value="3">50-70 m²</option>
              <option value="4">70-100 m²</option>
              <option value="4">100-120 m²</option>
            </select>
          </div>
            
            
          <div class="input-wrapper">
            <label for="min-price" class="input-label">Giá thấp nhất :</label>

            <select name="min-price" id="min-price" class="dropdown-list">

              <option value="min price">giá thấp nhất</option>
              <option value="10">10</option>
              <option value="20">20</option>
              <option value="50">50</option>
              <option value="70">70</option>
              <option value="80">80</option>
              <option value="90">90</option>
              <option value="95">95</option>

            </select>
          </div>

          <div class="input-wrapper">
            <label for="max-price" class="input-label">Giá cao nhất :</label>

            <select name="max-price" id="max-price" class="dropdown-list">

              <option value="max price">giá cao nhất</option>
              <option value="100">100</option>
              <option value="120">120</option>
              <option value="200">200</option>
              <option value="300">300</option>
              <option value="400">400</option>
              <option value="500">500</option>
              <option value="600">600</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary" style="height: 42px;width:150px; margin-top:22px; right:245px;">Tìm kiếm</button>
           
         

        </form>
      </div>

    </div>
  </section>





  <!-- 
    - #ABOUT
  -->

  <section class="section about" aria-label="about" id="about">
    <div class="container">

      <div class="about-banner" style="" id="banner-video">
        <video  width="600" height="700"
          class="img-cover" controls>
          <source src="{{asset('/video/review.mp4')}}" type="video/mp4">
            <source src="movie.ogg" type="video/ogg">
        </video>
        
      </div>

      <div class="about-content">

        <h2 class="h2 section-title">Hiệu quả. Minh bạch. Chất lượng.</h2>

        <p class="section-text">
          Dreamhouse đã phát triển một nền tảng cho thị trường Bất động sản cho phép người mua và người bán dễ dàng tự thực hiện giao dịch. Nền tảng này thúc đẩy hiệu quả, tính minh bạch về chi phí và khả năng kiểm soát đến tay người tiêu dùng. Hous là Bất động sản được định nghĩa lại.
        </p>

        <a href="#" class="btn btn-primary">Chi tiết</a>

      </div>

    </div>
  </section>





  <!-- 
    - #SERVICE
  -->
@if(session('success'))
<div class="message" style="background-color:blue;">
<p>{{session('success')}}</p>
</div>
@endif


  <section class="section service" aria-label="service" id="service">
    <div class="container">

      <h2 class="h2 section-title">Cách vận hành</h2>

      <p class="section-text">
        Một nền tảng tuyệt vời để mua, bán và cho thuê tài sản của bạn mà không cần bất kỳ đại lý hoặc hoa hồng nào.
      </p>

      <ul class="service-list">

        <li>
          <div class="service-card">

            <div class="card-icon">
              <ion-icon name="home-outline"></ion-icon>
            </div>

            <h3 class="h3 card-title">Đánh Giá Tài Sản</h3>

            <p class="card-text">
              If the distribution of letters and 'words' is random, the reader will not be distracted from making.
            </p>

          </div>
        </li>

        <li>
          <div class="service-card">

            <div class="card-icon">
              <ion-icon name="briefcase-outline"></ion-icon>
            </div>

            <h3 class="h3 card-title">Gặp gỡ với chủ đầu tư</h3>

            <p class="card-text">
              If the distribution of letters and 'words' is random, the reader will not be distracted from making.
            </p>

          </div>
        </li>

        <li>
          <div class="service-card">

            <div class="card-icon">
              <ion-icon name="key"></ion-icon>
            </div>

            <h3 class="h3 card-title">Đóng giao dịch</h3>

            <p class="card-text">
              If the distribution of letters and 'words' is random, the reader will not be distracted from making.
            </p>

          </div>
        </li>

      </ul>

    </div>
  </section>





  <!-- 
    - #PROPERTY
  -->

  <section class="section property" aria-label="property" id="property">
    <div class="container">

      <h2 class="h2 section-title">Top nhà nổi bật</h2>

      <p class="section-text">
       Dựa trên lượt thích của khách hàng
      </p>

      <ul class="property-list">
        @foreach($houses as $house)
        
        <li>
          <a href="{{route('house.index',$house->id)}}">
          <div class="property-card">

            <figure class="card-banner img-holder" style="--width: 800; --height: 533;">
              @foreach($house->imagePosts->take(1) as $imagePost)
              <img src="{{asset('uploads_house/'.$imagePost->image_url)}}" width="800" height="533" loading="lazy"
                alt="10765 Hillshire Ave, Baton Rouge, LA 70810, USA" class="img-cover">
                @endforeach
            </figure>

            <button class="card-action-btn" aria-label="add to favourite">
              <ion-icon name="heart" aria-hidden="true"></ion-icon>
            </button>

            <div class="card-content">

              <h3 class="h3">
                <a href="{{route('house.index',$house->id)}}" class="card-title">{{$house->area}}</a>
              </h3>

              <ul class="card-list">

                <li class="card-item">
                  <div class="item-icon">
                    <ion-icon name="cube-outline"></ion-icon>
                  </div>

                  <span class="item-text">{{$house->size}} m²</span>
                </li>

                <li class="card-item">
                  <div class="item-icon">
                    <ion-icon name="bed-outline"></ion-icon>
                  </div>

                  <span class="item-text">{{$house->bed}} phòng ngủ</span>
                </li>

                <li class="card-item">
                  <div class="item-icon">
                    <ion-icon name="man-outline"></ion-icon>
                  </div>

                  <span class="item-text">{{$house->bath}} phòng vệ sinh</span>
                </li>

              </ul>

              <div class="card-meta">

                <div>
                  <span class="meta-title">Giá</span>

                  <span class="meta-text">{{$house->price}}</span>
                </div>

                <div>
                  <span class="meta-title">Lượt thích</span>

                  <span class="meta-text">

                    <div class="rating-wrapper">
                      <ion-icon name="heart" style="color: red;"></ion-icon>
                     
                    </div>

                    <span>{{ $likeCounts[$house->id]->total_likes ?? 0 }}</span>

                  </span>
                </div>

              </div>

            </div>

          </div>
        </a>
        </li>
     
        @endforeach
        {{-- <li>
          <div class="property-card">

            <figure class="card-banner img-holder" style="--width: 800; --height: 533;">
              <img src="https://thietkechungcu.info/uploaded/H%C3%B2a%20%C4%91z/s1.061512A9%201PN%2B1%20-ocp/1PN%2B1_5_large.jpg" width="800" height="533" loading="lazy"
                alt="59345 STONEWALL DR, Plaquemine, LA 70764, USA" class="img-cover">
            </figure>

            <button class="card-action-btn" aria-label="add to favourite">
              <ion-icon name="heart" aria-hidden="true"></ion-icon>
            </button>

            <div class="card-content">

              <h3 class="h3">
                <a href="#" class="card-title">XWRV+33M, Đại Dương 8, Đa Tốn, Gia Lâm, Hà Nội</a>
              </h3>

              <ul class="card-list">

                <li class="card-item">
                  <div class="item-icon">
                    <ion-icon name="cube-outline"></ion-icon>
                  </div>

                  <span class="item-text">100m^2</span>
                </li>

                <li class="card-item">
                  <div class="item-icon">
                    <ion-icon name="bed-outline"></ion-icon>
                  </div>

                  <span class="item-text">3 phòng ngủ</span>
                </li>

                <li class="card-item">
                  <div class="item-icon">
                    <ion-icon name="man-outline"></ion-icon>
                  </div>

                  <span class="item-text">4 phòng vệ sinh</span>
                </li>

              </ul>

              <div class="card-meta">

                <div>
                  <span class="meta-title">Giá</span>

                  <span class="meta-text">9.100.000 VNĐ</span>
                </div>

                <div>
                  <span class="meta-title">Đánh giá</span>

                  <span class="meta-text">

                    <div class="rating-wrapper">
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                    </div>

                    <span>5.0(30)</span>

                  </span>
                </div>

              </div>

            </div>

          </div>
        </li> --}}

        {{-- <li>
          <div class="property-card">

            <figure class="card-banner img-holder" style="--width: 800; --height: 533;">
              <img src="https://tuyetmy.com.vn/public/upload/noi-that-vinhomes-ocean-park-msNhung-7.jpg" width="800" height="533" loading="lazy"
                alt="3723 SANDBAR DR, Addis, LA 70710, USA" class="img-cover">
            </figure>

            <button class="card-action-btn" aria-label="add to favourite">
              <ion-icon name="heart" aria-hidden="true"></ion-icon>
            </button>

            <div class="card-content">

              <h3 class="h3">
                <a href="#" class="card-title">Sảnh tòa S2.05, Vinhomes Ocean Park, Gia Lâm, Hà Nội</a>
              </h3>

              <ul class="card-list">

                <li class="card-item">
                  <div class="item-icon">
                    <ion-icon name="cube-outline"></ion-icon>
                  </div>

                  <span class="item-text">100m^2</span>
                </li>

                <li class="card-item">
                  <div class="item-icon">
                    <ion-icon name="bed-outline"></ion-icon>
                  </div>

                  <span class="item-text">3 phòng ngủ</span>
                </li>

                <li class="card-item">
                  <div class="item-icon">
                    <ion-icon name="man-outline"></ion-icon>
                  </div>

                  <span class="item-text">4 phòng vệ sinh</span>
                </li>

              </ul>

              <div class="card-meta">

                <div>
                  <span class="meta-title">Giá</span>

                  <span class="meta-text">8.500.000 VNĐ</span>
                </div>

                <div>
                  <span class="meta-title">Đánh giá</span>

                  <span class="meta-text">

                    <div class="rating-wrapper">
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                    </div>

                    <span>5.0(30)</span>

                  </span>
                </div>

              </div>

            </div>

          </div>
        </li> --}}

        {{-- <li>
          <div class="property-card">

            <figure class="card-banner img-holder" style="--width: 800; --height: 533;">
              <img src="https://file4.batdongsan.com.vn/resize/745x510/2021/10/25/20211025102204-ff2e_wm.jpg" width="800" height="533" loading="lazy"
                alt="LOT 21 ROYAL OAK DR, Prairieville, LA 70769, USA" class="img-cover">
            </figure>

            <button class="card-action-btn" aria-label="add to favourite">
              <ion-icon name="heart" aria-hidden="true"></ion-icon>
            </button>

            <div class="card-content">

              <h3 class="h3">
                <a href="#" class="card-title">Biển Hồ, Vinhomes Ocean Park, Gia Lâm, Hà Nội 12426</a>
              </h3>

              <ul class="card-list">

                <li class="card-item">
                  <div class="item-icon">
                    <ion-icon name="cube-outline"></ion-icon>
                  </div>

                  <span class="item-text">120m^2</span>
                </li>

                <li class="card-item">
                  <div class="item-icon">
                    <ion-icon name="bed-outline"></ion-icon>
                  </div>

                  <span class="item-text">4 phòng ngủ</span>
                </li>

                <li class="card-item">
                  <div class="item-icon">
                    <ion-icon name="man-outline"></ion-icon>
                  </div>

                  <span class="item-text">4 phòng vệ sinh</span>
                </li>

              </ul>

              <div class="card-meta">

                <div>
                  <span class="meta-title">Giá</span>

                  <span class="meta-text">9.500.000 VNĐ</span>
                </div>

                <div>
                  <span class="meta-title">Đánh giá</span>

                  <span class="meta-text">

                    <div class="rating-wrapper">
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                    </div>

                    <span>5.0(30)</span>

                  </span>
                </div>

              </div>

            </div>

          </div>
        </li> --}}

        {{-- <li>
          <div class="property-card">

            <figure class="card-banner img-holder" style="--width: 800; --height: 533;">
              <img src="https://greenhomeluxury.vn/wp-content/uploads/2022/06/z3799546611955_80c439537b8132f74c3dab9e39a6e06b.jpg" width="800" height="533" loading="lazy"
                alt="710 BOYD DR, Unit #1102, Baton Rouge, LA 70808, USA" class="img-cover">
            </figure>

            <button class="card-action-btn" aria-label="add to favourite">
              <ion-icon name="heart" aria-hidden="true"></ion-icon>
            </button>

            <div class="card-content">

              <h3 class="h3">
                <a href="#" class="card-title">XWVR+VJ4, Hải Đăng 2, Đa Tốn, Gia Lâm, Hà Nội</a>
              </h3>

              <ul class="card-list">

                <li class="card-item">
                  <div class="item-icon">
                    <ion-icon name="cube-outline"></ion-icon>
                  </div>

                  <span class="item-text">130m^2</span>
                </li>

                <li class="card-item">
                  <div class="item-icon">
                    <ion-icon name="bed-outline"></ion-icon>
                  </div>

                  <span class="item-text">4 phòng</span>
                </li>

                <li class="card-item">
                  <div class="item-icon">
                    <ion-icon name="man-outline"></ion-icon>
                  </div>

                  <span class="item-text">4 phòng vệ sinh</span>
                </li>

              </ul>

              <div class="card-meta">

                <div>
                  <span class="meta-title">Giá</span>

                  <span class="meta-text">10.000.000 VND</span>
                </div>

                <div>
                  <span class="meta-title">Đánh giá</span>

                  <span class="meta-text">

                    <div class="rating-wrapper">
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                    </div>

                    <span>5.0(30)</span>

                  </span>
                </div>

              </div>

            </div>

          </div>
        </li> --}}

        {{-- <li>
          <div class="property-card">

            <figure class="card-banner img-holder" style="--width: 800; --height: 533;">
              <img src="https://royalpalacedesign.vn/wp-content/uploads/2023/02/thi-cong-noi-that-chung-cu1-1.jpg" width="800" height="533" loading="lazy"
                alt="5133 MCLAIN WAY, Baton Rouge, LA 70809, USA" class="img-cover">
            </figure>

            <button class="card-action-btn" aria-label="add to favourite">
              <ion-icon name="heart" aria-hidden="true"></ion-icon>
            </button>

            <div class="card-content">

              <h3 class="h3">
                <a href="#" class="card-title">Sảnh tòa S2.05, Vinhomes Ocean Park, Gia Lâm, Hà Nội</a>
              </h3>

              <ul class="card-list">

                <li class="card-item">
                  <div class="item-icon">
                    <ion-icon name="cube-outline"></ion-icon>
                  </div>

                  <span class="item-text">120m^2</span>
                </li>

                <li class="card-item">
                  <div class="item-icon">
                    <ion-icon name="bed-outline"></ion-icon>
                  </div>

                  <span class="item-text">3 phòng ngủ</span>
                </li>

                <li class="card-item">
                  <div class="item-icon">
                    <ion-icon name="man-outline"></ion-icon>
                  </div>

                  <span class="item-text">4 phòng vệ sinh</span>
                </li>

              </ul>

              <div class="card-meta">

                <div>
                  <span class="meta-title">Giá</span>

                  <span class="meta-text">9.000.000 VNĐ </span>
                </div>

                <div>
                  <span class="meta-title">Đánh giá</span>

                  <span class="meta-text">

                    <div class="rating-wrapper">
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                    </div>

                    <span>5.0(30)</span>

                  </span>
                </div>

              </div>

            </div>

          </div>
        </li> --}}

      </ul>

    </div>
  </section>





  <!-- 
    - #CONTACT
  -->

  <section class="section contact" aria-label="contact" id="contact">
    <div class="container">

      <h2 class="h2 section-title">Bạn có câu hỏi ? Hãy liên lạc với chúng tôi!</h2>

      <p class="section-text">
        Một nền tảng tuyệt vời để mua, bán và cho thuê tài sản của bạn mà không cần bất kỳ đại lý hoặc hoa hồng nào.
      </p>
<a href="{{route('linktopage')}}">
      <button class="btn btn-primary">
        <ion-icon name="call-outline"></ion-icon>

        <span class="span">Liên hệ với chúng tôi</span>
      </button>
</a>
    </div>
  </section>





  <!-- 
    - #NEWSLETTER
  -->

 

</article>
@endsection