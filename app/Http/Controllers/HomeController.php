<?php

namespace App\Http\Controllers;
use Flash;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Homecontent;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use App\Models\House;
use App\Models\Like;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       Auth::check();
       $users=Auth::user();
        $homes=Homecontent::all();
        $categories = Category::with('children')->whereNull('id')->get();
        $housesWithMostLikes = Like::select('house_id', DB::raw('COUNT(*) as total_likes'))
                    ->groupBy('house_id')
                    ->orderByDesc('total_likes') 
                    ->take(6) 
                    ->pluck('house_id'); 
     
$houses = House::whereIn('id', $housesWithMostLikes)->with('imagePosts')->get();

$likeCounts = Like::select('house_id', DB::raw('COUNT(*) as total_likes'))->groupBy('house_id')
->get()
->keyBy('house_id');
$commentCounts=Comment::select('house_id', DB::raw('COUNT(*) as total_comments'))->groupBy('house_id')
->get()
->keyBy('house_id');


        return view('home.index',['categories'=>$categories,'homes'=>$homes,'comments','houses'=>$houses,'likeCounts'=>$likeCounts]);
    }

  
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
   
   
//     public function store_comments(Request $request)
// {
//     if (Auth::check()) {
//         $validateData = $request->validate([
//             'content' => 'required',
//         ]);

//         $newComment = Comment::create($validateData);

//         if ($newComment) {
//             $comments = Comment::all();
//             return view('lend.lend', compact('comments', 'newComment'));
//         } else {
//             return back()->with('error', 'Đã xảy ra lỗi khi lưu bình luận.');
//         }
//     } else {
      
//         return redirect()->route('login.index');
//     }
// }
    
    
public function search(Request $request){
    $searchTerm = $request->input('search');
   
    $minprice = intval($request->input('min-price'));
    $maxprice = intval($request->input('max-price'));
   
    
    $houses = House::where(function ($query) use ($searchTerm) {
        $query->where('title', 'like', '%' . $searchTerm . '%')
              ->orWhere('content', 'like', '%' . $searchTerm . '%')
              ;
    })->get();

    
    
    return view('lend.search_result', compact('houses', 'searchTerm', 'minprice', 'maxprice'));
    
}
    
public function home_search(Request $request){
    $searchTerm = ($request->input('search'));
   
    $minprice = intval($request->input('min-price'));
    $maxprice = intval($request->input('max-price'));
    $bed=intval($request->input('bed'));
    $sizeOption=intval($request->input('size'));
    $bath=intval($request->input('bath'));
    
    
    
    $houses = House::where(function ($query) use ($searchTerm) {
        $query->where('title', 'like', '%'.$searchTerm.'%')
              ->orWhere('content', 'like', '%'.$searchTerm.'%');
    });
    if($bed){
        $houses->where('bed',$bed);
    }
    if($bath){
        $houses->where('bath',$bath);
    }
    if ($minprice && $maxprice) {
        $houses->whereBetween('price', [$minprice, $maxprice]);
       
  
    }
    if ($sizeOption) {
        switch ($sizeOption) {
            case 1:
                $houses->whereBetween('size', [12, 20]);
                break;
            case 2:
                $houses->whereBetween('size', [20, 50]);
                break;
            case 3:
                $houses->whereBetween('size', [50, 70]);
                break;
            case 4:
                $houses->whereBetween('size', [70, 100]);
                break;
            case 5:
                $houses->whereBetween('size', [100, 120]);
                break;
            default:
                // Nếu không chọn option nào, không áp dụng điều kiện về diện tích
                break;
        }
    }
    $houses = $houses->get();
   

    return view('lend.search_result', compact('houses', 'searchTerm', 'minprice', 'maxprice'));
}
    
    
   public function showintro(){
  
    
    return view('introduce.index');

   }
   public function showpage(){
    return view('page.index');
   }
   public function store_contact(Request $request){
$validateData=$request->validate([
'name'=>'',
'email'=>'',
'phone'=>'',
'question'=>'',
'content'=>'',
]);
$contact=Contact::create($validateData);
return redirect()->route('linktopage');
   }
 
   
}

