<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Daylistitems;
use App\Models\Pages;
use App\Models\Todobydays;
use App\Models\Todos;
use DB;
use Cache;
class DayController extends Controller
{
	private $pagerItems = 2;
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
		
        $pages = pages::orderBy('id', 'desc')->get();
        $daylistitems = Daylistitems::orderBy('id', 'asc')->get();
        $todobydays = Todobydays::orderBy('id', 'asc')->get();
        $todos = Todos::get();

       return view('day', [ 'pages' => $pages, 'daylistitems' => $daylistitems, 'todobydays' =>   $todobydays, 'todos' => $todos ]);
        
    }
	
	
	public function item($id)
    {
        $page = Pages::where('slug', $id)->first();
        if (!$page) {
            abort(404);
        } 

        
        // $assocs = News::where('formaID', $formation->id)->orderBy('daydate', 'desc')->get();


        return view('page',  ['page' => $page]);
        
       // return view('page');
       //return view('page',  ['page' => $page, 'assocs' => $assocs]);

    }

    public function editTodobyday($id)
    {
        $item = Todobydays::where('day', date("Y-m-d"))->where('listid', $id)->first();
        if (!$item) {
            $item =new Todobydays();
        } 

        if($item->status==1){ $item->status = 0;}
        else{ $item->status = 1;}
   

        $item->listid = $id;
        $item->day = date("Y-m-d");
        $item->save();

        Cache::flush();

        return redirect()->route('day');
    }
	

      /* DAY LIST ITEM */
	 public function daylistitems()
     {
         $daylistitems = Daylistitems::orderBy('id', 'asc')->get();
         return view('daylistitems', ['daylistitems' => $daylistitems]);
     }
     

        
     public function editDaylistitem($daylistitemId = null)
     {
         $daylistitem = Daylistitems::where('id', $daylistitemId)->first();
         return view('daylistitems.edit', ['daylistitem' => $daylistitem]);
     }
     
        public function deleteDaylistitem( $daylistitemId = null)
     {
         $daylistitem = Daylistitems::where('id', $daylistitemId)->first();
         if ($daylistitem) {  $daylistitem->delete();}
         Cache::flush();
         return redirect()->route('daylistitems');
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
         return redirect()->route('daylistitems');
     }





}
