<?php

namespace App\Http\Controllers;

use DB;
use App\User;

class IndexController extends Controller{

	public function displayHomepage(){
		return view('event');
	}

	public function displayLogin(){
		if(!empty(\Cookie::get('id'))){
			return \Redirect::to('/');
		}else{
			return view('login');
		}
	}

	public function logout(){
		\Cookie::queue(\Cookie::forget('id'));
		return redirect()->to('login');
	}

	public function displayCreateAcc(){
		if(!empty(\Cookie::get('id'))){
			return \Redirect::to('/');
		}else{
			return view('newaccount');
		}

		
	}

	public function displayClub(){
		if(!empty(\Cookie::get('id'))){
			return view('club');
		}else{
			return \Redirect::to('/');
		}
	}
	public function displayClubCreate(){
		if(!empty(\Cookie::get('id'))){
			return view('clubcreate');
		}else{
			return \Redirect::to('/');
		}
	}

	public function displayEvent(){
		if(!empty(\Cookie::get('id'))){
			return view('event');
		}else{
			return \Redirect::to('/');
		}
	}

	public function displayAdmin(){
		if(User::where('id', \Cookie::get('id'))->first()->isAdmin == 1){ return view('admin'); } else { return view('event'); }
	}


	public function displayStoreBuy(){
		return view('store_buy');
	}

	public function displayDBTries(){
		if(!empty(\Cookie::get('id'))){
			return view('dbtries');
		}else{
			return \Redirect::to('/');
		}
	}
	
	public function displayCreate(){
		if(!empty(\Cookie::get('id'))){
        return view('eventcreate');
    }else{
    	return \Redirect::to('/');
    }
    }

}
