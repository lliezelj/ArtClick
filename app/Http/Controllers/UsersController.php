<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Intervention\Image\Facades\Image;
use Illuminate\Http\UploadedFile;

class UsersController extends Controller
{
    public function index(){

        $users = User::all();
        return view('AM.am-users', compact('users'));
    }

    public function addAdmin(Request $request)
    {
        // Check if the request contains the submit action
        if ($request->has('submit')) {
            $last_name = $request->input('last_name');
            $first_name = $request->input('first_name');
            $email = $request->input('email');
            $password = $request->input('password');
            $cpassword = $request->input('cpassword');
            $phone_number = $request->input('phone_number');
            $street_address = $request->input('street_address');
            $barangay = $request->input('barangay');
            $town_city = $request->input('town_city');
            $role = 'admin';

            $profileImagePath = null;

            if ($request->hasFile('profile_image') && $request->file('profile_image') instanceof UploadedFile) {
                $profileImage = $request->file('profile_image');

                $ext = $profileImage->getClientOriginalExtension();
                if (!in_array($ext, ['jpg', 'png', 'jpeg'])) {
                    return redirect()->back()->with('error', 'Image must be a jpg, png, or jpeg.');
                }

                // Create a unique filename with a timestamp and the original file name
                $profile_image = time() . '_' . $profileImage->getClientOriginalName();

                // Resize and save the image
                $image = Image::make($profileImage->getRealPath())->fit(300, 300);
                $image->save(public_path('storage/pictures/' . $profile_image), 100);

                $profileImagePath = $profile_image;
            }

            // Validate password confirmation
            if ($password != $cpassword) {
                return redirect()->back()->with('error', 'Passwords do not match.');
            }

            $data = [
                'last_name' => $last_name,
                'first_name' => $first_name,
                'email' => $email,
                'password' => Hash::make($password),
                'phone_number' => $phone_number,
                'street_address' => $street_address,
                'barangay' => $barangay,
                'town_city' => $town_city,
                'role' => $role,
                'profile_image' => $profileImagePath,
            ];

            // Create the admin user
            $user = User::create($data);

            if ($user) {
                $user->sendEmailVerificationNotification();
                return redirect()->back()->with('success', 'Admin added successfully. Please check your email for verification.');
            } else {
                return redirect()->back()->with('error', 'Something went wrong.');
            }
        }

        return redirect()->back()->with('error', 'Submission error.');
    }

    public function account(){
    $user = Auth::user();
    return view('customer.account',compact('user'));
    }

    public function cpassword(){
        $user = Auth::user();
        return view('customer.change-password',compact('user'));

    }

    public function update(Request $request, User $user)
    {
        $data = $request->all(); // Retrieve all request data
        $profileImagePath = $user->profile_image; // Keep existing image unless updated
    
        if ($request->hasFile('profile_image') && $request->file('profile_image') instanceof UploadedFile) {
            $profileImage = $request->file('profile_image');
    
            $ext = $profileImage->getClientOriginalExtension();
            if (!in_array($ext, ['jpg', 'png', 'jpeg'])) {
                return redirect()->back()->with('error', 'Image must be a valid file type (jpg, png, jpeg).');
            }
    
            // Create a unique file name
            $profile_image = time() . '_' . $profileImage->getClientOriginalName();
    
            // Resize and save the image
            $image = Image::make($profileImage->getRealPath())->fit(300, 300);
            $image->save(public_path('storage/pictures/' . $profile_image), 100);
    
            // Delete the old image if it exists
            if ($profileImagePath && file_exists(public_path('storage/pictures/' . $profileImagePath))) {
                unlink(public_path('storage/pictures/' . $profileImagePath));
            }
    
            $profileImagePath = $profile_image;
        }
    
        $phone_number = $request->input('phone_number');
    
        if (substr($phone_number, 0, 3) !== '+63') {
            $phone_number = '+63' . substr($phone_number, 1); // Remove leading 0 and add +63
        }
    
        // Update user attributes
        $user->update([
            'last_name' => $request->input('last_name'),
            'first_name' => $request->input('first_name'),
            'email' => $request->input('email'),
            'profile_image' => $profileImagePath,
            'phone_number' => $phone_number,
            'street_address' => $request->input('street_address'),
            'barangay' => $request->input('barangay'),
            'town_city' => $request->input('town_city'),
        ]);
    
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
    
    public function updatePassword(Request $request, User $user)
    {
        if ($request->has('submit')) {
            $data = $request->all(); 
    
            $currentPassword = $request->input('password');
            $newPassword = $request->input('npassword');
            $cnPassword = $request->input('cnpassword');
    
            // Check if the current password matches the stored password
            if (!Hash::check($currentPassword, $user->password)) {
                return redirect()->back()->with('error', 'Incorrect Current Password');
            }
    
            // Check if new password matches the confirmation password
            if ($newPassword != $cnPassword) {
                return redirect()->back()->with('error', 'Password did not match');
            }
    
            // Check if the new password is the same as the current password
            if (Hash::check($newPassword, $user->password)) {
                return redirect()->back()->with('error', 'Old password cannot be used as the new password');
            }
    
            // Update the password
            $user->update([
                'password' => Hash::make($newPassword),
            ]);
    
            return redirect()->back()->with('success', 'Password updated successfully.');
        }
    }
    
    
}
