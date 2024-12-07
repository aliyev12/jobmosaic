<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Header extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $navContent = [
            'home' => [
                'title' => 'Home',
                'url' => '/',
            ],
            'jobs' => [
                'title' => 'All jobs',
                'url' => '/jobs',
            ],
            'add_job' => [
                'title' => 'Add job',
                'url' => '/jobs/create',
            ],
            'saved_jobs' => [
                'title' => 'Saved jobs',
                'url' => '/jobs/saved',
            ],
            'dashboard' => [
                'title' => 'Dashboard',
                'url' => '/dashboard',
            ],
            'sign_in' => [
                'title' => 'Sign in',
                'url' => '/login',
            ],
            'sign_up' => [
                'title' => 'Sign up',
                'url' => '/register',
            ],
        ];
        return view('components.header', compact('navContent'));
    }
}
