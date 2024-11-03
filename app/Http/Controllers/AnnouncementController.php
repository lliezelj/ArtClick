<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class AnnouncementController extends Controller
{
   public function index(){
    $announcements = Announcement::orderBy('created_at', 'asc')->get();
    return view('customer.announcement',compact('announcements'));
   }

   public function adminIndex(){
    $announcements = Announcement::all();
    return view('AM.am-announcement', compact('announcements'));
   }
   public function announcementStore(Request $request){
    if($request->has('submit')){
        $title = $request->input('title');
        $start = Carbon::parse($request->input('start'));
        $end = Carbon::parse($request->input('end'));
        $description = $request->input('description');

        if ($end->isPast()) {
            return redirect()->back()->with('error', 'End date must be in the future.');
        }
    
        if ($end->lessThanOrEqualTo($start)) {
            return redirect()->back()->with('error', 'End date must be after the start date of ' . $start->format('Y-m-d H:i'));
        }

        if ($request->hasFile('picture')) {
            $picture = $request->file('picture');
            $ext = $picture->getClientOriginalExtension();

            // Validate file extension
            if (!in_array($ext, ['jpg', 'png', 'jpeg'])) {
                return redirect()->back()->with('error', 'Picture must be an image (jpg, png, jpeg).');
            }

            $announcement_image = $picture->getClientOriginalName();
            $picture->move('storage/announcementPictures', $announcement_image);
        } else {
            $announcement_image = null;
        }

        $data = [
            'title' => $title,
            'start' => $start,
            'end' => $end,
            'description' => $description,
            'picture' => $announcement_image, 
        ];

        $announcement = Announcement::create($data);
        if ($announcement) {
            return redirect()->back()->with('success', 'Announcement created successfully!');
        } else {
            return redirect()->back()->with('error', 'Unable to create Announcement!');
        }
    }
    return redirect()->back()->with('error', 'Form submission error!');
}

    public function editAnnouncement(Request $request, String $id){

    $announcement = Announcement::findOrFail($id);
    $title = $request->input('title');
    $start = $request->input('start');
    $end = $request->input('end');
    $description = $request->input('description');

    if($request->hasFile('picture')){
    $picture = $request->file('picture');
    $ext = $picture->getClientOriginalExtension();
    
    // Validate file extension
    if (!in_array($ext, ['jpg', 'png', 'jpeg'])) {
        return redirect()->back()->with('error', 'Picture must be an image (jpg, png, jpeg).');
    }
    $announcement_image = $picture->getClientOriginalName();
    $picture->move('storage/announcementPictures', $announcement_image);    

    $announcement->picture = $announcement_image;
    }
    $announcement->title = $title;
    $announcement->start = $start;
    $announcement->end = $end;
    $announcement->description = $description;
    $announcement->save();

    return redirect()->back()->with('success', 'Announcement Updated Successfully!');
    }
}
