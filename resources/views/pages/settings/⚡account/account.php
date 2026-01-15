<?php

use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use App\Livewire\Concerns\HasToast;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use App\Livewire\Forms\Settings\AccountForm;
use Illuminate\Validation\ValidationException;
use Illuminate\Container\Attributes\CurrentUser;

new class extends Component {
    use HasToast;

    public AccountForm $form;

    public function mount(#[CurrentUser] User $user) {
        $this->form->mount($user);
    }

    public function update(#[CurrentUser] User $user) {
        $this->form->update($user);

        $this->toastSuccess('Your account has been updated.');
    }

    /**
     * Update the password for the currently authenticated user.
     */
    public function updatePassword(#[CurrentUser] User $user): void {
        try {
            $this->form->updatePassword($user);

            $this->toastSuccess('Your password has been updated.');
        } catch (ValidationException $e) {
            $this->form->reset('current_password', 'password', 'password_confirmation');

            throw $e;
        }
    }
};
