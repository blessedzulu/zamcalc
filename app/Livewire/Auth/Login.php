<?php

declare(strict_types=1);

namespace App\Livewire\Auth;

use App\Livewire\Concerns\HasToast;
use App\Livewire\Forms\Auth\LoginForm;
use App\Support\Toast;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.auth')]
final class Login extends Component {
    use HasToast;

    public LoginForm $form;

    public function login() {
        try {
            $this->validate();

            $this->form->authenticate();

            Session::regenerate();

            Toast::success('You have successfully logged in!');

            $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
        } catch (ValidationException $ve) {
            throw $ve;
        } catch (\Throwable $th) {
            report($th);
            $this->toastError('Something went wrong');
        }
    }

    // #[Layout('components.layouts.guest')]
    public function render() {
        return view('livewire.auth.login');
    }
}
