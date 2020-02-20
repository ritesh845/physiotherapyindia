<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;
use App\Permission;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Role::create(
    		[
	    		'id' => '1',
	    		'name' => 'super_admin',
	    		'display_name' => 'Super Admin',
	    		'description' => 'User can manage all the access of sites.'
    		]    		
    	);
        Role::create(
            [
                'id'            => '2',
                'name'          => 'admin',
                'display_name'  => 'Admin',
                'description'   => 'User can manage admin panel.'
            ]       
        );
        Role::create(
            [
                'id'            => '3',
                'name'          => 'member',
                'display_name'  => 'Memebr',
                'description'   => 'User can manage member panel.'
            ]       
        );

        $user = User::create([
        	'name' => 'Site Admin',
        	'email' => 'siteadmin@physiotherapy.org',
            'phone' => '7440561956',
        	'password' => Hash::make('siteadmin'),
        ]);
        $user->attachRole('1');
    }
}
