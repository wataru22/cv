<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class WorkTest extends TestCase
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
            'title' => 'Valid test title',
            'start' => '2016-01-01',
            'end' => '2016-12-01',
            'location' => 'Valid location',
            'employer' => 'Valid employer',
            'website' => 'http://validsite.com',
            'description' => 'Valid description.',
        ];

        // can save work
        $this->actingAs($user)
             ->post('/api/cv/work', $data)
             ->seeJson([
                    'saved' => true,
                ])
             ->seeInDatabase('works', [
                    'title' => $data['title'],
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
            'title' => 'Valid test title',
            'start' => '2016-01-01',
        ];

        $work = factory(App\Work::class)->make($data);

        $user->works()->save($work);

        $new_data = [
            'title' => 'Valid test title 2',
            'start' => '2016-01-01',
            'end' => '2016-12-01',
            'location' => 'Valid location',
            'employer' => 'Valid employer',
            'website' => 'http://validsite.com',
            'description' => 'Valid description.',
            '_method' => 'PUT',
        ];

        // can update work
        $this->actingAs($user)
             ->post('/api/cv/work/'.$work->id, $new_data)
             ->seeJson([
                    'updated' => true,
                ])
             ->seeInDatabase('works', [
                    'title' => $new_data['title'],
                    'user_id' => 1,
                    'id' => $work->id,
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
            'title' => 'Valid test title',
            'start' => '2016-01-01',
        ];

        $work = factory(App\Work::class)->make($data);

        $user->works()->save($work);

        // can delete work
        $this->actingAs($user)
             ->post('/api/cv/work/'.$work->id, ['_method' => 'delete'])
             ->seeJson([
                    'deleted' => true,
                ])
             ->notSeeInDatabase('works', [
                    'title' => $data['title'],
                ]);
    }
}
