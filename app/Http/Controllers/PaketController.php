<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paket;
use DataTables;

class PaketController extends Controller
{
    public function json(){
        return Datatables::of(Paket::all())->make(true);
    }
 
    public function index(){
        return view('paket.list_paket');
    }
}
