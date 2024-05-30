<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới người dùng</title>
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
        #avatarPreview{
            height: 100px;
            width: 200px;
        }
    </style>
</head>
<body>
    <h2>Thêm mới người dùng</h2>
    <form action="{{ route('admin.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required>

        <label for="role">Role:</label>
        <select id="role" name="role">
            <option value="admin">admin</option>
            <option value="user">regular</option>
            <!-- Thêm các vai trò khác nếu cần -->
        </select>
        <label for="avatar">Avatar:</label>
        <img id="avatarPreview" src="{{ asset('upload/') }}" alt="Avatar" style="width: 10%; height: 10%; object-fit: cover;">
        <br>
        <input type="file" id="avatarInput" name="avatar" onchange="previewAvatar(event)">
        <br>
        <input type="submit" value="Thêm mới">
    </form>
    <script>
        function previewAvatar(event) {
            var input = event.target;
            var reader = new FileReader();
    
            reader.onload = function () {
                var dataURL = reader.result;
                var avatarPreview = document.getElementById('avatarPreview');
                avatarPreview.src = dataURL;
            };
    
            reader.readAsDataURL(input.files[0]);
        }
    </script>
</body>
</html>
