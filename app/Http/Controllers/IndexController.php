<?php


namespace App\Http\Controllers;

class IndexController extends Controller{

	public function displayShop(){
		return view('shop');
	}
	public function displayBlog(){
		return view('blog');
	}
}