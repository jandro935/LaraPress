<?php

namespace App\Http\Controllers;

use App\Post;

class HomeController extends Controller
{
	public function index()
	{
		$id = 1;
		$data = Post::findOrFail($id);

		return view('home', compact('data'));

//		$data = new Page();
//		$data->setConnection('wordpress');
//		$data->slug('sample-page')->first();
//
//		return view('home')->with('data', $data);
	}
}
