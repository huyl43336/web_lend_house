<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\House;
use App\Models\SaveHouse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Validator;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {  
        if(Auth::check()){
        $user = User::with('save_house.store_house.imagePosts')->findOrFail($id);
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
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        // Lưu ảnh mới vào thư mục uploads
        $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();
        $request->avatar->storeAs('uploads', $avatarName);
        $user->avatar = $avatarName;
        $user->save();
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
    public function change_avatar(Request $request, User $user) {
        $request->validate([
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
                $oldAvatarPath = public_path('uploads/') . $user->avatar;
                if (file_exists($oldAvatarPath)) {
                    unlink($oldAvatarPath);
                }
            }
            $file = $request->file('avatar');
            $originalName = $file->getClientOriginalName();
            $fileExtension = $file->getClientOriginalExtension();
            $file_name = time() . '_' . $originalName;
            $file->move(public_path('uploads'), $file_name);
            $user->avatar = $file_name;
        }
        $user->save();
    
        return redirect()->back()->with('success', 'Avatar của bạn đã được cập nhật thành công.');
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
