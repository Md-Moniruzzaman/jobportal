<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory('App\User',10)->create();
        factory('App\Company',10)->create();
        factory('App\Job',10)->create();

        $categories = ['Defence','Medical','BITM','Software','Publice service','NGO','Accounting','Nurse'];

        foreach($categories as $category){
            \App\Category::create(['name'=> $category]);
    }
    }
}
