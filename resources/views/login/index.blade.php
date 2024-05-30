<link rel="stylesheet" href="/css/login.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<div class="container" id="container">
	<div class="form-container sign-up-container" id="myform">
		<form action="{{route('register.create')}}" method="POST" id="myform">
			@csrf
			<h1>Tạo tài khoản</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>Hoặc dùng Email để đăng ký</span>
			<input type="text" placeholder="Name" name="username" id="username" required/>
			<span class="error-message" id="nameError"></span>
			<input type="email" placeholder="Email" name="email" id="email" required/>
			<span class="error-message" id="emailError"></span>
			<input type="password" placeholder="Password" name="password" id="password" required/>
			<span class="error-message" id="passwordError"></span>
			<button type="submit">Đăng ký</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		  <div class="alert alert-danger">
        <p>{{session('error')}}</p>
    </div>
		<form action="{{ route('login.process_login') }}" method="POST" id="formlogin">
			@csrf
			<h1>Đăng nhập</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>Hoặc dùng tài khoản</span>
			<input type="text" placeholder="Tên đăng nhập" name="username" id="username">
	       @error('username')
		   <span style="color: red; text-align:start;"> {{$message}}</span>
          
		   @enderror
			<input type="password" placeholder="Mật khẩu" name="password" id="password">
			@error('password')
			<span style="color: red; text-align:start;"> {{$message}}</span>
		   
			@enderror
			<a href="#">Quên mật khẩu?</a>
			@if(session('error'))
  
@endif
			<button type="submit">Đăng nhập</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Chào mừng bạn !</h1>
				<p>Hãy nhập thông tin của bạn và tận hưởng những tiện ích đến từ chúng tôi</p>
				<button class="ghost" id="signUp" onsubmit="">Đăng ký</button>
			</div>
		</div>
	</div>
</div>

<footer>
	
</footer>
<script src="/js/login.js"></script>


<script>
	document.getElementById('myform').addEventListener('submit', function(event) {
	  var usernameInput = document.getElementById('username');
	  var emailInput = document.getElementById('email');
	  var usernameError = document.getElementById('usernameError');
	  var emailError = document.getElementById('emailError');
	  var passwordInput=document.getElementById('password');
	  var passwordError=document.getElementById('passwordError');
  
	  usernameError.textContent = '';
	  emailError.textContent = '';
      passwordError.textContent= '';
	  if (!usernameInput.value) {
		nameError.textContent = 'Tên đăng nhập không được bỏ trống';
		event.preventDefault(); // Ngăn chặn việc gửi biểu mẫu nếu có lỗi
	  }
  
	  if (!emailInput.value) {
		emailError.textContent = 'Email không được bỏ trống';
		event.preventDefault(); // Ngăn chặn việc gửi biểu mẫu nếu có lỗi
	  }
	  if (!passwordInput.value) {
		passwordError.textContent = 'Mật khẩu không được bỏ trống';
		event.preventDefault(); // Ngăn chặn việc gửi biểu mẫu nếu có lỗi
	  }
	});
  </script>
  