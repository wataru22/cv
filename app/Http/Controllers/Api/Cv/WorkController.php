<?php

namespace App\Http\Controllers\Api\Cv;

use App\Work;

use Illuminate\Http\Request;

use Response;
use App\Http\Requests;
use App\Http\Requests\WorkRequest;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class WorkController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkRequest $request)
    {
        $work = new Work;

        $work->title = $request->title;
        $work->employer = $request->employer;
        $work->location = $request->location;
        $work->website = $request->website;
        $work->description = $request->description;
        $work->start = Carbon::parse($request->start);
        if ( $request->end ) {
            $work->end = Carbon::parse($request->end)->addHours(23)->addMinutes(59)->addSeconds(59);
        }
        else {
            $work->end = null;
        }

        $user = $request->user();

        $user->works()->save($work);

        return Response::json(array('saved'=>true, 'entry'=>view('cv/partials/workentry', ['work'=>$work])->render()));
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
        $work = Work::findOrFail($id);

        $work->title = $request->title;
        $work->employer = $request->employer;
        $work->location = $request->location;
        $work->website = $request->website;
        $work->description = $request->description;
        $work->start = Carbon::parse($request->start);
        if ( $request->end ) {
            $work->end = Carbon::parse($request->end)->addHours(23)->addMinutes(59)->addSeconds(59);
        }
        else {
            $work->end = null;
        }

        $user = $request->user();

        $user->works()->save($work);

        return Response::json(array('updated'=>true, 'entry'=>$work));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $work = Work::findOrFail($id);

        $work->delete();

        return ['deleted' => true];
    }
}
