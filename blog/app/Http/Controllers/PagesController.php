<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Mail;
use Session;


class PagesController extends Controller
{
    public function getIndex()
    {
        $posts = Post::orderBy('created_at')->limit(4)->get();

        return view('pages.welcome')->withPosts($posts);
    }    

    public function getAbout()
    {
        return view('pages.about');
    }
    public function getContact()
    {
        return view('pages.contact');
    }
    public function postContact(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|email',
            'subject'=>'min:3',
            'message'=>'min:10'
        ]);
        $data = [
            'email'=>$request->email,
            'subject'=>$request->subject,
            'bodyMessage'=>$request->message,
        ];
        Mail::send('emails.contact',$data, function($message) use($data){
            $message->from($data['email']);
            $message->to('chiranjibi@gmail.com');
            $message->subject($data['subject']);
        });

        Session::flash('success','Email sent successfully');

        return view('pages.contact');
    }
}
?>