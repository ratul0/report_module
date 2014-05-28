<?php

class VisitController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /contructors
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('contructors.index')
					->with('title','All contructors')
					->with('contructors',Contructor::orderBy('contructor_name', 'ASC')->paginate(8));
	}

	public function show(){
		return View::make('visits.show')
					->with('title',"Show Log")
					->with('visits',Visit::paginate(10));
	}



}