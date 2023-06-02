<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pages;
use DB;

use Cache;
class PagesController extends Controller
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
       return view('pages', [ 'pages' => $pages]);
        
      // return view('pages');
    }
	
	
	public function item($id)
    {
        $page = Pages::where('slug', $id)->first();
        if (!$page) {
            $page = Pages::where('id', $id)->first();
        } 
        // $assocs = News::where('formaID', $formation->id)->orderBy('daydate', 'desc')->get();


        return view('page',  ['page' => $page]);
        
       // return view('page');
       //return view('page',  ['page' => $page, 'assocs' => $assocs]);

    }


    public function editPage($pageId = null)
    {
        
        $page = Pages::where('id', $pageId)->first();
        return view('pagenew', ['page' => $page]);
    }

  
       public function deletePage( $pageId = null)
    {
        $page = Pages::where('id', $pageId)->first();
        if ($page) {  $page->delete();}
        Cache::flush();
        return redirect()->route('pages');
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
        return redirect()->route('pages');
    }

  
	
}
