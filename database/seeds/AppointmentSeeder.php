<?php

use App\Appointment;
use App\Report;
use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Appointment::class, 50)->create()
            ->each(function (Appointment $appointment) {
                $reports = factory(Report::class, 'with-student', 3)->create();

                $appointment->reports()->saveMany($reports);
            });
    }
}
