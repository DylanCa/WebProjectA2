<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Bde;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
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
    public function create(Request $request)
    {
        

    }

    public function changeProfile(Request $request)
    {
        $user = User::where('id', \Cookie::get('id'))->first();
        $user->avatar = $request->avatar;
        $user->save();
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $user = new User;
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->password = $request->password;
        if(strpos($user->email, '@cesi.fr') !== false){
            $user->isAdmin = 1;
        }
        $user->save();

        return redirect()->to('login');
    }

    public function check(Request $request, User $user)
    {
        $user = User::where('email', $request->email)->where('password', $request->password)->first();
        if( isset($user)){

            \Cookie::queue('id', (string)$user->id, 3600);
            return redirect()->to('/');

        } else { return back();}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!empty(\Cookie::get('id'))){
            return view('userprofile', compact('id'));
        }else{
            return \Redirect::to('/');
        }

        
    }

    public function showUser()
    {
        if(!empty(\Cookie::get('id'))){
            $id = \Cookie::get('id');
            return view('userprofile', compact('id'));
        }else{
            return \Redirect::to('/');
        }
        
    }

    public function bde(Request $request)
    {
            if(\Input::get('signbde')){
                if(!empty(Bde::where('userID', \Cookie::get('id'))->first())){
    
                    Bde::where('userID', \Cookie::get('id'))->first()->delete();
    
    
                } else {
                    
                    $BDEmember = new Bde;
                    $BDEmember->userID = \Cookie::get('id');
                    $BDEmember->save();
                }
            } elseif(\Input::get('upvote')){

                $BDEmember = Bde::where('id', $request->_id)->first();
                $BDEmember->upvote = $BDEmember->upvote+1;
                $BDEmember->downvote = $BDEmember->downvote-1;
                $BDEmember->save();
            } elseif(\Input::get('downvote')){
                $BDEmember = Bde::where('id', $request->_id)->first();
                $BDEmember->downvote = $BDEmember->downvote+1;
                $BDEmember->upvote = $BDEmember->upvote-1;
                $BDEmember->save();
            } elseif(\Input::get('setmember')){
                $user = User::where('id', Bde::where('id', $request->_id)->first()->userID)->first();
                $user->isBDE = 1;
                $user->save();
            } elseif(\Input::get('unsetmember')){
                $user = User::where('id',$request->_id)->first();
                $user->isBDE = 0;
                $user->save();
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
