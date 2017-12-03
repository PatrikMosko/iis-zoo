<?php

use Illuminate\Database\Seeder;
use App\AnimalType;

class AnimalTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type1 = new AnimalType();
        $type1->type_name = 'felidae';
        $type1->description = 'some description 1';
        $type1->save();

        $type2 = new AnimalType();
        $type2->type_name = 'mammalia';
        $type2->description = 'some description 2';
        $type2->save();

        $type3 = new AnimalType();
        $type3->type_name = 'penguin';
        $type3->description = 'some description 3';
        $type3->save();
    }
}
