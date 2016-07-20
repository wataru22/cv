<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SkillTest extends TestCase
{

    use DatabaseMigrations;

    /**
     * Test for saving.
     *
     * @return void
     */
    public function testStore()
    {

        // create test user with id = 1
        $user = factory(App\User::class)->create();

        $data = [
            'skill' => 'Valid skill name',
        ];

        // can save skill
        $this->actingAs($user)
             ->post('/api/cv/skill', $data)
             ->seeJson([
                    'saved' => true,
                ])
             ->seeInDatabase('skills', [
                    'skill' => $data['skill'],
                    'user_id' => 1,
                ]);
    }

    /**
     * Test for updating.
     *
     * @return void
     */
    public function testUpdate()
    {

        // create test user with id = 1
        $user = factory(App\User::class)->create();

        $data = [
            'skill' => 'Valid test skill',
        ];

        $skill = factory(App\Skill::class)->make($data);

        $user->skills()->save($skill);

        $new_data = [
            'skill' => 'Valid test skill 2',
            '_method' => 'PUT',
        ];

        // can update skill
        $this->actingAs($user)
             ->post('/api/cv/skill/'.$skill->id, $new_data)
             ->seeJson([
                    'updated' => true,
                ])
             ->seeInDatabase('skills', [
                    'skill' => $new_data['skill'],
                    'user_id' => 1,
                    'id' => $skill->id,
                ]);
    }

    /**
     * Test for deleting.
     *
     * @return void
     */
    public function testDestroy()
    {

        // create test user with id = 1
        $user = factory(App\User::class)->create();

        $data = [
            'skill' => 'Valid test skill',
        ];

        $skill = factory(App\Skill::class)->make($data);

        $user->skills()->save($skill);

        // can delete skill
        $this->actingAs($user)
             ->post('/api/cv/skill/'.$skill->id, ['_method' => 'delete'])
             ->seeJson([
                    'deleted' => true,
                ])
             ->notSeeInDatabase('skills', [
                    'skill' => $data['skill'],
                ]);
    }
}
