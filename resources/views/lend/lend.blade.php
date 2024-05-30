@extends('layouts.layout')

@section('content')

@php
    ob_start();
@endphp
<link rel="stylesheet" href="/css/hire.css">
<link rel="stylesheet" href="/css/style2.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



<style>
    textarea{
        width: 800px; /* Độ rộng của textarea */
  height: 100px; /* Độ cao của textarea */
  resize: none; /* Ngăn không cho resize */
    }
    #but{
        background-color: blue;
        color: white;
        height: 50px;
        width: 100px;
        border-radius: 10px;

    }
    .column{
        height:600px;
	width: 600px;
	padding: 10px;
    position: relative;
   left: 190px;
}

#featured{
	width: 800px;
	height: 400px;
	cursor: pointer;
    object-fit: cover;
	border: 2px solid black;
    background-size: cover;
     background-origin: content-box;

}

.thumbnail{
	object-fit: cover;
	width: 150px;
	height: 100px;
	cursor: pointer;
	opacity: 0.5;
	margin: 5px;
	border: 2px solid black;

}

.thumbnail:hover{
	opacity:1;
}

.active{
	opacity: 1;
}

#slide-wrapper{
	width: 800px;
	display: flex;
	min-height: 100px;
	align-items: center;
   
}

#slider{
	width: 800px;
	display: flex;
	flex-wrap: nowrap;
	overflow-x: auto;

}

#slider::-webkit-scrollbar {
		width: 8px;

}

#slider::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    border-radius: 10px;

}
 
#slider::-webkit-scrollbar-thumb {
  background-color: grey;
  outline: 1px solid slategrey;
   border-radius: 100px;

}

#slider::-webkit-scrollbar-thumb:hover{
    background-color: #18b5ce;
}

.arrow{
	width: 30px;
	height: 30px;
	cursor: pointer;
	transition: .3s;
    margin-top:40px;
}

.arrow:hover{
	opacity: .5;
	width: 35px;
	height: 35px;
}
.form-save{
    margin-left: 240px;
    height: 50px;
  width: 100px;
}
.form-save .save{
  height: 50px;
  width: 100px;
  color: white;
  background-color: green;
  border-radius: 10px;
}
/* CSS */
.like-btn {
    margin-left: 400px;
    border: none;
    background: none;
    cursor: pointer;
    outline: none;
    padding: 10px;
    height: 50px;
    width: 50px;

    position: relative;
    bottom: 50px;
}

.like-btn svg {
   
    width: 24px;
    height: 24px;
    margin-top:3px;
    margin-left: 1px;
    fill: #000; /* Màu mặc định của trái tim */
}
.like-btn:hover svg{
    fill: red;
}
.like-btn.liked svg {
    fill: red; /* Màu của trái tim khi được like */
}

</style>
<section>

  <div class="carousel" style="margin-top:150px;left:200px; position:relative;">

    <h1 style="color: black; margin-left:10px;">{{$house->title}}</h1>
  <div class="row">

   
    <p class="price"><i class="fa-solid fa-money-bill-1-wave"></i>{{$house->price}} triệu/tháng</p>
    <p class="size"><i class="fa-solid fa-expand"></i>{{$house->size}}m^2</p>
    <p class="size" id="bed"><i class="fa-solid fa-bed"></i>{{$house->bed}} giường ngủ</p>
    <p class="size" id="bath"><i class="fa-solid fa-bath"></i>{{$house->bath}} phòng tắm</p>
    <p class="size" id="time" style="width:200px;"><i class="fa-solid fa-clock"></i>
        @if($house->created_at == $house->updated_at)
        {{date('d/m/Y H:i', strtotime($house->created_at))}}
        @else
        {{date('d/m/Y H:i', strtotime($house->updated_at))}}
        @endif
    </p>
  </div>
  </div>

  
  <div class="column">
    <img id="featured" src="">

    <div id="slide-wrapper">
        <img id="slideLeft" class="arrow" src="/images/arrow-left.png">

        <div id="slider">
            @foreach($house->imagePosts as $index=>$imagePost)
            @if($index == 0)
            <img class="thumbnail active" src="{{asset('uploads_house/'.$imagePost->image_url)}}" style="height: 100px;width:150px;">
        @else
            <img class="thumbnail" src="{{asset('uploads_house/'.$imagePost->image_url)}}" style="height: 100px;width:150px;">
        @endif
            @endforeach
        </div>

        <img id="slideRight" class="arrow" src="/images/arrow-right.png">
    </div>
