<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->truncate();

        $faker = Factory::create();

        $data = [];

        foreach (range(1, 100) as $key) {
            $data[] = [
                'name' => $faker->name(),
                'phone' => $faker->phoneNumber(),
                'email' => $faker->email(),
                'address' => $faker->address(),
                'active' => rand(0, 1),

                // tambahan 2 column
                'is_deleted' => false,
                'department_id' => rand(1,10),

                // updated_at dan created_at
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        DB::table('contacts')->insert($data);
    }
}
