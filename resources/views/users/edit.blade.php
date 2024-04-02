@section('title')
    تعديل المستخدم
@endsection

@section('content-header')
<x-content-header>
    تعديل المستخدم
</x-content-header>
@endsection

<x-savings.content>
    <x-slot name="card_header">
        <h3 class="card-title">تعديل المستخدم</h3>
        <a href="{{ route('users.index') }}" class="float-right">عودة</a>
    </x-slot>

    <x-slot name="card_body">
        <form wire:submit="update">
            <x-inputs.text
                wire:model="form.name"
                placeholder="{{ trans('validation.attributes.name') }}"
                autofocus
                required="required"
            />

            <x-inputs.text
                wire:model="form.phone_number"
                placeholder="{{ trans('validation.attributes.phone_number') }}"
                autofocus
                required="required"
            />

            <x-inputs.email
                wire:model="form.email"
                placeholder="{{ trans('validation.attributes.email') }}"
                autofocus
                required="required"
            />

            <x-inputs.dropdown
                wire:model.live="form.role_id"
                :options="$roles"
                textField="name"
                label="Select Role"
                required="required"
            />

            <div wire:loading wire:target="form.role_id">
                Loading...
            </div>

            @if ($form->role_id == $roles->firstWhere('name', \App\Models\Role::STUDENT)->id)
            <x-inputs.dropdown
                wire:model="form.parent_id"
                :options="$parents"
                textField="name"
                label="Select Parent"
            />
            @endif
            
            <div class="row">
                <div class="offset-8 col-4">
                    <x-inputs.button text="Save" class="btn-success" />
                </div>
            </div>
        </form>

    </x-slot>
</x-savings.content>
