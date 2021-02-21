<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware('admin')->prefix('admin')->group( function (){
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])
        ->name('admin');

    // Control  of Useres

    Route::get('/allUsers', [App\Http\Controllers\AdminController::class, 'UsersIndex'])
        ->name('users');
    Route::post('/createUsers', [App\Http\Controllers\AdminController::class, 'createUsers'])
        ->name('createUsers');
    Route::get('/file-export', [App\Http\Controllers\AdminController::class, 'fileExport'])
        ->name('fileExport');
    Route::post('/UpdateRole/{id}', [App\Http\Controllers\AdminController::class, 'UpdateRole'])
        ->name('UpdateRole');
    Route::post('/DeleteUser/{id}', [App\Http\Controllers\AdminController::class, 'deleteUser'])
        ->name('delUser');
    Route::post('/UsersFilter', [App\Http\Controllers\AdminController::class, 'filter'])
        ->name('filtering');

    // Control  of Employee

    Route::get('/createEmp', [App\Http\Controllers\AdminController::class, 'createEmployee'])
        ->name('createEmployee');

    Route::post('/addEmp', [App\Http\Controllers\AdminController::class, 'addEmployee'])
        ->name('addEmployee');


    // Control of Levels
       Route::post('/createLevel', [App\Http\Controllers\LevelController::class, 'store'])
        ->name('addLevel');
       Route::get('/allLevel', [App\Http\Controllers\LevelController::class, 'index'])
        ->name('AllLevels');
        Route::post('/UpdateLevel/{id}', [App\Http\Controllers\LevelController::class, 'UpdateLevel'])
            ->name('UpdateLevel');
        Route::post('/DeleteLevel/{id}', [App\Http\Controllers\LevelController::class, 'deleteLevel'])
            ->name('delLevel');

    // Control of Majors
    Route::post('/createMajor', [App\Http\Controllers\MajorController::class, 'store'])
        ->name('addMajor');

    Route::get('/allmajors', [\App\Http\Controllers\MajorController::class, 'index'])
        ->name('allmajors');

    Route::post('/UpdateMajor/{id}', [App\Http\Controllers\MajorController::class, 'UpdateMajor'])
        ->name('UpdateMajor');
    Route::post('/DeleteMajor/{id}', [App\Http\Controllers\MajorController::class, 'deleteMajor'])
        ->name('delMajor');


    // Control of Courses
    Route::get('/allCourses', [App\Http\Controllers\CourseController::class, 'Adminindex'])
        ->name('allCourses');
    Route::post('/createCourse', [App\Http\Controllers\CourseController::class, 'store'])
        ->name('addCourse');
    Route::post('/UpdateCourse/{id}', [App\Http\Controllers\CourseController::class, 'UpdateCourse'])
        ->name('UpdateCourse');
    Route::post('/DeleteCourse/{id}', [App\Http\Controllers\CourseController::class, 'deleteCourse'])
        ->name('delCourse');

    Route::post('/CourseFiltering', [App\Http\Controllers\CourseController::class, 'filter'])
        ->name('CourseFiltering');

    // Control of Lecture
    Route::get('/allLecture/{id}', [App\Http\Controllers\LectureController::class, 'Adminindex'])
        ->name('allLecture');

//    Route::post('/UpdateLecture/{id}', [App\Http\Controllers\LectureController::class, 'UpdateLecture'])
//        ->name('UpdateLecture');
//    Route::post('/DeleteLecture/{id}', [App\Http\Controllers\LectureController::class, 'deleteLecture'])
//        ->name('delLecture');

    // Control of Section
    Route::post('/createSection', [App\Http\Controllers\SectionController::class, 'store'])
        ->name('addSection');
    Route::get('/allSection', [App\Http\Controllers\SectionController::class, 'index'])
        ->name('allSection');
//    Route::post('/UpdateCourse/{id}', [App\Http\Controllers\SectionController::class, 'UpdateCourse'])
//        ->name('UpdateCourse');
//    Route::post('/DeleteCourse/{id}', [App\Http\Controllers\SectionController::class, 'deleteCourse'])
//        ->name('delCourse');


    // Control of Schedule

        Route::get('/allSchedule', [App\Http\Controllers\ScheduleController::class, 'index'])
        ->name('allSchedule');
        Route::post('/createSchedule', [App\Http\Controllers\ScheduleController::class, 'store'])
            ->name('addSchedule');
        Route::post('/UpdateSchedule/{id}', [App\Http\Controllers\ScheduleController::class, 'UpdateSchedule'])
            ->name('UpdateSchedule');
        Route::post('/DeleteSchedule/{id}', [App\Http\Controllers\ScheduleController::class, 'deleteSchedule'])
            ->name('delSchedule');

    // Control of Announcement

    Route::get('/allAnnouncement', [App\Http\Controllers\AnnouncementController::class, 'index'])
        ->name('allAnnouncement');
    Route::post('/createAnnouncement', [App\Http\Controllers\AnnouncementController::class, 'store'])
        ->name('addAnnouncement');
    Route::post('/UpdateAnnouncement/{id}', [App\Http\Controllers\AnnouncementController::class, 'UpdateAnnouncement'])
        ->name('UpdateAnnouncement');

//    Route::post('/UpdatePhoto/{id}', [App\Http\Controllers\AnnouncementController::class, 'UpdatePhoto'])
//        ->name('UpdatePhoto');

    Route::post('/DeleteAnnouncement/{id}', [App\Http\Controllers\AnnouncementController::class, 'deleteAnnouncement'])
        ->name('delAnnouncement');

});

Route::middleware(['auth' , 'instructor'])->prefix('instructor')->group(function () {

    Route::get('/myCourses', [App\Http\Controllers\InstructorController::class, 'index'])
        ->name('instructor');

//    Route::get('/myprofile', [App\Http\Controllers\InstructorController::class, 'profileIndex'])
//        ->name('profile');

    // Control of Lecture
    Route::get('instructorLecture/{id}', [App\Http\Controllers\LectureController::class, 'index'])
        ->name('instLecture');

    Route::post('/createLecture/{id}', [App\Http\Controllers\LectureController::class, 'store'])
        ->name('addLecture');

//    Route::post('/UpdateLecture/{id}', [App\Http\Controllers\LectureController::class, 'UpdateLecture'])
//        ->name('UpdateLecture');
//    Route::post('/DeleteLecture/{id}', [App\Http\Controllers\LectureController::class, 'deleteLecture'])
//        ->name('delLecture');

});
