<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Club;
use App\Event;
use App\AdminVotes;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{


    public function club(Request $request, Club $club)
    {
        $club = Club::where('id', $request->club)->first();

        if(!empty(AdminVotes::where('userID', \Cookie::get('id'))->where('clubID', $club->id)->first())){
            $adminvote = AdminVotes::where('userID', \Cookie::get('id'))->where('clubID', $club->id)->first();
        } else { 
            $adminvote = new AdminVotes;
        }
        

        $adminvote->userID = \Cookie::get('id');
        $adminvote->clubID = $club->id;

        if(\Input::get('upvote_admin')){
            if($adminvote->isLiked == 0){
                if($adminvote->isDisliked == 1){
                    $club->downvote_admin = $club->downvote_admin-1;
                }
                $club->upvote_admin = $club->upvote_admin+1;
                

                $adminvote->isLiked = 1;
                $adminvote->isDisliked = 0;

            }

        } elseif(\Input::get('downvote_admin')){
            if($adminvote->isDisliked == 0){
                if($adminvote->isLiked == 1){
                    $club->upvote_admin = $club->upvote_admin-1;
                }
                $club->downvote_admin = $club->downvote_admin+1;
                

                $adminvote->isLiked = 0;
                $adminvote->isDisliked = 1;

            }
        } elseif(\Input::get('isAvailable')){
            $adminvote->userID = \Cookie::get('id');
            $adminvote->clubID = $club->id;
            
            if($request->isAvailable == 1){
                $club->isAvailable = 1;

                $adminvote->setAvailable = 1;

            } elseif($request->isAvailable == 2){
                $club->isAvailable = 0;

                $adminvote->setAvailable = 0;
                
            } 
        }

        $adminvote->save();
        $club->save();
        return back();
    }

    public function event(Request $request, Event $event)
    {
        $event = Event::where('id', $request->event)->first();

        if(AdminVotes::where('userID', \Cookie::get('id'))->where('eventID', $event->id)->count() != 0){
            $adminvote = AdminVotes::where('userID', \Cookie::get('id'))->where('eventID', $event->id)->first();
        } else { 
            $adminvote = new AdminVotes;
        }
        

        $adminvote->userID = \Cookie::get('id');
        $adminvote->eventID = $event->id;

        if(\Input::get('upvote_admin')){
            if($adminvote->isLiked == 0){
                if($adminvote->isDisliked == 1){
                    $event->downvote_admin = $event->downvote_admin-1;
                }
                $event->upvote_admin = $event->upvote_admin+1;
                

                $adminvote->isLiked = 1;
                $adminvote->isDisliked = 0;

            }

        } elseif(\Input::get('downvote_admin')){
            if($adminvote->isDisliked == 0){
                if($adminvote->isLiked == 1){
                    $event->upvote_admin = $event->upvote_admin-1;
                }
                $event->downvote_admin = $event->downvote_admin+1;
                

                $adminvote->isLiked = 0;
                $adminvote->isDisliked = 1;

            }
        } elseif(\Input::get('isAvailable')){
            $adminvote->userID = \Cookie::get('id');
            $adminvote->eventID = $event->id;
            
            if($request->isAvailable == 1){
                $event->isAvailable = 1;

                $adminvote->setAvailable = 1;

            } elseif($request->isAvailable == 2){
                $event->isAvailable = 0;

                $adminvote->setAvailable = 0;
                
            } 
        }

        $adminvote->save();
        $event->save();
        return back();
    }


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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
