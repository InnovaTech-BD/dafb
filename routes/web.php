<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProjectController;
use App\Http\Controllers\Backend\EventController;
use App\Http\Controllers\Backend\FaceController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\UpcomingEventsController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\ImageController;
use App\Http\Controllers\Backend\AnualReportController;
use App\Http\Controllers\Backend\ScholarshipController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\TeamController;
use App\Http\Controllers\Backend\AreaController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ScholarshipForm;
use App\Http\Controllers\WelcomeController;
use App\Models\UpcomingEvents;
use App\Models\Face;
use App\Models\About;
use App\Models\Team;

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

Route::get('/',WelcomeController::class)->name('home');

Auth::routes();

Route::group(['as'=>'app.','prefix'=>'app','middleware' => ['auth']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
    Route::put('/profile/update', [HomeController::class, 'updateProfile'])->name('profile.update');


    //settings
    Route::group(['as'=>'settings.','prefix'=>'settings','middleware'=>['auth']],function(){
        
        //Roles
        Route::group(['prefix' => 'roles','as'=>'roles.','middleware'=>['permissions']], function () {
            Route::get('/',[RoleController::class,'index'])->name('index');
            Route::get('role/create',[RoleController::class,'create'])->name('role.create');
            Route::post('roles/create',[RoleController::class,'store'])->name('role.store');
            Route::get('roles/update/{role}',[RoleController::class,'edit'])->name('role.edit');
            Route::put('roles/update/{role}',[RoleController::class,'update'])->name('role.update');
            Route::delete('roles/delete/{role}',[RoleController::class,'destroy'])->name('role.destroy');
        });
    });

    //user

    Route::group(['as'=>'users.','prefix'=>'users', 'middleware'=>['permissions']],function(){
        Route::get('/',[UserController::class,'index'])->name('index');
        Route::get('/create',[UserController::class,'create'])->name('user.create');
        Route::post('/create',[UserController::class,'store'])->name('user.store');
        Route::get('/profile/{user}',[UserController::class,'show'])->name('user.show');
        Route::get('/update/{user}',[UserController::class,'edit'])->name('user.edit');
        Route::put('/update/{user}',[UserController::class,'update'])->name('user.update');
        Route::delete('/delete/{user}',[UserController::class,'destroy'])->name('user.destroy');
    });
    //contact
    Route::get('contacts/',[ContactController::class,'index'])->name('contact.index');
    Route::get('contacts/{contact}/show/',[ContactController::class,'show'])->name('contact.show');
    Route::delete('contacts/{contact}/delete/',[ContactController::class,'destroy'])->name('contact.destroy');

    //voluteer

    Route::get('volunteers/',[VolunteerController::class,'index'])->name('volunteers.index');
    Route::get('volunteers/{volunteer}/show',[VolunteerController::class,'show'])->name('volunteers.show');
    Route::post('volunteers/status',[VolunteerController::class,'status'])->name('volunteers.status');
    Route::delete('volunteers/{volunteer}/destroy',[VolunteerController::class,'destroy'])->name('volunteers.destroy');

    //programs
    Route::resource('projects',ProjectController::class);

    //events
    Route::resource('events',EventController::class);

    //Upcoming Events

    Route::get('upcoming/events',[UpcomingEventsController::class,'index'])->name('events.upcoming.index');
    Route::get('upcoming/events/create',[UpcomingEventsController::class,'create'])->name('events.upcoming.create');
    Route::post('upcoming/events/store',[UpcomingEventsController::class,'store'])->name('events.upcoming.store');
    Route::get('upcoming/events/{event}/edit',[UpcomingEventsController::class,'edit'])->name('events.upcoming.edit');
    Route::put('upcoming/events/{event}/update',[UpcomingEventsController::class,'update'])->name('events.upcoming.update');
    Route::delete('upcoming/events/{event}/delete',[UpcomingEventsController::class,'destroy'])->name('events.upcoming.destroy');

    //sliders
    Route::resource('sliders',SliderController::class);
    Route::delete('images/{image}/destroy',[ImageController::class,'destroy'])->name('image.destroy');

     //gallary
     Route::resource('galleries',GalleryController::class);

      //Team
      Route::resource('teams',TeamController::class);

       //Areas
       Route::resource('areas',AreaController::class);

     //Happy faces
     Route::resource('faces',FaceController::class);

     //scholarships
     Route::resource('scholarships',ScholarshipController::class);
     Route::post('scholarships/status',[ScholarshipController::class,'status'])->name('scholarships.status');

     //Report
     Route::get('reports',function(){
         return view('reports');
     })->name('reports');
     //Route::get('reports/create',[AnualReportController::class,'create'])->name('reports.create');
     //Route::post('reports/store',[AnualReportController::class,'store'])->name('reports.store');
     Route::get('reports/{anualReport}/edit',[AnualReportController::class,'edit'])->name('reports.edit');
     Route::put('reports/{anualReport}/update',[AnualReportController::class,'update'])->name('reports.update');
     //Route::delete('reports/{anualReport}/destroy',[AnualReportController::class,'destroy'])->name('reports.destroy');

     //about
     Route::get('about/{about}/edit',[AboutController::class,'edit'])->name('about.edit');
     Route::put('about/{about}/update',[AboutController::class,'update'])->name('about.update');
});
//contact
Route::post('contacts/store',[ContactController::class,'store'])->name('contact.store');
Route::post('volunteers/store',[VolunteerController::class,'store'])->name('volunteers.store');
Route::post('scholarship/store',[ScholarshipController::class,'store'])->name('scholarship.store');
Route::get('program/{slug}',ProgramController::class)->name('program.show');
//frontend events
Route::get('event',[EventsController::class,'index'])->name('events');
Route::get('event/{slug}',[EventsController::class,'show'])->name('events.show');
Route::get('report/{type}',[ReportController::class,'getReport'])->name('report.show');
Route::post('scholarship/form',ScholarshipForm::class)->name('scholarship.store');
Route::get('/about', function(){
    return view('about');
})->name('about');
Route::get('/team', function(){
    return view('team',[
        'teams'=>Team::latest()->get()
    ]);
})->name('team');

Route::view('/scholarship', 'scholarship')->name('scholarship');

include "test.php";