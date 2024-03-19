<?php

namespace Tests\Feature\Http\Livewire;

use App\Livewire\DeleteTutoringSessionComponent;
use App\Http\Livewire\HasLivewireAuth;
use App\Models\TutoringSession;
use Database\Factories\TutoringSessionFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

/** @see \App\Livewire\DeleteTutoringSessionComponent */
class DeleteTutoringSessionComponentTest extends TestCase
{
    use RefreshDatabase;

    /** @var \App\Models\User */
    private $admin;

    public function setUp() : void
    {
        parent::setUp();

        $this->admin = create_admin();
    }

    /** @test */
    public function assert_delete_tutoringsession_component_uses_livewire_auth_trait()
    {
        $this->assertContains(HasLivewireAuth::class, class_uses(DeleteTutoringSessionComponent::class));
    }

    /** @test */
    public function admin_can_delete_user()
    {
        // delete-review
        $tutoringsession = TutoringSessionFactory::new()->create();

        Livewire::actingAs($this->admin)
            ->test(DeleteTutoringSessionComponent::class, ['tutoring-sessions' =>  $tutoringsession])
            ->call('destroy')
            ->assertDispatched('entity-deleted')
            ->assertDispatchedBrowserEvent('flash');

        $this->assertNull(TutoringSession::find($tutoringsession->id));
    }
}