</div>
          
     


    
      
</section>
<form action="{{route('save_house',$house->id)}}" class="form-save" method="POST">
  @csrf
    <button type="submit" class="save"><i class="fa-solid fa-download"></i>Lưu tin</button>
</form>
<form action="{{route('store_likes',$house->id)}}" method="POST" id="heart">
    @csrf
    <button class="like-btn" onclick="toggleLike(this)" name="likes" style=" background-color:white;
  
    border:1px solid;
    border-radius: 10px;">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
            <path fill="none" d="M0 0h24v24H0z"/>
            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
        </svg>
    </button>
</form>
<section id="description" class="common">
    <div class="post-contact-sticky">
        <div class="author">
            
            <img src="{{asset('uploads/'.$house->users->avatar)}}" alt="" class=".img">
            <h5>{{$house->author}}</h5>
            <a href="#" id="link">Xem trang cá nhân</a>
        </div>
        
     <a href="#" class="phone">
        <i class="fa-solid fa-phone" style=""></i>
        <p>{{$house->phone}}</p>
     
     </a>
     <a href="#" class="zalo">
        <p class="p">Nhắn Zalo</p></a>
      <ul class="ul">
        <li class="li">Chỉ đặt khi cọc xác định được chủ nhà và có thỏa thuận biên nhận rõ ràng.</li>
        <li class="li">Kiểm tra mọi điều khoản và yêu cầu liệt kê tất cả chi phí hàng tháng vào hợp đồng.</li>
        <li class="li">Trường hợp phát hiện nội dung tin đăng không chính xác, vui lòng phán ánh đến số  điện thoại 0373937377</li>
      </ul>   
    </div>
    
    <h1 style="">Thông tin mô tả</h1>
    <div class="post-detail-content" style="top:50px;">
        <p>{{$house->content}}</p>
    </div>
    <h1>Đặc điểm tin đăng</h1>
    <div class="post-info">
     <table>
      <tr>
        <td class="cell1">Mã tin</td>
        <td class="cell2">{{$house->id}}</td>
      </tr>
      <tr>
        <td class="cell1">Chuyên mục</td>
        <td class="cell2">tìm nhà</td>
      </tr>
      <tr>
        <td class="cell1">Khu vực</td>
        <td class="cell2">{{$house->area}}</td>
      </tr>
      <tr>
        <td class="cell1">Ngày đăng</td>
        <td class="cell2">{{date('d/m/Y', strtotime($house->created_at))}}</td>
      </tr>
      <tr>
        <td>Ngày hết hạn</td>
        <td>{{date('d/m/Y', strtotime($house->Expirationdate))}}</td>
      </tr>
     </table>
    </div>
    <h1>Điểm nổi bật</h1>
    <div class="contact-info" style="height:auto;">
        <ul>
            <li><img src="https://cdn6.agoda.net/images/property/highlights/spray.svg" alt="" style="height: 33px; width:32px;">
            <p>Sạch bóng</p>
            </li>
        </ul>
    </div>
    <h1>Tiện ích</h1>
    <div class="contact-info" style="height:auto;">
        <ul style=" display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 10px; 
        list-style: none; 
        padding: 0;">
        @foreach($house->comforts as $comfort)
        <li style="position: relative;"><i class="fa-solid fa-check" style=""></i><p style="position: absolute;bottom:5px;left:50px;">{{$comfort->content}}</p></li>
        
        @endforeach
        </ul>
    </div>
  <h1>Thông tin liên hệ</h1>
  <div class="contact-info">
    <table>
    <tr>
        <td>Người đăng</td>
        <td>{{$house->author}}</td>
    </tr>
    
    <tr>
        <td>Số điện thoại</td>
        <td>{{$house->phone}}</td>
    </tr>
    </table>
  </div>
  <h1>Vị trí</h1>
 
  <p class="pa"><i class="fa-solid fa-location-dot"></i>vinhome ocean park, gia lâm, hà nội</p>
  <h1>Nhà cho thuê nổi bật</h1>
  <div class="area">
    @foreach($houses->take(4) as $hou)
    <a class="item-area" href="{{route('house.index',$hou->id)}}">
        @foreach($hou->imagePosts->take(1) as $imagePost)
        <img src="{{asset('uploads_house/'.$imagePost->image_url)}}" alt=""class="img-area">
        @endforeach
        <h3 href="" class="title">{{$hou->title}}</h3>
      <span id="roww" style="width: 445px;  max-height: 100px;">
        <p class="money"><i class="fa-solid fa-money-bill-wave" style="position: relative;top:1px; left:20px;"></i>{{$house->price}}</p>
        <p class="sizes" style="bottom: 27px;"><i class="fa-solid fa-expand" style="position: relative;top:1px; left:20px;"></i>{{$hou->size}}</p>
        
        <p class="sizes" style="bottom: 52px; left:25%;"><i class="fa-solid fa-bed" style="position: relative; left:20px;"></i> {{$hou->bed}}</p>
        <p class="sizes" style="bottom: 79px; left:40%;"><i class="fa-solid fa-bath" style="position: relative; left:20px;"></i> {{$hou->bath}}</p>
    </span>
        <span class="post-time">
          
            <p style=""><i class="fa-regular fa-clock" style="left: 25px;"></i>Đăng ngày{{$hou->created_at}}</p>

        </span>
            <span class="atag"><i class="fa-solid fa-location-dot"></i><p>Địa chỉ:{{$hou->area}}</p> </span>
        <p class="lo"><i class="fa-regular fa-file-lines" style="left: 5%; position:relative;"></i>Nội dung:{{$hou->content}}
            :</p>
            <span class="showauthor"><i class="fa-solid fa-user-pen" style="display: inline"></i> <p style="display: inline;">Người đăng: {{$hou->author}}</p></span>
    
            <span class="showlikes"> Lượt thích: <ion-icon name="heart" style="color: red;"></ion-icon>{{ $likeCounts[$house->id]->total_likes ?? 0}}</span>
           
            <span class="showlikes" style="bottom:100%; left:80%; position: relative;"> Lượt bình luận:<ion-icon name="heart" style="color: red;"></ion-icon>
        
       
            </span>
           
        </a>
        @endforeach
  </div>


  <div class="sidebar-block">
    
    <h5>Nhà cho thuê mới cập nhật</h5>
    @foreach($other_houses->take(5) as $other_house)
    <a href="{{ route('house.index', ['house' => $other_house->id]) }}" class="a" >
     @foreach($other_house->imagePosts as $imagePost)
        <img src="{{asset('uploads_house/'.$imagePost->image_url)}}" alt="" class="lazy-done">
    @endforeach
        <span class="post-title">{{$other_house->title}}</span>
        <span class="post-price">{{$other_house->price}} triệu/tháng</span>
        <span class="post-publish" style="font-size: 12px;">{{date('d/m/Y H:i', strtotime($other_house->created_at))}}</span>
       
    </a>
    @endforeach
