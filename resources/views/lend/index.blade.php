<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @section('title')

thuê nhà
        @endsection
   <link rel="stylesheet" href="/css/lend.css">
   <style>
    .pagination {
      position: relative;
          margin-top: 20px;
          justify-content: start;
        margin-left: 40%;

      }
      .pagination ul {
          list-style: none;
          padding: 0;
          margin: 0;
      }
      .pagination ul li {
          display: inline-block;
          margin-right: 5px;
      }
      .pagination ul li a {
          display: block;
          padding: 5px 10px;
          background-color: #f2f2f2;
          text-decoration: none;
          color: #333;
      }
      .pagination ul li a.active {
          background-color: #007bff;
          color: #fff;
      }
      #deleteButton{
        margin-bottom: 15px;
        height: 59,0625px;
        background-color: saddlebrown;
      }
      .app-content-headerButton{
        text-decoration: none;
        padding-top: 5px;
      }


      .slideshow-container {
    height: 1000px;
    width: 200px;
    position: fixed;
   
   top:150px;
  
   
}

.slide {
    height: 1000px;
    width: 200px;
    display: none;

}

.fade {
    animation-name: fade;
    animation-duration: 1.5s;
    height: 600px;
    width: 250px;
   
    
}
.fade img{
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px;
    
}
@keyframes fade {
    from {opacity: .4} 
    to {opacity: 1}
}


.marquee-vertical {
  background-image: url('https://media.istockphoto.com/id/1246349776/vector/simple-frame-border-vector-element.jpg?s=612x612&w=0&k=20&c=lFFMl_kjrBE8GorcN8H0ASUug-Btev3MzTyet_Sg3VQ=');
  position: relative;
  width: 400px;
  height: 320px;
  overflow: hidden;
  border: 1px solid #ccc;
  left: 75%;
  bottom: 298vh;
  background-size: cover;
  background-repeat: no-repeat;
}

.comment-container {
  position: relative;
  width: 320px;
  height: 250px;
  overflow: hidden;
  border: 1px solid #ccc;
  left: 12%;
  top: 5%;
}

.comment {
  position: absolute;
  width: 100%;
 box-sizing: border-box;

  top:100%;
  bottom: 50%;

  animation: slideDown linear infinite;
}
.comment span{
    position: relative;
    margin-bottom: 20%;
    bottom: 20%;
}
.comment span p {
    position: relative;
  bottom: 20%;
}

@keyframes slideDown {
  0% {
    top: -100%;
  }
  100% {
    top: 100%;
  }
}




  

      </style>
</head>
<body>
    @extends('layouts.layout')

    
    @php $count = 0; @endphp
@section('content')

    <form action="{{route('search_house')}}" method="GET" style="height: 50px;width:800px;"  class="search-container" id="formcuss">
    <input type="text" placeholder="Tìm kiếm..." name="search" value="" style="">
    <button type="submit"><i class="fa fa-search"></i></button>
    </form>
   
  <h1 id="h1">Danh sách nhà thuê</h1>
@foreach($houses as $house)
<a class="lend" href="{{route('house.index',$house->id)}}">
 
    <div class="card-images">
     
        @foreach($house->imagePosts->take(4) as $key => $imagePost)
        <img src="{{ asset('uploads_house/' . $imagePost->image_url) }}" alt="" class="img{{$key+1}}">
    @endforeach
        {{-- <img src="" alt="" class="img1">
        <img src="" alt="" class="img2">
        <img src="" alt="" class="img3">
        <img src="" alt="" class="img4" id="im4"> --}}
    </div>

   
    <div class="contentt">
        <h3>{{$house->title}}</h3>
        <div class="items">
            <span class="spand">{{$house->price}} triệu/tháng</span>
            <span class="spand">{{$house->size}} m²</span>
            <span class="spand"> 111,5 tr/m²</span>
            <span class="spand">{{$house->area}}</span>
            <span class="spand">{{$house->bed}} <i class="fa-solid fa-bed"></i></span>
            <span class="spand">{{$house->bath}} <i class="fa-solid fa-bath"></i></span>
            
        </div>
        <p id="para">
            {{$house->content}}
           </p>
            <hr>
    </div>
    <div class="contacts" style="">
        

        <div class="profile">
            <img src="{{asset('uploads/'.$house->users->avatar)}}" alt=""class="avt">
            <div class="name">{{$house->author}}</div>
            @if($house->created_at == $house->updated_at)
            <span id="time" class="spand">{{date('d/m/Y H:i', strtotime($house->created_at))}}</span>
            @else
            <span id="time" class="spand">{{date('d/m/Y H:i', strtotime($house->updated_at))}}</span>
            @endif
                </div>
           
            </div>
