<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\TodosController;
use App\Http\Controllers\DayController;

use App\Http\Controllers\AccountTomsController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::middleware(['auth'])->group(function () {
   
	Route::get('/', function () {
    return view('welcome');
});



Route::get('todobylistid/{id}', [TodosController::class, 'todobylistid'])->name('todobylistid.item');

	Route::get('/day', [DayController::class, 'index'])->name('day');
    Route::get('/daylistitems', [DayController::class, 'daylistitems'])->name('daylistitems');
    Route::get('daylistitems/new', [DayController::class, 'editDaylistitem'])->name('daylistitems.new');
    Route::get('daylistitems/edit/{id}', [DayController::class, 'editDaylistitem'])->name('daylistitems.edit');
    Route::get('daylistitems/delete/{id}', [DayController::class, 'deleteDaylistitem'])->name('daylistitems.delete');
    Route::post('daylistitems/edit', [DayController::class, 'editDaylistitemAction'])->name('daylistitems.edit.action');


    Route::get('/pages', [PagesController::class, 'index'])->name('pages');
    Route::get('edittodobyday/{id}', [DayController::class, 'editTodobyday'])->name('edittodobyday.edit');
    Route::get('/todos', [TodosController::class, 'index'])->name('todos');
    Route::get('edittodostatus/{id}', [TodosController::class, 'editTodostatus'])->name('edittodostatus.edit');
    Route::get('/accountToms', [AccountTomsController::class, 'index'])->name('accountToms');
    
    
    Route::get('pages/new', [PagesController::class, 'editPage'])->name('pages.new');
    Route::post('pages/edit', [PagesController::class, 'editPageAction'])->name('pages.edit.action');
    Route::get('pages/edit/{id}', [PagesController::class, 'editPage'])->name('pages.edit');
    Route::get('pages/delete/{id}', [PagesController::class, 'deletePage'])->name('pages.delete');
    Route::get('pagesview/{id}', [PagesController::class, 'item'])->name('pages.item');
    
    Route::get('todos/new', [TodosController::class, 'editTodo'])->name('todos.new');
    Route::post('todos/edit', [TodosController::class, 'editTodoAction'])->name('todos.edit.action');
    Route::get('todos/edit/{id}', [TodosController::class, 'editTodo'])->name('todos.edit');
    Route::get('todos/delete/{id}', [TodosController::class, 'deleteTodo'])->name('todos.delete');
    
    
    Route::get('accountToms/new', [AccountTomsController::class, 'editAccountTom'])->name('accountToms.new');
    Route::post('accountToms/edit', [AccountTomsController::class, 'editAccountTomAction'])->name('accountToms.edit.action');
    Route::get('accountToms/edit/{id}', [AccountTomsController::class, 'editAccountTom'])->name('accountToms.edit');
    Route::get('accountToms/delete/{id}', [AccountTomsController::class, 'deleteAccountTom'])->name('accountToms.delete');
    
    

Route::get('accounts', [AccountsController::class, 'index']);
Route::post('parse-csv', [AccountsController::class, 'importAccounts']);
Route::get('accountByMonth/{month}', [AccountsController::class, 'indexMonth'])->name('accountByMonth');

Route::post('accountLines/edit', [AccountsController::class, 'editAccountLineAction'])->name('accountLines.edit.action');
Route::get('accountLines/edit/{id}', [AccountsController::class, 'editAccountLine'])->name('accountLines.edit');
Route::get('accountLines/delete/{id}', [AccountsController::class, 'deleteAccountLine'])->name('accountLines.delete');

Route::get('/csv', function() {
  
    $headers = array(
        'Content-Type' => 'application/vnd.ms-excel; charset=utf-8',
        'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
        'Content-Disposition' => 'attachment; filename=abc.csv',
        'Expires' => '0',
        'Pragma' => 'public',
    );

$filename = "download.csv";
$handle = fopen($filename, 'w');
fputcsv($handle, [
    "id",
    "belfiusid",
    "title",
    "titlealt",
    "month",
    "datedep",
    "amount",
    "comments",
    "type",
    "created_at",
    "updated_at"
]);
$data = Accounts::all();
    foreach ($data as $row) {
        // Add a new row with data
        fputcsv($handle, [
            $row->id,
            $row->belfiusid,
            $row->title,
            $row->titlealt,
            $row->month,
            $row->datedep,
            $row->amount,
            $row->comments,
            $row->type,
            $row->created_at,
            $row->updated_at

        ]);
    }
fclose($handle);
return Response::download($filename, "download.csv", $headers);
});


});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
