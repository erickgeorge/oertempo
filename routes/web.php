<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ConsumerController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Auth;
use App\Models\message;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ConsumerController::class, "index"])->name('index');

Route::get("contact",[ConsumerController::class,"contact"])->name('contact');
Route::get("courses",[ConsumerController::class,"courses"])->name('courses');
Route::get("course-list",[ConsumerController::class,"courseList"])->name('course-list');
Route::get("coursedescription/{id}",[ConsumerController::class,"coursedesc"])->name('coursedesc');
Route::get('categoriesView',[ConsumerController::class,'categories'])->name('categoriesView');
Route::get('categoryContents/{id}',[ConsumerController::class,'categoryContents'])->name('categoryContents');
Route::get('search',[ConsumerController::class,'search'])->name('search');
Route::post('/like-course', [ConsumerController::class, 'likeCourse'])->name('like.course');


Route::post('/postquote{id}', function (Request $request , $id) {

    $cr = new message();
    $cr->name = $request->name;
    $cr->body = $request->body;
    $cr->email = $request->email;
    $cr->content = $id;
    $cr->save();
    return redirect()->back()->with('status', 'Comment successfully Sent');

})->name('sendmessage');


Auth::routes();


Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('categories', [HomeController::class, 'categories'])->name('categories');
Route::post('submit-category', [HomeController::class, 'onSubmitCategory'])->name('submit-category');

Route::get('/role', [HomeController::class, 'viewRole'])->name('role');
Route::post('add_role', [HomeController::class, 'addRole'])->name('add_role');
Route::post('edit_role', [HomeController::class, 'editRole'])->name('edit_role');
Route::get('delete_role{id}', [HomeController::class, 'deleteRole'])->name('delete_role');

Route::get('/departments', [HomeController::class, 'viewDepartment'])->name('department');
Route::post('add_department', [HomeController::class, 'addDepartment'])->name('add_department');
Route::post('edit_department', [HomeController::class, 'editDepartment'])->name('edit_department');
Route::get('delete_department{id}', [HomeController::class, 'deleteDepartment'])->name('delete_department');

Route::get('/users', [HomeController::class, 'users'])->name('viewuser');
Route::get('/add_users', [HomeController::class, 'registerusers'])->name('usersadd');
Route::post('/register_users', [HomeController::class, 'postusers'])->name('register_user');
Route::post('/edit_users', [HomeController::class, 'editUser'])->name('edit_user');
Route::get('/delete_users{id}', [HomeController::class, 'deleteUser'])->name('delete_user');
Route::post('/reset_password', [HomeController::class, 'resetPassword'])->name('reset_password');


Route::get('admincourses', [HomeController::class, 'courses'])->name('admincourses');
Route::get('createcourse', [HomeController::class, 'createcourse'])->name('createcourse');

Route::post('savecourse', [HomeController::class, 'savecourse'])->name('savecourse');
Route::get('editcourse/{id}', [HomeController::class, 'editcourse'])->name('editcourse');
Route::get('adminviewcourse{id}', [HomeController::class, 'viewcourse'])->name('adminviewcourse');
Route::post('updatecourse', [HomeController::class, 'updatecourse'])->name('updatecourse');


//contents
Route::get('mydrafts', [HomeController::class, 'draft'])->name('draft');
Route::get('create_content', [HomeController::class, 'createcontent'])->name('createcontent');
Route::post('savecontent', [HomeController::class, 'savecontent'])->name('savecontent');
Route::get('content_title{id}', [HomeController::class, 'contenttitle'])->name('content_title');
Route::post('savecontenttwo{id}', [HomeController::class, 'savecontenttwo'])->name('savecontenttwo');
Route::post('savecontentthree{id}', [HomeController::class, 'savecontentthree'])->name('savecontentthree');
Route::post('savecontentfour{id}', [HomeController::class, 'savecontentfour'])->name('savecontentfour');
Route::get('content_one{id}', [HomeController::class, 'contenttitleone'])->name('content_titleone');
Route::get('content_final{id}', [HomeController::class, 'contenttitlefinal'])->name('content_titlefinal');

Route::get('under_review', [HomeController::class, 'underreview'])->name('underreview');
Route::get('content_review{id}', [HomeController::class, 'contentreview'])->name('contentreview');
Route::get('content_published{id}', [HomeController::class, 'contentpublished'])->name('contentpublished');

Route::post('reject_content{id}', [HomeController::class, 'reject_content'])->name('reject_content');
Route::get('content_rejection{id}', [HomeController::class, 'contentrejection'])->name('content_reject');
Route::get('approve_contents{id}', [HomeController::class, 'approve_content'])->name('approve_content');
Route::get('deletecontent{id}', [HomeController::class, 'deletecontent'])->name('deletecontent');


Route::post('assign_content_to_qa{id}',[HomeController::class,'assign_content_to_qa'])->name('assign_content_to_qa');



//contentback
Route::get('backcontent1{id}', [HomeController::class, 'backcontent1'])->name('back_content1');
Route::get('backcontent2{id}', [HomeController::class, 'backcontent2'])->name('back_content2');
Route::get('backcontent3{id}', [HomeController::class, 'backcontent3'])->name('back_content3');
Route::get('create_content{id}', [HomeController::class, 'createcontentback'])->name('createcontentback');
Route::get('content_back{id}', [HomeController::class, 'contenttitleback'])->name('content_title_back');
Route::get('contentfinalback{id}', [HomeController::class, 'contenttitlefinalback'])->name('content_final_back');
Route::get('deleteattachment{id}', [HomeController::class, 'deleteattachment'])->name('deleteattachment');




Route::get('published', [HomeController::class, 'published'])->name('published');







// Reviewer
Route::get('reviewer',[HomeController::class,'review'])->name('review');
Route::get('reviewcontent{id}',[HomeController::class,'reviewcontent'])->name('reviewcontent');

//readnotification
Route::get('read_notification{id}',[HomeController::class,'read_notification'])->name('read_notification');
