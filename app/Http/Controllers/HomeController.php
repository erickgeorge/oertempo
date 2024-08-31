<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Department;
use App\Models\User;
use App\Models\Content;
use App\Models\attachment;
use App\Models\notification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Models\Course;
use Illuminate\Support\Facades\Storage;
use App\Models\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function categories()
    {
        $category = Category::all();
        return view('admin.categories', ['category' => $category]);
    }

    public function departments()
    {
        $department = Department::all();
        return view('admin.departments', ['department' => $department]);
    }

    public function onSubmitCategory(Request $request)
    {
        $category = new Category();
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->save();

        return redirect('/categories')->with('status', 'Category created successfully!');
    }

    public function addDepartment(Request $request)
    {
        $department = new Department();
        $department->name = $request->input('name');
        // $department->description = $request->input('description');
        $department->save();

        return redirect('/departments')->with('status', 'Department created successfully!');
    }

    public function users()
    {
        $users = user::get();
        $role = Role::get();
        $department = Department::get();
        //   dd($role);
        return view('admin.viewuser', ['user' => $users, 'role' => $role, 'department' => $department]);
    }


    public function registerusers()
    {
        $role = Role::get();
        $department = Department::get();
        return view('admin.register_user', ['role' => $role, 'department' => $department]);
    }

    public function editUser(Request $request)
    {
        $role = Role::get();
        $request->validate([
            'name' => 'required',
            // 'lname' => 'required',
            //'section' => 'required',
            // 'name' => 'required|unique:users',
            // 'phone' => 'required|max:15|min:10',
            // 'email' => 'required|unique:users',
            // 'check_number' => 'unique:users',

        ]);
        $user = user::find($request->id);
        $user->name = $_REQUEST['name'];
        $user->staffID = $_REQUEST['staffID'];
        $user->email = $_REQUEST['email'];
        $user->phone = $_REQUEST['phone'];
        $user->role = $_REQUEST['role'];
        $user->department = $_REQUEST['department'];
        //  $user->password = Hash::make($request->password);

        $user->save();

        return redirect('/users')->with('status', 'User Updated successfully!');
    }
    public function resetPassword(Request $request)
    {

        $request->validate([
            // 'password' => 'required|max:15|min:10',

        ]);
        $user = user::find($request->id);

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/users')->with('status', 'Password reset successfully!');
    }


    public function postusers(Request $request)
    {
        $request->validate([
            // 'fname' => 'required',
            // 'lname' => 'required',
            //'section' => 'required',
            // 'name' => 'required|unique:users',
            // 'phone' => 'required|max:15|min:10',
            'email' => 'required|unique:users',
            'staffID' => 'unique:users',

        ]);
        $user = new user();
        $user->staffID = $_REQUEST['staffID'];
        $user->name = $_REQUEST['name'];
        $user->email = $_REQUEST['email'];
        $user->phone = $_REQUEST['phone'];
        $user->role = $_REQUEST['role'];
        $user->department = $_REQUEST['department'];
        $user->password = Hash::make($request->email);
        $user->save();

        return redirect()->route('viewuser')->with('status', 'User added successfully');
    }


    public function viewcourse($id)
    {
        $course = Content::find($id);
        return view('admin.viewcourse', compact('course'));
    }

    public function editcourse($id)
    {
        $course = Course::find($id);
        return view('admin.editcourse', compact('course'));
    }

            public function updatecourse(Request $request)
            {
                $course = Course::find($request->input('id'));
                $course->title = $request->input('name');
                $course->introduction = $request->input('intro');
                $course->authorID = auth()->user()->id;
                $course->paragraph = $request->input('description');

                $attachmentsFolder = 'attachments/';

                if ($request->hasFile('attach1')) {
                    $attachment1 = $request->file('attach1');
                    $attachment1Name = time() . '_' . $attachment1->getClientOriginalName();
                    Storage::makeDirectory($attachmentsFolder);
                    $attachment1->move(public_path($attachmentsFolder), $attachment1Name);
                    $course->attachment = $attachment1Name;
                }

                if ($request->hasFile('attach2')) {
                    $attachment2 = $request->file('attach2');
                    $attachment2Name = time() . '_' . $attachment2->getClientOriginalName();
                    Storage::makeDirectory($attachmentsFolder);
                    $attachment2->move(public_path($attachmentsFolder), $attachment2Name);
                    $course->attachment1 = $attachment2Name;
                }

                if ($request->hasFile('attach3')) {
                    $attachment3 = $request->file('attach3');
                    $attachment3Name = time() . '_' . $attachment3->getClientOriginalName();
                    Storage::makeDirectory($attachmentsFolder);
                    $attachment3->move(public_path($attachmentsFolder), $attachment3Name);
                    $course->attachment2 = $attachment3Name;
                }

                if ($request->hasFile('attach4')) {
                    $attachment4 = $request->file('attach4');
                    $attachment4Name = time() . '_' . $attachment4->getClientOriginalName();
                    Storage::makeDirectory($attachmentsFolder);
                    $attachment4->move(public_path($attachmentsFolder), $attachment4Name);
                    $course->attachment3 = $attachment4Name;
                }

                $course->save();

                return redirect()->route('courses');
            }



    //content
    public function draft()
    {
        if ((auth()->user()->roleID == 1) || (auth()->user()->roleID == 3)) {

            $content = content::where('status', 1)->orwhere('status', 2)->orwhere('status', 3)->get();
        }
        if (auth()->user()->roleID == 2) {
            $content = content::where('creator_id', auth()->user()->id)->where('status', 1)->orwhere('status', 2)->where('creator_id', auth()->user()->id)->orwhere('status', 3)->where('creator_id', auth()->user()->id)->get();
        }
        return view('admin.drafts', ['contents' => $content]);
    }


    public function underreview()
    {
       if(auth()->user()->roleID == 1){
        $content = content::where('status',4)->orwhere('status',6)->orwhere('status',7)->get();
        }

        if(auth()->user()->roleID == 4){ //resource manager
            $content = content::where('status',4)->where('department',auth()->user()->department)->orwhere('status',6)->where('department',auth()->user()->department)->orwhere('status',7)->where('department',auth()->user()->department)->get();
            }

        if(auth()->user()->roleID == 3){ //Quality Assuarance
            $content = content::where('status',4)->where('qa', auth()->user()->id)->orwhere('status',6)->where('qa', auth()->user()->id)->orwhere('status',7)->where('qa', auth()->user()->id)->get();
            }

        if(auth()->user()->roleID == 2){

            $content = content::where('status', 4)->where('creator_id', auth()->user()->id)->orwhere('status', 6)->where('creator_id', auth()->user()->id)->get();
        }


        return view('admin.underreview', ['contents' => $content]);
    }


    public function published()
    {
        if(auth()->user()->roleID == 1){
        $content = content::where('status',5)->get();
        }

        if(auth()->user()->roleID == 3){
            $content = content::where('qa', auth()->user()->id)->where('status',5)->get();
            }

        if(auth()->user()->roleID == 4){
            $content = content::where('department', auth()->user()->department)->where('status',5)->get();
            }

        if(auth()->user()->roleID == 2){
            $content = content::where('status',5)->where('creator_id',auth()->user()->id)->get();
            }

        return view('admin.published', ['contents' => $content]);
    }


    public function createcontent()
    {
        return view('admin.createcontent');
    }


    public function savecontent(Request $request)
    {

        $content = new Content();
        $attachmentsFolder = 'attachments/';

        if ($request->hasFile('cover')) {
            $attachment3 = $request->file('cover');



           $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp'];

            // Validate the uploaded file to ensure it's an image
            if ($attachment3->isValid() && in_array($attachment3->getClientOriginalExtension(), $allowedExtensions)) {
                // If the file is a valid image
                $attachment3Name = time() . '_' . $attachment3->getClientOriginalName();
                Storage::makeDirectory($attachmentsFolder);
                $attachment3->move(public_path($attachmentsFolder), $attachment3Name);
                $content->cover = $attachment3Name;
            } else {
                // If the file is not a valid image, handle the error
                return redirect()->back()->with('error', 'Please upload a valid image (JPEG, PNG, GIF, BMP).');
            }
        }



        $content->title = $request['title'];
        $content->creator_id = auth()->user()->id;
        $content->status = 1; //20%
        $content->department = auth()->user()->department;
        $content->save();
        return redirect()->route('content_title', [$content->id])->with('status', 'Title Added Successfully');
    }

    public function savecontenttwo(Request $request, $id)
    {
        $content = Content::where('id', $id)->first();
        $content->description = $request['description'];
        $content->category = $request['category'];
        $content->department = $request['department'];
        $content->status = 2; //40%

        $content->save();
        return redirect()->route('content_titleone', [$content->id])->with('status', 'Your Changes Updated Successfully');
    }


    public function savecontentthree(Request $request, $id)
    {



        $docu = $request->file('attach');
        $description = $request['description'];




        foreach ($docu as $a => $b) {
            $content = new attachment();
            $content->content_id = $id;
            $content->description = $description[$a];

            if ($request->hasFile('attach')) {
                $attachmentsFolder = 'attachments/'; // Define your attachments folder here


                $attachmentName = time() . '_' . $docu[$a]->getClientOriginalName();
                Storage::makeDirectory($attachmentsFolder);
                $docu[$a]->move(public_path($attachmentsFolder), $attachmentName);

                $content->image = $attachmentName;
            }

            $content->save();
        }


        $cont = Content::where('id', $id)->first();
        $cont->status = 3; // 80%
        $cont->save();


        return redirect()->route('content_titlefinal', [$cont->id])->with('status', 'Your Changes Updated Successfully');
    }


    public function savecontentfour(Request $request, $id)
    {
        $content = Content::where('id',$id)->first();
        $content->status = 4; //100%
        $content->save();



        //notification
        $notify = new notification();
        $notify->name = 'Your Content Is Submitted Successfully for Review';
        $notify->user_id = auth()->user()->id;
        $notify->status = 1;
        $notify->save();


        return redirect()->route('underreview')->with('status', 'Your Content Sent Successfully For Review ');
    }



    public function reject_content(Request $request, $id)
    {
        $content = Content::where('id', $id)->first();
        $content->reason = $request['reason'];
        $content->status = 6; //40%

        $content->save();


         //notification
         $notify = new notification();
         $notify->name = 'Your Content Is Rejected After Review Please Crosscheck';
         $notify->user_id = $content->creator_id;
         $notify->status = 1;
         $notify->save();


        return redirect()->back()->with('status', 'Content Is Not Approved');
    }


    public function assign_content_to_qa(Request $request , $id)
    {
        $content = Content::where('id',$id)->first();
        $content->qa = $request['qualityasuarance'];
        $content->status = 7;
        $content->save();


        //notification
        $notify = new notification();
        $notify->name = 'Your Content Is Assigned To Quality Assuarance';
        $notify->user_id = $content->creator_id;
        $notify->status = 1;
        $notify->save();

        return redirect()->back()->with('status', 'Content Assigned To Quality Assuarance');
    }


    public function approve_content(Request $request , $id)
    {
        $content = Content::where('id', $id)->first();

        $content->status = 5; //40%
        $content->approvedby = auth()->user()->id;
        $content->publishedat = Carbon::now();

        $content->save();



        //notification
        $notify = new notification();
        $notify->name = 'Your Content Is Approved And Published';
        $notify->user_id = $content->creator_id;
        $notify->status = 1;
        $notify->save();


        return redirect()->route('published')->with('status', 'Content Is Now Published');
    }




    public function contenttitle($id)
    {
        $content = Content::where('id', $id)->first();
        $category = Category::get();

        return view('admin.contenttitle', ['content' => $content, 'category' => $category]);
    }

    public function contenttitleone($id)
    {
        $content = Content::where('id', $id)->first();
        $category = Category::get();

        return view('admin.contenttitleone', ['content' => $content, 'category' => $category]);
    }

    public function contenttitlefinal($id)
    {
        $content = Content::where('id', $id)->first();
        $attach = attachment::where('content_id', $id)->get();
        $category = Category::get();

        return view('admin.contenttitlefinal', ['content' => $content, 'category' => $category,  'attach' => $attach]);
    }


    public function contentrejection($id)
    {
        $content = Content::where('id', $id)->first();
        $attach = attachment::where('content_id', $id)->get();
        $category = Category::get();

        return view('admin.contentrejection', ['content' => $content, 'category' => $category,  'attach' => $attach]);
    }


    public function contentreview($id)
    {
        $content = Content::where('id', $id)->first();
        $attach = attachment::where('content_id', $id)->get();
        $category = Category::get();
        $quality_assuarance = user::where('role', 3)->get();


        return view('admin.contentreview', ['content'=>$content , 'category'=>$category ,  'attach' => $attach , 'quality_assuarance'=>$quality_assuarance  ]);
    }


    public function contentpublished($id)
    {
        $content = Content::where('id', $id)->first();
        $attach = attachment::where('content_id', $id)->get();
        $category = Category::get();

        return view('admin.contentpublished', ['content' => $content, 'category' => $category,  'attach' => $attach]);
    }



    public function deletecontent(Request $request, $id)
    {
        $content = Content::where('id', $id)->first();

        $content->delete();

        return redirect()->route('createcontent')->with('status', 'Content Successfully Deleted');
    }





    public function backcontent1(Request $request, $id)
    {
        $content = Content::where('id', $id)->first();

        $content->save();

        return redirect()->route('createcontentback', [$id]);
    }


    public function createcontentback($id)
    {
        $content = Content::where('id', $id)->first();

        return view('admin.createcontentback', ['content' => $content]);
    }




    public function backcontent2(Request $request, $id)
    {
        $content = Content::where('id', $id)->first();

        $content->save();

        return redirect()->route('content_title_back', [$id]);
    }


    public function contenttitleback($id)
    {
        $content = Content::where('id', $id)->first();
        $category = Category::get();

        return view('admin.contenttitleback', ['content' => $content, 'category' => $category]);
    }

    public function backcontent3(Request $request, $id)
    {
        $content = Content::where('id', $id)->first();

        $content->save();

        return redirect()->route('content_final_back', [$id]);
    }


    public function contenttitlefinalback($id)
    {

        $content = Content::where('id', $id)->first();
        $attach = attachment::where('content_id', $id)->get();
        $category = Category::get();

        return view('admin.contenttitlefinalback', ['content' => $content, 'category' => $category,  'attach' => $attach]);
    }


    public function deleteattachment(Request $request, $id)
    {
        $attachment = attachment::where('id', $id)->first();

        $attachment->delete();

        return redirect()->back()->with('status', 'Attachment Successfully Deleted');
    }










    public function savecourse(Request $request)
    {
        $course = new Course();
        $course->title = $request->input('name');
        $course->introduction = $request->input('intro');
        $course->authorID = auth()->user()->id;
        $course->paragraph = $request->input('description');

        $attachmentsFolder = 'attachments/';

        if ($request->hasFile('attach1')) {
            $attachment1 = $request->file('attach1');
            $attachment1Name = time() . '_' . $attachment1->getClientOriginalName();
            Storage::makeDirectory($attachmentsFolder);
            $attachment1->move(public_path($attachmentsFolder), $attachment1Name);
            $course->attachment = $attachment1Name;
        }

        if ($request->hasFile('attach2')) {
            $attachment2 = $request->file('attach2');
            $attachment2Name = time() . '_' . $attachment2->getClientOriginalName();
            Storage::makeDirectory($attachmentsFolder);
            $attachment2->move(public_path($attachmentsFolder), $attachment2Name);
            $course->attachment1 = $attachment2Name;
        }

        if ($request->hasFile('attach3')) {
            $attachment3 = $request->file('attach3');
            $attachment3Name = time() . '_' . $attachment3->getClientOriginalName();
            Storage::makeDirectory($attachmentsFolder);
            $attachment3->move(public_path($attachmentsFolder), $attachment3Name);
            $course->attachment2 = $attachment3Name;
        }

        if ($request->hasFile('attach4')) {
            $attachment4 = $request->file('attach4');
            $attachment4Name = time() . '_' . $attachment4->getClientOriginalName();
            Storage::makeDirectory($attachmentsFolder);
            $attachment4->move(public_path($attachmentsFolder), $attachment4Name);
            $course->attachment3 = $attachment4Name;
        }

        $course->save();

        return redirect()->route('courses');
    }

    public function addRole(Request $request)
    {
        $role = new Role();
        $role->name = $request->input('name');
        $role->save();
        return redirect()->back()->with('status', 'Role Added Successfully');
    }

    public function viewRole()
    {
        $roles = Role::all();
        return view('admin.role', ['role' => $roles]);
    }
    public function viewDepartment()
    {
        $departments = Department::all();
        return view('admin.departments', ['department' => $departments]);
    }
    public function editRole(Request $request)
    {
        $role = Role::find($request->id);
        $role->name = $request->input('name');
        $role->save();
        return redirect()->back()->with('status', 'record updated successfully');
    }

    public function editDepartment(Request $request)
    {
        $department = Department::find($request->id);
        $department->name = $request->input('name');
        $department->save();
        return redirect()->back()->with('status', 'record updated successfully');
    }

    public function deleteRole($id)
    {
        $role = Role::find($id);
        $role->delete();
        return redirect()->back()->with('status', 'record deleted successfully');
    }

    public function deleteDepartment($id)
    {
        $department = Department::find($id);
        $department->delete();
        return redirect()->back()->with('status', 'record deleted successfully');
    }


    public function reviewcontent($id)
    {
        $content = Content::where('id', $id)->first();
        return view('admin.previewReview', ['content' => $content]);
    }



    //notification


    public function read_notification($id)
    {
        $notification = notification::where('id',$id)->first();

        $notification->status = 2; //read

        $notification->save();

        return redirect()->back();

    }

}
