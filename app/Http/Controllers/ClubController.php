<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Club;
use App\ClubMembers;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Club $club)
    {
        $club = new Club;
        $club->name = $request->name;
        $club->clubCreator = \Cookie::get('id');
        $club->short_descr = $request->short_descr;
        $club->long_descr = $request->long_descr;
        $club->budget = $request->budget;
        $club->save();

        return redirect()->to('club');

    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $club = Club::find($id);

        return view('singleclub', compact('club'));
    }

    public function reaction(Request $request, Club $club)
    {
        if(\Input::get('join')){

            if(ClubMembers::where('userID', $request->user)->where('clubID', $request->club)->count() != 0){
                $addmember = ClubMembers::where('userID', $request->user)->where('clubID', $request->event)->first();

            } else { $addmember = new ClubMembers; }
            
            $addmember->userID = $request->user;
            $addmember->clubID = $request->club;
            $addmember->save();

            return back();


        }elseif(\Input::get('leave')){

            if(ClubMembers::where('userID', $request->user)->where('clubID', $request->club)->count() != 0){
            ClubMembers::where('userID', $request->user)->where('clubID', $request->club)->first()->delete(); }

            return back();
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
