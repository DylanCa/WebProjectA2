<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Event;
use App\User;
use App\EventMessageBoard;
use App\EventMembers;
use App\EventLikes;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class EventController extends Controller
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
    public function store(Request $request, Event $event)
    {
        $event = new Event;
        $event->name = $request->name;
        $event->eventCreator = \Cookie::get('id');
        $event->short_descr = $request->short_descr;
        $event->long_descr = $request->long_descr;
        $event->eventDate = $request->eventDate;
        $event->clubID = $request->clubID;
        $event->save();

        return redirect()->to('event');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);

        return view('singleevent', compact('event'));
    }

    public function reaction(Request $request, Event $event)
    {
        if(EventLikes::where('userID', $request->user)->where('eventID', $request->event)->count() != 0){
            $eventlike = EventLikes::where('userID', $request->user)->where('eventID', $request->event)->first();
        } else {
            $eventlike = new EventLikes; 
        }

        if(\Input::get('like')){
            if($eventlike->isLiked == 0 ){
                
                $event = Event::where('id', $request->event)->first();
                
                if($eventlike->isDisliked == 1){
                    $event->dislikes = $event->dislikes-1;
                }

                $event->likes = $event->likes+1;
                $event->save();

                $eventlike->userID = $request->user;
                $eventlike->eventID = $request->event;
                $eventlike->isLiked = 1;
                $eventlike->isDisliked = 0;
                $eventlike->save();

                
            } 


        

        }elseif(\Input::get('dislike')){
            if($eventlike->isDisliked == 0 ){
                

                $event = Event::where('id', $request->event)->first();
                
                if($eventlike->isLiked == 1){
                    $event->likes = $event->likes-1;
                }

                $event->dislikes = $event->dislikes+1;
                $event->save();

                $eventlike->userID = $request->user;
                $eventlike->eventID = $request->event;
                $eventlike->isLiked = 0;
                $eventlike->isDisliked = 1;
                $eventlike->save();

                
            } 

        }elseif(\Input::get('join')){

            if(EventMembers::where('userID', $request->user)->where('eventID', $request->event)->count() != 0){
            $addmember = EventMembers::where('userID', $request->user)->where('eventID', $request->event)->first();
        } else { $addmember = new EventMembers; }
            
            $addmember->userID = $request->user;
            $addmember->eventID = $request->event;
            $addmember->save();

            


        }elseif(\Input::get('leave')){

            if(EventMembers::where('userID', $request->user)->where('eventID', $request->event)->count() != 0){
            EventMembers::where('userID', $request->user)->where('eventID', $request->event)->first()->delete(); }

            

        }elseif(\Input::get('sendmessage')){
            $addmessage = new EventMessageBoard;
            $addmessage->userID = $request->user;
            $addmessage->eventID = $request->event;
            $addmessage->message = $request->message;
            $addmessage->save();

            
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
