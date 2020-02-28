<?php

namespace Modules\Member\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class MemberDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $qualifcaitons = [
            ['id' => '1', 'qual_catg_desc' => 'Post Graduate','shrt_desc' => 'PG'],
            ['id' => '2', 'qual_catg_desc' => 'Under Graduate','shrt_desc' => 'UG'],
            ['id' => '3', 'qual_catg_desc' => 'Diploma','shrt_desc' => 'Diplo'],
            ['id' => '3', 'qual_catg_desc' => 'Certificate''shrt_desc' => 'Certi'],
            
        ];
        // $this->call("OthersTableSeeder");
    }
}
