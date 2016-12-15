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

	}
}
