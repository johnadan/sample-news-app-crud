<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('news')->delete();
        
        \DB::table('news')->insert(array (
            0 => 
            array (
                'id' => 4,
                'title' => 'The 5-second Rule of Digital Video Advertising',
                'author' => 'Sherlyn Angelica Ty',
                'date' => 'October 4, 2019',
                'content' => 'Have you heard about the 5-second rule? This is not related to a food you just dropped but the 5-second rule of video ads. If you haven’t heard of it, you’re in the right article.

You must be familiar with the “Skip Ad” button we see when we watch a video online particularly on youtube. We normally smash that when given a chance and usually, that chance appears after 5 seconds from the start of the video ad.

This button allows you to skip the rest of the ad and proceed to watching your desired video.',
                'image' => 'image/k5uqIziGdw2IEBNk2gbjcsFiPXKXPzivLfB7i8yC.jpeg',
                'user_id' => 1,
                'created_at' => '2019-10-15 10:03:45',
                'updated_at' => '2019-10-15 10:03:45',
            ),
        ));
        
        
    }
}