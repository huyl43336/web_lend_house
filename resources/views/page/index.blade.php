<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @extends('layouts.layout')
@section('content')
<meta charset="UTF-8">
<link rel="stylesheet" href="/css/contact.css">

<div id="container" style="top:75px;">
    <h1 style="">&bull; Liên hệ với chúng tôi &bull;</h1>
   
    <div class="icon_wrapper">
        <img src="/images/anhot-removebg-preview (5).png" alt="" style="height: 120px;width:120px;">
    </div>
    <form action="{{route('store_contact')}}" method="post" id="contact_form" class="form">
      @csrf
      <div class="name">
        <label for="name">Nhập tên</label>
        <input type="text"  name="name" id="name_input" required>
      </div>
      <div class="email">
        <label for="email">Nhập email</label>
        <input type="email" name="email" id="email_input" required>
      </div>
     
      <div class="telephone">
        <label for="telephone" id="label">Nhập số điện thoại</label>
        <input type="text" name="phone" id="telephone_input" style="padding-top: 10px;" required>
      </div>
      <div class="subject">
        <label for="subject"></label>
        <select name="question" id="subject_input" required>
          <option disabled hidden selected>Câu hỏi thường gặp</option>
          <option>Nhà cho thuê có uy tín không</option>
          <option>Tôi </option>
          <option>I'd like to make a proposal</option>
        </select>
      </div>
      <div class="message">
        <label for="message">Hãy viết nội dung của bạn !</label>
        <textarea name="content" id="message_input" cols="30" rows="5" required style="position: relative; bottom:10px; height:100px; padding-top:10px;"></textarea>
      </div>
      <div class="submit">
        <input type="submit" style="bottom: 20px;"  value="Gửi phản hồi" id="form_button" />
      </div>
      <div class="link">
        <p style="position: relative;margin-top:5px;">Hoặc liên hệ </p>
        <a href="https://www.facebook.com/people/Bunnys-home-c%C4%83n-h%E1%BB%99-cao-c%E1%BA%A5p-Ocean-Park/100089241032786/" style="display: inline;"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="45" height="45" viewBox="0 0 48 48">
            <path fill="#039be5" d="M24 5A19 19 0 1 0 24 43A19 19 0 1 0 24 5Z"></path><path fill="#fff" d="M26.572,29.036h4.917l0.772-4.995h-5.69v-2.73c0-2.075,0.678-3.915,2.619-3.915h3.119v-4.359c-0.548-0.074-1.707-0.236-3.897-0.236c-4.573,0-7.254,2.415-7.254,7.917v3.323h-4.701v4.995h4.701v13.729C22.089,42.905,23.032,43,24,43c0.875,0,1.729-0.08,2.572-0.194V29.036z"></path>
            </svg></a>
            <a href="https://www.instagram.com/bunnyshomesserviceapartment/" style="display: inline;"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="45" height="45" viewBox="0 0 48 48">
                <radialGradient id="yOrnnhliCrdS2gy~4tD8ma_Xy10Jcu1L2Su_gr1" cx="19.38" cy="42.035" r="44.899" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#fd5"></stop><stop offset=".328" stop-color="#ff543f"></stop><stop offset=".348" stop-color="#fc5245"></stop><stop offset=".504" stop-color="#e64771"></stop><stop offset=".643" stop-color="#d53e91"></stop><stop offset=".761" stop-color="#cc39a4"></stop><stop offset=".841" stop-color="#c837ab"></stop></radialGradient><path fill="url(#yOrnnhliCrdS2gy~4tD8ma_Xy10Jcu1L2Su_gr1)" d="M34.017,41.99l-20,0.019c-4.4,0.004-8.003-3.592-8.008-7.992l-0.019-20	c-0.004-4.4,3.592-8.003,7.992-8.008l20-0.019c4.4-0.004,8.003,3.592,8.008,7.992l0.019,20	C42.014,38.383,38.417,41.986,34.017,41.99z"></path><radialGradient id="yOrnnhliCrdS2gy~4tD8mb_Xy10Jcu1L2Su_gr2" cx="11.786" cy="5.54" r="29.813" gradientTransform="matrix(1 0 0 .6663 0 1.849)" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#4168c9"></stop><stop offset=".999" stop-color="#4168c9" stop-opacity="0"></stop></radialGradient><path fill="url(#yOrnnhliCrdS2gy~4tD8mb_Xy10Jcu1L2Su_gr2)" d="M34.017,41.99l-20,0.019c-4.4,0.004-8.003-3.592-8.008-7.992l-0.019-20	c-0.004-4.4,3.592-8.003,7.992-8.008l20-0.019c4.4-0.004,8.003,3.592,8.008,7.992l0.019,20	C42.014,38.383,38.417,41.986,34.017,41.99z"></path><path fill="#fff" d="M24,31c-3.859,0-7-3.14-7-7s3.141-7,7-7s7,3.14,7,7S27.859,31,24,31z M24,19c-2.757,0-5,2.243-5,5	s2.243,5,5,5s5-2.243,5-5S26.757,19,24,19z"></path><circle cx="31.5" cy="16.5" r="1.5" fill="#fff"></circle><path fill="#fff" d="M30,37H18c-3.859,0-7-3.14-7-7V18c0-3.86,3.141-7,7-7h12c3.859,0,7,3.14,7,7v12	C37,33.86,33.859,37,30,37z M18,13c-2.757,0-5,2.243-5,5v12c0,2.757,2.243,5,5,5h12c2.757,0,5-2.243,5-5V18c0-2.757-2.243-5-5-5H18z"></path>
                </svg></a>
                <a href="https://www.instagram.com/bunnyshomesserviceapartment/" style="display: inline;">
                  <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="45" height="45" viewBox="0,0,256,256">
                    <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(5.33333,5.33333)"><path d="M15,36v-29.173l-1.211,-0.811c-5.149,2.067 -8.789,7.096 -8.789,12.984v10c0,7.732 6.268,14 14,14h10c4.722,0 8.883,-2.348 11.417,-5.931v-1.069z" fill="#2962ff"></path><path d="M29,5h-10c-1.845,0 -3.601,0.366 -5.214,1.014c-3.333,3.236 -5.786,8.514 -5.786,12.986c0,6.771 0.936,10.735 3.712,14.607c0.216,0.301 0.357,0.653 0.376,1.022c0.043,0.835 -0.129,2.365 -1.634,3.742c-0.162,0.148 -0.059,0.419 0.16,0.428c0.942,0.041 2.843,-0.014 4.797,-0.877c0.557,-0.246 1.191,-0.203 1.729,0.083c3.313,1.759 7.193,1.995 10.86,1.995c4.676,0 9.339,-1.04 12.417,-2.916c1.621,-2.285 2.583,-5.07 2.583,-8.084v-10c0,-7.732 -6.268,-14 -14,-14z" fill-opacity="0.98824" fill="#f7f7f7"></path><path d="M36.75,27c-2.067,0 -3.75,-1.683 -3.75,-3.75c0,-2.067 1.683,-3.75 3.75,-3.75c2.067,0 3.75,1.683 3.75,3.75c0,2.067 -1.683,3.75 -3.75,3.75zM36.75,21c-1.24,0 -2.25,1.01 -2.25,2.25c0,1.24 1.01,2.25 2.25,2.25c1.24,0 2.25,-1.01 2.25,-2.25c0,-1.24 -1.01,-2.25 -2.25,-2.25z" fill="#2962ff"></path><path d="M31.5,27h-1c-0.276,0 -0.5,-0.224 -0.5,-0.5v-8.5h1.5z" fill="#2962ff"></path><path d="M27,19.75v0.519c-0.629,-0.476 -1.403,-0.769 -2.25,-0.769c-2.067,0 -3.75,1.683 -3.75,3.75c0,2.067 1.683,3.75 3.75,3.75c0.847,0 1.621,-0.293 2.25,-0.769v0.269c0,0.276 0.224,0.5 0.5,0.5h1v-7.25zM24.75,25.5c-1.24,0 -2.25,-1.01 -2.25,-2.25c0,-1.24 1.01,-2.25 2.25,-2.25c1.24,0 2.25,1.01 2.25,2.25c0,1.24 -1.01,2.25 -2.25,2.25z" fill="#2962ff"></path><path d="M21.25,18h-8v1.5h5.321l-5.571,6.5h0.026c-0.163,0.211 -0.276,0.463 -0.276,0.75v0.25h7.5c0.276,0 0.5,-0.224 0.5,-0.5v-1h-5.321l5.571,-6.5h-0.026c0.163,-0.211 0.276,-0.463 0.276,-0.75z" fill="#2962ff"></path></g></g>
                    </svg>
                </a>
                <p style="position: relative; bottom:40px; left:180px; display:inline;"><i class="fa-solid fa-phone"></i> 037 393 7377</p>
                <p style="position: relative; bottom:40px; left:250px; display:inline;"><i class="fa-regular fa-envelope"></i> bunnyshomes@gmail.com</p>
      </div>
    </form><!-- // End form -->
  </div><!-- // End #container -->
  @endsection
</body>
</html>