<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
 

  <!-- 
    - favicon
  -->
  <link rel="icon" href="/images/anhot-removebg-preview (5).png" type="image/x-icon" sizes="64x64">
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="/css/style.css">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;500;600;700&display=swap"
    rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="/css/carousel.css">
</head>

<body id="top">

  <!-- 
    - #HEADER
  -->

  <header class="header" data-header>
    <div class="container">

      <a href="#" class="logo" style="width:300px;position:absolute; bottom:20px;">
        <img src="/images/anhot-removebg-preview (5).png" alt="" style="height: 100px;width:120px;" id="imglogo"><p style="left:400px;bottom:50px; position:absolute;">
       
      </a>

      <nav class="navbar container" data-navbar>
        <ul class="navbar-list">

          <li>
            <a href="{{route('index')}}" class="navbar-link" data-nav-link>Trang chủ</a>
          </li>

          <li>
            <a href="{{route('lend')}}" class="navbar-link" data-nav-link>Thuê</a>
          </li>
  
       

          <li>
            <a href="{{route('post.index')}}" class="navbar-link" data-nav-link>Bài viết</a>
          </li>
          <li>
            <a href="{{route('testimonial')}}" class="navbar-link" data-nav-link>Đánh giá</a>
          </li>
          <li>
            <a href="{{route('showintro')}}" class="navbar-link" data-nav-link>Giới thiệu</a>
          </li>

          <li>
            <a href="{{route('linktopage')}}" class="navbar-link" data-nav-link>Liên Hệ</a>
          </li>
         
        </ul>
      </nav>
      @if(Auth::check())
      <!-- Nếu người dùng đã đăng nhập -->
      <div class="dropdown">
        <a style="with:500px;padding:1px;padding-right:15px;box-sizing:border-box;" class="btn btn-secondary dropdown-toggle" id="dropdownMenuButton">
      
          <img src="{{ asset('uploads/' . Auth::user()->avatar) }}" alt="Avatar" style=" font-size:20px;width: 30px; height: 30px; border-radius: 50%; margin-left:120px; margin-top:10px;">
          <p style="font-size:15px;width:100px; position:relative;bottom:20px;left:10px;">Xin chào, {{Auth::user()->username}}</p>
         
        </a>
      
        
      
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <!-- Các mục trong dropdown menu -->
            @if(Auth::user()->role == 'admin')
            <a class="dropdown-item" href="{{route('admin.index')}}">Trang admin</a>
            
            @else
              <a class="dropdown-item" href="{{route('user.detail',['id' => Auth::user()->id])}}">Trang user</a>
            @endif
            <a class="dropdown-item" href="#"><form method="POST" action="{{route('login.logout')}}">
              @csrf
              <button type="submit">Đăng xuất</button>
          </form></a>
        </div>
      

    </div>
    
    
  

      
  @else
      <!-- Nếu người dùng chưa đăng nhập -->
      <a href="{{ route('login.index') }}" class="btn btn-secondary" id="btn-login">Đăng nhập</a>
  @endif
  
      <button class="nav-toggle-btn" aria-label="Toggle menu" data-nav-toggler>
        <ion-icon name="menu-outline" aria-hidden="true" class="menu-icon"></ion-icon>
        <ion-icon name="close-outline" aria-hidden="true" class="close-icon"></ion-icon>
      </button>

    </div>
  </header>





  <main>
    @yield('content')
  </main>





  <!-- 
    - #FOOTER
  -->

  <footer class="footer">

    <div class="footer-top">
      <div class="container">

        <div class="footer-brand">

          <a href="#" class="logo">
            <img src="/images/anhot-removebg-preview (5).png" alt="" style="height: 50px;width:50px; display:inline;">
            <p style=" color:white;display:inline; bottom:15px; position: relative;">
              Bunny's homes</p>
          </a>

          <p class="footer-text" style="bottom: 20px;position:relative;">
            Một nền tảng tuyệt vời để mua, bán và cho thuê tài sản của bạn mà không cần bất kỳ đại lý hoặc hoa hồng nào.
          </p>

        </div>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title">Công ty</p>
          </li>

          <li>
            <a href="{{route('showintro')}}" class="footer-link">
              <ion-icon name="chevron-forward"></ion-icon>

              <span class="span">Về chúng tôi</span>
            </a>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="chevron-forward"></ion-icon>

              <span class="span">Dịch vụ</span>
            </a>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="chevron-forward"></ion-icon>

              <span class="span">Giá</span>
            </a>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="chevron-forward"></ion-icon>

              <span class="span">Blog</span>
            </a>
          </li>

          <li>
            <a href="{{route('login.index')}}" class="footer-link">
              <ion-icon name="chevron-forward"></ion-icon>

              <span class="span">Đăng nhập</span>
            </a>
          </li>

        </ul>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title">Liên kết</p>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="chevron-forward"></ion-icon>

              <span class="span">Chính sách và bảo mật</span>
            </a>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="chevron-forward"></ion-icon>

              <span class="span">Quyền riêng tư</span>
            </a>
          </li>

         

          <li>
            <a href="{{route('linktopage')}}" class="footer-link">
              <ion-icon name="chevron-forward"></ion-icon>

              <span class="span">Liên hệ</span>
            </a>
          </li>

        </ul>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title">Thông tin liên hệ</p>
          </li>

          <li class="footer-item">
            <ion-icon name="location-outline"></ion-icon>

            <address class="address" style="width: 300px;">
              Vinhomes Ocean Park, Đa Tốn, Gia Lâm, Hà Nội,Việt Nam<br>
          <br>
              
              <a href="#" class="address-link">Mở bản đồ</a>
            </address>
          </li>

          <li class="footer-item">
            <ion-icon name="mail-outline"></ion-icon>

            <a href="mailto:contact@example.com" class="footer-link">bunnyshomes@gmail.com</a>
          </li>

          <li class="footer-item">
            <ion-icon name="call-outline"></ion-icon>

            <a href="tel:+152534468854" class="footer-link">037 393 7377</a>
          </li>

        </ul>

      </div>
    </div>

    <div class="footer-bottom">
      <div class="container">

        <p class="copyright">
          &copy; 2024 . All Right Remake by Huy <a href="#" class="copyright-link">codewithsadee</a>.
        </p>

        <ul class="social-list">

          <li>
            <a href="https://www.facebook.com/people/Bunnys-home-c%C4%83n-h%E1%BB%99-cao-c%E1%BA%A5p-Ocean-Park/100089241032786/" class="social-link">
              <ion-icon name="logo-facebook"></ion-icon>
            </a>
          </li>

          <li>
            <a href="https://www.instagram.com/bunnyshomesserviceapartment/" class="social-link">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-twitter"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-linkedin"></ion-icon>
            </a>
          </li>

        </ul>

      </div>
    </div>

  </footer>





  <!-- 
    - #BACK TO TOP
  -->

  <a href="#top" class="back-top-btn" aria-label="back to top" data-back-top-btn>
    <ion-icon name="arrow-up" aria-hidden="true"></ion-icon>
  </a>





  <!-- 
    - custom js link
  -->
  <script src="/js/script.js" defer></script>

  <!-- 
    - ionicon link
  -->
  <script src="/js/carousel.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>