<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Laravel\Socialite\Facades\Socialite;

class GithubLoginController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('github')->redirect();
    }

    public function login()
    {
        $githubUser = Socialite::driver('github')->user();

        $user = User::updateOrCreate([
            'github_id' => $githubUser->id,
        ], [
            'name' => $githubUser->name,
            'email' => $githubUser->email,
            'github_profile' => $githubUser->user['html_url'] ?? null
        ]);

        Auth::login($user);

        return redirect()->route('home');
    }
}