</a>
 
 @endforeach

 @if ($houses->lastPage() > 1)
  <div class="pagination">
      <ul>
          <li><a href="{{ $houses->url(1) }}">Đầu</a></li>
          @for ($i = 1; $i <= $houses->lastPage(); $i++)
              <li><a class="{{ $houses->currentPage() == $i ? 'active' : '' }}" href="{{ $houses->url($i) }}">{{ $i }}</a></li>
          @endfor
          <li><a href="{{ $houses->url($houses->lastPage()) }}">Cuối</a></li>
      </ul>
  </div>
  @endif
  
  </div>
  {{-- <div class="posts">
    <div class="tit">
        Bài viết được quan tâm
    </div>
    <div class="po">
        @foreach($posts as $index =>$post)
     
        <a href="">{{$index+1}}.
         {{$post->content}}
        </a>
        @endforeach
    </div>
    <hr>
  </div> --}}
  {{-- <div class="banners" id="left">
    <img src="https://th.bing.com/th/id/OIP.MvhiBCdAAKXvbaycAQbS1QHaHa?w=1920&h=1920&rs=1&pid=ImgDetMain" alt="" class="banners">
  </div>
  <div class="banners" id="right">
    <img src="https://img.freepik.com/free-vector/origami-style-sales-banner_23-2148387262.jpg" alt="">
  </div> --}}
  <div class="marquee-vertical">
    <h3 style="text-align: center;">Đánh giá của khách hàng</h3>
    <div class="comment-container">
      @foreach($feedbacks as $feedback)
        <div class="comment">
          <span style="height: auto; width:100%;">
            <img src="{{asset('uploads/'.$feedback->users->avatar)}}" alt="" style="height: 30px; width:30px;display:inline-block;">
            <p style="width:300px;">{{$feedback->name}}: {{$feedback->content}}</p>
          </span>
        </div>
      @endforeach
    </div>
  </div>
  
<div class="slideshow-container" id="slideshow">
    <div class="slide fade">
        <img src="https://i.pinimg.com/originals/c0/ab/85/c0ab851646f68a1577adbe33f425ff0e.jpg" style="width:100%;height:100%;">
    </div>
    <div class="slide fade">
        <img src="https://cdn.jersey.com/image/upload/w_640,h_640,c_fill,q_80,f_auto,g_auto/v1678094989/Listings/Macoles%20Self%20Catering%20Holidays%20Limited/5034850371_dsc_7741a.jpg" style="width:100%;height:100%;">
    </div>
    <div class="slide fade">
        <img src="https://th.bing.com/th/id/R.4fd37331210421bf8b3af791d0d487b7?rik=iTI6hSqDWDQtbg&riu=http%3a%2f%2fwww.nott.co.nz%2fsites%2fdefault%2ffiles%2fstyles%2flarge%2fpublic%2fblog%2fnott-architects-kotare-living.jpg%3fitok%3dnL3Yw3z1&ehk=N05noR3ThSZVyoEdaunhIxXPKYiua%2f2GNT1S9QobjUY%3d&risl=&pid=ImgRaw&r=0" style="width:100%;height:100%;">
    </div>
</div>
  <div class="slideshow-container" id="slideshow" style="right:0;">
   
</div>


@endsection

<script>
    document.addEventListener("DOMContentLoaded", function() {
    let slideIndex = 0;
    showSlides();

    function showSlides() {
        let slides = document.getElementsByClassName("slide");
        for (let i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}    
        slides[slideIndex - 1].style.display = "block";  
        setTimeout(showSlides, 6000); // Change slide every 3 seconds
    }
});
</script>
<script>document.addEventListener("DOMContentLoaded", function() {
    const comments = document.querySelectorAll(".comment");
    const containerHeight = document.querySelector(".comment-container").clientHeight;
    const commentHeight = comments[0].clientHeight;
    const totalHeight = commentHeight * comments.length;
  
    comments.forEach((comment, index) => {
      const delay = index * 5; // Delay between each comment
      const duration = comments.length * 5; // Total duration of the animation cycle
  
      comment.style.animationDuration = `${duration}s`;
      comment.style.animationDelay = `${delay}s`;
    });
  });
  
  </script>
</body>
</html>