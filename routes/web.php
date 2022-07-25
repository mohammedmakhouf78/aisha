<?php

use App\Http\Controllers\AttendController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ExamStudentsController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
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

// mohamed

Route::group(['prefix' => 'admin','as' => 'admin.'],function(){
    Route::get('loginPage',[AuthController::class,'loginPage'])->name('loginPage');
    Route::post('login',[AuthController::class,'login'])->name('login');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.','middleware' => 'auth'], function () {

    Route::get('/', function () {
        return view('admin/master');
    })->name('home');

    Route::get('logout',[AuthController::class,'logout'])->name('logout');

    Route::group(['prefix' => 'teacher', 'as' => 'teacher.'], function () {
        Route::get('', [TeacherController::class, 'index'])->name('index');
        Route::get('/create', [TeacherController::class, 'create'])->name('create');
        Route::post('/store', [TeacherController::class, 'store'])->name('store');
        Route::get('/edit/{teacher}', [TeacherController::class, 'edit'])->name('edit');
        Route::put('/update/{teacher}', [TeacherController::class, 'update'])->name('update');
        Route::delete('/delete/{teacher}', [TeacherController::class, 'delete'])->name('delete');
    });

    Route::group(['prefix' => 'Payment', 'as' => 'Payment.'], function () {
        Route::get('', [PaymentsController::class, 'index'])->name('index');
        Route::get('/create', [PaymentsController::class, 'create'])->name('create');
        Route::post('/store', [PaymentsController::class, 'store'])->name('store');
        Route::get('/edit/{payment}', [PaymentsController::class, 'edit'])->name('edit');
        Route::put('/update/{payment}', [PaymentsController::class, 'update'])->name('update');
        Route::delete('/delete/{payment}', [PaymentsController::class, 'delete'])->name('delete');
    });

    Route::group(['prefix' => 'examstudent', 'as' => 'examstudent.'], function () {
        Route::get('', [ExamStudentsController::class, 'index'])->name('index');
        Route::get('/create', [ExamStudentsController::class, 'create'])->name('create');
        Route::post('/store', [ExamStudentsController::class, 'store'])->name('store');
        Route::get('/edit/{examStudent}', [ExamStudentsController::class, 'edit'])->name('edit');
        Route::put('/update/{examStudent}', [ExamStudentsController::class, 'update'])->name('update');
        Route::delete('/delete/{examStudent}', [ExamStudentsController::class, 'delete'])->name('delete');
    });




    Route::group(['prefix' => 'attend',  'as' => 'attend.'], function () {
        Route::get('', [AttendController::class, 'index'])->name('index');
        Route::get('create', [AttendController::class, 'create'])->name('create');
        Route::post('store', [AttendController::class, 'store'])->name('store');
        Route::get('edit/{attend}', [AttendController::class, 'edit'])->name('edit');
        Route::put('update/{attend}', [AttendController::class, 'update'])->name('update');
        Route::delete('delete/{attend}', [AttendController::class, 'delete'])->name('delete');
    });


    Route::group(['prefix' => 'exam', 'as' => 'exam.'], function () {
        Route::get('', [ExamController::class, 'index'])->name('index');
        Route::get('create', [ExamController::class, 'create'])->name('create');
        Route::post('store', [ExamController::class, 'store'])->name('store');
        Route::get('edit/{exam}', [ExamController::class, 'edit'])->name('edit');
        Route::put('update/{exam}', [ExamController::class, 'update'])->name('update');
        Route::delete('delete/{exam}', [ExamController::class, 'delete'])->name('delete');
    });

    Route::group(['prefix' => 'group', 'as' => 'group.'], function () {

        Route::get('/', [GroupController::class, 'index'])->name('index');
        Route::get('/create', [GroupController::class, 'create'])->name('create');
        Route::post('/store', [GroupController::class, 'store'])->name('store');
        Route::get('/edit/{group}', [GroupController::class, 'edit'])->name('edit');
        Route::put('/update/{group}', [GroupController::class, 'update'])->name('update');
        Route::delete('/delete/{group}', [GroupController::class, 'delete'])->name('delete');
    });


    Route::group(['prefix' => 'lesson', 'as' => 'lesson.'], function () {
        Route::get('', [LessonController::class, 'index'])->name('index');
        Route::get('create', [LessonController::class, 'create'])->name('create');
        Route::post('store', [LessonController::class, 'store'])->name('store');
        Route::get('edit/{lesson}', [LessonController::class, 'edit'])->name('edit');
        Route::put('update/{lesson}', [LessonController::class, 'update'])->name('update');
        Route::delete('delete/{lesson}', [LessonController::class, 'delete'])->name('delete');
    });

    Route::group(['prefix' => 'student', 'as' => 'student.'], function () {
        Route::get('', [StudentController::class, 'index'])->name('index');
        Route::get('create', [StudentController::class, 'create'])->name('create');
        Route::post('store', [StudentController::class, 'store'])->name('store');
        Route::get('edit/{student}', [StudentController::class, 'edit'])->name('edit');
        Route::put('update/{student}', [StudentController::class, 'update'])->name('update');
        Route::delete('delete/{student}', [StudentController::class, 'delete'])->name('delete');
    });

    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::get('', [UserController::class, 'index'])->name('index');
        Route::get('create', [UserController::class, 'create'])->name('create');
        Route::post('store', [UserController::class, 'store'])->name('store');
        Route::get('edit/{user}', [UserController::class, 'edit'])->name('edit');
        Route::put('update/{user}', [UserController::class, 'update'])->name('update');
        Route::delete('delete/{user}', [UserController::class, 'delete'])->name('delete');
    });
});
