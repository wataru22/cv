<?php

namespace App\Http\Controllers\Api\Cv;

use App\School;

use Illuminate\Http\Request;

use Response;
use App\Http\Requests;
use App\Http\Requests\SchoolRequest;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class SchoolController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SchoolRequest $request)
    {
        $school = new School;

        $school->title = $request->title;
        $school->institution = $request->institution;
        $school->location = $request->location;
        $school->website = $request->website;
        $school->description = $request->description;
        $school->start = Carbon::parse($request->start);
        if ( $request->end ) {
            $school->end = Carbon::parse($request->end)->addHours(23)->addMinutes(59)->addSeconds(59);
        }
        else {
            $school->end = null;
        }

        $user = $request->user();

        $user->schools()->save($school);

        return Response::json(array('saved'=>true, 'entry'=>view('cv/partials/schoolentry', ['school'=>$school])->render()));
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
        $school = School::findOrFail($id);

        $school->title = $request->title;
        $school->institution = $request->institution;
        $school->location = $request->location;
        $school->website = $request->website;
        $school->description = $request->description;
        $school->start = Carbon::parse($request->start);
        if ( $request->end ) {
            $school->end = Carbon::parse($request->end)->addHours(23)->addMinutes(59)->addSeconds(59);
        }
        else {
            $school->end = null;
        }

        $user = $request->user();

        $user->schools()->save($school);

        return Response::json(array('updated'=>true, 'entry'=>$school));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $school = School::findOrFail($id);

        $school->delete();

        return ['deleted' => true];
    }
}
