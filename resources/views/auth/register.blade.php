<x-guest-layout>
    <div class="form-box shadow rounded p-4">
        <h2 class="text-center mb-4">Register</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text"
                    class="form-control @error('name') is-invalid @enderror"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Enter your name"
                    required />
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email"
                    class="form-control @error('email') is-invalid @enderror"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Enter your email"
                    required />
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password"
                    class="form-control @error('password') is-invalid @enderror"
                    id="password"
                    name="password"
                    placeholder="Enter your password"
                    required />
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password"
                    class="form-control"
                    id="password_confirmation"
                    name="password_confirmation"
                    placeholder="Confirm your password"
                    required />
            </div>

            <!-- Privacy Policy -->
            <div class="form-check mb-3">
                <input type="checkbox"
                    class="form-check-input @error('privacy_policy') is-invalid @enderror"
                    id="privacy_policy"
                    name="privacy_policy"
                    required />
                <label class="form-check-label" for="privacy_policy">
                    I have read, understood, and agree with J&P Privacy Policy
                </label>
                @error('privacy_policy')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100">
                Register
            </button>

            <p class="text-center mt-3">
                Already have an account?
                <a href="{{ route('login') }}" class="text-decoration-none">
                    Login here
                </a>
            </p>
        </form>
    </div>
</x-guest-layout>