<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CityStoreRequest;
use App\Http\Requests\cityUpdateRequest;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $cities = City::where("name","like","%{$request->search}%")->orwhere("state_id","like","%{$request->search}%")->get();
            return view('cities.index',['cities'=> $cities ,'search'=>$request->search]);
        }
        else
        {
            $cities= City::all();
            return view('cities.index',compact('cities'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::all();
        return view('cities.create', compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityStoreRequest $request)
    {
        City::create([
            'state_id' => $request->state_id,
            'name' => $request->cityname,
        ]);
        return redirect()->route('cities.index')->with('message', 'The City Created Succesfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        $states = State::all();
        return view('cities.edit',['states'=> $states,'city'=> $city]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(cityUpdateRequest $request, City $city)
    {
        $city->update([
            'state_id' => $request->state_id,
            'name' => $request->cityname,
        ]);
        return redirect()->route('cities.index')->with('message', 'The City Updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->route('cities.index')->with('message', 'The City Deleted Succesfully');
    }
}
