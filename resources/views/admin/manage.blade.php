<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  @extends('layouts_admin.layout2')
@section('content')
{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Table</title>
    <style>
     .container{
      margin-bottom: 100px;
     }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .pagination {
            margin-top: 20px;
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
        @media screen and (max-width: 600px) {
            table, th, td {
                display: block;
            }
            th, td {
                text-align: center;
            }
            th {
                background-color: #f2f2f2;
            }
            td {
                border-bottom: none;
            }
            td:last-child {
                border-bottom: 1px solid #ddd;
            }
        }
        @media screen and (max-width: 767px) {
    table, thead, tbody, th, td, tr { 
        display: block; 
    }

    thead tr { 
        position: absolute;
        top: -9999px;
        left: -9999px;
    }

    tr { border: 1px solid #ccc; }

    td { 
        border: none;
        border-bottom: 1px solid #eee; 
        position: relative;
        padding-left: 50%; 
        text-align: left;
    }

    td:before { 
        position: absolute;
        top: 6px;
        left: 6px;
        width: 45%; 
        padding-right: 10px; 
        white-space: nowrap;
    }

    td:nth-of-type(1):before { content: "ID"; }
    td:nth-of-type(2):before { content: "Username"; }
    td:nth-of-type(3):before { content: "Email"; }
    td:nth-of-type(4):before { content: "Phone"; }
    td:nth-of-type(5):before { content: "Role"; }
    td:nth-of-type(6):before { content: "Avatar"; }
    td:nth-of-type(7):before { content: "Action"; }

    .pagination {
        text-align: center;
    }
}
    </style>
</head>
<body>

<h2>Account Manage</h2>
<a href="{{route('account.create')}}">Create</a>
<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Username</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Role</th>
      <th>Avatar</th>
      <th colspan="3">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($accounts as $index=>$account)
    <tr>
      <td>{{1+$index++}}</td>
      <td>{{$account->username}}</td>
      <td>{{$account->email}}</td>
      <td>{{$account->password}}</td>
      <td>{{$account->role}}</td>
      <td><img src="{{asset('uploads/'.$account->avatar) }}" alt="" style="width:50px;height:50px;"></td>

      <td><a href="{{route('admin.edit',$account->id)}}">Sửa</a></td>
      <td><a href=""></a>Xóa</td>
    </tr>
    @endforeach
  </tbody>
 
</table>
@if ($accounts->lastPage() > 1)
<div class="pagination">
    <ul>
        <li><a href="{{ $accounts->url(1) }}">Đầu</a></li>
        @for ($i = 1; $i <= $accounts->lastPage(); $i++)
            <li><a class="{{ $accounts->currentPage() == $i ? 'active' : '' }}" href="{{ $accounts->url($i) }}">{{ $i }}</a></li>
        @endfor
        <li><a href="{{ $accounts->url($accounts->lastPage()) }}">Cuối</a></li>
    </ul>
</div>
@endif
</body>
</html>  --}}
<style>
      .pagination {
        position: relative;
            margin-top: 20px;
            justify-content: start;
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
        .confirmation-dialog {
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 20px;
        max-width: 300px;
        margin: 0 auto;
        text-align: center;
    }

    .confirmation-dialog h2 {
        margin-top: 0;
    }

    .confirmation-dialog-buttons {
        margin-top: 20px;
    }

    .confirmation-dialog-buttons button {
        margin: 0 10px;
        padding: 8px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .confirmation-dialog-buttons button.cancel {
        background-color: #ddd;
        color: #333;
    }

    .confirmation-dialog-buttons button.confirm {
        background-color: #007bff;
        color: #fff;
    }
</style>

<div class="app-content-header">
    <h1 class="app-content-headerText">Quản lý tài khoản</h1>
    <button class="mode-switch" title="Switch Theme">
      <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
        <defs></defs>
        <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
      </svg>
    </button>
    <a class="app-content-headerButton" href="{{route('account.create')}}">Thêm tài khoản</a>
  </div>
  <div class="app-content-actions">
    <input class="search-bar" placeholder="Search..." type="text">
    <div class="app-content-actions-wrapper">
      <div class="filter-button-wrapper">
        <button class="action-button filter jsFilter"><span>Filter</span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-filter"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/></svg></button>
        <div class="filter-menu">
          <label>Category</label>
          <select>
            <option>All Categories</option>
            <option>Furniture</option>                     <option>Decoration</option>
            <option>Kitchen</option>
            <option>Bathroom</option>
          </select>
          <label>Status</label>
          <select>
            <option>All Status</option>
            <option>Active</option>
            <option>Disabled</option>
          </select>
          <div class="filter-menu-buttons">
            <button class="filter-button reset">
              Reset
            </button>
            <button class="filter-button apply">
              Apply
            </button>
          </div>
        </div>
      </div>
      <button class="action-button list active" title="List View">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>
      </button>
      <button class="action-button grid" title="Grid View">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
      </button>
    </div>
  </div>
  <div class="products-area-wrapper tableView">
    <div class="products-header">
      <div class="product-cell image">
        Tên đăng nhập
        <button class="sort-button">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
        </button>
      </div>
      <div class="product-cell category">Email<button class="sort-button">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
        </button></div>
      <div class="product-cell status-cell">Số điện thoại<button class="sort-button">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
        </button></div>
      <div class="product-cell sales">Phân quyền<button class="sort-button">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
        </button></div>
      <div class="product-cell stock">Thao tác<button class="sort-button">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
        </button></div>
      <div class="product-cell price">Price<button class="sort-button">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
        </button></div>
    </div>
    @foreach($accounts as $account)
    <div class="products-row">
      <button class="cell-more-button">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
      </button>
        <div class="product-cell image">
          <img src="{{
            asset('uploads/'.$account->avatar) 
            }}" alt="product">
          <span>{{$account->username}}</span>
        </div>
      <div class="product-cell category">{{$account->email}}</div>
      <div class="product-cell status-cell">
        <span class="cell-label">Số điện thoại:</span>
        <span>{{$account->phone}}</span>
      </div>
      <div class="product-cell sales"><span class="cell-label">Phân quyền</span>{{$account->role}}</div>
      <div class="product-cell stock"><span class="cell-label">Thao tác</span>
        <a href="{{route('admin.edit',$account->id)}}" class="app-content-headerButton">Sửa</a>
        <form id="deleteForm" action="{{route('account.delete',$account->id)}}" method="POST">
          @csrf
          @METHOD('DELETE')
          <button type="submit" class="app-content-headerButton deleteButton"  id="deleteButton" style="background: red; margin-left:20px;margin-top:15px;height:59,0625px;">Xóa</button>
        </form>
        <form action="{{ route('account.reset_password', $account->id) }}" method="POST" id="resetForm">
          @csrf
          <button type="button" class="app-content-headerButton deleteButton" id="resetButton" style="background:brown; margin-left:20px;height:59,0625px; width:80px;">Đặt lại</button>
      </form>
      <div class="confirmation-dialog" id="confirmationDialog" style="display: none;">
        <h2>Xác nhận</h2>
        <p>Bạn có chắc chắn muốn đặt lại mật khẩu không?</p>
        <div class="confirmation-dialog-buttons">
            <button class="cancel" id="cancelButton">Hủy</button>
            <button class="confirm" id="confirmButton">Xác nhận</button>
        </div>
    </div>
    </div>
      <div class="product-cell price"><span class="cell-label">Price:</span>$560</div>
    </div>
    @endforeach
  </div>
  @if ($accounts->lastPage() > 1)
  <div class="pagination">
      <ul>
          <li><a href="{{ $accounts->url(1) }}">Đầu</a></li>
          @for ($i = 1; $i <= $accounts->lastPage(); $i++)
              <li><a class="{{ $accounts->currentPage() == $i ? 'active' : '' }}" href="{{ $accounts->url($i) }}">{{ $i }}</a></li>
          @endfor
          <li><a href="{{ $accounts->url($accounts->lastPage()) }}">Cuối</a></li>
      </ul>
  </div>
  @endif
  
  
@endsection
<script>
  document.getElementById("resetButton").addEventListener("click", function() {
      if (confirm("Bạn có chắc chắn muốn đặt lại mật khẩu không?")) {
          document.getElementById("resetForm").submit();
      }
  });
</script>
<script>
  // Đoạn mã JavaScript này sẽ chạy khi người dùng nhấn nút Xóa
  document.addEventListener("DOMContentLoaded", function() {
    // Lắng nghe sự kiện click trên nút Xóa
    document.querySelectorAll(".deleteButton").forEach(button => {
      button.addEventListener("click", function(event) {
        // Ngăn chặn hành vi mặc định của nút Xóa (chẳng hạn chuyển hướng sang một trang khác)
        event.preventDefault();
        // Hiển thị hộp thoại xác nhận và xác định hành động dựa trên câu trả lời
        if (confirm("Bạn có chắc chắn muốn xóa tài khoản này không?")) {
          // Nếu người dùng đồng ý, tiến hành gửi yêu cầu xóa thông qua form
          const form = button.closest("form");
          if (form) {
            form.submit();
          }
        }
      });
    });
  });
</script>

</body>
</html>