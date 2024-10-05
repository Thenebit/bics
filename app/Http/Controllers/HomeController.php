<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\contributor;
use App\Models\idea;
use App\Models\ideaRequest;
use App\Models\profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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

    public function dashboard()
    {
        $data = idea::with('user')
                ->latest()
                    ->take(3)
                        ->get();

        return view('user.dashboard', compact('data'));
    }

    public function index()
    {
        $bicdeas = idea::withCount('comments', 'contributor')
        ->latest()
        ->get();

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
            'title' => 'required',
            'bicmsg' => 'required',
            'bipotance' => 'required',
        ]);

        Log::info('Saving business idea:', $request->all());

        $idea = new idea();
        $idea->title = $request->input('title');
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
            ->latest()
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

        $bicdeas = idea::withCount('comments', 'contributor')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('user.mybics', compact('bicdeas'));
    }

    public function saveRequest(Request $request, $id)
    {
        $idea = Idea::findOrFail($id);

        // Check if the logged-in user is the owner of the idea
        if ($idea->user_id == Auth::id()) {
            return redirect()->back()->with('error', 'You cannot request to contribute to your own idea.');
        }

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
        $currentUserId = Auth::id();

        // Get all idea IDs shared by the current user
        $sharedIdeaIds = idea::where('user_id', $currentUserId)
            ->pluck('id'); // Get all IDs of the ideas shared by the current user

        // Get all requests related to the shared ideas
        $contributors = contributor::with(['idea', 'idea.user', 'idea.user.profile'])
            ->whereIn('idea_id', $sharedIdeaIds)
            ->latest()
            ->get();

        return view('user.contributorbics', compact('contributors'));
    }

    public function rejectcontributor($id)
    {
        $request = contributor::findOrFail($id);
        $request->delete();

        return redirect()->back()->with('success', 'Request has been rejected.');
    }

    public function contrib()
    {
        $currentUserId = Auth::id();
        // Get all approved contributions for the current user from the 'contributor' table
        $contributors = contributor::with(['idea', 'idea.user'])
        ->where('user_id', $currentUserId) // Filter by the current user ID
        ->latest()
        ->get();

        return view('user.contribics', compact('contributors'));
    }

    public function cancel($id)
    {
        $request = contributor::findOrFail($id);
        $request->delete();

        return redirect()->back()->with('success', 'Removed from contributing to business idea.');
    }

    public function comment($id)
    {
        $idea = idea::withCount('contributor')
            ->findorFail($id);

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

    public function approval($id)
    {
        $request = IdeaRequest::findOrFail($id);

        contributor::create([
            'idea_id' => $request->idea_id,
            'user_id' => $request->user_id,
        ]);
        $request->delete();

        return redirect()->back()->with('success', 'Request approved successfully.');
    }

    public function reject($id)
    {
        $request = ideaRequest::findOrFail($id);
        $request->delete();

        return redirect()->back()->with('success', 'Request has been rejected.');
    }

    public function edit($id)
    {
        $idea = idea::findOrFail($id);

        return view('user.editbic', compact('idea'));

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'bicmsg' => 'required|string',
            'bipotance' => 'required',
        ]);

        $idea = idea::findOrFail($id);
        $idea->update([
            'description' => $request->input('bicmsg'),
            'importance' => $request->input('bipotance'),
        ]);

        return redirect()->route('home')->with('success', 'Business idea updated successfully!');
    }

    public function remove($id)
    {
        $idea = idea::findOrFail($id);

        if (Auth::id() !== $idea->user_id) {
            return redirect()->back()->with('error', 'You are not authorized to delete this idea.');
        }
        $idea->delete();

        return redirect()->back()->with('success', 'Business idea deleted successfully.');
    }

    public function viewall($id)
    {
        $user = User::with('profile', 'ideas')
            ->findOrFail($id);

        // Get all the ideas shared by this user
        $ideas = Idea::where('user_id', $user->id)->latest()->get();

        return view('user.seeall', compact('user', 'ideas'));
    }

}
