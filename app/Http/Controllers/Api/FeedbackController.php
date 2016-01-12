<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\User;

class FeedbackController extends Controller
{
    public function sendFeedback(Request $request)
    {
        if($this->uploadImage($request->file('image'))) {
            $user = User::find($request->userId);
            $user->projects()->attach($request->projectId, [
                'date' => Carbon::now(),
                'mark' => $request->mark,
                'description' => $request->description,
                'image' => time(). '-' . $request->file('image')->getClientOriginalName(),
                'long' => $request->long,
                'lat' => $request->lat,
            ]);
            return response()->json('success');
        } else {
            return response()->json();
        }


    }

    private function uploadImage($image)
    {
        $fileName = time(). '-' . $image->getClientOriginalName();

        if($image->move(public_path() . '/images/feedback_uploads/', $fileName)) {
            return true;
        }

        return false;
    }
}
