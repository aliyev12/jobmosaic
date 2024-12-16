<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Job;

class BookmarkController extends Controller
{
    // @desc Get all users bookmark
    // @route GET /bookmarks
    public function index(): View
    {
        /**
         * @var \App\Models\User $user
         * @method \Illuminate\Database\Eloquent\Collection|\App\Models\Job[] bookmarkedJobs()
         */
        $user = Auth::user();

        $bookmarks = $user->bookmarkedJobs()->orderBy('job_user_bookmarks.created_at', 'desc')->paginate(9);

        return view('jobs.bookmarked')->with('bookmarks', $bookmarks);
    }

    // @desc Create new bookmark
    // @route POST /bookmarks/{job}
    public function store(Job $job): RedirectResponse
    {
        /**
         * @var \App\Models\User $user
         * @method \Illuminate\Database\Eloquent\Collection|\App\Models\Job[] bookmarkedJobs()
         */
        $user = Auth::user();

        // Check if the job is already bookmarked
        if ($user->bookmarkedJobs()->where('job_id', $job->id)->exists()) {
            return back()->with('status', 'Job is already bookmarked');
        }

        // Create new bookmark
        $user->bookmarkedJobs()->attach($job->id);

        return back()->with('success', 'Job bookmarked successfully!');
    }

    // @desc Remove bookmarked job
    // @route DELETE /bookmarks/{job}
    public function destroy(Job $job): RedirectResponse
    {
        /**
         * @var \App\Models\User $user
         * @method \Illuminate\Database\Eloquent\Collection|\App\Models\Job[] bookmarkedJobs()
         */
        $user = Auth::user();

        // Check if the job is not bookmarked
        if (!$user->bookmarkedJobs()->where('job_id', $job->id)->exists()) {
            return back()->with('status', 'Job is not bookmarked');
        }

        // Remove bookmark
        $user->bookmarkedJobs()->detach($job->id);

        return back()->with('error', 'Bookmark removed successfully!');
    }
}
