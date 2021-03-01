<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'John McLem Adan',
                'email' => 'jadan@i4asiacorp.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$cZXudf6Y0w.5O7FPRf4QuebfWv4GDP4DS2ptwRyxyEkWHt65P2jVa',
                'remember_token' => 'OgXXPP4vtT6oKJILbkrrV2mDv9E3111bcsJKSXAfz3GisuXMrr9WFVbpp6iB',
                'created_at' => '2019-10-11 02:18:36',
                'updated_at' => '2019-10-11 02:18:36',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Sample Admin',
                'email' => 'mclemadan@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$ycv2sIihbvHs4q9deu0SFOKIXj.FhWACyY3/Z99Izfn0cv6/eopp6',
                'remember_token' => NULL,
                'created_at' => '2019-10-15 06:09:58',
                'updated_at' => '2019-10-15 06:09:58',
            ),
        ));
        
        
    }
}