<?php

namespace App\Http\Controllers\Api\Cv;

use App\Award;

use Illuminate\Http\Request;

use Response;
use App\Http\Requests;
use App\Http\Requests\AwardRequest;
use App\Http\Controllers\Controller;

class AwardController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AwardRequest $request)
    {
        $award = new Award;

        $award->award = $request->award;

        $user = $request->user();

        $user->awards()->save($award);

        return Response::json(array('saved'=>true, 'entry'=>view('cv/partials/awardentry', ['award'=>$award])->render()));
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
        $award = Award::findOrFail($id);

        $award->award = $request->award;

        $user = $request->user();

        $user->awards()->save($award);

        return Response::json(array('updated'=>true, 'entry'=>$award));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $award = Award::findOrFail($id);

        $award->delete();

        return ['deleted' => true];
    }
}
