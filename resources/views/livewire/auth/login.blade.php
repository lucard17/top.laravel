<div class="flex flex-col w-96 mx-auto">
    @if ($action == 'register')
    <h2>Register</h2>
    @else
    <h2>Login</h2>
    @endif

    @if ($action == 'register')
    <input type="text" name='name' placeholder="Name" class="form-control" wire:model="name">
    @error('name') <div class="text-red-600">{{ $message }}</div> @enderror
    @endif

    <input type="text" name='email' placeholder="Email" class="form-control" wire:model="email">
    @error('email') <div class="text-red-600">{{ $message }}</div> @enderror

    <input type="password" name='password' placeholder="Password" class="form-control" wire:model='password'>
    @error("password") <div class="text-red-600">{{ $message }}</div> @enderror

    @if ($action == 'register')
    <input type="password" name='password_confirmation' placeholder="Confirm Password" class="form-control"
        wire:model='password_confirmation'>
    @error('password_confirmation') <div class="text-red-600">{{ $message }}</div> @enderror
    <button wire:click="register" class='rounded py-1 bg-emerald-700 text-slate-50 mt-4 hover:bg-emerald-500'>
        Register
    </button>
    @else
    <button wire:click="login" class='rounded py-1 bg-emerald-700 text-slate-50 mt-4 hover:bg-emerald-500'>
        login
    </button>
    @endif
    {{-- <p>{{ json_encode(session()->all()) }}</p> --}}
    {{-- The Master doesn't talk, he acts. --}}
</div>