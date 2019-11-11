<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paket;
use DataTables;
use DB;

class PaketController extends Controller
{
    // public function json(){
    //     return Datatables::of(Paket::all())->make(true);
    // }
 
    public function index(Request $request){
        if(request()->ajax())
        {
            if(!empty($request->filter_kdoutput))
            {
                $data=Paket::select('paket.*')
                    ->where('kdoutput',$request->filter_kdoutput)
                    ->get();
            }
            else
            {
                $data=Paket::select('paket.*')
                        ->get();
            }
            return datatables()->of($data)->make(true);
        }
        $listdata=DB::table('tblkdoutput')
                    ->select('kdoutput','nmoutput')
                    ->orderBy('kdoutput','ASC')
                    ->get();
        return view('paket.list_paket',compact('listdata'));
    }
}
