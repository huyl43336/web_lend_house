<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Homecontent;
use App\Models\Comment;
use App\Models\House;
use App\Models\ImagePost;
use App\Models\Contact;
use App\Models\Like;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function layout(){
        $accounts=User::all();
        return view('layout.layout2',compact('accounts'));
    }
    public function index()
    {
        $users=User::with('houses','comments','likes')->paginate(6);
        $comment=Comment::with('house');
        $like=Like::with('house');
        return view('admin.index',compact('users'));
    }
    public function showLikesCount()
    {
    
        $houses = House::all();
        $likesCounts = [];
        foreach ($houses as $house) {
            $count = DB::table('likes')->where('house_id', $house->id)->count();
            $likesCounts[$house->id] = $count;
          
        }
       
        return view('admin.manage', ['likesCounts' => $likesCounts]);

    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,User $user)
    {
        $validatedData = $request->validate([
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
            'role' => 'required',
            'avatar' => 'mimes:png,jpeg,jpg|max:2048',
        ]);
        
        $hashedPassword = Hash::make($validatedData['password']);
        
   
        $filePath = public_path('uploads');
        
     
        $user = new User();
        $user->username = $validatedData['username'];
        $user->email = $validatedData['email'];
        $user->password = $hashedPassword;
        $user->role = $validatedData['role'];
   
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $file_name = time() . $file->getClientOriginalName();
        
      
            $file->move($filePath, $file_name);
        
       
            $user->avatar = $file_name;
        }
        
   
        $user->save();
        
   
        return redirect()->route('admin.index')->with('success', 'Đăng ký thành công');
        
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
    public function edit(User $account)
    {
        return view('admin.edit',compact('account'));
    }

    /**
     * Update the specified resource in storage.
     */
  
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, User $account){
        $account->delete();
        return redirect()->route('admin.manage',compact('account'))->with('Xóa thành công');
    }
    
        public function edit_house(House $house){
     
            return view('admin.edit_house',['house'=>$house]);
        }
    
    public function manage(){
        $accounts = DB::table('users')->orderBy("id", "desc")->paginate(10);
        
        return view('admin.manage',compact('accounts'));
    }
    public function logout(Request $request){
        Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect()->route('login.index');
    }
    public function update(Request $request, User $account)
{
    $validatedData = $request->validate([
        'username' => 'required',
        'email' => 'required|email|unique:users,email,' . $account->id,
        'phone' => '',
        'role'=>'',
    ]);
    

    $account->update($validatedData);
    

    if ($request->hasFile('avatar')) {

        if ($account->avatar) {
            $oldAvatarPath = public_path('uploads/') . $account->avatar;
            if (file_exists($oldAvatarPath)) {
                unlink($oldAvatarPath);
            }
        }
    
        // Lưu trữ ảnh mới
        $file = $request->file('avatar');
        $originalName = $file->getClientOriginalName();
        $fileExtension = $file->getClientOriginalExtension();
        $file_name = time() . '_' . $originalName;
        $file->move(public_path('uploads'), $file_name);
        $account->avatar = $file_name;
    }
    $account->save(); 
    return redirect()->route('admin.manage')->with('success','Cập nhật thông tin thành công');
    
}
public function homemanage(){
    $homes=Homecontent::all();
    
return view('admin.managehome',compact('homes'));

}
public function homeedit(Homecontent $home){
    return view('admin.home_edit',compact('home'));
}
public function update_home(Request $request,Homecontent $home){
    $validatedData = $request->validate([
        'caption_carousel' => 'required',
        'carousel'=>'',
    ]);
    

    $home->update($validatedData);
    

    if ($request->hasFile('carousel')) {
  
        if ($home->carousel) {
            $oldAvatarPath = public_path('uploads_home/') . $home->carousel;
            if (file_exists($oldAvatarPath)) {
                unlink($oldAvatarPath);
            }
        }
    

        $file = $request->file('carousel');
        $originalName = $file->getClientOriginalName();
        $fileExtension = $file->getClientOriginalExtension();
    
        $file_name = time() . '_' . $originalName;
    
    
        $file->move(public_path('uploads_home'), $file_name);

        $home->carousel = $file_name;
    }
    

    $home->save();
    
    return redirect()->route('homemanage');
}
public function create_home(Homecontent $home){
    return view('admin.create_home',compact('home'));
}
public function store_content_home(Request $request,Homecontent $home){
    $validatedData = $request->validate([
        'carousel' => '',
        'caption_carousel'=>'',
    ]);


    $filePath = public_path('uploads_home/');
    $home = new Homecontent();
    
    $home->carousel=$validatedData['carousel'];
    $home->caption_carousel=$validatedData['caption_carousel'];
    if ($request->hasFile('carousel')) {
        $file = $request->file('carousel');
        $file_name = time() . $file->getClientOriginalName();
        $file->move($filePath, $file_name);
        $home->carousel = $file_name;
    }
    $home->save();
    return redirect()->route('homemanage')->with('success', 'Thêm nội dung trang chủ thành công');
}
public function housemanage() {
    $houses = House::with('imagePosts')->paginate(5);
    $houses = House::with('imagePosts')->paginate(5);
    $likeCounts = Like::select('house_id', DB::raw('COUNT(*) as total_likes'))
                        ->groupBy('house_id')
                        ->get()
                        ->keyBy('house_id');

    return view('admin.managehouse', compact('houses', 'likeCounts'));


}

