<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/homepage';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'last_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'profile_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:5120'],
            'phone_number' => ['required', 'string', 'regex:/^[0-9]{10,15}$/'],
        ]);
    }

    protected function create(array $data)
    {
        $profileImagePath = null;

        if (isset($data['profile_image']) && $data['profile_image'] instanceof UploadedFile) {
            $profileImage = $data['profile_image'];
            $imageName = time() . '.' . $profileImage->getClientOriginalExtension();
            $profileImagePath = $profileImage->storeAs('pictures', $imageName, 'public');
        }

        $user = User::create([
            'last_name' => $data['last_name'],
            'first_name' => $data['first_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'profile_image' => $profileImagePath,
            'phone_number' => $data['phone_number'],
        ]);

        $user->sendEmailVerificationNotification(); 
        return $user;
    }
}
