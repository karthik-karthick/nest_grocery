<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function login()
    {
        return view('user.account.login');
    }

    public function forget_password()
    {
        return view('user.account.forget_password');
    }
    public function reset_password()
    {
        return view('user.account.reset_password');
    }


    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
    {
        try {
            // Get user data from Google using stateless authentication
            $googleUser = Socialite::driver('google')->stateless()->user();

            // Check if the user already exists in your database
            $user = User::where('email', $googleUser->email)->first();

            if (!$user) {
                // Download the avatar image
                $imageContents = file_get_contents($googleUser->avatar);

                // Generate a unique file name
                $imageName = Str::random(40) . '.jpg';

                // Define the temporary path where the image will be initially stored
                $tempPath = sys_get_temp_dir() . '/' . $imageName;

                // Save the image contents to the temporary path
                file_put_contents($tempPath, $imageContents);

                // Define the final path where the image will be moved
                $finalPath = 'admin/assets/images/profile_images' . $imageName;

                // Move the image to the final path
                File::move($tempPath, public_path($finalPath));

                // If the user doesn't exist, create a new user
                $user = new User();
                $user->name = $googleUser->name;
                $user->email = $googleUser->email;
                $user->profile_image = $finalPath;
                $user->password = bcrypt(Str::random(40));
                $user->save();
            }

            // Log in the user
            Auth::login($user);

            // Redirect to the desired page after successful login
            return redirect('/home');
        } catch (\Exception $e) {
            // Log the error message
            // Log::error('Google callback error: ' . $e->getMessage());
            return redirect('/login');
        }
    }
}
