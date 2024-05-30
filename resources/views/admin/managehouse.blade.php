<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <script src="/js/house.js"></script>
  <style>
    .product-cell-image{
      height: 50px;
      width: 50px;
      margin-bottom: 5px;
      padding: 15px;
      color: white;
    }
    #jj{
      width:50px;
      height:36,8px;background-color:red;
    }
    .products-header {
    display: flex;
    flex-wrap: wrap;
}

.product-cell {
    flex: 1 0 auto;
    text-align: center;
    padding: 5px;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    color: white;
}

.product-cell button {
    border: none;
    background: none;
    cursor: pointer;
}
.products-row {
    display: flex;
    align-items: center;
    border-bottom: 1px solid #ccc;
    padding: 10px 0;
}

.product-cell {
    flex: 1;
    padding: 0 10px;
    overflow: hidden;
    text-overflow: ellipsis;
}

.product-cell-image, .product-cell {
    max-width: 100px;
}

.product-cell.status-cell {
    max-width: 150px;
}

.product-cell.stock {
    text-align: center;
}

.product-cell.price {
    text-align: right;
}
.product-cell.sales {
    position: relative;
    width: 200px; /* Điều chỉnh chiều rộng của slide container */
    overflow: hidden;
}

.product-cell.sales {
    position: relative;
    width: 200px; /* Điều chỉnh chiều rộng của slide container */
    overflow: hidden;
}


/* CSS cho slider */

.pagination {
        position: relative;
            margin-top: 50px;
            justify-content: start;

        }
        .pagination ul {
          position: absolute;
          right: 700px;
          width: 500px;
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
   
        /* Style cho hộp thoại xác nhận */


  </style>
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

<a href="{{route('test')}}">test</a>
<div class="app-content-header">
    <h1 class="app-content-headerText">Quản lý tài khoản</h1>
    <button class="mode-switch" title="Switch Theme">
      <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
        <defs></defs>
        <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
      </svg>
    </button>
    <a class="app-content-headerButton" href="{{route('create_house')}}">Thêm nhà</a>
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
        <div class="product-cell-image">Id</div>
        <div class="product-cell category">Tiêu đề<button class="sort-button">...</button></div>
        <div class="product-cell status-cell">Nội dung<button class="sort-button">...</button></div>
        <div class="product-cell sales">Tác giả<button class="sort-button">...</button></div>
        <div class="product-cell sales">Phòng ngủ<button class="sort-button">...</button></div>
        <div class="product-cell sales">Phòng WC<button class="sort-button">...</button></div>
        <div class="product-cell sales">Diện tích<button class="sort-button">...</button></div>
        <div class="product-cell sales">Điện thoại<button class="sort-button">...</button></div>
        <div class="product-cell price">Ảnh<button class="sort-button">...</button></div>
        <div class="product-cell price" style="margin-left:90px;">Thời gian tạo<button class="sort-button">...</button></div>
        <div class="product-cell price">Thời gian cập nhật<button class="sort-button">...</button></div>
        <div class="product-cell stock">Số Likes<button class="sort-button">...</button></div>
        <div class="product-cell stock">Thao tác<button class="sort-button">...</button></div>
        
    </div>
</div>

@foreach($houses as $house)
<div class="products-row">
    
    <div class="product-cell-image">
        <span>{{$house->id}}</span>
    </div>
    
    <div class="product-cell category">{{$house->title}}</div>
    <div class="product-cell status-cell">{{$house->content}}</div>
    <div class="product-cell sales">{{$house->author}}</div>
    <div class="product-cell sales">{{$house->bed}}</div>
    <div class="product-cell sales">{{$house->bath}}</div>
    <div class="product-cell sales">{{$house->size}}</div>
    <div class="product-cell sales">{{$house->phone}}</div>
    <div class="product-cell sales" style="height:100px;max-width:200px;">
      @foreach($house->imagePosts as $imagePost)
      <img src="{{asset('uploads_house/'.$imagePost->image_url)}}" alt="Image" style="height: 50px;width:50px;">

  @endforeach
 

  </div>
  

        
  
     
  
  
    <div class="product-cell sales">{{$house->created_at}}</div>
    <div class="product-cell sales">{{$house->updated_at}}</div>
    <div class="product-cell stock">
      <!-- Hiển thị số lượt thích tương ứng với mỗi nhà -->
      {{ $likeCounts[$house->id]->total_likes ?? 0 }}
  </div>
    <div class="product-cell stock">
        <a href="{{route('edit_house',$house->id)}}" class="app-content-headerButton">Sửa</a>
        <form id="deleteForm" action="{{route('delete_house',$house->id)}}" method="POST">
            @csrf
            @METHOD('DELETE')
            <button type="submit" class="app-content-headerButton deleteButton" id="deleteButton">Xóa</button>
        </form>
    </div>

</div>
@endforeach

  </div>

  @if ($houses->lastPage() > 1)
  <div class="pagination">
      <ul>
          <li><a href="{{ $houses->url(1) }}">Đầu</a></li>
          @for ($i = 1; $i <= $houses->lastPage(); $i++)
              <li><a class="{{$houses->currentPage() == $i ? 'active' : '' }}" href="{{ $houses->url($i) }}">{{ $i }}</a></li>
          @endfor
          <li><a href="{{ $houses->url($houses->lastPage()) }}">Cuối</a></li>
      </ul>
  </div>
  @endif
  

@endsection


</body>
</html>