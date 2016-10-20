<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;

use App\Models\Messages;

class DefaultController extends Controller
{
    public function index(Request $request)
    {
        $success = '';
        if ($request->isMethod('post')) {
            //dd($request->all());
            $request->flash();
            $data = $request->all();
            $validator = Validator::make($data, [
                'username' => 'required|max:50',
                'email' => 'required|email|max:150',
                'msg' => 'required|max:3000',
                'img' => 'mimes:jpeg,png,bmp',
                'g-recaptcha-response' => 'required|recaptcha',
            ]);

            if ($validator->fails()) {
                return view('default.index',[
                    'errors' => $validator->errors()->all()
                ]);
            }

            $message = new Messages();

            $message->name = $data['username'];
            $message->email = $data['email'];
            $message->msg = $data['msg'];
            $message->url = $data['url'];

            if ($request->hasFile('img')) {
//                if(!(is_dir('upload'))) {
//                    svn_fs_make_dir();
//                }
                $destinationPath = 'upload';
                $fileName = $request->file('img')->getClientOriginalName();
                $request->file('img')->move($destinationPath, $fileName);
                $message->img = $request->file('img')->getClientOriginalName();
            }

            $message->save();

            $success = "Form sent successfully";
        }

        $allMessages = Messages::orderBy('created_at','desc')->paginate(3);

        return view('default.index',[
            'success' => $success,
            'messages' => $allMessages
        ]);
    }
}
