<x-guest-layout>
    <div class="login-form-container text-center">
        <h2 class="mb-4">LOGIN</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-3 text-start">
                <label for="email" class="form-label">Email</label>
                <input type="email"
                    class="form-control @error('email') is-invalid @enderror"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="example@gmail.com"
                    required
                    autofocus />
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-3 text-start">
                <label for="password" class="form-label">Password</label>
                <input type="password"
                    class="form-control @error('password') is-invalid @enderror"
                    id="password"
                    name="password"
                    placeholder="example123"
                    required />
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <input class="form-check-input"
                        type="checkbox"
                        id="remember_me"
                        name="remember">
                    <label class="form-check-label" for="remember_me">
                        Remember me
                    </label>
                </div>
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-decoration-none">
                    Forgot password?
                </a>
                @endif
            </div>

            <button type="submit" class="btn btn-primary w-100">
                Login
            </button>

            @if (Route::has('register'))
            <p class="text-center mt-3">
                Don't have an account?
                <a href="{{ route('register') }}" class="text-decoration-none">
                    Register Now
                </a>
            </p>
            @endif
        </form>
    </div>
</x-guest-layout>