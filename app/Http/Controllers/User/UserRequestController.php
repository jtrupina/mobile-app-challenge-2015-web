<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserRequestController extends Controller
{
    /*
     * User sending new request
     */
    public function sendNewRequest(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|max:60',
            'first_name' => 'required|max:30',
            'last_name' => 'required|max:30',
            'description' => 'required'
        ]);

        $userRequest = new \App\Request();
        $userRequest->first_name = $request->first_name;
        $userRequest->last_name = $request->last_name;
        $userRequest->email = $request->email;
        $userRequest->description = $request->description;
        $userRequest->save();

        return redirect()->back()->with('status','You have successfully sent request!');
    }
}
