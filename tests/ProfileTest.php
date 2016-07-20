<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProfileTest extends TestCase
{

    use DatabaseMigrations;

    /**
     * Test for saving profile.
     *
     * @return void
     */
    public function testProfileStore()
    {
        $this->visit('/')
             ->see(config('common.title'));

        // can register and see dashboard
        $this->visit('/register')
             ->see(config('common.title'))
             ->type('wataru', 'name')
             ->type('wataru.watanabe@gmail.com', 'email')
             ->type('password', 'password')
             ->type('password', 'password_confirmation')
             ->press('Register')
             ->see('Welcome')
             ->click('Home')
             ->see('Profile');

        // can save profile
        $this->type('First', 'firstname')
        	 ->type('Last', 'lastname')
        	 ->type('test@example.com', 'email')
             ->press('Save')
             ->seeInDatabase('profiles', ['firstname' => 'First']);


    }
}
