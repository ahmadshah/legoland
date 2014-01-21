<?php

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();
        $this->createUser();
    }

    protected function createUser()
    {
        //Create administrator
        $admin = new User;
        $admin->email = 'admin@foobar.com';
        $admin->password = '123456';
        $admin->fullname = 'Foo Bar Admin';
        $admin->save();
        //Attach administrator role
        $admin->attachRole(1);

        //Create user
        $user = new User;
        $user->email = 'user@foobar.com';
        $user->password = '123456';
        $user->fullname = 'Foo Bar User';
        $user->save();
        //Attach member role
        $user->attachRole(2);
    }

}