@section('title')
    Create New Account
@endsection

<div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg">Create New Account</p>

        <form method="POST" wire:submit="submit">
            @csrf

            <x-inputs.password wire:model="newPassword" />

            <x-inputs.password wire:model="newPasswordConfirmation" />

            <div class="row">
                <div class="offset-4 col-4">
                    <x-inputs.button text="حفظ" class="btn-success" />
                </div>
            </div>
        </form>
    </div>
</div>
