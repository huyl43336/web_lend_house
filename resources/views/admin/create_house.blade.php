<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style> 
    .preview-images img {
        width: 100px;
        height: 100px;
        margin-right: 10px; /* Thêm khoảng cách giữa các ảnh */
    }
    .custom-file-input {
    cursor: pointer;
    height: auto;
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
.preview-images{
    display: inline-block; /* Hiển thị ảnh theo chiều ngang */
    max-width: 100px; /* Đặt kích thước tối đa của ảnh */
    max-height: 100px;
    margin-right: 10px;
    position: relative;
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
                        <form action="{{route('store_house')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
                            </div>
                        
                            <div class="form-group">
                                <label for="author">Author</label>
                                <input type="text" class="form-control" id="author" name="author" placeholder="Enter author">
                            </div>
                        
                            <div class="form-group">
                                <label for="Expirationdate">Expiration Date</label>
                                <input type="date" class="form-control" id="Expirationdate" name="Expirationdate">
                            </div>
                        
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea class="form-control" id="content" name="content" rows="3" placeholder="Enter content"></textarea>
                            </div>
                        
                            <div class="form-group">
                                <label for="bed">Bed</label>
                                <input type="number" class="form-control" id="bed" name="bed" placeholder="Enter number of bedrooms">
                            </div>
                        
                            <div class="form-group">
                                <label for="bath">Bath</label>
                                <input type="number" class="form-control" id="bath" name="bath" placeholder="Enter number of bathrooms">
                            </div>
                        
                            <div class="form-group">
                                <label for="area">Area</label>
                                <input type="text" class="form-control" id="area" name="area" placeholder="Enter area">
                            </div>
                        
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter phone number">
                            </div>
                        
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" id="price" name="price" placeholder="Enter price">
                            </div>
                        
                            <div class="form-group">
                                <label for="size">Size</label>
                                <input type="number" class="form-control" id="size" name="size" placeholder="Enter size">
                            </div>
                         
                           
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control-file" id="image" name="image[]" multiple required>
                            </div>
                            <div class="preview-images" style=""></div>

                            <button type="submit" class="btn btn-primary">Tạo</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <script>
 document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('image').addEventListener('change', function() {
        var previewContainer = document.querySelector('.preview-images');
        var files = this.files;

        previewContainer.innerHTML = ''; // Xóa hết các ảnh đã hiển thị trước đó

        // Lặp qua từng tập tin hình ảnh
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var reader = new FileReader();

            reader.onload = function(event) {
                var image = new Image();
                image.src = event.target.result;

                // Tạo một thẻ <img> để hiển thị trước ảnh
                var imgContainer = document.createElement('div');
                imgContainer.className = 'preview-image';
                imgContainer.appendChild(image);
                previewContainer.appendChild(imgContainer);
            };

            // Đọc dữ liệu của tập tin hình ảnh dưới dạng URL
            reader.readAsDataURL(file);
        }
    });
});

  </script>

</body>
</html>