@section('title')
    Edit Existing TutoringSession
@endsection

@section('content-header')
<x-content-header>
    Edit Existing TutoringSession
</x-content-header>
@endsection

<x-savings.content>
    <x-slot name="card_header">
        <h3 class="card-title">Edit Existing TutoringSession</h3>
        <a href="{{ route('tutoring-sessions.index') }}" class="float-right">عودة</a>
    </x-slot>

    <x-slot name="card_body">
        <form wire:submit="update">
            // edit-review

            <div class="row">
                <div class="offset-8 col-4">
                    <x-inputs.button text="Save" class="btn-success" />
                </div>
            </div>
        </form>

    </x-slot>
</x-savings.content>
