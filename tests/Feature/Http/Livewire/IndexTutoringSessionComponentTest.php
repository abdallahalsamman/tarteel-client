<?php

namespace Tests\Feature\Http\Livewire;

use App\Http\Livewire\HasLivewireAuth;
use App\Livewire\HasTable;
use App\Livewire\IndexTutoringSessionComponent;
use Database\Factories\TutoringSessionFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Livewire\Livewire;
use Tests\TestCase;

/** @see \App\Livewire\IndexTutoringSessionComponent */
class IndexTutoringSessionComponentTest extends TestCase
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
    public function assert_index_tutoringsession_component_uses_table_trait()
    {
        $this->assertContains(HasTable::class, class_uses(IndexTutoringSessionComponent::class));
    }

    /** @test */
    public function assert_index_tutoringsession_component_uses_livewire_auth_trait()
    {
        $this->assertContains(HasLivewireAuth::class, class_uses(IndexTutoringSessionComponent::class));
    }

    /** @test */
    public function render()
    {
        Livewire::actingAs($this->admin)
            ->test(IndexTutoringSessionComponent::class)
            ->assertStatus(Response::HTTP_OK);
    }

    /** @test */
    public function render_search()
    {
        // index-review
        /*
        $a = TutoringSessionFactory::new()->create([
            'name' => 'aa',
        ]);

        $b = TutoringSessionFactory::new()->create([
            'name' => 'bb',
        ]);
        */

        Livewire::actingAs($this->admin)->test(IndexTutoringSessionComponent::class)
            ->set('perPage', 1)
            ->set('search', 'aa')
            ->assertSee('aa')
            ->assertDontSee('bb');
    }

    /** @test */
    public function render_paginate()
    {
        // index-review
        $a = TutoringSessionFactory::new()->create([
            'name' => 'aa',
        ]);

        $b = TutoringSessionFactory::new()->create([
            'name' => 'bb',
        ]);

        Livewire::actingAs($this->admin)->test(IndexTutoringSessionComponent::class)
            ->set('perPage', 1)
            ->assertSee('aa')
            ->assertDontSee('bb')
            ->set('perPage', 2)
            ->assertSee('aa')
            ->assertSee('bb');
    }

    /** @test */
    public function render_order_by()
    {
        // index-review
        $a = TutoringSessionFactory::new()->create([
            'name' => 'aa',
        ]);

        $b = TutoringSessionFactory::new()->create([
            'name' => 'bb',
        ]);

        Livewire::actingAs($this->admin)->test(IndexTutoringSessionComponent::class)
            ->set('perPage', 1)
            ->set('sortField', 'name')
            ->call('sortBy', 'name')
            ->assertSee('aa')
            ->assertDontSee('bb')
            ->call('sortBy', 'name')
            ->assertSee('bb')
            ->assertDontSee('aa');
    }

    /** @test  */
    public function index_tutoringsession_page_contains_livewire_delete_tutoringsession_component()
    {
        $this->actingAs($this->admin)
            ->get('tutoring-sessions')
            ->assertSeeLivewire('delete-tutoringsession-component');
    }

    /** @test */
    public function entity_deleted_listener_exists()
    {
        $component = new IndexTutoringSessionComponent;
        $this->assertContains('entity-deleted', $component->getEventsBeingListenedFor());
    }
}
