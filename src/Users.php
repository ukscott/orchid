<?php

namespace App;
class Users
{
    protected $users;

    /**
     * Simulates the DB
     */
    public function __construct()
    {
        $this->users = json_decode(file_get_contents(__DIR__ . '/data/users.json'))->users;
    }

    /**
     * @return array
     */
    public function all()
    {
        return $this->users;
    }

    /**
     * @param int $id   The user id
     * @param object $user   The user object
     * @return mixed|null
     */
    public function get(int $id)
    {
        // user set to null by default
        // If id matches an id within the userdata then set the required values to new user object.
        // Return user object;
        $user = null;
        foreach ($this->users as $userData){
            if($userData->id == $id ){
                $user = new \stdClass();
                $user->id = $userData->id;
                $user->firstName = $userData->firstName;
                $user->lastName = $userData->lastName;
                $user->email = $userData->email;
                $user->phone = $userData->phone;
            }
        }
        return $user;
    }
}