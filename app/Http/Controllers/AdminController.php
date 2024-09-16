<?php

namespace App\Http\Controllers;

use App\Models\idea;
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
    $ideas = idea::with(['comments', 'contributor', 'user.profile'])
    ->get();

// Count total business ideas per department
$ideasCountByDepartment = idea::join('profiles', 'ideas.user_id', '=', 'profiles.user_id')
                     ->select('profiles.department', DB::raw('count(*) as total'))
                     ->groupBy('profiles.department')
                     ->get();

        return view('admin.dashboard', compact('students', 'totalstudent', 'ideasCountByDepartment', 'ideas'));
    }
}
