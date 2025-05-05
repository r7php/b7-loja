<?php

namespace Database\Seeders;


class StadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $states = [
            ['name'=>'SP'],
            ['name'=>'RJ'],
            ['name'=>'TO'],
            ['name'=>'PE']
        ];

        State::insert($states);
    }
}
