<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style> 
  
    .custom-file-input {
    cursor: pointer;
    height: auto;
}
.preview-images {
        display: flex;
        flex-wrap: wrap;
        margin-top: 10px;
    }

    .preview-image {
        width: 100px;
        height: 100px;
        margin-right: 10px;
        margin-bottom: 10px;
        object-fit: cover;
    }

.custom-file-label::after {
    content: "Browse";
}

.btn-outline-secondary {
    color: #495057;
    background-color: #fff;
    border-color: #ced4da;
}

.btn-outline-secondary:hover {
    color: #fff;
    background-color: #6c757d;
    border-color: #6c757d;
}
/* Style cho label */
label {
    display: block; /* Hiển thị label trên mỗi input */
    margin-bottom: 5px; /* Khoảng cách giữa các label */
    font-weight: bold; /* Đậm chữ cho label */
}

/* Style cho input text */
input[type="text"], 
input[type="number"], 
input[type="tel"],
input[type="date"], 
textarea {
    width: 100%; /* Input chiếm toàn bộ chiều rộng của container */
    padding: 8px; /* Padding bên trong input */
    border: 1px solid #ccc; /* Đường viền input */
    border-radius: 4px; /* Đường cong ở các góc */
    box-sizing: border-box; /* Input tính cả border và padding */
    margin-bottom: 10px; /* Khoảng cách dưới input */
}

/* Style cho input file */
input[type="file"] {
    margin-top: 5px; /* Khoảng cách trên input file */
    margin-bottom: 10px; /* Khoảng cách dưới input file */
}

/* Style cho button */
button[type="submit"] {
    background-color: #4CAF50; /* Màu nền */
    color: white; /* Màu chữ */
    padding: 10px 20px; /* Padding cho button */
    border: none; /* Loại bỏ đường viền */
    border-radius: 4px; /* Đường cong ở các góc */
    cursor: pointer; /* Con trỏ thành pointer khi hover */
}

button[type="submit"]:hover {
    background-color: #45a049; /* Màu nền khi hover */
}

     </style>
</head>
<body>
    <h1>Đây là create House</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Images</div>
                     
                    <div class="card-body">
                        <form action="{{route('update_house',$house->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" value="{{$house->title}}" required>
                            </div>
                        
                            <div class="form-group">
                                <label for="author">Author</label>
                                <input type="text" class="form-control" id="author" name="author" placeholder="Enter author" value="{{$house->author}}" required>
                            </div>
                        
                            <div class="form-group">
                                <label for="Expirationdate">Expiration Date</label>
                                <input type="date" class="form-control" id="Expirationdate" name="Expirationdate" value="{{$house->Expirationdate}}" required>
                            </div>
                        
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea class="form-control" id="content" name="content" rows="3" placeholder="Enter content">{{$house->content}}</textarea>
                            </div>
                        
                            <div class="form-group">
                                <label for="bed">Bed</label>
                                <input type="number" class="form-control" id="bed" name="bed" placeholder="Enter number of bedrooms"value="{{$house->bed}}">
                            </div>
                        
                            <div class="form-group">
                                <label for="bath">Bath</label>
                                <input type="number" class="form-control" id="bath" name="bath" placeholder="Enter number of bathrooms" value="{{$house->bath}}">
                            </div>
                        
                            <div class="form-group">
                                <label for="area">Area</label>
                                <input type="text" class="form-control" id="area" name="area" placeholder="Enter area" value="{{$house->area}}">
                            </div>
                        
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter phone number" value="{{$house->phone}}">
                            </div>
                        
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" id="price" name="price" placeholder="Enter price" value="{{$house->price}}">
                            </div>
                        
                            <div class="form-group">
                                <label for="size">Size</label>
                                <input type="number" class="form-control" id="size" name="size" placeholder="Enter size" value="{{$house->size}}">
                            </div>
                         
                           
                        
                            <div class="form-group">
                                <div class="avatar-preview" style="width:100%; height:100px;">
                                    @foreach($house ->imagePosts as $imagePost)
                                    <img id="avatarPreview" src="{{ asset('uploads_house/'.$imagePost->image_url) }}" alt="Avatar" style="width: 100px; height: 100px; object-fit: cover;">
                                    @endforeach
                                </div>
                                <label for="image">Image</label>
                                <input type="file" class="form-control-file" id="image" name="image[]" onchange="previewAvatar(event)" multiple>
                            </div>
                            <div class="preview-images"></div>

                            <button type="submit" class="btn btn-primary">Tạo</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

   <script>
  
    function previewAvatar(event) {
        const input = event.target;
        const previewContainer = document.querySelector('.preview-images');
        previewContainer.innerHTML = ''; // Xóa hiển thị các file cũ trước khi hiển thị các file mới

        if (input.files && input.files.length > 0) {
            for (let i = 0; i < input.files.length; i++) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const image = document.createElement('img');
                    image.src = e.target.result;
                    image.classList.add('preview-image');
                    previewContainer.appendChild(image);
                }
                reader.readAsDataURL(input.files[i]);
            }
        }
    }
</script>

</body>
</html>
