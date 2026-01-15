<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts::guest')]
new class extends Component {
    public function sendVerification(): void {
        /** @var User $authUser */
        $authUser = Auth::user();

        if ($authUser->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('home', absolute: false), navigate: true);

            return;
        }

        $authUser->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }
};
