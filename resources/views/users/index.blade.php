<div>
    @section('title')
    Users
    @endsection

    @section('content-header')
    <x-content-header>
        الأساتذة والمستخدمين
    </x-content-header>
    @endsection

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('users.create') }}" class="float-right">Add New</a>
                </div>

                <div class="card-body" x-data="{showModal : false, deleteId : false}">
                    <div class="dataTables_wrapper dt-bootstrap4">
                        {{-- <div class="row">
                            <x-tables.per-page />
                            <div class="col-md-3 col-sm-12 form-group">
                                <select wire:model.live="roleId" name="roleId"
                                    class="form-control form-control-sm custom-select custom-select-sm" value="roleId"
                                    placeholder="{{ trans("validation.attributes.roleId") }}" dir="rtl">
                                    <option value="">-- الصلاحية --</option>
                                    @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->label }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <x-tables.search />
                        </div> --}}

                        <x-tables.table id="table">
                            <x-slot name="thead_tfoot">
                                <tr>
                                    <th class="sorting">
                                        <a href="#" wire:click.prevent="sortBy('name')">الإسم</a>
                                        <x-tables.sort-by :sortField="$sortField" :sortDirection="$sortDirection"
                                            field="name" />
                                    </th>
                                    <th class="sorting">
                                        <a href="#" wire:click.prevent="sortBy('email')">إيميل</a>
                                        <x-tables.sort-by :sortField="$sortField" :sortDirection="$sortDirection"
                                            field="email" />
                                    </th>
                                    <th class="sorting">
                                        <a href="#" wire:click.prevent="sortBy('phone_number')">رقم الهاتف</a>
                                        <x-tables.sort-by :sortField="$sortField" :sortDirection="$sortDirection"
                                            field="phone_number" />
                                    </th>
                                    <th class="sorting">
                                        الوظيفة
                                    </th>
                                    <th class="sorting">
                                        <a href="#" wire:click.prevent="sortBy('created_at')">تاريخ الإنضمام</a>
                                        <x-tables.sort-by :sortField="$sortField" :sortDirection="$sortDirection"
                                            field="created_at" />
                                    </th>

                                    <th class="sorting">
                                        Edit
                                    </th>
                                    <th class="sorting">
                                        Delete
                                    </th>
                                </tr>
                            </x-slot>

                            <x-slot name="tbody">
                                @forelse($users as $user)
                                <tr class="@if($loop->odd) odd @endif" wire:key="user-row-{{ $user->id }}">
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone_number }}</td>
                                    <td>{{ $user->role->label }}</td>
                                    <td>{{ $user->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        @if(!$user->isHimself(auth()->user()))
                                        <a href="{{ route('users.edit', $user) }}"><span class="fas fa-edit"></a></span>
                                        @endif
                                    </td>
                                    <td>
                                        <livewire:delete-user-component :user="$user" wire:key="{{ $user->id }}" />
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6">No results.</td>
                                </tr>
                                @endforelse
                            </x-slot>
                        </x-tables.table>

                        {{-- <div class="row">
                            <x-tables.entries-data :data="$users" />

                            <x-tables.pagination :data="$users" />
                        </div> --}}
                    </div>
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
    // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#table_wrapper .col-md-6:eq(0)');
});
</script>  
@endscript