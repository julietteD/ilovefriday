<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\Mail;
use App\Pages;
use App\Todobydays;
use App\Todos;
use App\Daylistitems;

use Response;


use Cache;

use DB;

/*use App\ImageFormat;*/

class HomeController extends Controller
{
    public function index()
    {
        return view('management.home');
    }

	

     /* PAGES */
	 public function pages()
     {
         $pages = Pages::orderBy('id', 'asc')->get();
         return view('management.pages', ['pages' => $pages]);
     }
     
     
       public function editPage($pageId = null)
     {
         $page = Pages::where('id', $pageId)->first();
         return view('management.pages.edit', ['page' => $page]);
     }
     
        public function deletePage( $pageId = null)
     {
         $page = Pages::where('id', $pageId)->first();
         if ($page) {  $page->delete();}
         Cache::flush();
         return redirect()->route('management.pages');
     }
     
     public function editPageAction(Request $request)
     {
         
         $pageId = $request->input('id');
         $page = false;
         if ($pageId) { $page = Pages::where('id', $pageId)->first();}
         if (!$page) { $page = new Pages(); }
   
         $page->title = $request->input('title');
         $page->body = $request->input('body');
         $page->slug = str_slug($request->input('title'));
         $page->save();
 
         Cache::flush();
         return redirect()->route('management.pages');
     }


     /* DAY LIST ITEM */
	 public function daylistitems()
     {
         $daylistitems = Daylistitems::orderBy('id', 'asc')->get();
         return view('management.daylistitems', ['daylistitems' => $daylistitems]);
     }
     
     
       public function editDaylistitem($daylistitemId = null)
     {
         $daylistitem = Daylistitems::where('id', $daylistitemId)->first();
         return view('management.daylistitems.edit', ['daylistitem' => $daylistitem]);
     }
     
        public function deleteDaylistitem( $daylistitemId = null)
     {
         $daylistitem = Daylistitems::where('id', $daylistitemId)->first();
         if ($daylistitem) {  $daylistitem->delete();}
         Cache::flush();
         return redirect()->route('management.daylistitems');
     }
     
     public function editDaylistitemAction(Request $request)
     {
         
         $daylistitemId = $request->input('id');
         $daylistitem = false;
         if ($daylistitemId) { $daylistitem = Daylistitems::where('id', $daylistitemId)->first();}
         if (!$daylistitem) { $daylistitem = new Daylistitems(); }
   
         $daylistitem->title = $request->input('title');
         $daylistitem->type = $request->input('type');
         $daylistitem->duration = $request->input('duration');
         $daylistitem->orderelt = $request->input('orderelt');
         $daylistitem->status = $request->input('status');
         $daylistitem->pageid = $request->input('pageid');

         $daylistitem->save();
 
         Cache::flush();
         return redirect()->route('management.daylistitems');
     }



     /* <tO DO BY DAY */
	 public function todobydays()
     {
         $todobydays = Todobydays::orderBy('id', 'asc')->get();
         return view('management.todobydays', ['todobydays' => $todobydays]);
     }
     
     
       public function editTodobyday($todobydayId = null)
     {
        $daylistitems = Daylistitems::orderBy('id', 'asc')->get();
         $todobyday = Todobydays::where('id', $todobydayId)->first();
         return view('management.todobydays.edit', ['todobyday' => $todobyday, 'daylistitems' => $daylistitems]);
     }
     
        public function deleteTodobyday( $todobydayId = null)
     {
         $todobyday = Todobydays::where('id', $todobydayId)->first();
         if ($todobyday) {  $todobyday->delete();}
         Cache::flush();
         return redirect()->route('management.todobydays');
     }
     
     public function editTodobydayAction(Request $request)
     {
         
         $todobydayId = $request->input('id');
         $todobyday = false;
         if ($todobydayId) { $todobyday = Todobydays::where('id', $todobydayId)->first();}
         if (!$todobyday) { $todobyday = new Todobydays(); }
   
         $todobyday->listid = $request->input('listid');
         $todobyday->day = $request->input('day');
         $todobyday->status = $request->input('status');
       
        

         $todobyday->save();
 
         Cache::flush();
         return redirect()->route('management.todobydays');
     }

      /* TODO */
	 public function todos()
     {
         $todos = Todos::orderBy('id', 'asc')->get();
         return view('management.todos', ['todos' => $todos]);
     }
     
     
       public function editTodo($todoId = null)
     {
        $daylistitems = Daylistitems::orderBy('id', 'asc')->get();
         $todo = Todos::where('id', $todoId)->first();
         return view('management.todos.edit', ['todo' => $todo, 'daylistitems' => $daylistitems]);
     }
     
        public function deleteTodo( $todoId = null)
     {
         $todo = Todos::where('id', $todoId)->first();
         if ($todo) {  $todo->delete();}
         Cache::flush();
         return redirect()->route('management.todos');
     }
     
     public function editTodoAction(Request $request)
     {
         
         $todoId = $request->input('id');
         $todo = false;
         if ($todoId) { $todo = Todos::where('id', $todoId)->first();}
         if (!$todo) { $todo = new Todos(); }
   
         $todo->listid = $request->input('listid');
         $todo->title = $request->input('title');
         $todo->status = $request->input('status');
       
        

         $todo->save();
 
         Cache::flush();
         return redirect()->route('management.todos');
     }

	
	
  


}
