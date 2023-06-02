<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accounts;
use DB;
use Cache;
class AccountsController extends Controller
{
    public function index() {
        $accounts = Accounts::orderBy('id', 'asc')->get();
        return view('accounts', [ 'accounts' => $accounts] );

    }

    public function indexMonth($month = null) {
        
        $accounts = Accounts::where('month', $month)->orderBy('datedep', 'asc')->orderBy('amount', 'asc')->get();
        
        $typeEnergie = 0;
        $typeRestaurants = 0;
        $typeEnfants = 0;
        $typeNourriture = 0;
        $typeEmprunt = 0;
        $typeVoiture = 0;
        $typeMaison = 0;
        $typeLoisirs = 0;
        $typeAutres = 0;

        $sum = 0;
        foreach($accounts as $account) {
            if($account->type == 'energie'){
                $typeEnergie += $account->amount;
            }
            elseif($account->type == 'restaurants'){
                $typeRestaurants += $account->amount;
            }
            elseif($account->type == 'enfants'){
                $typeEnfants += $account->amount;
            }
            elseif($account->type == 'nourriture'){
                $typeNourriture += $account->amount;
            }
            elseif($account->type == 'emprunt'){
                $typeEmprunt += $account->amount;
            }
            elseif($account->type == 'voiture'){
                $typeVoiture += $account->amount;
            }
            elseif($account->type == 'maison'){
                $typeMaison += $account->amount;
            }
            elseif($account->type == 'loisirs'){
                $typeLoisirs += $account->amount;
            }
            else{
                $typeAutres += $account->amount;
            }
            $sum += $account->amount;
        }

        $typeArray= array( 
            "energie" => -$typeEnergie,
            "restaurants" => -$typeRestaurants,
            "enfants" => -$typeEnfants,
            "nourriture" => -$typeNourriture,
            "emprunt" => -$typeEmprunt,
            "voiture" => -$typeVoiture,
            "maison" => -$typeMaison,
            "loisirs" => -$typeLoisirs,
        "autres" => -$typeAutres );
       

       
      


        return view('accountByMonth', [ 'accounts' => $accounts, 'month' => $month, 'sum' => -$sum, 'typeArray' => $typeArray] );

    }


    // ------------- [ Import Leads ] ----------------
    public function importAccounts(Request $request) {
        $data = array();

        $account_id = "";
        $title = "";
      

        //  file validation
        $request->validate([
            "csv_file" => "required"
        ]);
       
        $file = $request->file("csv_file");
        $csvData2 = file_get_contents($file);
        $csvData3 = str_replace(",",".",$csvData2);
        $csvData = str_replace(";",",",$csvData3);
        $rows = array_map("str_getcsv", explode("\n", $csvData));
        $header = array_shift($rows);

        foreach ($rows as $row) {
            if (isset($row[0])) {
               
              
                if ($row[0] != "") {
                    $row = array_combine($header, $row);
                    /*$full_name = $row["full_name"];
                    $full_name_array = explode(" ", $full_name);
                    $first_name = $full_name_array[0];*/

                   /* if (isset($full_name_array[1])) {
                        $last_name = $full_name_array[1];
                    }*/

                    // master lead data


                

                    $originalDate = $row["Date valeur"];
                $arr = explode('/', $originalDate);
                $newDate = $arr[2].'-'.$arr[1].'-'.$arr[0];
                $month = $arr[1];
                $title= $row['Nom contrepartie contient'];
                if($title==''){ $title= $row['Transaction'];}

                    $accountsData = array(
                        "title" =>  $title,
                        "amount" => $row["Montant"],
                        //"belfiusid" => $row["NumÈro de transaction"],
                        "datedep" => $newDate,
                        "month" => $month
                    );
                   

                    // ----------- check if lead already exists ----------------
                    //$checkAccount= Accounts::where("belfiusid", "=", $row["NumÈro de transaction"])->first();

                   /* if (!is_null($checkAccount)) {
                        $updateAccounts  = Accounts::where("belfiusid", "=", $row["NumÈro de transaction"])->update($accountsData);
                        if($updateAccounts == true) {
                            $data["status"] = "failed";
                            $data["message"] = "Leads updated successfully";
                        }
                    }

                    else {*/
                        $account = Accounts::create($accountsData);
                        if(!is_null($account)) {
                            $data["status"]     =       "success";
                            $data["message"]    =       "Leads imported successfully";
                       }                        
                    /* }*/
                }
            }
        }

        return back()->with($data["status"], $data["message"]);
    }



    public function editAccountLine($accountLineId = null)
    {
        //return $accountLineId ;
        $account = Accounts::where('id', $accountLineId)->first();
        return view('accountLinenew', ['account' => $account]);
    }

  
       public function deleteAccountLine( $accountLineId = null)
    {
        $accountLine = Accounts::where('id', $accountLineId)->first();
        if ($accountLine) {  $accountLine->delete();}
        Cache::flush();
        return back();
    }
    
    public function editAccountLineAction(Request $request)
    {
        
        $accountLineId = $request->input('id');
        $accountLine = false;
        if ($accountLineId) { $accountLine = Accounts::where('id', $accountLineId)->first();}
        if (!$accountLine) { $accountLine = new Accounts(); }
   $accountLine->amount = $request->input('amount');
        $accountLine->comments = $request->input('comments');
        $accountLine->titlealt = $request->input('titlealt');
        $accountLine->type = $request->input('type');
        
        $month= $accountLine->month;

        $accountLine->save();

        Cache::flush();
       // $accounts = Accounts::where('month', $month)->orderBy('datedep', 'asc')->get();
        return redirect()->route('accountByMonth', [ 'month' => $month ]);
    }

     


}