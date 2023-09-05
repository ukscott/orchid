<?php

namespace Tests;

use App\Users;
use PHPUnit\Framework\TestCase;

class UsersTest extends TestCase
{
    public function test_get_all_users()
    {
        $users = new Users();

        $this->assertCount(30, $users->all());
    }

    public function test_get_user()
    {
        $users = new Users();
        $user = $users->get(1);

        $this->assertNotNull($user);
        $this->assertEquals('atuny0@sohu.com', $user->email);
    }

    public function test_get_invalid_user()
    {
        $users = new Users();
        $user = $users->get(50);

        $this->assertNull($user);

    }
}