@extends('layouts_admin.layout2')

@section('content')
<style>

 
  .notifications{
  
  height: 600px;
    width: 100%;
    position: relative;
    overflow-y: auto;
  }
  .notifications a{
  height: 100px;
  width: 500px;
  position: relative;
  background-color: red;
 
  
}

.commentss img{
position: absolute;
  height: 80px;
  width: 80px;
}
.commentss p{
  
  height: 100px;
  width: 800px;
  margin-left: 80px;
  margin-top: 10px;
  color: white;
  

}
  .pagination {
        position: fixed;
            margin-top: 45%;

            justify-content: center;
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
</style>
<div class="app-content-header">
   <h1 class="app-content-headerText">Trang liên hệ</h1>
   <button class="mode-switch" title="Switch Theme">
     <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
       <defs></defs>
       <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
     </svg>
   </button>
   <a class="app-content-headerButton" href="{{route('index')}}" style="text-decoration:none; padding-top:3px;">Đi đến trang chủ</a>
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

 

{{-- @if ($contacts->lastPage() > 1)
    <div class="pagination">
        <ul>
            <li><a href="{{$contacts->url(1) }}">Đầu</a></li>
            @for ($i = 1; $i <= $contacts->lastPage(); $i++)
                <li><a class="{{ $contacts->currentPage() == $i ? 'active' : '' }}" href="{{ $contacts->url($i) }}">{{ $i }}</a></li>
            @endfor
            <li><a href="{{ $contacts->url($contacts->lastPage()) }}">Cuối</a></li>
        </ul>
    </div>
@endif --}}


@foreach($contacts->chunk(7) as $chunk)
    <div class="notifications" style="">

        @foreach($chunk as $contact)
           
            

                <a class="commentss" href="" style="text-decoration:none;">
                  
                  
                  
                        <p style="padding-top: 15px; padding-left:10px;">
                            Khách vãng lai có tên là:
                          {{$contact->name}}  và địa chỉ email: {{$contact->email}}, số điện thoại: {{$contact->phone}}
                          đã gửi câu hỏi
                          {{$contact->question}}
                          với nội dung {{ $contact->content }} vào lúc {{ date('d/m/Y H:i', strtotime($contact->created_at)) }}</p>
                
                    
                        </a>
       


          
          
        @endforeach
        
    </div>
@endforeach
@endsection