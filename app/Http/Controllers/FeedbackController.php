<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Feedback;
class FeedbackController extends Controller
{
    public function testimonial(){
        $feedbacks=Feedback::with('users')->get();
        return view("testimonial.index",compact('feedbacks'));
           } 
    public function store_feedback(Request $request){
        if(Auth::check()){
            $user=Auth::user();
            $userid=$user->id;
$feedback =new Feedback();
$feedback->name=$request->input('name');
$feedback->email=$request->input('email');
$feedback->phone=$request->input('phone');
$feedback->choose=$request->input('satisfy');
$feedback->content=$request->content;
$feedback->user_id=$userid;
$feedback->save();

return redirect()->route('testimonial')->with('gửi thành công','cảm ơn bạn đã đánh giá');
        }
        
            return redirect()->route('login.index');
        
    }
}
