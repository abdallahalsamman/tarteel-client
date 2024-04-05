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
                @if(auth()->user()->isAdmin() || auth()->user()->isTutor())
                    <a href="{{ route('tutoring-sessions.create') }}" class="float-right">Add New</a>
                @endif
            </div>

            <div class="card-body">
                <div class="dataTables_wrapper dt-bootstrap4">
                    {{-- <div class="row">
                        <x-tables.per-page />

                        <!-- div for extra filters -->
                        <div class="col-md-3 col-sm-12 form-group"></div>
                        <!-- end div for extra filters -->

                        <x-tables.search />
                    </div> --}}

                    <x-tables.table id="table">

                        <x-slot name="thead_tfoot">
                            <tr>
                                <th class="sorting" dir="rtl">
                                    <a href="#" wire:click.prevent="sortBy('name')">العائلة</a>
                                    <x-tables.sort-by :sortField="$sortField" :sortDirection="$sortDirection" field="name" />
                                </th>
                                <th class="sorting" dir="rtl">
                                    <a href="#" wire:click.prevent="sortBy('name')">الطالب</a>
                                    <x-tables.sort-by :sortField="$sortField" :sortDirection="$sortDirection" field="name" />
                                </th>
                                @if(auth()->user()->isAdmin())
                                <th class="sorting" dir="rtl">
                                    <a href="#" wire:click.prevent="sortBy('name')">المدرس</a>
                                    <x-tables.sort-by :sortField="$sortField" :sortDirection="$sortDirection" field="name" />
                                </th>
                                @endif
                                <th class="sorting" dir="rtl">
                                    <a href="#" wire:click.prevent="sortBy('label')">موعد الحصة</a>
                                    <x-tables.sort-by :sortField="$sortField" :sortDirection="$sortDirection" field="label" />
                                </th>
                                <th class="sorting" dir="rtl">
                                    <a href="#" wire:click.prevent="sortBy('label')">المدة</a>
                                    <x-tables.sort-by :sortField="$sortField" :sortDirection="$sortDirection" field="label" />
                                </th>
                                <th class="sorting" dir="rtl">
                                    <a href="#" wire:click.prevent="sortBy('label')">اسم المادة</a>
                                    <x-tables.sort-by :sortField="$sortField" :sortDirection="$sortDirection" field="label" />
                                </th>
{{-- 
                                @if(auth()->user()->isAdmin())
                                <th class="sorting" dir="rtl">
                                    Edit
                                </th>
                                <th class="sorting">
                                    Delete
                                </th>
                                @endif --}}
                            </tr>
                        </x-slot>

                        <x-slot name="tbody">
                            @forelse($tutoringSessions as $tutoringSession)
                                <tr class="@if($loop->odd) odd @endif">
                                    <td>{{ $tutoringSession->student->parent->name }}</td>
                                    <td>{{ $tutoringSession->student->name }}</td>
                                    @if(auth()->user()->isAdmin())
                                    <td>{{ $tutoringSession->tutor->name }}</td>
                                    @endif
                                    <td>{{ $tutoringSession->session_date }}</td>
                                    <td dir="rtl">{{ $tutoringSession->duration }} دقيقة</td>
                                    <td>{{ $tutoringSession->subject }}</td>
                                    {{-- @if(auth()->user()->isAdmin())
                                    <td>
                                            <a href="{{ route('tutoring-sessions.edit', $tutoringSession) }}"><span class="fas fa-edit"></a></span>
                                    </td>
                                    <td>
                                        <livewire:delete-tutoring-session-component :tutoringSession="$tutoringSession" :key="'tutoring-sessions-'.$tutoringSession->id" />
                                    </td>
                                    @endif --}}
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">No results.</td>
                                </tr>
                            @endforelse
                        </x-slot>

                    </x-tables.table>

                    {{-- <div class="row"> --}}
                        {{-- <x-tables.entries-data :data="$tutoringSessions" /> --}}

                        {{-- <x-tables.pagination :data="$tutoringSessions" /> --}}
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>

@script
<script>
$(function () {
    $("#table").DataTable({
    "responsive": true,
    "lengthChange": true,
    "paging": true,
    "autoWidth": false,
    "searching": true,
    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#table_wrapper .col-md-6:eq(0)');
});
</script>  
@endscript