<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Club;
use App\ClubMembers;
use App\Event;
use App\EventLikes;
use App\EventMembers;
use App\EventMessageBoard;
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

        $addmember = new ClubMembers;
        $addmember->userID = \Cookie::get('id');
        $addmember->clubID = $club->id;
        $addmember->rank = 1;
        $addmember->save();

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

    public function admin($id)
    {
        if(ClubMembers::where('userID', \Cookie::get('id'))->where('clubID', $id)->first()->rank == 1 || ClubMembers::where('userID', \Cookie::get('id'))->where('clubID', $id)->first()->rank == 2){
            $club = Club::find($id);
        return view('clubadmin', compact('club'));
        } else { return back();}
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

    public function admind(Request $request, ClubMembers $member){

        $clubMembers = ClubMembers::where('id', $request->memberID)->first();

        if (\Input::get('deleteMessage')){
            EventMessageBoard::where('id', $request->messageID)->first()->delete();
            
        } elseif(\Input::get('kickClub')){

            $clubMembers->delete();
            
        } elseif(\Input::get('setAdmin')){
            $clubMembers->rank = 1;
            $clubMembers->save();

        } elseif(\Input::get('unsetAdmin')){
            $clubMembers->rank = 0;
            $clubMembers->save();

        } elseif(\Input::get('deleteEvent')){
            foreach(EventMessageBoard::where('eventID', $request->event)->get() as $eventMessage){
                $eventMessage->delete();
            }

            foreach(EventMembers::where('eventID', $request->event)->get() as $eventMembers){
                $eventMembers->delete();
            }

            foreach(EventLikes::where('eventID', $request->event)->get() as $eventLikes){
                $eventLikes->delete();
            }
            
            Event::where('id', $request->event)->first()->delete();

        }

        return back();
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
