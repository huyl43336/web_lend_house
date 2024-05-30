@extends('layouts.layout')
@section('content')


<style>
    .int{
        width: 100%;
        height: 600px;
        position: relative;
        margin-top: 150px;
        
    }
    .iphone15{
        left: 35%;
        position: absolute;
        height: 600px;
        width: 300px;
        background-color:white;
        border:8px solid black;
        border-top-left-radius: 40px;
    border-top-right-radius: 40px;
    border-bottom-left-radius: 50px;
    border-bottom-right-radius: 50px;
   
    }
    .dynamic{
        width: 80px;
        height: 20px;
        background-color: black;
        position: absolute;
        border-radius: 20px;
        left: 35%;
        top: 2%;
    }
    .button{
        background-color: black;
        height: 60px;
        width: 8px;
        position: absolute;
        left: 53%;
        border-top-right-radius: 40px;
        border-bottom-right-radius: 40px;
        top:30%;
    }
    .back{
        background-color: #4E4F51;
        height: 600px;
        width: 320px;
        border-top-left-radius: 40px;
        border-bottom-left-radius: 50px;
        margin-left: 420px;
        position: absolute;
        z-index: -1;
    }
#si{
    margin-top: 75%;
    color: #2E2F31;
     font-size:80px;
     margin-left: 34%;
}
#img{
    height: 150px;
    width: 150px;
    position: absolute;
    top: 2%;
    left: 5px;
}



@keyframes fadeEffect {
    from { opacity: 0; }
    to { opacity: 1; }
}

.slideshow-container {
    width: 288px;
    height: 585px;
    background-color: aqua;
    position: relative;
  bottom: 1px;
  right: 2px;

    border-top-left-radius: 38px;
    border-top-right-radius: 40px;
    border-bottom-left-radius: 40px;
    border-bottom-right-radius: 40px;
}
.fade {
    display: none;
    animation: fadeEffect 1s;
    
}
.bn{
    width: 288px;
    height: 585px;
    border-top-left-radius: 37px;
    border-top-right-radius: 37px;
    border-bottom-left-radius: 39px;
    border-bottom-right-radius: 39px;
}
.contentmain{
    margin-left: 60%;
}
.h1{
    color: black;
    font-family: 'Times New Roman', Times, serif;
   right: 10%;
    position: relative;
}
.p{
    color: black;
    font-family: 'Times New Roman', Times, serif;
    font-size: 20px; 
    right: 10%;
    position: relative;
   
}
hr{
    position: relative;
    right: 10%;
}
</style>
<div class="int">
    <div class="iphone15">
        <div class="slideshow-container">
            <div class="slide fade">
                <img src="https://th.bing.com/th/id/R.ad4e382bdf215891304f1537bfac5d3e?rik=8Q7rwlVLE4b15A&pid=ImgRaw&r=0" style="width:100%" class="bn">
            </div>
        
            <div class="slide fade">
                <img src="https://www2.hopperhq.com/wp-content/uploads/2018/05/Screenshot_20180514-150500_Instagram.jpg" style="width:100%" class="bn">
            </div>
        
            <div class="slide fade">
                <img src="https://th.bing.com/th/id/OIP.Pjm3O03OsQq-jY86EqVTcgAAAA?rs=1&pid=ImgDetMain" style="width:100%" class="bn">
            </div>
            <div class="slide fade">
                <img src="https://scontent.fhan5-10.fna.fbcdn.net/v/t39.30808-6/320412309_535954558259674_7306699630726534408_n.jpg?_nc_cat=101&ccb=1-7&_nc_sid=5f2048&_nc_ohc=8IyNUjmilvUQ7kNvgGBX67t&_nc_ht=scontent.fhan5-10.fna&oh=00_AfDSejvA_B7viPieS5sTA_wDAtynSN4qpH27bCO342W9WA&oe=663F9AE7" style="width:100%" class="bn">
            </div>
        </div>
        
    <div class="dynamic"></div>

    </div>
    <div class="button">

    </div>
    <div class="back">
        <i class="fa-brands fa-apple" style="" id="si"></i>
        <div class="camera">
        <img src="{{ asset('/images/camera-Photoroom.png-Photoroom.png')}}" alt="" id="img">
        </div>
    </div>
    <div class="contentmain">
        <h1 class="h1">Về chúng tôi</h1>
        <hr>
        <p class="p">Trang web thuê nhà là một nền tảng trực tuyến giúp người dùng dễ dàng tìm kiếm và thuê các loại bất động sản, bao gồm căn hộ, văn phòng, cửa hàng, và nhà kho. Với giao diện thân thiện và các tính năng tìm kiếm đa dạng, trang web cho phép người dùng dễ dàng lọc và so sánh các tùy chọn thuê nhà dựa trên các yếu tố như vị trí, diện tích, loại hình bất động sản, và mức giá.
              <br>
            Mỗi bất động sản trên trang web đi kèm với thông tin chi tiết và hình ảnh minh họa, giúp người dùng có cái nhìn tổng quan và rõ ràng về từng lựa chọn. Đồng thời, tính năng đánh giá và đánh giá từ người dùng khác cũng giúp tăng tính minh bạch và đáng tin cậy của các thông tin.
            <br>
            Bên cạnh đó, trang web cũng cung cấp dịch vụ hỗ trợ trực tuyến để giải đáp mọi thắc mắc và hỗ trợ người dùng trong quá trình tìm kiếm và thuê nhà. Điều này giúp tạo ra một trải nghiệm thuê nhà trực tuyến thuận lợi và tiện lợi cho người dùng, đặc biệt là đối với các doanh nghiệp nhỏ có nhu cầu tìm kiếm không gian kinh doanh phù hợp.</p>
    </div>
</div>
<script>
    let slideIndex = 0;
showSlides();

function showSlides() {
    let i;
    const slides = document.getElementsByClassName("slide");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}
    slides[slideIndex-1].style.display = "block";
    setTimeout(showSlides, 5000); // Chuyển slide sau mỗi 5 giây
}

</script>
@endsection