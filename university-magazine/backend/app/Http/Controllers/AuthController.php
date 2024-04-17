<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\AssignedRole;
use App\Models\AuditLog;
use App\Models\Faculty;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Laravel\Sanctum\HasApiTokens;
use WhichBrowser\Parser;
use App\Mail\RegisterMail;
use App\Models\Magazine;
use Illuminate\Support\Facades\Mail;

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
        // Load faculties for display
        $faculties = Faculty::all();

        $user = auth()->user();

        AuditLog::create([
            'user_id' => $user->id,
            'url' => $request->fullUrl(),
            'timestamp' => now(),
            // 'browser' => $browserDescription,
        ]);

        // Check if the user is a Marketing Coordinator
        if ($user->hasRole(['Admin'])) {

            $magazines = Magazine::all();

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


            return view('frontend/Admin/admin-dashboard', compact('articles', 'faculties', 'mostActiveUsers', 'mostVisitedUrls', 'mostUsedBrowsers', 'guests', 'magazines'));
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

            // List of guests
            $guests = User::whereHas('roles', function ($query) use ($facultyId) {
                $query->where('name', 'Guest');
            })->whereHas('assignedRoles', function ($query) use ($facultyId) {
                $query->where('faculty_id', $facultyId);
            })->get();

            return view('frontend/Marketing Coordinator/coordinator-dashboard', compact('articles', 'faculties', 'mostActiveUsers', 'mostVisitedUrls', 'mostUsedBrowsers', 'guests'));
        }

        if ($user->hasRole(['Marketing Manager'])) {
            // For other users, retrieve all articles
            $articles = Article::where('is_selected', 1)->get();
            $magazines = Magazine::all();

            if ($request->query('faculty')) {


                $facultyId = $request->query('faculty');

                $faculty = Faculty::find($facultyId);

                // Retrieve articles submitted by students of the Marketing Coordinator's faculty
                $articles = Article::whereHas('user.assignedRoles', function ($query) use ($facultyId) {
                    $query->where('faculty_id', $facultyId)->where('is_selected', 1);
                })->get();

                // see guest
                $guests = User::whereHas('roles', function ($query) use ($facultyId) {
                    $query->where('name', 'Guest');
                })->whereHas('assignedRoles', function ($query) use ($facultyId) {
                    $query->where('faculty_id', $facultyId);
                })->get();

                return view('frontend/Marketing Manager/manager-dashboard-detail', compact('articles', 'faculty', 'mostActiveUsers', 'mostVisitedUrls', 'mostUsedBrowsers', 'guests'));
            }

            return view('frontend/Marketing Manager/manager-dashboard', compact('articles', 'faculties', 'mostActiveUsers', 'mostVisitedUrls', 'mostUsedBrowsers', 'guests', 'magazines'));
        }

        if ($user->hasRole(['Student'])) {
            // Retrieve the student's own contributions (articles)
            $articles = $user->articles()->latest()->get();

            return view('frontend/Student/student-dashboard', compact('articles', 'faculties', 'mostActiveUsers', 'mostVisitedUrls', 'mostUsedBrowsers', 'guests'));
        }


        if ($user->hasRole(['Guest'])) {
            // Retrieve the guest's own contributions (articles) from the same faculty with is_selected set to 1
            $facultyId = $user->assignedRoles->first()->faculty_id;

            // Retrieve articles submitted by students of the Marketing Coordinator's faculty with is_selected set to 1
            $articles = Article::whereHas('user', function ($query) use ($facultyId) {
                $query->whereHas('assignedRoles', function ($query) use ($facultyId) {
                    $query->where('faculty_id', $facultyId);
                });
            })->where('is_selected', 1)->latest()->get();

            return view('frontend/Guest/guest-dashboard', compact('articles', 'faculties', 'mostActiveUsers', 'mostVisitedUrls', 'mostUsedBrowsers', 'guests'));
        }



        return view('dashboard', compact('articles', 'faculties', 'mostActiveUsers', 'mostVisitedUrls', 'mostUsedBrowsers', 'guests'));
    }



    public function logout(Request $request)
    {

        auth()->logout();
        return redirect('/login')->with('success', 'Good Bye');
    }


    public function create()
    {
        $faculties = Faculty::all();
        return view('frontend/Guest/guest-register', compact('faculties'));
    }


    public function store(Request $request)
    {
        $cleanData = request()->validate([
            'name' => 'required',
            'email' => ['required', Rule::unique('users', 'email')],
            'password' => [
                'required', 'string', 'min:8', 'confirmed'
            ],
            'faculty_id' => 'required|exists:faculties,id',
            'role' => 'required|numeric',
        ]);

        // Create the new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Find the Marketing Coordinator of the specified faculty
        $marketingCoordinator = AssignedRole::where('faculty_id', $request->faculty_id)
            ->where('role_id', 2) // Assuming 2 represents the Marketing Coordinator role
            ->first();
        $facultyName = Faculty::find($request->faculty_id)->name;

        if ($marketingCoordinator) {
            // Retrieve the email address of the Marketing Coordinator
            $coordinatorEmail = User::find($marketingCoordinator->user_id)->email;
            $coordinatorName = User::find($marketingCoordinator->user_id)->name;

            // Send email with necessary details of the new user
            try {
                Mail::to($coordinatorEmail)
                    ->queue(new RegisterMail($user, $facultyName, $coordinatorName));
            } catch (\Throwable $th) {
                return response()->json(['success' => 'Account Creation Not Successful']);
            }
        }

        // Assign role and faculty to the user
        AssignedRole::create([
            'user_id' => $user->id,
            'role_id' => $request->role,
            'faculty_id' => $request->faculty_id,
        ]);

        auth()->login($user);
        return redirect('/dashboard')->with('success', 'Welcome to MMS ' . $user->name);
    }




    public function login()
    {
        return view('frontend/Guest/guest-login');
    }

    public function apiLogin()
    {
        // Validate the incoming request
        $cleanData = Request()->validate([
            'email' => ['required', 'email', Rule::exists('users', 'email')],
            'password' => ['required']
        ]);

        // Attempt to retrieve the user by email
        $user = User::where('email', $cleanData['email'])->first();

        if ($user && Hash::check($cleanData['password'], $user->password)) {
            // The user exists and the password is correct

            Auth::login($user);
            $previousLogin = $user->last_login_at; // Store the previous login timestamp
            $user->last_login_at = now(); // Update last_login_at column with current timestamp
            $user->save();

            // Save the audit log entry to the database
            $userAgent = Request()->header('User-Agent');
            $browserInfo = new Parser($userAgent);
            $browserDescription = $browserInfo->toString(); // Example output: "Chrome 89 on Windows 10"

            AuditLog::create([
                'user_id' => $user->id,
                'timestamp' => now(),
                'browser' => $browserDescription,
            ]);

            return redirect('/dashboard')->with('success', 'Welcome Back ' . $user->name)
                ->withCookie(cookie('previousLogin', $previousLogin));
        } elseif ($user) {
            // The user was found but the password does not match
            return back()->withInput()->withErrors([
                'password' => 'The provided password does not match our records.',
            ]);
        } else {
            // This block is technically unnecessary due to the validation rule that checks the user's email exists
            // Included for completeness and future flexibility
            return back()->withInput()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
    }
}