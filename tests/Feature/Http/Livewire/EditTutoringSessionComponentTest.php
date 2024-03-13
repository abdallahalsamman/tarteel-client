<?php

namespace Tests\Feature\Http\Livewire;

use App\Http\Livewire\EditTutoringSessionComponent;
use App\Http\Livewire\HasLivewireAuth;
use App\Models\TutoringSession;
use Database\Factories\TutoringSessionFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Livewire\Livewire;
use Tests\TestCase;

/** @see \App\Http\Livewire\EditTutoringSessionComponent */
class EditTutoringSessionComponentTest extends TestCase
{
    use RefreshDatabase;

    /** @var \App\Models\User */
    protected $admin;

    public function setUp() : void
    {
        parent::setUp();

        $this->admin = create_admin();
    }

    /** @test */
    public function assert_edit_tutoringsession_component_uses_livewire_auth_trait()
    {
        $this->assertContains(HasLivewireAuth::class, class_uses(EditTutoringSessionComponent::class));
    }

    /** @test */
    public function render()
    {
        $tutoringsession = TutoringSessionFactory::new()->create();

        Livewire::actingAs($this->admin)
            ->test(EditUserComponent::class, ['tutoring-sessions' => $tutoringsession])
            // edit-review
            ->assertSee('Save')
            ->assertStatus(Response::HTTP_OK);
    }

    /** @test */
    public function update_existing_user()
    {
        $tutoringsession = TutoringSessionFactory::new()->create();

        $this->assertCount(1, TutoringSession::all());

        Livewire::actingAs($this->admin)
            ->test(EditTutoringSessionComponent::class, ['tutoring-sessions' => $tutoringsession])
            // edit-review
            ->call('update')
            ->assertRedirect('tutoring-sessions');

        $this->assertTrue(session()->has('flash'));

        // edit-review
        //$tutoringsessions = TutoringSession::where()->get();

        $this->assertCount(1, tutoringsessions);

        $this->assertCount(1, TutoringSession::all());
    }

    /**
     * @test
     * @dataProvider clientFormValidationProvider
     */
    public function test_update_validation_rules($clientFormInput, $clientFormValue, $rule)
    {
        $tutoringsession = TutoringSessionFactory::new()->create();

        Livewire::actingAs($this->admin)
            ->test(EditTutoringSessionComponent::class, ['tutoring-sessions' => $tutoringsession])
            ->set($clientFormInput, $clientFormValue)
            ->call('update')
            ->assertHasErrors([$clientFormInput => $rule]);
    }

    public function clientFormValidationProvider()
    {
        return [
            // edit-review
        ];
    }
}
