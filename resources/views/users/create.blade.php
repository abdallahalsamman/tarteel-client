<div>
@section('title')
    إنشاء مستخدم جديد
@endsection

@section('content-header')
<x-content-header>
    إنشاء مستخدم جديد
</x-content-header>
@endsection

<x-savings.content>
    <x-slot name="card_header">
        <h3 class="card-title">إنشاء مستخدم جديد</h3>
        <a href="{{ route('users.index') }}" class="float-right">Back</a>
    </x-slot>

    <x-slot name="card_body">
        <form method="POST" wire:submit="store">
            @csrf

            <x-inputs.text
                wire:model="user.name"
                placeholder="{{ trans('validation.attributes.name') }}"
                autofocus
                required="required"
            />

            <x-inputs.text
                wire:model="user.phone_number"
                placeholder="{{ trans('validation.attributes.phone_number') }}"
                autofocus
                required="required"
            />

            <x-inputs.email wire:model="user.email" required="required" placeholder="{{ trans('validation.attributes.email') }}" autofocus />

            <x-inputs.dropdown wire:model.live="user.role_id" label="الصلاحيّة" :options="$roles" textField="name" required="required" />

            <x-inputs.dropdown
                wire:model="user.parent_id"
                :options="$parents"
                textField="name"
                label="العائلة"
            />

            <div class="row">
                <div class="offset-8 col-4">
                    <x-inputs.button text="Save" class="btn-success" />
                </div>
            </div>
        </form>

    </x-slot>
</x-savings.content>
