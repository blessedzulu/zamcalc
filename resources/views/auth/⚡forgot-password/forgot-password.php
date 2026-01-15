<?php

use App\Livewire\Concerns\HasToast;
use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Component;


new #[Layout('layouts::guest')] class extends Component {
    use HasToast;

    public string $email = '';

    public function sendPasswordResetLink(): void {
        $this->validate([
            'email' => ['required', 'string', 'email'],
        ]);

        $status = Password::sendResetLink($this->only('email'));

        if ($status !== Password::RESET_LINK_SENT) {
            $this->addError('email', __($status));

            return;
        }

        $this->reset('email');

        $this->toastSuccess('We have emailed your password reset link!');

        session()->flash('status', __($status));
    }
};
