<div>
@section('title')
    تسجيل حصة
@endsection

@section('content-header')
<x-content-header>
    تسجيل حصة
</x-content-header>
@endsection

<x-savings.content>
    <x-slot name="card_header">
        <h3 class="card-title">تسجيل حصة</h3>
        <a href="{{ route('tutoring-sessions.index') }}" class="float-right">عودة</a>
    </x-slot>

    <x-slot name="card_body">
        <form wire:submit="store">
            @if(auth()->user()->isAdmin())
            <x-inputs.dropdown label="الأستاذ" textField="name" :options="$tutors" wire:model="tutor_id" />
            @endif
            
            <x-inputs.dropdown label="العائلات" textField="name" :options="$parents" wire:model.live="parent_id" />

            <div wire:loading wire:target="parent_id">
                الرجاء الإنتظار...
            </div>
            
            @if($parent_id)
            <x-inputs.dropdown label="التلاميذ" textField="name" :options="$children" wire:model.live="student_id" />
            @endif

            <x-inputs.dropdown label="المدة" textField="title" :options="$durations" wire:model="duration" />

            <x-inputs.date wire:model="session_date" />
            
            <x-inputs.text wire:model="subject" placeholder="المادة" />

            <x-inputs.text wire:model="note" placeholder="ملاحظة" />

            <div class="row">
                <div class="offset-8 col-4">
                    <x-inputs.button text="حفظ" class="btn-success" />
                </div>
            </div>
        </form>

    </x-slot>
</x-savings.content>
