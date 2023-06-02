<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todos;
use App\Models\Daylistitems;
use DB;
use Cache;
class TodosController extends Controller
{
	
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /*$this->middleware('auth');*/
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $daylistitems = Daylistitems::orderBy('id', 'asc')->get();

        $todos = todos::orderBy('status', 'asc')->get();
       return view('todos', [ 'todos' => $todos, 'daylistitems' => $daylistitems]);
        
      // return view('todos');
    }
	
	
	public function item($id)
    {
        $todo = Todos::where('slug', $id)->first();
        if (!$todo) {
            $todo = Todos::where('id', $id)->first();
        } 
        // $assocs = News::where('formaID', $formation->id)->orderBy('daydate', 'desc')->get();


        return view('todo',  ['todo' => $todo]);
        
       // return view('todo');
       //return view('todo',  ['todo' => $todo, 'assocs' => $assocs]);

    }

    public function editTodostatus($id)
    {
        $item = Todos::where('id', $id)->first();
        if (!$item) {
            $item =new Todos();
        } 

       
   if($item->status==1){ $item->status = 0;}
   else{ $item->status = 1;}
       
        
        $item->save();

        Cache::flush();

        return redirect()->route('todos');
    }

    public function todobylistid($id)
    {
        $daylistitems = Daylistitems::orderBy('id', 'asc')->get();
        $todos = Todos::where('listid', $id)->orderBy('status', 'asc')->get();
        if (!$todos) {
          return 'rien';
        } 

            
     
        return view('todos',  ['todos' => $todos, 'daylistitems' => $daylistitems]);
    }

  
    public function editTodo($todoId = null)
    {
        //return $todoId ;
       $daylistitems = Daylistitems::orderBy('id', 'asc')->get();
        $todo = Todos::where('id', $todoId)->first();
        return view('todonew', ['todo' => $todo, 'daylistitems' => $daylistitems]);
    }

  
       public function deleteTodo( $todoId = null)
    {
        $todo = Todos::where('id', $todoId)->first();
        if ($todo) {  $todo->delete();}
        Cache::flush();
        return redirect()->route('todos');
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
        return redirect()->route('todos');
    }

	
}
