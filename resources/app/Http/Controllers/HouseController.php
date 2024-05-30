<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\House;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Like;

class HouseController extends Controller
{
    public function show_lend(){

      

     

        $houses = House::with('imagePosts', 'users')->orderBy('created_at','desc')->paginate(5);
       

        

       $posts=DB::table('posts')->orderBy('id','desc')->get();
        return view('lend.index',['posts'=>$posts,'houses'=>$houses]);
    }
    public function search(Request $request){
        $searchTerm = $request->input('search');
        $houses = House::where('title', 'like', '%' . $searchTerm . '%')->orWhere('content','like','%'.$searchTerm.'%')->with('imagePosts')->get();
        return view('lend.search_result', compact('houses', 'searchTerm'));
    }
    public function store_comments(Request $request,$house){
       if(Auth::check()){
        $house=House::find($house);
        $houseid=$house->id;
        $comments=new Comment();
        $comments->user_id=Auth::id();
        $comments->content = $request->content;
        $comments->house_id=$houseid;
        $comments->save();
        return redirect()->route('index');
       }
     
      
      
    }
    public function store_likes(Request $request, $house) {
        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        if (Auth::check()) {
            // Tìm kiếm căn nhà trong cơ sở dữ liệu
            $house1 = House::find($house);
            $houseid=$house1->id;
            // Kiểm tra xem căn nhà có tồn tại hay không
            if ($house1) {
                // Tạo một lượt thích mới
                $like = new Like();// Lấy ID của người dùng đã đăng nhập
                $like->house_id = $house1->id;
                $like->user_id =Auth::id();
                $like->likes=$like->likes+1;
                $like->save();
    
                // Cập nhật số lượt thích của căn nhà
              
    
                // Redirect người dùng sau khi lưu thành công
                return redirect()->route('index')->with('success', 'Lưu lượt thích thành công.');
            } else {
                return redirect()->route('index')->with('error', 'Không tìm thấy căn nhà.');
            }
        } else {
            return redirect()->route('login.index');
        }
    }
    
    public function show_house($houseId)
    {
        $house = House::find($houseId);
       
        // Kiểm tra xem nhà có tồn tại không
        if (!$house) {
            abort(404); // Nếu không tồn tại, trả về trang 404
        }
    
        $comments = Comment::where('house_id', $houseId)->get();
        $categories = Category::all();
        $other_houses = House::where('id', '!=', $houseId)->orderBy('created_at','desc')->with('imagePosts')->get();
        $housesWithMostLikes = Like::select('house_id', DB::raw('COUNT(*) as total_likes'))
                    ->groupBy('house_id')
                    ->orderByDesc('total_likes') 
                    ->take(6) 
                    ->pluck('house_id'); 

                    $housesWithMostComments = Comment::select('house_id', DB::raw('COUNT(*) as total_comments'))
                    ->groupBy('house_id')
                    ->orderByDesc('total_comments') 
                    ->take(4) 
                    ->pluck('house_id'); 

$houses = House::whereIn('id', $housesWithMostLikes)->with('imagePosts')->get();
$count = Comment::where('house_id', Comment::value('house_id'))->count();


$likeCounts = Like::select('house_id', DB::raw('COUNT(*) as total_likes'))
->groupBy('house_id')
->get()
->keyBy('house_id');
        return view('lend.lend', [
            'categories' => $categories,
            'comments' => $comments,
            'house' => $house,
            'other_houses' => $other_houses,
    
            'houses'=>$houses,
            'likeCounts'=>$likeCounts,
            'housesWithMostLikes'=>$housesWithMostLikes,
             'count'=>$count,
            
        ]);
    }
}
