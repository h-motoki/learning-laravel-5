<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller {

	public function about() {
		$name = 'Jeffery <span style="color: red">Way</span>';
		return view('pages.about')->with('name', $name);
	}

	// public function about() {
	// 	$name = 'Jeffery <span style="color: red">Way</span>';
	// 	return view('pages.about')->with([
	// 		'first' => 'Jeffery',
	// 		'last' => 'Way'
	// 	]);
	// }

	// public function about() {
	// 	$data = [];
	// 	$data['first'] = 'Jeffery';
	// 	$data['last'] = 'Way';
	// 	return view('pages.about', $data);
	// }

	// public function about() {
	// 	$first = 'Jeffery';
	// 	$last = 'Way';
	// 	return view('pages.about', compact('first', 'last'));
	// }
}