</div>
</section>
<section class="comment" style="margin-left:100px;margin-top:150px;">
    <form id="commentForm" method="post" action="{{route('store_comments',$house->id)}}">
        @csrf
        <textarea name="content"></textarea>
        <button type="submit" id="but">Gửi bình luận</button>

        
    </form>
   
    <div id="commentsContainer">
        @foreach($comments as $comm)
        <div class="comment-block">
            <div class="ro">
                <img src="{{ asset('uploads/'.$comm->users->avatar) }}" alt="" style="height:60px;width:60px; border-radius:30px;" name="img_ava">
                <p style="height: 40px;">{{ $comm->content }}</p>
                <span>{{ date('d/m/Y H:i', strtotime($comm->created_at)) }}</span>
            </div>  
        
            <button style="color: #000; position: relative; bottom:30px; margin-left:70px;" class="reply">Reply</button>
            <div class="replyForm" style="display: none; margin-right:600px; bottom:100px; position: relative;"> <!-- Vùng nhập liệu trả lời (ẩn ban đầu) -->
                <form action="{{ route('store_reply_comments', $house->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="comment_id" value="{{ $comm->id }}">
                    <!-- Ẩn input chứa id của comment mà người dùng đang trả lời -->
                    <textarea name="reply_content" rows="2" cols="50"></textarea> <!-- Textarea cho người dùng nhập nội dung trả lời -->
                    <button type="submit" style="background-color: blue; color:white; padding:10px; border-radius:10px; margin-left:64px;">Gửi</button> <!-- Nút gửi trả lời -->
                </form>
            </div>
            
            @foreach($comm->replycomment as $repcomm)
            <div class="ro" style="margin-left:50px; bottom:10px; position:relative;">
                <img src="{{ asset('uploads/'.$repcomm->users->avatar) }}" alt="" style="height:60px;width:60px; border-radius:30px;" name="img_ava">
                <p style="height: 40px;">{{ $repcomm->content }}</p>
                <span>{{ date('d/m/Y H:i', strtotime($repcomm->created_at)) }}</span>
                <button style="color: #000; top:65px; position: relative; margin-left:70px;" class="reply">Reply</button>
                <div class="replyForm" style="display: none; margin-right:600px;top:60px; position:relative;"> <!-- Vùng nhập liệu trả lời (ẩn ban đầu) -->
                    <form action="{{ route('store_reply_comments', $house->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="comment_id" value="{{ $repcomm->id }}">
                        <!-- Ẩn input chứa id của comment mà người dùng đang trả lời -->
                        <textarea name="reply_content" rows="2" cols="50"></textarea> <!-- Textarea cho người dùng nhập nội dung trả lời -->
                        <button type="submit" style="background-color: blue; color:white; padding:10px; border-radius:10px; margin-left:64px;">Gửi</button> <!-- Nút gửi trả lời -->
                    </form>
                </div>
            </div>
            @endforeach
        </div>
        @endforeach
    </div>
    
    
    
  
    
   
