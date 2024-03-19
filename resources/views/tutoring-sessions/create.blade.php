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
        <a href="{{ route('tutoring-sessions.index') }}" class="float-right">Back</a>
    </x-slot>

    <x-slot name="card_body">
        <form method="POST" wire:submit="store">
            @csrf

            <x-inputs.dropdown label="الأستاذ" textField="name" :options="$tutors" key="tutoringSession.tutor_id" />
            <x-inputs.dropdown label="العائلات" textField="name" :options="$parents" key="tutoringSession.parent_id" wire:model.live="tutoringSession.parent_id" />

            <div wire:loading wire:target="tutoringSession.parent_id">
                Loading...
            </div>
            
            @if($tutoringSession->parent_id)
            <x-inputs.dropdown label="التلاميذ" textField="name" :options="$children" key="tutoringSession.student_id" />
            @endif

            <x-inputs.dropdown label="المدة" textField="title" :options="$durations" key="duration" />

            <div class="row">
                <div class="offset-8 col-4">
                    <x-inputs.button text="Save" class="btn-success" />
                </div>
            </div>
        </form>

    </x-slot>
</x-savings.content>
