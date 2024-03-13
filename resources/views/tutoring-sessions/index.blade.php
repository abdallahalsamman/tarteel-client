@section('title')
    الحصص
@endsection

@section('content-header')
<x-content-header>
    الحصص
</x-content-header>
@endsection

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List of TutoringSessions</h3>
                @if(auth()->user()->isAdmin() || auth()->user()->isTutor())
                    <a href="{{ route('tutoring-sessions.create') }}" class="float-right">Add New</a>
                @endif
            </div>

            <div class="card-body">
                <div class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <x-tables.per-page />

                        <!-- div for extra filters -->
                        <div class="col-md-3 col-sm-12 form-group"></div>
                        <!-- end div for extra filters -->

                        <x-tables.search />
                    </div>

                    <x-tables.table>

                        <x-slot name="thead_tfoot">
                            <tr>
                                <th class="sorting">
                                    #
                                </th>
                                <th class="sorting">
                                    <a href="#" wire:click.prevent="sortBy('name')">Name</a>
                                    <x-tables.sort-by :sortField="$sortField" :sortDirection="$sortDirection" field="name" />
                                </th>
                                <th class="sorting">
                                    <a href="#" wire:click.prevent="sortBy('label')">Label</a>
                                    <x-tables.sort-by :sortField="$sortField" :sortDirection="$sortDirection" field="label" />
                                </th>
                                <th class="sorting">
                                    <a href="#" wire:click.prevent="sortBy('created_at')">Created</a>
                                    <x-tables.sort-by :sortField="$sortField" :sortDirection="$sortDirection" field="created_at" />
                                </th>

                                @if(auth()->user()->isAdmin())
                                <th class="sorting">
                                    Edit
                                </th>
                                <th class="sorting">
                                    Delete
                                </th>
                                @endif
                            </tr>
                        </x-slot>

                        <x-slot name="tbody">
                            @forelse($tutoringSessions as $tutoringsession)
                                <tr class="@if($loop->odd) odd @endif">
                                    <td>{{ $loop->iteration }}</td>
                                    // index-review
                                    @if(auth()->user()->isAdmin())
                                    <td>
                                            <a href="{{ route('tutoring-sessions.edit', $tutoringsession) }}"><span class="fas fa-edit"></a></span>
                                    </td>
                                    <td>
                                        <livewire:delete-tutoringsession-component :tutoringsession="$tutoringsession" :key="'tutoring-sessions-'.$tutoringsession->id" />
                                    </td>
                                    @endif
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">No results.</td>
                                </tr>
                            @endforelse
                        </x-slot>

                    </x-tables.table>

                    <div class="row">
                        <x-tables.entries-data :data="$tutoringSessions" />

                        <x-tables.pagination :data="$tutoringSessions" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