public function deletehome(Request $request,Homecontent $home){
    $home->delete();
    return redirect()->route('homemanage');
}
public function create_house(){

    return view('admin.create_house');
}
public function test(){
    $houses = House::with('imagePosts')->get();
    return view('admin.test',compact('houses'));
}
public function store_house(Request $request, House $house, ImagePost $imagePost){
    // Validate dữ liệu
    $user=Auth::user();
    $userId=$user->id;
    $validatedData = $request->validate([
        'title' => 'required',
        'author' => 'required',
        'Expirationdate' => 'required',
        'content' => 'required',
        'bed' => 'required',
        'bath' => 'required',
        'area' => 'required',
        'phone' => 'required',
        'price' => 'required',
        'size' => 'required',
       
    ]);
    $house = House::create([
        'title' => $validatedData['title'],
        'author' => $validatedData['author'],
        'Expirationdate' => $validatedData['Expirationdate'],
        'content' => $validatedData['content'],
        'bed' => $validatedData['bed'],
        'bath' => $validatedData['bath'],
        'area' => $validatedData['area'],
        'phone' => $validatedData['phone'],
        'price' => $validatedData['price'],
        'size' => $validatedData['size'],
        'images' => null, 
        
    ]);
    
  
    $houseId = $house->id;
    $house->update(['images' => $houseId]);
    $housea=$house->images;
    if ($request->hasFile('image')) {
        foreach ($request->file('image') as $image) {
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('uploads_house/'), $imageName);
            ImagePost::create([
                'image_url' => $imageName,
                'image_id' => $housea, 
                'house_id' => $house->id,
            ]);
        }
    }

    return redirect()->route('housemanage')->with('success', 'Thêm nội dung cho nhà thành công');
}public function update_house(Request $request, House $house)
{
    $validatedData = $request->validate([
        'title' => 'required',
        'author' => 'required',
        'Expirationdate' => 'required',
        'content' => 'required',
        'bed' => 'required',
        'bath' => 'required',
        'area' => 'required',
        'phone' => 'required',
        'price' => 'required',
        'size' => 'required',
    
    ]);

    $house->update($validatedData);
    if ($request->hasFile('image')) {
        $house->imagePosts()->delete();
        foreach ($request->file('image') as $image) {
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('uploads_house/'), $imageName);
            $house->imagePosts()->create([
                'image_url' => $imageName,
            ]);
        }
    }
    
    return redirect()->route('housemanage')->with('success', 'Cập nhật nội dung cho nhà thành công');
}    
public function delete_house(Request $request,House $house){
    $house->delete();
    return redirect()->route('housemanage');
}
public function contact_us(){
$contacts=Contact::all();
return view('admin.contact',compact('contacts'));
}
public function reset_password(User $account){
    $newPassword = bcrypt('1');
    
    $account=DB::table('users')->where('id', $account->id)->update(['password' => $newPassword]);
    return redirect()->route('admin.manage')->with('success','reset mật khẩu thành công');
}

}
