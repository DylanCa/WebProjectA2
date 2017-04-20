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
    public function store(Request $request, Event $event)
    {
        $event = new Event;
        $event->name = $request->name;
        $event->eventCreator = \Cookie::get('id');
        $event->short_descr = $request->short_descr;
        $event->long_descr = $request->long_descr;
        $event->eventimage = $request->eventimage;
        $event->eventDate = $request->eventDate;
        $event->clubID = $request->clubID;

        $event->save();

        $eventMember = new EventMembers;
        $eventMember->userID = \Cookie::get('id');
        $eventMember->eventID = $event->id;
        $eventMember->isAdmin = 2;

        $eventMember->save();

        return \Redirect::to('/');
    }

    public function show($id)
    {
        if(!empty(\Cookie::get('id'))){
            $event = Event::find($id);

            return view('singleevent', compact('event'));
        }else{
            return \Redirect::to('/');
        }
        
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

    public function admin(Request $request){

        $member = EventMembers::where('id', $request->memberID)->first();

        if (\Input::get('deleteMessage')){
            EventMessageBoard::where('id', $request->deleteMessage)->first()->delete();
            
        } elseif(\Input::get('kickEvent')){
            $member->delete();
            
        } elseif(\Input::get('setAdmin')){
            $member->isAdmin = 1;
            $member->save();
        } elseif(\Input::get('unsetAdmin')){
            $member->isAdmin = 0;
            $member->save();
        }

        return back();
    }
}