</section>





@php
    $content = ob_get_clean();
    echo trim($content);
@endphp




<script>
    $(document).ready(function(){
        $(".reply").click(function(){
            $(".replyForm").hide();
            // Hiển thị form trả lời tương ứng với nút trả lời được nhấn
            $(this).next(".replyForm").show();
        });
    });
</script>





<script>
  $(document).ready(function(){
    $('#commentForm').submit(function(e){
        e.preventDefault(); // Ngăn chặn hành động mặc định của biểu mẫu
        var formData = $(this).serialize(); // Lấy dữ liệu từ biểu mẫu

        // Gửi yêu cầu AJAX
        $.ajax({
            url: $(this).attr('action'), // URL để gửi yêu cầu
            type: 'POST', // Phương thức gửi dữ liệu
            data: formData, // Dữ liệu để gửi
            success: function(response){ // Xử lý khi nhận được phản hồi từ máy chủ
                // Nếu phản hồi thành công, thêm nội dung và ảnh vào phần tử commentsContainer
                var commentText = $('textarea[name="content"]').val(); // Lấy nội dung của textarea
                var image = response.image; // Lấy đường dẫn của ảnh từ phản hồi

                $('#commentsContainer').append('<div class="comment"><img src="'+image+'" alt="Avatar" style="height:60px;width:60px;" name="img_ava"><span style="height: 60px;width:200px;">' + commentText + '</span></div>'); // Thêm nội dung và ảnh vào commentsContainer
                $('#commentForm')[0].reset(); // Reset biểu mẫu sau khi gửi thành công
            },
            error: function(xhr, status, error){ // Xử lý khi gặp lỗi
                console.log(xhr.responseText); // In ra thông báo lỗi trong console
            }
        });
    });
});





