<?php

namespace App\Http\Controllers\Api\Cv;

use App\Skill;

use Illuminate\Http\Request;

use Response;
use App\Http\Requests;
use App\Http\Requests\SkillRequest;
use App\Http\Controllers\Controller;

class SkillController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SkillRequest $request)
    {
        $skill = new Skill;

        $skill->skill = $request->skill;

        $user = $request->user();

        $user->skills()->save($skill);

        return Response::json(array('saved'=>true, 'entry'=>view('cv/partials/skillentry', ['skill'=>$skill])->render()));
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
        $skill = Skill::findOrFail($id);

        $skill->skill = $request->skill;

        $user = $request->user();

        $user->skills()->save($skill);

        return Response::json(array('updated'=>true, 'entry'=>$skill));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $skill = Skill::findOrFail($id);

        $skill->delete();

        return ['deleted' => true];
    }
}
