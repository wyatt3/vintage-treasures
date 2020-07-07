<?php

use Illuminate\Database\Seeder;
use App\Hours;

class HoursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hours = new Hours([
            'day' => 'Sunday',
            'isOpen' => 0,
        ]);
        $hours->save();
        $hours = new Hours([
            'day' => 'Monday',
        ]);
        $hours->save();
        $hours = new Hours([
            'day' => 'Tuesday',
        ]);
        $hours->save();
        $hours = new Hours([
            'day' => 'Wednesday',
        ]);
        $hours->save();
        $hours = new Hours([
            'day' => 'Thursday',
        ]);
        $hours->save();
        $hours = new Hours([
            'day' => 'Friday',
        ]);
        $hours->save();
        $hours = new Hours([
            'day' => 'Saturday',
        ]);
        $hours->save();
    }
}
