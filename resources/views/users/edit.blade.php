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
                textField="label"
                label="إختر الوظيفة"
                required="required"
            />

            <div wire:loading wire:target="form.role_id">
                الرجاء الإنتظار...
            </div>

            @if ($form->role_id == $roles->firstWhere('name', \App\Models\Role::STUDENT)->id)
            <x-inputs.dropdown
                wire:model="form.parent_id"
                :options="$parents"
                textField="name"
                label="إختر العائلة"
            />
            @endif

            @if ($form->role_id == $roles->firstWhere('name', \App\Models\Role::TUTOR)->id)
            <x-inputs.text
                wire:model="form.hourly_rate"
                placeholder="{{ trans('validation.attributes.hourly_rate') }}"
                type="number"
                autofocus
                required="required"
            />
            @endif
            
            <div class="row">
                <div class="offset-8 col-4">
                    <x-inputs.button text="حفظ" class="btn-success" />
                </div>
            </div>
        </form>

    </x-slot>
</x-savings.content>
