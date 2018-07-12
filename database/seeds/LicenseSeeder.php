<?php

use Illuminate\Database\Seeder;

class LicenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @param \Faker\Generator $generator
     * @return void
     */
    public function run(Faker\Generator $generator)
    {
        for ($i = 0; $i < 50; $i++) {
            DB::table('license')->insert([
                'license_code' => $generator->uuid,
                'expireDate' => $generator->dateTime,
                'created_at' => $generator->dateTime,
                'updated_at' => $generator->dateTime

            ]);
        }
    }
}
