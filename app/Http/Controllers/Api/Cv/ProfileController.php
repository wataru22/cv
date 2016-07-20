<?php

namespace App\Http\Controllers\Api\Cv;

use App\Profile;

use Illuminate\Http\Request;

use Response;
use App\Http\Requests;
use App\Http\Requests\ProfileRequest;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Profile
     */
    public function store(ProfileRequest $request)
    {
        $profile = new Profile;

        $profile->firstname = $request->firstname;
        $profile->middlename = $request->middlename;
        $profile->lastname = $request->lastname;
        $profile->email = $request->email;
        $profile->telephone = $request->telephone;
        $profile->mobile = $request->mobile;
        $profile->address = $request->address;
        $profile->title = $request->title;
        $profile->websites = $request->websites;
        $profile->summary = $request->summary;

        $user = $request->user();

        $user->profile()->save($profile);

        return Response::json(array('saved'=>true, 'entry'=>$profile));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request, $id)
    {
        $profile = Profile::findOrFail($id);

        $profile->firstname = $request->firstname;
        $profile->middlename = $request->middlename;
        $profile->lastname = $request->lastname;
        $profile->email = $request->email;
        $profile->telephone = $request->telephone;
        $profile->mobile = $request->mobile;
        $profile->address = $request->address;
        $profile->title = $request->title;
        $profile->websites = $request->websites;
        $profile->summary = $request->summary;

        $user = $request->user();

        $user->profile()->save($profile);

        return Response::json(array('updated'=>true, 'entry'=>$profile));
    }
}
