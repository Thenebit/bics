<?php

namespace App\Http\Controllers;

use App\Models\idea;
use App\Models\profile;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $bicdeas = idea::all();

        return view('home', compact('bicdeas'));
    }

    public function share()
    {
        return view('user.sharebics');
    }

    public function saveShare(Request $request)
    {
        // Validate the form inputs
        $request->validate([
            'bicmsg' => 'required|string|max:500',
            'bipotance' => 'required',
        ]);

        $idea = new idea();
        $idea->description = $request->input('bicmsg');
        $idea->importance = $request->input('bipotance');
        $idea->user_id = auth()->id();
        $idea->save();

        return redirect()->route('home')->with('success', 'Successfully shared business idea. 1 step away from the next big thing!');
    }

    public function requestb()
    {
        return view('user.requestsbics');
    }

    public function profile()
    {
        $user = auth()->user();
        $profile = $user->profile;

        return view('user.profilebics', compact('profile'));
    }

    public function saveProfile(Request $request)
    {
        $request->validate([
            'department' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $user = auth()->user();
        $profile = $user->profile;

        if ($profile) {
            $profile->update([
                'department' => $request->input('department'),
                'description' => $request->input('description'),
            ]);
        } else {
            $profile = new profile([
                'user_id' => $user->id,
                'department' => $request->input('department'),
                'description' => $request->input('description'),
            ]);
            $profile->save();
        }

        return redirect()->route('profilebics')->with('success', 'Profile updated successfully!');
    }


    public function mybic()
    {
        $bicdeas = idea::where('user_id', auth()->id())->get();
        return view('user.mybics', compact('bicdeas'));
    }

    public function contributor()
    {
        return view('user.contributorbics');
    }

    public function contrib()
    {
        return view('user.contribics');
    }

}
