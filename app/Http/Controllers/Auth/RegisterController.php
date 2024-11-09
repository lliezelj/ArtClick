<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;

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
            'street_address' => ['required', 'string'],
            'barangay' => ['required', 'string'],
            'town_city' => ['required', 'string'],

        ]);
    }

    protected function create(array $data)
    {
        $profileImagePath = null;
    
        if (isset($data['profile_image']) && $data['profile_image'] instanceof UploadedFile) {
            $profileImage = $data['profile_image'];
    
            $ext = $profileImage->getClientOriginalExtension();
            if (!in_array($ext, ['jpg', 'png', 'jpeg'])) {
                return redirect()->back()->with('error', ' image must be an image (jpg, png, jpeg).');
            }
            
            // Create a unique file name with a timestamp and the original file name
            $profile_image = time() . '_' . $profileImage->getClientOriginalName();
            
            // Resize and save the image
            $image = Image::make($profileImage->getRealPath())->fit(300, 300);
            $image->save(public_path('storage/pictures/' . $profile_image), 100);
    
            // Set the path for storing in the database
            $profileImagePath = $profile_image;
        }

        $phone_number = $data['phone_number'];

        if (substr($phone_number, 0, 3) !== '+63') {
            $phone_number = '+63' . substr($phone_number, 1); // Remove leading 0 and add +63
        }
    
        $user = User::create([
            'last_name' => $data['last_name'],
            'first_name' => $data['first_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'profile_image' => $profileImagePath, // Save the same path in the database
            'phone_number' => $phone_number,
            'street_address' => $data['street_address'],
            'barangay' => $data['barangay'],
            'town_city' => $data['town_city'],
        ]);
        
        $user->sendEmailVerificationNotification(); 
        return $user;
    }

    


}