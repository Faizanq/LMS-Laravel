<?php namespace Modules\Course\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class CourseController extends Controller {
	
	public function index()
	{
		return view('course::index');
	}
	
}