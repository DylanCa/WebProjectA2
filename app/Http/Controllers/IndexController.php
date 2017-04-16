<?php

namespace App\Http\Controllers;

use DB;

class IndexController extends Controller{

	public function displayHomepage(){
		return view('event');
	}

	public function displayProfil(){
		return view('profil');
	}

	public function displayLogin(){
		return view('login');
	}

	public function logout(){
		\Cookie::queue(\Cookie::forget('id'));
		return redirect()->to('login');
	}

	public function displayCreateAcc(){
		return view('newaccount');
	}

	public function displayClub(){
		return view('club');
	}
	public function displayClubCreate(){
		return view('clubcreate');
	}

	public function displayEvent(){
		return view('event');
	}

	public function displayAdmin(){
		return view('admin');
	}

	public function displayStore(){
		return view('store');
	}

	public function displayStoreBuy(){
		return view('store_buy');
	}

	public function displayDBTries(){
		return view('dbtries');
	}
	
	public function displayCreate(){
        
        return view('eventcreate');
    }

}
