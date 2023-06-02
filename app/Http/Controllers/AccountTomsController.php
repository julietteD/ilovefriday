<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\AccountToms;
use DB;
use Cache;
class AccountTomsController extends Controller
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

        $accountToms = accountToms::orderBy('dateexpense', 'asc')->get();
       return view('accountToms', [ 'accountToms' => $accountToms ]);
        
      // return view('accountToms');
    }
	
	
	public function item($id)
    {
        $accountTom = AccountToms::where('id', $id)->first();
        if (!$accountTom) {
            $accountTom = AccountToms::where('id', $id)->first();
        } 
        // $assocs = News::where('formaID', $formation->id)->orderBy('daydate', 'desc')->get();


        return view('accountTom',  ['accountTom' => $accountTom]);
        
       // return view('accountTom');
       //return view('accountTom',  ['accountTom' => $accountTom, 'assocs' => $assocs]);

    }

    

  
    public function editAccountTom($accountTomId = null)
    {
        //return $accountTomId ;
        $accountTom = AccountToms::where('id', $accountTomId)->first();
        return view('accountTomnew', ['accountTom' => $accountTom]);
    }

  
       public function deleteAccountTom( $accountTomId = null)
    {
        $accountTom = AccountToms::where('id', $accountTomId)->first();
        if ($accountTom) {  $accountTom->delete();}
        Cache::flush();
        return redirect()->route('accountToms');
    }
    
    public function editAccountTomAction(Request $request)
    {
        
        $accountTomId = $request->input('id');
        $accountTom = false;
        if ($accountTomId) { $accountTom = AccountToms::where('id', $accountTomId)->first();}
        if (!$accountTom) { $accountTom = new AccountToms(); }
  
        $accountTom->title = $request->input('title');
        $accountTom->dateexpense = $request->input('dateexpense');
        $accountTom->amount = $request->input('amount');

       

        $accountTom->save();

        Cache::flush();
        return redirect()->route('accountToms');
    }

	
}
