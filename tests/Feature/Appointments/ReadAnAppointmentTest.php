<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   2/10/18
 */

namespace Tests\Feature\Appointments;


use App\Appointment;
use App\Report;
use App\User;
use Illuminate\Auth\AuthenticationException;
use Tests\TestCase;

class ReadAnAppointmentTest extends TestCase
{
    /** @var Appointment */
    private $appointment;

    public function setUp()
    {
        parent::setUp();

        $this->appointment = factory(Appointment::class)->create();
    }

    /** @test */
    public function an_admin_can_browser_an_appointment()
    {
        $admin = $this->setupAdmin();

        $this->actingAs($admin)
            ->get('/appointments/' . $this->appointment->id)
            ->assertStatus(200)
            ->assertSee($this->appointment->duration);
    }

    /** @return User */
    protected function setupAdmin()
    {
        return factory(User::class, 'admin')->create();
    }

    /** @test */
    public function a_guest_is_unable_to_browse_an_appointment()
    {
        $this->expectException(AuthenticationException::class);

        $this->get('/appointments/' . $this->appointment->id)
            ->assertStatus(302)
            ->assertRedirect('/login');
    }

    /** @test */
    public function an_admin_can_read_reports_associated_with_an_appointment()
    {
        $admin = $this->setupAdmin();

        $report = factory(Report::class)->create();

        $this->appointment->reports()->save($report);

        $this->actingAs($admin)
            ->get('/appointments/' . $this->appointment->id)
            ->assertSee($report->topic);
    }
}