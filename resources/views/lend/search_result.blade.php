@extends('layouts.layout')
<link rel="stylesheet" href="/css/lend.css">
@section('content')
<form action="{{route('search_house')}}" method="GET" style="height: 50px;width:800px;"  class="search-container">
    <input type="text" placeholder="Tìm kiếm..." name="search" value="" style="">
    <button type="submit"><i class="fa fa-search"></i></button>
    </form>
@foreach($houses as $house)
<a class="lend" href="{{route('house.index',$house->id)}}"style="margin-top:50px; position:relative;">
 
    <div class="card-images">
     
        @foreach($house->imagePosts->take(4) as $key => $imagePost)
        <img src="{{ asset('uploads_house/' . $imagePost->image_url) }}" alt="" class="img{{$key+1}}">
    @endforeach
        {{-- <img src="" alt="" class="img1">
        <img src="" alt="" class="img2">
        <img src="" alt="" class="img3">
        <img src="" alt="" class="img4" id="im4"> --}}
    </div>

   
    <div class="contentt">
        <h3>{{$house->title}}</h3>
        <div class="items">
            <span class="spand">{{$house->price}} triệu/tháng</span>
            <span class="spand">{{$house->size}} m²</span>
            <span class="spand"> 111,5 tr/m²</span>
            <span class="spand">{{$house->area}}</span>
            <span class="spand">{{$house->bed}} <i class="fa-solid fa-bed"></i></span>
            <span class="spand">{{$house->bath}} <i class="fa-solid fa-bath"></i></span>
            
        </div>
        <p>
            {{$house->content}}
           </p>
            <hr>
    </div>
    <div class="contacts" style="">
        

        <div class="profile">
            <img src="{{
                asset('uploads/'.$house->users->avatar) 
                }}" alt=""class="avt">
            <div class="name">{{$house->author}}</div>
            <span id="time" class="spand">{{date('d/m/Y H:i', strtotime($house->created_at))}}</span>
                </div>
           
            </div>
</a>
 
 @endforeach
@endsection
