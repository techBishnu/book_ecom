<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   $status=[
        [
            'name'=>'In Progress',
            'descriootion'=>'Any',
           
        ],
        [
            'name'=>'pending',
            'descriootion'=>'Any',
        ],
        [
            'name'=>'completed',
            'descriootion'=>'Any',
        ],
        [
            'name'=>'cancelled',
            'descriootion'=>'Any',
        ],
    ];
    foreach($status as $statu){
        Status::create($statu);
    }
        
    }
}
