<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\AuditLog;
use App\Models\Faculty;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;
use WhichBrowser\Parser;


class AuthController extends Controller
{
    use HasApiTokens, HasFactory;



    public function dashboard(Request $request)
    {
        $guests = [];
        $mostActiveUsers = [];
        $mostUsedBrowsers = [];
        $mostVisitedUrls = [];
        $articles = [];

        $user = auth()->user();

        AuditLog::create([
            'user_id' => $user->id,
            'url' => $request->fullUrl(),
            'timestamp' => now(),
            // 'browser' => $browserDescription,
        ]);

        // Check if the user is a Marketing Coordinator
        if ($user->hasRole(['Admin'])) {


            // Find the most used browser

            $mostUsedBrowsers = DB::table('audit_logs')
                ->select('browser', DB::raw('COUNT(*) as usage_count'))
                ->groupBy('browser')
                ->orderByDesc('usage_count')
                ->limit(3)
                ->get();



            // Find the most active user
            $mostActiveUsers = DB::table('audit_logs')
                ->select('users.name as user_name', 'roles.name as role_name', 'faculties.name as faculty_name', DB::raw('COUNT(*) as visit_count'))
                ->join('users', 'audit_logs.user_id', '=', 'users.id')
                ->leftJoin('assigned_roles', 'users.id', '=', 'assigned_roles.user_id')
                ->leftJoin('roles', 'assigned_roles.role_id', '=', 'roles.id')
                ->leftJoin('faculties', 'assigned_roles.faculty_id', '=', 'faculties.id')
                ->groupBy('audit_logs.user_id', 'users.name', 'roles.name', 'faculties.name')
                ->orderByDesc('visit_count')
                ->limit(3)
                ->get();



            // Find the most visited URL
            $mostVisitedUrls = DB::table('audit_logs')
                ->select('url', DB::raw('COUNT(*) as visit_count'))
                ->groupBy('url')
                ->orderByDesc('visit_count')
                ->limit(3)
                ->get();
        }


        // Check if the user is a Marketing Coordinator
        if ($user->hasRole(['Marketing Coordinator'])) {
            // Retrieve the Marketing Coordinator's faculty ID
            $facultyId = $user->assignedRoles->first()->faculty_id;
            // $facultyId = 1;
            // dd($user->assignedRoles->first()->faculty_id);

            // Retrieve articles submitted by students of the Marketing Coordinator's faculty
            $articles = Article::whereHas('user.assignedRoles', function ($query) use ($facultyId) {
                $query->where('faculty_id', $facultyId);
            })->get();

            // see guest
            $guests = User::whereHas('assignedRoles', function ($query) use ($facultyId) {
                $query->where('name', 'Guest')
                    ->where('faculty_id', $facultyId);
            })->get();
        }

        if ($user->hasRole(['Marketing Manager'])) {
            // For other users, retrieve all articles
            $articles = Article::where('is_selected', 1)->get();
        }

        if ($user->hasRole(['Student'])) {
            // Retrieve the student's own contributions (articles)
            $articles = $user->articles;
        }


        if ($user->hasRole(['Guest'])) {
            // Retrieve the guest's own contributions (articles) from the same faculty with is_selected set to 1
            $facultyId = $user->assignedRoles->first()->faculty_id;

            // Retrieve articles submitted by students of the Marketing Coordinator's faculty with is_selected set to 1
            $articles = Article::whereHas('user', function ($query) use ($facultyId) {
                $query->whereHas('assignedRoles', function ($query) use ($facultyId) {
                    $query->where('faculty_id', $facultyId);
                });
            })->where('is_selected', 1)->get();
        }



        // Load faculties for display
        $faculties = Faculty::all();
        return view('frontend/Marketing Coordinator/coordinator-dashboard', compact('articles', 'faculties', 'mostActiveUsers', 'mostVisitedUrls', 'mostUsedBrowsers', 'guests'));
    }



    public function logout(Request $request)
    {

        auth()->logout();
        return redirect('/login')->with('success', 'Good Bye');
    }


    public function login()
    {
        return view('login');
    }


    public function apiLogin()
    {

        // dd(Request()->all());
        $cleanData = Request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);


        if (auth()->attempt($cleanData)) {

            $user = Auth::user();
            $previousLogin = $user->last_login_at; // Store the previous login timestamp
            $user->last_login_at = now(); // Update last_login_at column with current timestamp
            $user->save();


            // Save the audit log entry to the database

            $userAgent = Request()->header('User-Agent');
            $browserInfo = new Parser($userAgent);

            // Create a description of the browser
            $browserDescription = $browserInfo->toString(); // Example output: "Chrome 89 on Windows 10"

            AuditLog::create([
                'user_id' => $user->id,
                // 'url' => $request->fullUrl(),
                'timestamp' => now(),
                'browser' => $browserDescription,
            ]);



            return redirect('/dashboard')->with([
                'success', 'Welcome Back ' . auth()->user()->name,
            ])
                ->withCookie(cookie('previousLogin', $previousLogin));;

            // $token = auth()->user()->createToken('AuthToken')->plainTextToken;

            // return response()->json(['token' => $token], 200);

        } else {
            return back()->withErrors([
                'email' => 'Your Credentials is something wrong'
            ]);
        }
    }
}