</script>
<script>
      $(document).ready(function(){
    $('#heart').submit(function(e){
        e.preventDefault(); // Ngăn chặn hành động mặc định của biểu mẫu
        var formData = $(this).serialize(); // Lấy dữ liệu từ biểu mẫu

        // Gửi yêu cầu AJAX
        $.ajax({
            url: $(this).attr('action'), // URL để gửi yêu cầu
            type: 'POST', // Phương thức gửi dữ liệu
            data: formData, // Dữ liệu để gửi
            success: function(response){ // Xử lý khi nhận được phản hồi từ máy chủ
                // Nếu phản hồi thành công, thêm nội dung và ảnh vào phần tử commentsContainer
                var commentText = $('textarea[name="content"]').val(); // Lấy nội dung của textarea
                var image = response.image; // Lấy đường dẫn của ảnh từ phản hồi

                $('#commentsContainer').append('<div class="comment"><img src="'+image+'" alt="Avatar" style="height:60px;width:60px;" name="img_ava"><span style="height: 60px;width:200px;">' + commentText + '</span></div>'); // Thêm nội dung và ảnh vào commentsContainer
                $('#commentForm')[0].reset(); // Reset biểu mẫu sau khi gửi thành công
            },
            error: function(xhr, status, error){ // Xử lý khi gặp lỗi
                console.log(xhr.responseText); // In ra thông báo lỗi trong console
            }
        });
    });
});
</script>
<script>
    $(document).ready(function(){
  $('.form-save').submit(function(e){
      e.preventDefault(); // Ngăn chặn hành động mặc định của biểu mẫu
      var formData = $(this).serialize(); // Lấy dữ liệu từ biểu mẫu

      // Gửi yêu cầu AJAX
      $.ajax({
          url: $(this).attr('action'), // URL để gửi yêu cầu
          type: 'POST', // Phương thức gửi dữ liệu
          data: formData, // Dữ liệu để gửi
          success: function(response){ // Xử lý khi nhận được phản hồi từ máy chủ
              // Nếu phản hồi thành công, thêm nội dung và ảnh vào phần tử commentsContainer
              var commentText = $('textarea[name="content"]').val(); // Lấy nội dung của textarea
              var image = response.image; // Lấy đường dẫn của ảnh từ phản hồi

              $('#commentsContainer').append('<div class="comment"><img src="'+image+'" alt="Avatar" style="height:60px;width:60px;" name="img_ava"><span style="height: 60px;width:200px;">' + commentText + '</span></div>'); // Thêm nội dung và ảnh vào commentsContainer
              $('#commentForm')[0].reset(); // Reset biểu mẫu sau khi gửi thành công
          },
          error: function(xhr, status, error){ // Xử lý khi gặp lỗi
              console.log(xhr.responseText); // In ra thông báo lỗi trong console
          }
      });
  });
});
</script>
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {
        let featuredImage = document.getElementById('featured');
        let thumbnails = document.querySelectorAll('.thumbnail');

        // Thiết lập ảnh đầu tiên là active và hiển thị trong featured
        let firstThumbnail = document.querySelector('#slider .thumbnail');
        firstThumbnail.classList.add('active');
        featuredImage.src = firstThumbnail.src;

        // Xử lý sự kiện khi di chuột qua các thumbnail
        thumbnails.forEach(function(thumbnail) {
            thumbnail.addEventListener('mouseover', function() {
                // Loại bỏ lớp active từ tất cả các thumbnail
                thumbnails.forEach(function(item) {
                    item.classList.remove('active');
                });
                
                // Thêm lớp active cho thumbnail hiện tại
                this.classList.add('active');
                
                // Hiển thị ảnh tương ứng trong featured
                featuredImage.src = this.src;
            });
        });

        // Xử lý sự kiện khi nhấn nút trái và phải
        let buttonRight = document.getElementById('slideRight');
        let buttonLeft = document.getElementById('slideLeft');

        buttonLeft.addEventListener('click', function() {
            document.getElementById('slider').scrollLeft -= 180;
        });

        buttonRight.addEventListener('click', function() {
            document.getElementById('slider').scrollLeft += 180;
        });
    });
</script>

<script>
    function toggleLike(btn) {
    btn.classList.toggle('liked');
}
</script>
@endsection