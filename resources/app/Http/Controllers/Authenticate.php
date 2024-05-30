<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreRequest;
class Authenticate extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,User $user)
    {
        $validateData=$request->validate([
            'username'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);
        $hashPassword=Hash::make($validateData['password']);
        $default='avadefault.jpg';

        $user=User::create([
            'username' => $validateData['username'],
            'email'=>$validateData['email'],
            'password' => $hashPassword,
            'role' => 'regular',
            'avatar'=> $default,
        ]);
        return redirect()->route('login.index')->with('Success','Đăng ký thành công');
    }
    public function process_login(StoreRequest $request):RedirectResponse{
        $credentials = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];
        
       
       
        if(Auth::attempt($credentials)){
            $user = Auth::user();
            $userModel = User::find($user->id); 
            if ($userModel && $userModel->role == 'admin') {
                return redirect()->route('admin.index');
            } elseif($userModel && $userModel->role == 'regular') {
                session()->flash('success','chào mừng'.' '.$userModel->username.' '.'đã quay lại');
                return redirect()->route('index');
            }
           elseif(!$userModel && $userModel->role ==''){
            return redirect()->route('index')->with('error', 'Tên đăng nhập hoặc mật khẩu không chính xác');
           }
    
            }
            
          
           

        
     
        
        return redirect()->route('login.index');
        
       
       
        
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
    public function logout(Request $request): RedirectResponse
{
    Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect()->route('login.index');
}
}
