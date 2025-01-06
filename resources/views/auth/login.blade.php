{{--
<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
@csrf

<!-- Email Address -->
<div>
    <x-input-label for="email" :value="__('Email')" />
    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
    <x-input-error :messages="$errors->get('email')" class="mt-2" />
</div>

<!-- Password -->
<div class="mt-4">
    <x-input-label for="password" :value="__('Password')" />

    <x-text-input id="password" class="block mt-1 w-full"
        type="password"
        name="password"
        required autocomplete="current-password" />

    <x-input-error :messages="$errors->get('password')" class="mt-2" />
</div>

<!-- Remember Me -->
<div class="block mt-4">
    <label for="remember_me" class="inline-flex items-center">
        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
    </label>
</div>

<div class="flex items-center justify-end mt-4">
    @if (Route::has('password.request'))
    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
        {{ __('Forgot your password?') }}
    </a>
    @endif

    <x-primary-button class="ms-3">
        {{ __('Log in') }}
    </x-primary-button>
</div>
</form>
</x-guest-layout>
--}}


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="{{asset('loginpage')}}/style.css" />
    <title>GajiHan</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <!-- Form Login -->
        <form method="POST" action="{{ route('login') }}" class="sign-in-form">
        @csrf
        <h2 class="title">Login</h2>
        <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="email" id="email" name="email" placeholder="Email" autocomplete="login-email" />
        </div>
        <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" id="password" name="password" placeholder="Password" autocomplete="login-password" />
        </div>
        <input type="submit" value="{{ __('Log in') }}" class="btn solid" />
        </form>

        <!-- Form Register -->
        <form method="POST" action="{{ route('register') }}" class="sign-up-form">
        @csrf
        <h2 class="title">Register</h2>
        <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" id="name" name="name" placeholder="Username" autocomplete="register-name" />
        </div>
        <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="email" id="email" name="email" placeholder="Email" autocomplete="register-email" />
        </div>
        <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" id="password" name="password" placeholder="Password" autocomplete="new-password" />
        </div>
        <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" autocomplete="new-password" />
        </div>
        <input type="submit" class="btn" value="{{ __('Register') }}" />
        </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>GajiHan</h3>
            <p>
              Don't have an account?
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Register
            </button>
          </div>
          <img src="{{asset('loginpage')}}/img/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>GajiHan</h3>
            <p>
              Already have an account?
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Login
            </button>
          </div>
          <img src="{{asset('loginpage')}}/img/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="{{asset('loginpage')}}/app.js"></script>
  </body>
</html>
