<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\House;
use App\Models\SaveHouse;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {  
        if(Auth::check()){
        $user = User::with('save_house.store_house.imagePosts')->findOrFail($id);
       
    
    // Chuyển đến view và truyền dữ liệu người dùng
    return view('user.index', ['user' => $user]);}
    else{
        return redirect()->route('login.index');
    }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function change_info(Request $request,User $user){
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Loại file và kích thước tối đa của ảnh
        ]);

        // Lưu ảnh mới vào thư mục uploads
        $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();
        $request->avatar->storeAs('uploads', $avatarName);

        // Cập nhật đường dẫn avatar mới vào cơ sở dữ liệu
        $user->avatar = $avatarName;
        $user->save();

        // Trả về thông báo và chuyển hướng đến trang người dùng
        return redirect()->route('user.profile', $user->id)->with('success','Avatar của bạn đã được cập nhật thành công.');
    }
    public function create()
    {
        //
    }
    public function save_house($house_id){
   if(Auth::check()){
     $house=House::find($house_id);
     $houseid=$house->id;
     $user=Auth::user()->id;
     $save=SaveHouse::create([
       'house_id'=>$house_id,
       'user_id'=>$user,
     ]);
     $save->save();
   }
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
    public function change_password(){
        return view('user.changepassword');
    }
    public function process_changepass(Request $request){
        
       $request->validate([
       'oldpassword'=>'required',
       'newpassword'=>'required',
       'confirmpassword'=>'required|same:newpassword',
       ]);
       $current_user=Auth::user();
       if (Hash::check($request->oldpassword, $current_user->password)) {
        $user = User::find($current_user->id);
        $user->password = bcrypt($request->newpassword);
        $user->save();
        return redirect()->back()->with('success', 'Mật khẩu đã được thay đổi.');
    }


    }
    public function change_avatar(Request $request){
        
    $current_account=Auth::user();
    if($request->hasFile('avatar')) {
        $account=User::find($current_account);
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
        $account->save();
        return redirect()->route('index');
    }
    
    
    // Lưu các thay đổi
  
    }
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
}
