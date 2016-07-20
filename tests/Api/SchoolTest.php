<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SchoolTest extends TestCase
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
            'institution' => 'Valid institution',
            'website' => 'http://validsite.com',
            'description' => 'Valid description.',
        ];

        // can save school
        $this->actingAs($user)
             ->post('/api/cv/school', $data)
             ->seeJson([
                    'saved' => true,
                ])
             ->seeInDatabase('schools', [
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

        $school = factory(App\School::class)->make($data);

        $user->schools()->save($school);

        $new_data = [
            'title' => 'Valid test title 2',
            'start' => '2016-01-01',
            'end' => '2016-12-01',
            'location' => 'Valid location',
            'institution' => 'Valid institution',
            'website' => 'http://validsite.com',
            'description' => 'Valid description.',
            '_method' => 'PUT',
        ];

        // can update school
        $this->actingAs($user)
             ->post('/api/cv/school/'.$school->id, $new_data)
             ->seeJson([
                    'updated' => true,
                ])
             ->seeInDatabase('schools', [
                    'title' => $new_data['title'],
                    'user_id' => 1,
                    'id' => $school->id,
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

        $school = factory(App\School::class)->make($data);

        $user->schools()->save($school);

        // can delete school
        $this->actingAs($user)
             ->post('/api/cv/school/'.$school->id, ['_method' => 'delete'])
             ->seeJson([
                    'deleted' => true,
                ])
             ->notSeeInDatabase('schools', [
                    'title' => $data['title'],
                ]);
    }
}
