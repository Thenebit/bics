<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\idea;
use App\Models\profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        // Display users in db
        $students = User::with('profile')->get();
        $totalstudent = $students->count();

        // Get all business ideas along with their relationships
        $ideas = Idea::with(['comments', 'contributor', 'user.profile'])
            ->get();

        // Count total business ideas per department
        $ideasCountByDepartment = idea::join('profiles', 'ideas.user_id', '=', 'profiles.user_id')
            ->select('profiles.department', DB::raw('count(*) as total'))
            ->groupBy('profiles.department')
            ->get();

        return view('admin.dashboard', compact('students', 'totalstudent', 'ideas', 'ideasCountByDepartment'));
    }

    public function projectBic($id)
    {
        $user = User::with('profile', 'ideas')
            ->findOrFail($id);

        // Get all the ideas shared by this user
        $ideas = Idea::where('user_id', $user->id)->latest()->get();

        return view('admin.projectbics', compact('user', 'ideas'));
    }

    public function feedback($id)
    {
        $idea = Idea::with('comments', 'user')->findOrFail($id);

        return view('admin.feedback', compact('idea'));
    }

    public function storeFeedback(Request $request, $id)
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
