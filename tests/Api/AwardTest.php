<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AwardTest extends TestCase
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
            'award' => 'Valid award name',
        ];

        // can save award
        $this->actingAs($user)
             ->post('/api/cv/award', $data)
             ->seeJson([
                    'saved' => true,
                ])
             ->seeInDatabase('awards', [
                    'award' => $data['award'],
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
            'award' => 'Valid test award',
        ];

        $award = factory(App\Award::class)->make($data);

        $user->awards()->save($award);

        $new_data = [
            'award' => 'Valid test award 2',
            '_method' => 'PUT',
        ];

        // can update award
        $this->actingAs($user)
             ->post('/api/cv/award/'.$award->id, $new_data)
             ->seeJson([
                    'updated' => true,
                ])
             ->seeInDatabase('awards', [
                    'award' => $new_data['award'],
                    'user_id' => 1,
                    'id' => $award->id,
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
            'award' => 'Valid test award',
        ];

        $award = factory(App\Award::class)->make($data);

        $user->awards()->save($award);

        // can delete award
        $this->actingAs($user)
             ->post('/api/cv/award/'.$award->id, ['_method' => 'delete'])
             ->seeJson([
                    'deleted' => true,
                ])
             ->notSeeInDatabase('awards', [
                    'award' => $data['award'],
                ]);
    }
}
