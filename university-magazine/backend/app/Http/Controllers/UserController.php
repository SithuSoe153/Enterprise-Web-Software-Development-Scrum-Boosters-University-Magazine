<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\AssignedRole;
use App\Models\Comment;
use App\Models\Faculty;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'faculty_id' => 'required|exists:faculties,id',
            'role' => 'required|numeric', // Assuming 'role' is a numeric ID, adjust validation as needed
        ]);


        // if ($validator->fails()) {
        //     return redirect()->back()
        //     ->withErrors($validator)
        //     ->withInput();
        // }

        // Proceed with user creation if validation passes
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profile' => '../img/default.jpg',

        ]);

        // Assuming the role is directly provided and validated, attach the role and faculty
        AssignedRole::create([
            'user_id' => $user->id,
            'role_id' => $request->role,
            'faculty_id' => $request->faculty_id,
            // Optionally, handle start_time and end_time if needed
        ]);

        // Redirect or return response after successful registration
        return redirect('dashboard')->with('success', 'Registration successful!');
    }



    public function showGuest(Article $article)
    {
        $guests = [];
        $user = auth()->user();

        $facultyId = $user->assignedRoles->first()->faculty_id;

        $guests = User::whereHas('roles', function ($query) use ($facultyId) {
            $query->where('name', 'Guest');
        })->whereHas('assignedRoles', function ($query) use ($facultyId) {
            $query->where('faculty_id', $facultyId);
        })->get();

        return view('frontend/Marketing Coordinator/guest-list', compact('article', 'guests'));
    }

    public function guestProfileUpdate(Request $request, $profile)
    {
        $request->validate([
            'faculitySelect' => 'required|exists:faculties,id',
        ]);

        // Assuming $profile is the user's ID
        $user = User::findOrFail($profile);

        // Update faculty_id through the related model or relationship
        // This example assumes a one-to-many relationship from User to AssignedRoles
        // Adjust according to your actual relationship (e.g., one-to-one might not use `first()`)
        $assignedRole = $user->assignedRoles()->first(); // Get the relevant role or relationship
        if ($assignedRole) {
            $assignedRole->faculty_id = $request->faculitySelect; // Update faculty_id
            $assignedRole->save(); // Save changes
        }

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }


    public function destroyUser(User $user)
    {

        $user->assignedRoles()->delete();
        $user->delete();

        return redirect('user-list')->with('success', 'User deleted successfully!');
    }

    public function userProfile(User $user)
    {
        return view('frontend/Admin/user-profile', compact('user'));
    }

    public function profileUpdate(Request $request)
    {


        $request->validate([
            'name' => 'required|string|max:255',
            'old_password' => [
                'nullable',
                function ($attribute, $value, $fail) {
                    if (!Hash::check($value, auth()->user()->password)) {
                        $fail(__('The old password is incorrect.'));
                    }
                },
            ],
            'password' => 'nullable|string|min:8',
        ]);

        dd($request->all());

        $user = auth()->user();

        // Update name
        $user->name = $request->name;
        // Update password if provided
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        // Update profile image if provided
        if ($request->hasFile('profile')) {
            // Delete the old profile image if exists
            if ($user->profile_image) {
                Storage::delete($user->profile_image);
            }

            // Store the new profile image
            $profileImagePath = $request->file('profile')->store('profile_images', 'public');
            $user->profile = $profileImagePath;
        }

        // Save the updated user profile
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }



    public function adminProfileUpdate(Request $request, User $user)
    {

        // dd($user->name);

        $request->validate([
            'password' => 'nullable|string|min:8',
        ]);


        // $user = auth()->user();

        // Update name
        // $user->name = $request->name;
        // Update password if provided
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        // Update profile image if provided
        if ($request->hasFile('profile')) {
            // Delete the old profile image if exists
            if ($user->profile_image) {
                Storage::delete($user->profile_image);
            }

            // Store the new profile image
            $profileImagePath = $request->file('profile')->store('profile_images', 'public');
            $user->profile = $profileImagePath;
        }

        // Save the updated user profile
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }


    public function submitContributions(Request $request)
    {
        return view('frontend/Student/submit-contributions');
    }
    public function contributionNewsfeed(Request $request)
    {

        $facultyId = auth()->user()->assignedRoles->where('user_id', auth()->user()->id)->first()->faculty_id;

        // $articles = User::whereHas('assignedRoles', function ($query) use ($facultyId) {
        //     $query->where('faculty_id', $facultyId);
        // })->latest()->get();

        $articles = Article::whereHas('user.assignedRoles', function ($query) use ($facultyId) {
            $query->where('user_id', auth()->user()->id)
                ->where('faculty_id', $facultyId);
        })->latest()->get();


        return view('frontend/Student/contribution-newfeeds', compact('articles'));
    }
    public function studentMail(Request $request)
    {

        $comments = Comment::whereHas('article', function ($query) {
            $query->where('user_id', auth()->user()->id);
        })->get();


        return view('frontend/Student/student-mail', compact('comments'));;
    }
    public function studentProfile(Request $request)
    {
        $faculties = Faculty::all();
        return view('frontend/Student/student-profile', compact('faculties'));;
    }

    public function coordinatorMail(Request $request)
    {

        // $comments = Comment::whereHas('user.assignedRoles', function ($query) {
        //     $query->where('role_id', 2); // Assuming 'role_id' is the column name for role ID
        // })->get();

        // dd($comments);


        // $userId = auth()->id(); // Get the ID of the authenticated user

        // $comments = Comment::whereHas('user', function ($query) use ($userId) {
        //     $query->where('id', $userId); // Filter by the ID of the authenticated user
        // })->whereHas('user.assignedRoles', function ($query) {
        //     $query->where('role_id', 2); // Filter by the role ID
        // })->get();


        $user = auth()->user();

        // Retrieve all comments made by the current user
        // $comments = $user->comments;
        $comments = Comment::whereHas('user.assignedRoles', function ($query) {
            $query->where('role_id', 4); // Filter by the role ID
        })->get();

        // Extract the unique articles associated with these comments
        $articles = $comments->map(function ($comment) {
            return $comment->article;
        })->unique();

        // Define an empty array to store all comments and their associated articles
        $allComments = [];

        // Iterate over each article and fetch its comments
        foreach ($articles as $article) {
            $articleComments = $article->comments;
            // Merge the current article's comments into the allComments array
            foreach ($articleComments as $comment) {
                // Add the comment along with its associated article to the allComments array
                $allComments[] = [
                    'comment' => $comment,
                    'article' => $article, // Include the associated article
                ];
            }
        }


        return view('frontend/Marketing Coordinator/coordinator-mail', compact('allComments'));
    }
}