<?php

namespace Tests\Feature\Http\Livewire;

use App\Livewire\CreateTutoringSessionComponent;
use App\Http\Livewire\HasLivewireAuth;
use App\Models\TutoringSession;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Livewire\Livewire;
use Tests\TestCase;

/** @see \App\Livewire\CreateTutoringSessionComponent */
class CreateTutoringSessionComponentTest extends TestCase
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
    public function assert_create_tutoringsession_component_uses_livewire_auth_trait()
    {
        $this->assertContains(HasLivewireAuth::class, class_uses(CreateTutoringSessionComponent::class));
    }

    /** @test */
    public function render()
    {
        Livewire::actingAs($this->admin)
            ->test(CreateTutoringSessionComponent::class)
            ->assertSee('Save')
            ->assertStatus(Response::HTTP_OK);
    }

    /** @test */
    public function store()
    {
        Livewire::actingAs($this->admin)
            ->test(CreateTutoringSessionComponent::class)
            // create-review-2
            ->call('store')
            ->assertRedirect('tutoring-sessions');

        $this->assertTrue(session()->has('flash'));

        // create-review
        $tutoringsessions = TutoringSession::where('name', 'manager')
            ->where('label', 'Manager')
            ->get();

        $this->assertCount(1, $tutoringsessions);
    }

    /**
     * @test
     * @dataProvider clientFormValidationProvider
     */
    public function test_store_validation_rules($clientFormInput, $clientFormValue, $rule)
    {
        Livewire::actingAs($this->admin)
            ->test(CreateTutoringSessionComponent::class)
            ->set($clientFormInput, $clientFormValue)
            ->call('store')
            ->assertHasErrors([$clientFormInput => $rule]);
    }

    public function clientFormValidationProvider()
    {
        return [
            // create-review
        ];
    }
}
