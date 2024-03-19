@section('title')
    Edit Existing User
@endsection

@section('content-header')
<x-content-header>
    Edit Existing User
</x-content-header>
@endsection

<x-savings.content>
    <x-slot name="card_header">
        <h3 class="card-title">Edit Existing User</h3>
        <a href="{{ route('users.index') }}" class="float-right">Back</a>
    </x-slot>

    <x-slot name="card_body">
        <form method="POST" wire:submit="update">
            @csrf

            <x-inputs.text
                key="user.name"
                placeholder="{{ trans('validation.attributes.name') }}"
                autofocus
                required="required"
            />

            <x-inputs.text
                key="user.phone_number"
                placeholder="{{ trans('validation.attributes.phone_number') }}"
                autofocus
                required="required"
            />

            <x-inputs.email
                key="user.email"
                placeholder="{{ trans('validation.attributes.email') }}"
                autofocus
                required="required"
            />

            <x-inputs.dropdown
                key="user.role_id"
                :options="$roles"
                textField="name"
                label="Select Role"
                required="required"
            />

            <x-inputs.dropdown
                key="user.parent_id"
                :options="$parents"
                textField="name"
                label="Select Parent"
            />
            
            <div class="row">
                <div class="offset-8 col-4">
                    <x-inputs.button text="Save" class="btn-success" />
                </div>
            </div>
        </form>

    </x-slot>
</x-savings.content>
