<?php

class LocationController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /areas
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('areas.index')
					->with('title','All Locations')
					->with('areas',Location::orderBy('location_name', 'ASC')->paginate(8));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /areas/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('areas.create')
					->with('title','Add New Location');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /areas
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array
		(
	    	'area'	=>	'required'
		);
		$validation = Validator::make(Input::all(), $rules);
		
		if($validation->fails())
			return Redirect::back()
								->withInput()
								->withErrors($validation);
		else{
			$area = new Location;
			$area->location_name = Input::get('area');
			if($area->save())
				    return Redirect::route('location.index')
				    					->with('success', "Area Added Successfully.");
			else
					return Redirect::back()->withInput()->withErrors($validation)->with('error', 'Some error occured. Try again.');
		}
	}

	/**
	 * Display the specified resource.
	 * GET /areas/{id}
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
	 * GET /areas/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return View::make('areas.edit')
					->with('title','Edit An Location')
					->with('area',Location::where('id', '=', $id)->first());
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /areas/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = array
		(
	    	'area'	=>	'required'
		);
		$validation = Validator::make(Input::all(), $rules);
		
		if($validation->fails())
			return Redirect::back()
								->withInput()
								->withErrors($validation);
		else{
			$areaUpdate = ['location_name'=>Input::get('area')];
			
			if(Location::find(Input::get('area_id'))->update($areaUpdate))
				    return Redirect::route('location.index')
				    					->with('success', "Area Updated Successfully.");
			else
					return Redirect::back()->withInput()->withErrors($validation)->with('error', 'Some error occured. Try again.');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /areas/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function delete($id){
		$area = Location::where('id', '=', $id);
		if($area->delete())
			return Redirect::route('location.index')
								->with('success', "Area has been deleted.");
		else
			return Redirect::route('location.index')
								->with('errors', 'Some error occured. Try again.');
	}

}