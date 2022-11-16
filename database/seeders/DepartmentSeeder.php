<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // kena code script utk buat 
        // looping berapa banyak data kita nak insert

        // bagitau table mana nak guna dan clear data
        DB::table('departments')->truncate();

        // hold array data record yang akan insert dkt dalam table        
        $data = [];

        // Loop 5 rekod
        foreach(range(1,5) as $key){
            $data[] = [
                'name' => 'Department ' . $key,
                'phone' => '0123455' . $key,
                'email' => 'emel' . $key . '@gmail.com'
            ];
        }

        // Insert data array ke dalam table
        DB::table('departments')->insert($data);


    }
}
