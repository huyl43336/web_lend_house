<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa người dùng</title>
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
        .avatar-preview {
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
    <h2>Chỉnh sửa người dùng</h2>
    <form action="{{ route('admin.update', $account->id) }}" method="post" enctype="multipart/form-data" id="userForm">
        @csrf
        @method('POST')
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="{{ $account->username }}" required>
        
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="{{ $account->email }}" required>
        
        <label for="role">Role:</label>
        <select id="role" name="role">
            <option value="admin" {{ $account->role == 'admin' ? 'selected':''}}>admin</option>
            <option value="regular" {{ $account->role == 'regular' ? 'selected' : '' }}>regular</option>
            <!-- Thêm các vai trò khác nếu cần -->
        </select>

        <label for="avatar">Avatar:</label>
        <div class="avatar-preview">
            <img id="avatarPreview" src="{{ asset('uploads/' . $account->avatar) }}" alt="Avatar" style="width: 100%; height: 100%; object-fit: cover;">
        </div>
        <label for="avatar" class="custom-upload-btn">
            <span>Chọn ảnh</span>
            <input type="file" id="avatar" name="avatar" onchange="previewAvatar(event)">
        </label>
        <br>
        <input type="submit" value="Cập nhật">
    </form>

    <script>
        function previewAvatar(event) {
            const input = event.target;
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('avatarPreview');
                    preview.src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>
</html>
