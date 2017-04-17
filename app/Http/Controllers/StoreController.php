<?php

namespace App\Http\Controllers;

//use DB;
use App\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class StoreController extends Controller{


	public function displayStore(){


		$store = Item::all();
		//$store = DB::table('store')->get();

		return view('store', compact('store'));
	}

	public function show($id){

		//return $test;
		 $item = Item::find($id);
		 return view('store_item', compact('item'));
	}

}
