<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class CheckRegularRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       if(Auth::id()==null){
        return redirect()->route('login.index');
       }
       else if (Auth::check()){
        $user = Auth::user();
        if ($user->role == 'regular'){
            // Nếu là admin, cho phép tiếp tục request
            return $next($request);
        }
        else{
           
        }
    }
    // Nếu không phải admin hoặc chưa đăng nhập, chuyển hướng đến trang đăng nhập
    return redirect()->route('login.index');
     
    }
}
