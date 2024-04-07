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

                    @if (request()->routeIs('invoices.show'))
                    <div>
                        To<br>
                        <b>{{ $user->name }}</b><br>
                        Price per Hour: {{ $user->hourly_rate }}
                    </div>
                    <div>
                        Date: {{ date('M, Y') }}<br>
                        Invoice: <b>#{{ Str::uuid() }}</b><br>
                        <button class="btn btn-primary" wire:click="markAllAsPaid">تصفير الحساب</button>
                    </div>
                    @endif

                </div>

                <div class="dataTables_wrapper dt-bootstrap4 mt-3">
                    <x-tables.table id="table">

                        <x-slot name="thead_tfoot">
                            <tr>
                                <th>
                                    العائلة
                                </th>
                                <th>
                                    الطالب
                                </th>
                                @if(auth()->user()->isAdmin())
                                <th>
                                    المدرس
                                </th>
                                @endif
                                <th>
                                    موعد الحصة
                                </th>
                                <th>
                                    المدة
                                </th>
                                <th>
                                    اسم المادة
                                </th>
                                <th>
                                    ملاحظات
                                </th>
                                {{-- 
                                @if(auth()->user()->isAdmin())
                                <th>
                                    Edit
                                </th>
                                <th>
                                    Delete
                                </th>
                                @endif
                                --}}
                            </tr>
                        </x-slot>

                        <x-slot name="tbody">
                            @forelse($tutoringSessions as $tutoringSession)
                                <tr class="@if($loop->odd) odd @endif">
                                    <td>{{ $tutoringSession->student->parent->name }}</td>
                                    <td>{{ $tutoringSession->student->name }}</td>
                                    @if(auth()->user()->isAdmin())
                                    <td><a href="{{ route('invoices.show', $tutoringSession->tutor) }}">{{ $tutoringSession->tutor->name }}</a></td>
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
                </div>

                @if (request()->routeIs('invoices.show'))
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
                                  <td>LE {{ ($tutoringSessions->sum('duration') / 60) * $user->hourly_rate }}</td>
                                </tr>
                            </tbody>
                        </table>                          
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

@script
<script>
$(function () {
    $("#table").DataTable({
    "responsive": true,
    "lengthChange": false,
    "paging": false,
    "autoWidth": false,
    "searching": true,
    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#table_wrapper .col-md-6:eq(0)');
});
</script>  
@endscript