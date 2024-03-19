<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Inertia\Inertia;
use DB;
use App\Models\WHLocation;
use App\Models\User;
class InventoryController extends Controller
{
    public function inventoryCount(Request $request){
        
        return Inertia::render('InventoryCount/InventoryCount');
    }

    public function findzoneforSku(Request $request){
        dd($request->all());        
    }


    public function salesBook(Request $request){

       $branches =  DB::connection('elanpro_db')
                    ->table('MstBranchWarehouse')
                    ->select('name','code','id')
                    ->get();

        $parties = DB::connection('elanpro_db')
                    ->table('MstBusinessPartner')
                    ->distinct()
                    ->select('Name','ID')
                    ->where('type','=','2007')                                     
                    ->get();
                  
                  
        $subparties = DB::connection('elanpro_db')
                    ->table('MstBusinessPartnerSub')
                    ->select('Name','id')
                    ->get();

        $currencies = DB::connection('elanpro_db')
                    ->table('MstCurrency')
                    ->select('Name','id')
                    ->get();
        $itemsval = DB::connection('elanpro_db')
                    ->table('MstItem')
                    ->distinct()
                    ->select('name')                
                    ->get();
        $unitsval = DB::connection('elanpro_db')
                    ->table('MstItemUnit')
                    ->select('name')                
                    ->get();
        $salesExecutive = DB::connection('elanpro_db')
                    ->table('MstSalesTeam')
                    ->select('name')                
                    ->get();
        $states = DB::connection('elanpro_db')
                    ->table('MstState')
                    ->select('name')                
                    ->get();

        $cities = DB::connection('elanpro_db')
                    ->table('MstState')
                    ->select('name')                
                    ->get();
                        
               
        return Inertia::render('SalesBook/salesBook',compact('branches','parties','subparties','currencies','itemsval','unitsval','salesExecutive','states'));
    }


    
    public function salesBookApi(Request $request){

        $branches =  DB::connection('elanpro_db')
        ->table('MstBranchWarehouse')
        ->select('name','code','id')
        ->get();

    $parties = DB::connection('elanpro_db')
        ->table('MstBusinessPartner')
        ->distinct()
        ->select('Name as partyName','ID as id')
        ->where('type','=','2007')                        
        ->get();     
      
    $subparties = DB::connection('elanpro_db')
            ->table('MstBusinessPartnerSub')
            ->distinct()
            ->select('Name as subPartyName','id','PartyID as partyID')
            ->get();

    $currencies = DB::connection('elanpro_db')
            ->table('MstCurrency')
            ->select('Name','id')
            ->get();
    $itemsval = DB::connection('elanpro_db')
            ->table('MstItem')
            ->distinct()
              ->select('name','SalesUnitID as salesUnitID')                 
            ->get();
    
    $unitsval = DB::connection('elanpro_db')
            ->table('MstItemUnit')
            ->distinct()
            ->select('name','ID')             
            ->get();
    
    $salesExecutive = DB::connection('elanpro_db')
            ->table('MstSalesTeam')
            ->select('name')                
            ->get();
    $states = DB::connection('elanpro_db')
            ->table('MstState')
            ->select('name')                
            ->get();

    $cities = DB::connection('elanpro_db')
            ->table('MstState')
            ->select('name')                
            ->get();        
                
         return response(compact('branches','parties','subparties','currencies','itemsval','unitsval','salesExecutive','states'));
     }

    //  public function findUnit($id){
    //      if($id){
    //         $unitsval = DB::connection('elanpro_db')
    //         ->table('MstItemUnit')
    //         ->distinct()
    //         ->select('name','ID') 
    //         ->where('ID','=',$id)               
    //         ->get();
    //         return response()->json(['message' => $unitsval],201);
    //      }else{
    //         return response()->json(['message' => 'No user found'], 404);
    //      }
        
    //  }
}
