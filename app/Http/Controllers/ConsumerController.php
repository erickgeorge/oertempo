<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Content;
use App\Models\Department;
use App\Models\Role;
use App\Models\User;
use App\Models\Category;
use App\Models\attachment;
use App\Models\message;
use App\Models\Like;
use App\Models\Post;

class ConsumerController extends Controller
{
    //

    public function index()
    {
        $course = Content::orderBy('created_at', 'desc')->take(3)->where('status',5)->get();
        $category = Category::orderBy('created_at', 'desc')->take(4)->get();

        $categoryCounts = [];
        foreach ($category as $cat) {
            $count = Content::where('category', $cat->id)->where('status',5)->count();
            $categoryCounts[$cat->id] = $count;
        }

        return view('welcome', compact('course', 'category', 'categoryCounts'));
    }



    public function contact()
    {
        return view("contact");
    }

    public function courses()
    {
        $course = Content::orderby('created_at', 'desc')->where('status',5)->get();
        return view("courses", compact('course'));
    }

    public function courseList()
    {
        return view("course-list");
    }


    public function coursedesc($id)
    {
        $course = Content::find($id);
        $course3 = Content::orderBy('created_at', 'desc')->take(3)->where('status',5)->get();
        $attachment = attachment::where('content_id', $id)->get();
        $message = message::where('content', $id)->get();
        $attachmentsingle = attachment::where('content_id', $id)->first();

        // dd($course);
        return view("coursedescription", compact('course', 'attachment' ,  'attachmentsingle' , 'course3' , 'message'));
    }

    public function categories()
    {
        $course = Content::orderBy('created_at', 'desc')->take(3)->get();
        $category = Category::orderby('created_at', 'desc')->get();
        $categoryCounts = [];
        foreach ($category as $cat) {
            $count = Content::where('category', $cat->id)->where('status',5)->count();
            $categoryCounts[$cat->id] = $count;
        }
        return view("categories", compact('category', 'categoryCounts', 'course'));
    }

    public function categoryContents($id)
    {
        $course = Content::where('category', $id)->where('status',5)->get();
        return view('categoryContents', compact('course'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'search-field' => 'required|string|max:255',
        ]);

        $search_text = $request->input('search-field');
        $sanitized_search_text = strip_tags($search_text);

        $course = Content::where('title', 'LIKE', '%' . $sanitized_search_text . '%')->where('status',5)->get();
        $category = Category::where('name', 'LIKE', '%' . $sanitized_search_text . '%')->get();
        $categoryCounts = [];
        foreach ($category as $cat) {
            $count = Content::where('category', $cat->id)->where('status',5)->count();
            $categoryCounts[$cat->id] = $count;
        }
        // dd($course, $category, $sanitized_search_text);
        return view('search', compact('course', 'category', 'sanitized_search_text', 'categoryCounts'));
    }



    public function likeCourse(Request $request)
    {
        $courseId = $request->input('course_id');
        $guestIp = $request->ip();

        // Check if the guest has already liked this course
        $like = Like::where('courses_id', $courseId)->where('guest_ip', $guestIp)->first();

        if (!$like) {
            // If the guest has not liked this course, create a new like


            $lik = new Like();
            $lik->guest_ip =  $guestIp;
            $lik->courses_id =  $courseId;
            $lik->save();
            
            $status = 'liked';
        } else {
            // If the guest has already liked this course, remove the like
            $like->delete();
            $status = 'unliked';
        }

        // Get the updated like count
        $likeCount = Like::where('courses_id', $courseId)->count();

        // Return the status and updated like count
        return response()->json([
            'status' => $status,
            'like_count' => $likeCount,
        ]);
    }



}



