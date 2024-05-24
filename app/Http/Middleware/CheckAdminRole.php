<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if(Auth::id() == null){
            return redirect()->route('login.index');
        }
        else if (Auth::check()){
            $user = Auth::user();
            if ($user->role === 'admin') {
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

