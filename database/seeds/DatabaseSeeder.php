<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserRolesSeeder::class);
        $this->call(TalentsSeeder::class);
        // $this->call(UsersTableSeeder::class);
    }
}


class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();
        DB::table('roles')->insert(
            array(
                array('name' => 'Agency'),
                array('name' => 'Startup'),
                array('name' => 'Institution'),
                array('name' => 'School')
            )
        );
    }
}

class TalentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('talents')->delete();
        DB::table('talents')->insert(
            array(
                array('name' => 'JavaScript'),
                array('name' => 'Python'),
                array('name' => 'Php')
            )
        );
    }
}