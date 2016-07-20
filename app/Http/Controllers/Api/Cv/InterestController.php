<?php

namespace App\Http\Controllers\Api\Cv;

use App\Interest;

use Illuminate\Http\Request;

use Response;
use App\Http\Requests;
use App\Http\Requests\InterestRequest;
use App\Http\Controllers\Controller;

class InterestController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InterestRequest $request)
    {
        $interest = new Interest;

        $interest->activity = $request->activity;

        $user = $request->user();

        $user->interests()->save($interest);

        return Response::json(array('saved'=>true, 'entry'=>view('cv/partials/interestentry', ['interest'=>$interest])->render()));
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
        $interest = Interest::findOrFail($id);

        $interest->activity = $request->activity;

        $user = $request->user();

        $user->interests()->save($interest);

        return Response::json(array('updated'=>true, 'entry'=>$interest));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $interest = Interest::findOrFail($id);

        $interest->delete();

        return ['deleted' => true];
    }
}
