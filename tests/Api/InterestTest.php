<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InterestTest extends TestCase
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
            'activity' => 'Valid activity name',
        ];

        // can save interest
        $this->actingAs($user)
             ->post('/api/cv/interest', $data)
             ->seeJson([
                    'saved' => true,
                ])
             ->seeInDatabase('interests', [
                    'activity' => $data['activity'],
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
            'activity' => 'Valid test activity',
        ];

        $activity = factory(App\Interest::class)->make($data);

        $user->interests()->save($activity);

        $new_data = [
            'activity' => 'Valid test activity 2',
            '_method' => 'PUT',
        ];

        // can update interest
        $this->actingAs($user)
             ->post('/api/cv/interest/'.$activity->id, $new_data)
             ->seeJson([
                    'updated' => true,
                ])
             ->seeInDatabase('interests', [
                    'activity' => $new_data['activity'],
                    'user_id' => 1,
                    'id' => $activity->id,
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
            'activity' => 'Valid test activity',
        ];

        $activity = factory(App\Interest::class)->make($data);

        $user->interests()->save($activity);

        // can delete interest
        $this->actingAs($user)
             ->post('/api/cv/interest/'.$activity->id, ['_method' => 'delete'])
             ->seeJson([
                    'deleted' => true,
                ])
             ->notSeeInDatabase('interests', [
                    'activity' => $data['activity'],
                ]);
    }
}
