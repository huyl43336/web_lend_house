<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa trang chủ</title>
    <style>
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"],
        input[type="password"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .carousel-preview {
            width: 100px;
            height: 100px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
        }
        .custom-upload-btn {
    display: inline-block;
    background-color:red;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.custom-upload-btn:hover {
    background-color: blue;
}

.custom-upload-btn input[type="file"] {
    display: none;
}

    </style>
</head>
<body>
    <h2>Thêm nội dung trang chủ</h2>
    <form action="{{route('store_content_home')}}"  method="POST" enctype="multipart/form-data" id="userForm">
        @csrf
      <label for="avatar">Carousel:</label>
        <div class="carousel-preview">
            <img id="carouselPreview" src="{{asset('uploads_home/' . $home->carousel) }}" alt="Avatar" style="width: 100%; height: 100%; object-fit: cover;">
        </div>
        <label for="carousel" class="custom-upload-btn">
            <span>Chọn ảnh</span>
            <input type="file" id="carousel" name="carousel" onchange="previewCarousel(event)" name="carousel">
        </label>
        <label for="email">Caption carousel:</label>
        <input type="text" value="{{$home->caption_carousel}}" name="caption_carousel" required>
        
        
        <br>
        <input type="submit" value="Cập nhật">
    </form>

    <script>
        function previewCarousel(event) {
            const input = event.target;
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('carouselPreview');
                    preview.src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>
</html>
