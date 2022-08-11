<div class="container">
    @if(Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade show my-1" role="alert">
            <strong>{{ Session::get('error') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <form role="form" wire:submit.prevent="submit">
        <h2 class="form-title">Sign Up</h2>
        <div class="row">
            <div class="form-group col-sm-3">
                <label for="name" class="form-label">Name</label>
                <input wire:model="name" type="text" class="form-control" id="name" name="name">
                @error('name')
                    <div class="alert alert-danger alert-dismissible fade show my-1" role="alert">
                        <strong>{{ $message }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input wire:model="email" type="email" class="form-control" id="email" name="email"
                aria-describedby="emailHelp">
            @error('email')
                <div class="alert alert-danger alert-dismissible fade show my-1" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input wire:model="password" type="password" class="form-control" id="password" name="password">
            @error('password')
                <div class="alert alert-danger alert-dismissible fade show my-1" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="confirm-password" class="form-label">Confirm Password</label>
            <input wire:model="password_confirmation" type="password" class="form-control" id="confirm-password"
                name="password_confirmation">
            @error('password_confirmation')
                <div class="alert alert-danger alert-dismissible fade show my-1" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @enderror
        </div>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="toggle-check">
            <label class="form-check-label" id="toggle-check-label" for="toggle-check">Show Password</label>
        </div>
        <div class="row my-2">
            <div class="col-6">
                <a href="{{ route('login') }}" target="_blank">Have an account ? Login</a>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>