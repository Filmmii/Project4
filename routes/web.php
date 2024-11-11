<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ProjectController,
    MessageController,
    TaskController,
    MemberController,
    NotificationsController,
    Member_has_RoleController,
    RoleController,
    TeamController,
    ReportController,
    MyTeamController,
    AuthController
};

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

//Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
//Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
//Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::get('/', function () {
//     return view('dashboard', ['currentPage' => 'dashboard']);
// })->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('dashboard', ['currentPage' => 'dashboard']);
// });

// //Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('report.index');
// Route::get('dashboard/{dashboard}/report/show', [ReportController::class, 'show'])->name('report.show');
// Route::post('dashboard/{dashboard}/report', [ReportController::class, 'store'])->name('report.store');
// routes/web.php

Route::get('/dashboard', [ReportController::class, 'index'])->name('dashboard');
Route::get('/report/{id}', [ReportController::class, 'show'])->name('report.details');

Route::get('/my-team', [MyTeamController::class, 'index'])->name('my-team.index');
Route::get('/team', [TeamController::class, 'index'])->name('team.index');

// Project Routes
Route::resource('project', ProjectController::class);
Route::get('project/{project}/details', [ProjectController::class, 'show'])->name('project.details');

// Task Routes (Nested under Project)
Route::get('project/{project}/task/create', [App\Http\Controllers\TaskController::class, 'create'])->name('task.create');
Route::post('project/{project}/task', [TaskController::class, 'store'])->name('task.store');

Route::resource('message', MessageController::class);
Route::resource('task', TaskController::class)->except(['create', 'store']);

Route::resource('member', MemberController::class);
Route::get('/member/create', [MemberController::class, 'create'])->name('member.create');
Route::post('/member', [MemberController::class, 'store'])->name('member.store');
Route::get('/member/{id}/edit', [MemberController::class, 'edit'])->name('member.edit');
Route::put('/member/{id}', [MemberController::class, 'update'])->name('member.update');


Route::get('/team', [TeamController::class, 'index'])->name('team.index');
Route::get('/team/create', [TeamController::class, 'create'])->name('team.create');
Route::post('/team', [TeamController::class, 'store'])->name('team.store');
Route::get('/team/{id}/edit', [TeamController::class, 'edit'])->name('team.edit');
Route::put('/team/{id}', [TeamController::class, 'update'])->name('team.update'); 
Route::post('/team/{teamId}/remove-member', [TeamController::class, 'removeMember'])->name('team.removeMember');


Route::resource('notifications', NotificationsController::class);
Route::resource('member_has_role', Member_has_RoleController::class);
Route::resource('role', RoleController::class);
Route::resource('team', TeamController::class);
Route::resource('report', ReportController::class);