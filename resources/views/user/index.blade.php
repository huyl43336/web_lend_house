<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trang người dùng</title>
</head>
<style>
   
</style>
<link rel="stylesheet" href="/css/user.css">
<body>
    

    <div class="user-detail">
    <a href="{{route('index')}}" style="text-decoration:none; color:white; background-color:blue; padding:10px;">Đi đến trang chủ</a>
    <a class="dropdown-item" href="#" style="background-color: red;"><form method="POST" action="{{ route('login.logout')}}" >
        @csrf
        <button type="submit" style="background-color: red; padding:10px; position: relative;bottom:30px; left:90%; color:white;">Đăng xuất</button>
    </form></a>
  
    <h1>Xin chào, {{$user->username}}</h1>
    <img src="{{asset('uploads/'.$user->avatar)}}" alt="" class="ava" id="avatarPreview">

    
    <br>
    
    
    <br>
    <form action="{{route('change_avatar',$user->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <a href="#" style="position: relative;left:47%;bottom:20px;" >
            <label for="avatarInput" style="position: absolute; padding-left:10px; padding-top:14px;width: 120px; height: 50px; cursor: pointer; color:white; background-color: green; box-sizing:border-box; border-radius:20px;">
                Thay đổi avatar
            </label>
            <input type="file" id="avatarInput" name="avatar" onchange="previewAvatar(event)" style="display: none;">
        </a>
        <br>
       <br>
        <button type="submit" style="background-color:chocolate; padding:10px; border-radius:10px; color:antiquewhite;">Lưu</button>
    </form>
    <div class="row">
    <label for="">Tên người dùng:</label>
     <span>{{$user->username}}</span>
    </div>
    <div class="row">
     <label for="">Email:</label>
     <span>{{$user->email}}</span>
    </div>
    <div class="row">
        <label for="">Số điện thoại:</label>
        <span>{{$user->phone}}</span>
       </div>
       <a href="{{route('change_password',$user->id)}}" style="color: white;">Thay đổi mật khẩu ?</a>
    <h2>Các bài viết đã lưu</h2>
   <ul class="he">
    <li style="right:40px;">ID</li>
    <li style="right:60px;">ảnh</li>
    <li style="right:50px;">tiêu đề</li>
    <li style="right:42px;">người đăng</li>
    <li style="right:60px;">nội dung</li>
    <li style="right:53px;">khu vực</li>
    <li style="right:50px;">phòng ngủ</li>
    <li style="right:60px;">phòng tắm</li>
    <li style="right:60px;">giá</li>
   
   </ul>
   @foreach($user->save_house as $save)
    <a class="house" href="{{route('house.index',$save->house_id)}}">

     
     
      <p style="right:38px;">{{$save->house_id}}</p>
     @foreach($save->store_house as $st)
     @foreach($st->imagePosts->take(1) as $img)
     <img src="{{asset('uploads_house/'.$img->image_url)}}" alt="" id="imgpost">
   @endforeach
   <p>{{$st->title}}</p>
   <p>{{$st->author}}</p>
   <p class="jh">{{$st->content}}</p>
   <p>{{$st->area}}</p>
   <p>{{$st->bed}}</p>
   <p>{{$st->bath}}</p>
   <p>{{$st->price}}tr</p>
  
   <br>
  @endforeach

  
    </a>
    @endforeach
</div>
  
<script>
    function previewAvatar(event) {
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function(){
            var dataURL = reader.result;
            var output = document.getElementById('avatarPreview');
            output.src = dataURL;
        };
        reader.readAsDataURL(input.files[0]);
    }
    </script>

</body>
</html>
