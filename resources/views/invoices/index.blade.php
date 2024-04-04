@section('title')
    الحصص
@endsection

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <span class="fas fa-lg fa-globe"></span>
                    <span class="h3">Tarteel, Inc</span>
                </div>

                <div class="d-flex justify-content-between">
                    <div>
                        From<br>
                        <b>Tarteel Center, Inc</b><br>
                        Giza, Cairo<br>
                        Egypt<br>
                        Phone: (20) 0111691222
                    </div>
                    <div>
                        To<br>
                        <b>{{ $tutoringSessions[0]->tutor->name }}</b><br>
                        Price per Hour: {{ $tutoringSessions[0]->tutor->hourly_rate }}
                    </div>
                    <div>
                        Date: {{ date('M, Y') }}<br>
                        Invoice: <b>#{{ Str::uuid() }}</b>
                    </div>
                </div>

                <div class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <!-- div for extra filters -->
                        <div class="col-md-3 col-sm-12 form-group"></div>
                        <!-- end div for extra filters -->
                    </div>

                    <x-tables.table id="invoice-table">

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
                                <th class="sorting" dir="rtl">
                                    <a href="#" wire:click.prevent="sortBy('label')">ملاحظات</a>
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
                                    <td>{{ $tutoringSession->note }}</td>
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

                    {{-- <div class="row">
                        <x-tables.entries-data :data="$tutoringSessions" />

                        <x-tables.pagination :data="$tutoringSessions" />
                    </div> --}}
                </div>

                <div class="mt-3 d-flex justify-content-between">
                    <div>
                        <h5 class="font-weight-light">Payment Methods:</h5>
                        <ul>
                            <li>Bank Transfer</li>
                            <li>Paypal</li>
                        </ul>
                    </div>
                    <div class="col-6 ">
                        <h4 class="font-weight-light">Amount Due: {{ date('M, Y') }}</h4>
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                  <th><b>Total Hours:</b></th>
                                  <td>{{ $tutoringSessions->sum('duration') / 60 }}</td>
                                </tr>
                                <tr>
                                  <th><b>Cash:</b></th>
                                  <td>LE {{ ($tutoringSessions->sum('duration') / 60) * $tutoringSessions[0]->tutor->hourly_rate }}</td>
                                </tr>
                            </tbody>
                        </table>                          
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@script
<script>
$(function () {
    $("#invoice-table").DataTable({
    "responsive": true,
    "lengthChange": false,
    "paging": true,
    "autoWidth": false,
    "searching": true,
    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#invoice-table_wrapper .col-md-6:eq(0)');
});
</script>  
@endscript