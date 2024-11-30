<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // laod job listings from file
        $jobListings = include database_path('seeders/data/job_listings.php');

        $testUserId = User::where('email', 'test@gmail.com')->value('id');

        // get user ids from user moedel
        $userIds = User::where('email', '!=', 'test@gmail.com')->pluck('id')->toArray();

        foreach ($jobListings as $index => &$listing) {
            if ($index < 2) {
                // assign the first two lisntings to the test user
                $listing['user_id'] = $testUserId;
            } else {
                // assign user id to listing
                $listing['user_id'] = $userIds[array_rand($userIds)];
            }


            // add timestamps
            $listing['created_at'] = now();
            $listing['updated_at'] = now();
        }

        // insert job listings
        DB::table('job_listings')->insert($jobListings);
        echo 'Jobs created successfully';
    }
}
