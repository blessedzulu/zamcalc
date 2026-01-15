<?php

use App\Livewire\Forms\Auth\RegisterForm;
use App\Support\Toast;
use Livewire\Attributes\Layout;
use Livewire\Component;


new #[Layout('layouts::guest')] class extends Component {
    public RegisterForm $form;

    public function register() {
        $this->form->register();

        Toast::success('Your account has been created successfully!');

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }
};
