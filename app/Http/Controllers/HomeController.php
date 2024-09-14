<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\idea;
use App\Models\ideaRequest;
use App\Models\profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $bicdeas = idea::withCount('comments')->get();

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
        $currentUserId = Auth::id();

        // Get all idea IDs shared by the current user
        $sharedIdeaIds = idea::where('user_id', $currentUserId)
            ->pluck('id'); // Get all IDs of the ideas shared by the current user

    // Get all requests related to the shared ideas
        $requests = ideaRequest::with(['idea', 'idea.user', 'idea.user.profile'])
            ->whereIn('idea_id', $sharedIdeaIds)
            ->get();

        return view('user.requestsbics', compact('requests'));
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

    public function saveRequest(Request $request, $id)
    {

        if (ideaRequest::where('idea_id', $id)->where('user_id', Auth::id())->exists()) {
            return redirect()->back()->with('error',
            'You have already requested to be a contributor for this idea.'
            );
        }

        ideaRequest::create([
            'idea_id' => $id,
            'user_id' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Your request has been submitted.');

    }

    public function contributor()
    {
        return view('user.contributorbics');
    }

    public function contrib()
    {
        return view('user.contribics');
    }

    public function comment($id)
    {
        $idea = idea::findorFail($id);

        return view('user.comment', compact('idea'));
    }


    public function storeComment(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required|string|max:500',
        ]);

        comment::create([
            'idea_id' => $id,
            'user_id' => auth()->id(),
            'content' => $request->input('comment'),
        ]);

        return redirect()->back()->with('success', 'Comment added successfully!');
    }

}
