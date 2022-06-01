<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Userdetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('utype', 1)->latest()->get();
        $count = 1;
        return view('admin.user.index', compact('users','count'));
    }

    public function moderators()
    {
        $users = User::where('utype', 2)->latest()->get();
        $count = 1;
        return view('admin.user.index', compact('users','count'));
    }

    public function admins()
    {
        $users = User::where('utype', 5)->latest()->get();
        $count = 1;
        return view('admin.user.index', compact('users','count'));
    }

    public function blocks()
    {
        $users = User::where('utype', 0)->latest()->get();
        $count = 1;
        return view('admin.user.index', compact('users','count'));
    }

    public function trash()
    {
        $users = User::where('utype', 9)->latest()->get();
        $count = 1;
        return view('admin.user.trash', compact('users','count'));
    }

    public function profile($slug)
    {
        $user = User::where('slug', $slug)->first();
        return view('admin.user.profile', compact('user'));
    }

    public function editProfile($slug)
    {
        $user = User::where('slug', $slug)->first();
        return view('admin.user.profile_edit', compact('user'));
    }

    public function uploadImage(User $user)
    {
        request()->validate([
            'image' => 'sometimes|file|image|max:100kb',
        ]);
        if (request()->has('image')) {
            if(request()->oldimage)
            {
                unlink('storage/app/public/' . $user->image);
            }
            $user->update([
                'image' => request()->image->store('image/user','public'),
            ]);

            if($user)
            {
                return redirect()->back()->with('success', 'Avatar Uploaded!');
            }else{
                return redirect()->back()->with('error', 'Error, Something Went Wrong!');
            }
        }
    }

    public function updateInfo(User $user)
    {
        $data = request()->validate([
            'fullname' => 'required|string|max:30',
            'gender' => 'required|string',
            'phone' => '',
            'birthdate' => '',
        ]);

        $user->update($data);

        if($user)
        {
            return redirect()->back()->with('success', 'General Information Updated!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }

    }

    public function storeDetails(User $user)
    {
        $userdetails = Userdetail::create([
            'user_id' => $user->id,
            'bio_title' => request()->bio_title,
            'education' => request()->education,
            'profession' => request()->profession,
            'address' => request()->address,
            'language' => request()->language,
            'religion' => request()->religion,
            'fb_link' => str_replace(array('https://','http://'), '', request()->fb_link),
            'twitter_link' =>str_replace(array('https://','http://'), '', request()->twitter_link),
            'linkedin_link' => str_replace(array('https://','http://'), '', request()->linkedin_link),
            'github_link' => str_replace(array('https://','http://'), '', request()->github_link),
            'about' => request()->about,
        ]);

        if($userdetails)
        {
            return redirect()->back()->with('success', 'Information Uploaded!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function updateDetails($user)
    {
        $userdetails = Userdetail::where('user_id',$user)->first();

        $userdetails->update([
            'bio_title' => request()->bio_title,
            'education' => request()->education,
            'profession' => request()->profession,
            'address' => request()->address,
            'language' => request()->language,
            'religion' => request()->religion,
            'fb_link' => str_replace(array('https://','http://'), '', request()->fb_link),
            'twitter_link' =>str_replace(array('https://','http://'), '', request()->twitter_link),
            'linkedin_link' => str_replace(array('https://','http://'), '', request()->linkedin_link),
            'github_link' => str_replace(array('https://','http://'), '', request()->github_link),
            'about' => request()->about,
        ]);

        if($userdetails)
        {
            return redirect()->back()->with('success', 'Information Updated!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function block(User $user)
    {
        if(!$user->utype === 5) {
            $user->update(['utype' => 0]);
            if($user)
            {
                return redirect()->back()->with('success', 'User Blocked!');
            }else{
                return redirect()->back()->with('error', 'Error, Something Went Wrong!');
            }
        }else{
            return redirect()->back()->with('error', 'Please, Try Manually From Database!');
        }
        
    }

    public function unblock(User $user)
    {
        $user->update(['utype' => 1]);

        if($user)
        {
            return redirect()->back()->with('success', 'User Unblocked!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function softDelete(User $user)
    {
        if(!$user->utype === 5) {
            $user->update(['utype' => 9]);

            if($user)
            {
                return redirect()->back()->with('delete', 'User moved to Recycle Bin!');
            }else{
                return redirect()->back()->with('error', 'Error, Something Went Wrong!');
            }
        }else{
            return redirect()->back()->with('error', 'Please, Try Manually From Database!');
        }
    }

    public function permanentDelete(User $user)
    {
        if($user->image){
            unlink('storage/app/public/'.$user->image);
        }
        $user->delete();

        if($user)
        {
            return redirect()->back()->with('delete', 'User Has Been Deleted Permanently!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }
    
    
    // MODERATOR FUNCTION
    public function muploadImage(User $muser)
    {
        request()->validate([
            'image' => 'sometimes|file|image|max:100kb',
        ]);
        
        $aid = Auth::id();
        $user = User::where('id', $aid)->first();
        
        if (request()->has('image')) {
            if(request()->oldimage)
            {
                unlink('storage/app/public/' . $user->image);
            }
            $user->update([
                'image' => request()->image->store('image/user','public'),
            ]);

            if($user)
            {
                return redirect()->back()->with('success', 'Avatar Uploaded!');
            }else{
                return redirect()->back()->with('error', 'Error, Something Went Wrong!');
            }
        }
    }

    public function mupdateInfo(User $muser)
    {
        $aid = Auth::id();
        $user = User::where('id', $aid)->first();
        $data = request()->validate([
            'fullname' => 'required|string|max:30',
            'gender' => 'required|string',
            'phone' => '',
            'birthdate' => '',
        ]);

        $user->update($data);

        if($user)
        {
            return redirect()->back()->with('success', 'General Information Updated!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }

    }

    public function mstoreDetails(User $muser)
    {
        $aid = Auth::id();
        $user = User::where('id', $aid)->first();
        
        $userdetails = Userdetail::create([
            'user_id' => $user->id,
            'bio_title' => request()->bio_title,
            'education' => request()->education,
            'profession' => request()->profession,
            'address' => request()->address,
            'language' => request()->language,
            'religion' => request()->religion,
            'fb_link' => str_replace(array('https://','http://'), '', request()->fb_link),
            'twitter_link' =>str_replace(array('https://','http://'), '', request()->twitter_link),
            'linkedin_link' => str_replace(array('https://','http://'), '', request()->linkedin_link),
            'github_link' => str_replace(array('https://','http://'), '', request()->github_link),
            'about' => request()->about,
        ]);

        if($userdetails)
        {
            return redirect()->back()->with('success', 'Information Uploaded!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function mupdateDetails($muser)
    {
        $aid = Auth::id();
        $user = User::where('id', $aid)->first();
        
        $userdetails = Userdetail::where('user_id',$user->id)->first();

        $userdetails->update([
            'bio_title' => request()->bio_title,
            'education' => request()->education,
            'profession' => request()->profession,
            'address' => request()->address,
            'language' => request()->language,
            'religion' => request()->religion,
            'fb_link' => str_replace(array('https://','http://'), '', request()->fb_link),
            'twitter_link' =>str_replace(array('https://','http://'), '', request()->twitter_link),
            'linkedin_link' => str_replace(array('https://','http://'), '', request()->linkedin_link),
            'github_link' => str_replace(array('https://','http://'), '', request()->github_link),
            'about' => request()->about,
        ]);

        if($userdetails)
        {
            return redirect()->back()->with('success', 'Information Updated!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

}
