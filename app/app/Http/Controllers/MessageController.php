<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::with('author')->orderBy("id","desc")->paginate(10);
        return view('dashboard',
            ['messages' =>$messages]
        );
    }

    public function home()
    {
        return view('home',['username' => auth()->user()->name ,
                            'registerdate' =>auth()->user()->created_at,
                            'postcount' =>auth()->user()->messages->count()]);
    }


    public function form()
    {
        return view('addmessage',);
    }


    public function create(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $resp = auth()->user()->messages()->save(new Message([
            'message' => $request->message
        ]));


        if($resp->exists){
            $result  = 'Message added successfully!';
        }else{
            $result = 'Error occurred while trying to add message.';
        }

        return view('addmessage',['result' => $result]);
    }
}
