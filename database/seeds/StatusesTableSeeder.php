<?php

use Illuminate\Database\Seeder;

use App\Models\Status;
use App\Models\User;
use Faker\Generator as Faker;



class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

    	// $faker = app(Faker\Generator::class);
    	$user_ids = User::all()->pluck('id');

    	$statuses = factory(Status::class)->times(1000)->make()->each(function($status) use ($faker , $user_ids){

    		$status->user_id = $faker->randomElement($user_ids);
    	});


    	Status::insert($statuses->toArray());
        //
    }
}
