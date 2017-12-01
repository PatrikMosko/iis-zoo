<?php

use App\TrainingExternal;
use Illuminate\Database\Seeder;

class ExternalTrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newExtTraining = new TrainingExternal();
        $newExtTraining->company_name = 'Exponea';
        $newExtTraining->company_address = 'Bottova 5, Bratislava';
        $newExtTraining->save();

        $newExtTraining2 = new TrainingExternal();
        $newExtTraining2->company_name = 'SolarWinds';
        $newExtTraining2->company_address = 'Janska 20, Brno';
        $newExtTraining2->save();
    }
}
