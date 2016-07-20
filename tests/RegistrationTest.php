<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegistrationTest extends TestCase
{

    use DatabaseMigrations;

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testRegistration()
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
             ->see('dashboard');
    }
}
