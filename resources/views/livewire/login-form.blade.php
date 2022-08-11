<div class="container">
    @if (Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade show my-1" role="alert">
            <strong>{{ Session::get('error') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <form role="form" id="login-form" data-token="{{ csrf_token() }}">
        <h2 class="form-title">Login</h2>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            <div id="email-alert" style="display: none;" class="alert alert-danger alert-dismissible fade my-1 show"
                role="alert">
                <strong>invalid email</strong>
                <button type="button" class="btn-close" id="email-alert-btn"></button>
            </div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
            <div id="password-alert" style="display: none;" class="alert alert-danger alert-dismissible fade my-1 show"
                role="alert">
                <strong>invalid password</strong>
                <button type="button" class="btn-close" id="password-alert-btn"></button>
            </div>
        </div>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="toggle-check">
            <label class="form-check-label" id="toggle-check-label" for="toggle-check">Show Password</label>
        </div>
        <div class="row my-2">
            <div class="col-6">
                <a href="{{ route('sign-up') }}" target="_blank">Don't have an account ? Sign Up</a>
            </div>
        </div>
        <button id="btn" class="btn btn-primary">Submit</button>
    </form>
</div>
