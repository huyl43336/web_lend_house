<form action="{{route('process_changepass')}}" method="POST">
    @csrf
    @method('POST')
    <label for="">Nhập mật khẩu cũ</label>
<input type="password" name="oldpassword">
<label for="">Mật khẩu mới</label>
<input type="password" name="newpassword">
<label for="">Xác nhận Mật khẩu mới</label>
<input type="password" name="confirmpassword">
<button type="submit">Xong</button>
</form>
