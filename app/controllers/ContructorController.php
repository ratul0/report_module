<?php

class ContructorController extends \BaseController {

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

	/**
	 * Show the form for creating a new resource.
	 * GET /contructors/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('contructors.create')
					->with('locations',Location::all()->lists('location_name','id'))
					->with('title','Add New Contructor');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /contructors
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array
		(
	    	'location'	=>	'required',
	    	'contructor' => 'required'
		);
		$validation = Validator::make(Input::all(), $rules);
		
		if($validation->fails())
			return Redirect::back()
								->withInput()
								->withErrors($validation);
		else{
			$contructor = new Contructor;
			$contructor->location_id = Input::get('location');
			$contructor->contructor_name = Input::get('contructor');
			if($contructor->save())
				    return Redirect::route('contructor.index')
				    					->with('success', "Contructor Added Successfully.");
			else
					return Redirect::back()->withInput()->withErrors($validation)->with('error', 'Some error occured. Try again.');
		}
	}

	/**
	 * Display the specified resource.
	 * GET /contructors/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /contructors/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

		//dd(Area::all()->lists('area_name','id'));
		return View::make('contructors.edit')
					->with('title','Edit An Contructor')
					->with('locations',Location::all()->lists('location_name','id'))
					->with('contructor',Contructor::where('id', '=', $id)->first());
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /contructors/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = array
		(
	    	'location'	=>	'required',
	    	'contructor' => 'required'
		);
		$validation = Validator::make(Input::all(), $rules);
		
		if($validation->fails())
			return Redirect::back()
								->withInput()
								->withErrors($validation);
		else{
			$contructorUpdate = ['location_id'=>Input::get('location'),'contructor_name'=>Input::get('contructor')];
			
			if(Contructor::find(Input::get('contructor_id'))->update($contructorUpdate))
				    return Redirect::route('contructor.index')
				    					->with('success', "Contructor Updated Successfully.");
			else
					return Redirect::back()->withInput()->withErrors($validation)->with('error', 'Some error occured. Try again.');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /contructors/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
	public function delete($id){
		$contructor = Contructor::where('id', '=', $id);
		if($contructor->delete())
			return Redirect::route('contructor.index')
								->with('success', "Contructor has been deleted.");
		else
			return Redirect::route('contructor.index')
								->with('errors', 'Some error occured. Try again.');
	}

}