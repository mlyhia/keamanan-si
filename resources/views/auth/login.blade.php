<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login - {{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        
        <style>
            :root {
                --primary-purple: #7C3AED;
                --dark-purple: #5B21B6;
                --light-purple: #8B5CF6;
                --lighter-purple: #A78BFA;
                --dark-bg: #0F0F23;
                --darker-bg: #070711;
                --card-bg: #1A1A2E;
                --text-light: #E2E8F0;
                --text-gray: #94A3B8;
            }

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: 'Instrument Sans', sans-serif;
                background: linear-gradient(135deg, var(--darker-bg) 0%, var(--dark-bg) 100%);
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                color: var(--text-light);
                position: relative;
                overflow-x: hidden;
            }

            body::before {
                content: '';
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: 
                    radial-gradient(circle at 20% 80%, rgba(124, 58, 237, 0.1) 0%, transparent 50%),
                    radial-gradient(circle at 80% 20%, rgba(91, 33, 182, 0.1) 0%, transparent 50%);
                z-index: -1;
            }

            .login-container {
                width: 100%;
                max-width: 420px;
                padding: 2rem;
                position: relative;
            }

            .login-card {
                background: var(--card-bg);
                backdrop-filter: blur(10px);
                border: 1px solid rgba(124, 58, 237, 0.2);
                border-radius: 20px;
                padding: 2.5rem;
                box-shadow: 
                    0 20px 40px rgba(0, 0, 0, 0.4),
                    0 0 60px rgba(124, 58, 237, 0.1);
                position: relative;
                overflow: hidden;
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }

            .login-card:hover {
                transform: translateY(-5px);
                box-shadow: 
                    0 25px 50px rgba(0, 0, 0, 0.5),
                    0 0 80px rgba(124, 58, 237, 0.15);
            }

            .login-card::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: 4px;
                background: linear-gradient(90deg, var(--primary-purple), var(--light-purple));
                border-radius: 20px 20px 0 0;
            }

            .logo-container {
                text-align: center;
                margin-bottom: 2rem;
            }

            .logo {
                display: inline-flex;
                align-items: center;
                gap: 0.75rem;
                margin-bottom: 1rem;
            }

            .logo-icon {
                width: 40px;
                height: 40px;
                background: linear-gradient(135deg, var(--primary-purple), var(--light-purple));
                border-radius: 12px;
                display: flex;
                align-items: center;
                justify-content: center;
                color: white;
                font-size: 1.2rem;
                box-shadow: 0 4px 12px rgba(124, 58, 237, 0.3);
            }

            .logo-text {
                font-size: 1.75rem;
                font-weight: 700;
                background: linear-gradient(135deg, var(--primary-purple), var(--light-purple));
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }

            .welcome-text {
                color: var(--text-gray);
                font-size: 0.95rem;
                margin-bottom: 2rem;
                text-align: center;
            }

            .form-group {
                margin-bottom: 1.5rem;
            }

            .form-label {
                display: block;
                margin-bottom: 0.5rem;
                color: var(--text-light);
                font-weight: 500;
                font-size: 0.95rem;
                display: flex;
                align-items: center;
                gap: 0.5rem;
            }

            .form-label i {
                color: var(--lighter-purple);
            }

            .form-input {
                width: 100%;
                padding: 0.875rem 1rem;
                background: rgba(15, 15, 35, 0.7);
                border: 2px solid rgba(124, 58, 237, 0.3);
                border-radius: 12px;
                color: var(--text-light);
                font-family: 'Instrument Sans', sans-serif;
                font-size: 1rem;
                transition: all 0.3s ease;
            }

            .form-input:focus {
                outline: none;
                border-color: var(--primary-purple);
                box-shadow: 0 0 0 3px rgba(124, 58, 237, 0.1);
                background: rgba(15, 15, 35, 0.9);
            }

            .form-input::placeholder {
                color: var(--text-gray);
            }

            .password-container {
                position: relative;
            }

            .password-toggle {
                position: absolute;
                right: 1rem;
                top: 50%;
                transform: translateY(-50%);
                background: none;
                border: none;
                color: var(--text-gray);
                cursor: pointer;
                font-size: 1rem;
                transition: color 0.3s ease;
            }

            .password-toggle:hover {
                color: var(--lighter-purple);
            }

            .error-message {
                color: #F87171;
                font-size: 0.875rem;
                margin-top: 0.5rem;
                display: flex;
                align-items: center;
                gap: 0.5rem;
            }

            .session-status {
                background: rgba(124, 58, 237, 0.1);
                border: 1px solid rgba(124, 58, 237, 0.3);
                border-radius: 12px;
                padding: 1rem;
                margin-bottom: 1.5rem;
                color: var(--text-light);
                font-size: 0.95rem;
            }

            .remember-forgot {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 2rem;
            }

            .checkbox-container {
                display: flex;
                align-items: center;
                gap: 0.75rem;
                cursor: pointer;
            }

            .checkbox-input {
                width: 18px;
                height: 18px;
                border: 2px solid rgba(124, 58, 237, 0.5);
                border-radius: 4px;
                background: transparent;
                appearance: none;
                cursor: pointer;
                position: relative;
                transition: all 0.3s ease;
            }

            .checkbox-input:checked {
                background: var(--primary-purple);
                border-color: var(--primary-purple);
            }

            .checkbox-input:checked::after {
                content: '✓';
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                color: white;
                font-size: 0.75rem;
            }

            .checkbox-label {
                color: var(--text-light);
                font-size: 0.95rem;
                cursor: pointer;
            }

            .forgot-link {
                color: var(--lighter-purple);
                text-decoration: none;
                font-size: 0.95rem;
                transition: color 0.3s ease;
                display: flex;
                align-items: center;
                gap: 0.5rem;
            }

            .forgot-link:hover {
                color: var(--primary-purple);
                text-decoration: underline;
            }

            .login-button {
                width: 100%;
                padding: 1rem;
                background: linear-gradient(135deg, var(--primary-purple), var(--dark-purple));
                border: none;
                border-radius: 12px;
                color: white;
                font-family: 'Instrument Sans', sans-serif;
                font-size: 1rem;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s ease;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 0.75rem;
                margin-bottom: 1.5rem;
            }

            .login-button:hover {
                transform: translateY(-2px);
                box-shadow: 0 10px 25px rgba(124, 58, 237, 0.3);
                background: linear-gradient(135deg, var(--light-purple), var(--primary-purple));
            }

            .login-button:active {
                transform: translateY(0);
            }

            .register-link {
                text-align: center;
                color: var(--text-gray);
                font-size: 0.95rem;
            }

            .register-link a {
                color: var(--lighter-purple);
                text-decoration: none;
                font-weight: 500;
                margin-left: 0.5rem;
                transition: color 0.3s ease;
            }

            .register-link a:hover {
                color: var(--primary-purple);
                text-decoration: underline;
            }

            .divider {
                display: flex;
                align-items: center;
                margin: 1.5rem 0;
                color: var(--text-gray);
                font-size: 0.875rem;
            }

            .divider::before,
            .divider::after {
                content: '';
                flex: 1;
                height: 1px;
                background: rgba(124, 58, 237, 0.3);
            }

            .divider span {
                padding: 0 1rem;
            }

            .social-login {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 1rem;
                margin-bottom: 1.5rem;
            }

            .social-button {
                padding: 0.875rem;
                border: 1px solid rgba(124, 58, 237, 0.3);
                border-radius: 12px;
                background: rgba(15, 15, 35, 0.7);
                color: var(--text-light);
                font-family: 'Instrument Sans', sans-serif;
                font-size: 0.95rem;
                cursor: pointer;
                transition: all 0.3s ease;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 0.75rem;
            }

            .social-button:hover {
                background: rgba(124, 58, 237, 0.1);
                border-color: var(--primary-purple);
                transform: translateY(-2px);
            }

            .social-button.google {
                color: #F87171;
            }

            .social-button.github {
                color: var(--text-light);
            }

            .back-home {
                position: absolute;
                top: 2rem;
                left: 2rem;
                z-index: 10;
            }

            .back-button {
                display: flex;
                align-items: center;
                gap: 0.75rem;
                color: var(--text-light);
                text-decoration: none;
                font-size: 0.95rem;
                padding: 0.75rem 1.25rem;
                background: rgba(26, 26, 46, 0.8);
                border: 1px solid rgba(124, 58, 237, 0.3);
                border-radius: 12px;
                transition: all 0.3s ease;
            }

            .back-button:hover {
                background: rgba(124, 58, 237, 0.1);
                transform: translateX(-5px);
            }

            .floating-element {
                position: absolute;
                border-radius: 50%;
                background: radial-gradient(circle, rgba(124, 58, 237, 0.1) 0%, transparent 70%);
                z-index: -1;
                animation: float 15s infinite ease-in-out;
            }

            .floating-element:nth-child(1) {
                width: 200px;
                height: 200px;
                top: 10%;
                left: 5%;
                animation-delay: 0s;
            }

            .floating-element:nth-child(2) {
                width: 300px;
                height: 300px;
                bottom: 10%;
                right: 5%;
                animation-delay: -5s;
            }

            .floating-element:nth-child(3) {
                width: 150px;
                height: 150px;
                top: 40%;
                right: 15%;
                animation-delay: -10s;
            }

            @keyframes float {
                0%, 100% {
                    transform: translateY(0) scale(1);
                }
                50% {
                    transform: translateY(-20px) scale(1.05);
                }
            }

            @media (max-width: 640px) {
                .login-container {
                    padding: 1rem;
                }
                
                .login-card {
                    padding: 2rem 1.5rem;
                }
                
                .social-login {
                    grid-template-columns: 1fr;
                }
                
                .back-home {
                    top: 1rem;
                    left: 1rem;
                }
            }
        </style>
    </head>
    <body>
        <!-- Floating Background Elements -->
        <div class="floating-element"></div>
        <div class="floating-element"></div>
        <div class="floating-element"></div>

        <!-- Back to Home Button -->
        <div class="back-home">
            <a href="{{ url('/') }}" class="back-button">
                <i class="fas fa-arrow-left"></i>
                <span>Back to Home</span>
            </a>
        </div>

        <div class="login-container">
            <div class="login-card">
                <!-- Logo and Welcome -->
                <div class="logo-container">
                    <div class="logo">
                        <div class="logo-icon">
                            <i class="fas fa-lock"></i>
                        </div>
                        <span class="logo-text">SecureAuth</span>
                    </div>
                    <p class="welcome-text">Welcome back! Please sign in to continue</p>
                </div>

                <!-- Session Status -->
                @if (session('status'))
                    <div class="session-status">
                        <i class="fas fa-info-circle"></i> {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="form-group">
                        <label for="email" class="form-label">
                            <i class="fas fa-envelope"></i>
                            {{ __('Email Address') }}
                        </label>
                        <input id="email" class="form-input" type="email" name="email" 
                               value="{{ old('email') }}" required autofocus autocomplete="username" 
                               placeholder="Enter your email">
                        @if ($errors->has('email'))
                            <div class="error-message">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label for="password" class="form-label">
                            <i class="fas fa-lock"></i>
                            {{ __('Password') }}
                        </label>
                        <div class="password-container">
                            <input id="password" class="form-input" type="password" name="password" 
                                   required autocomplete="current-password" 
                                   placeholder="Enter your password">
                            <button type="button" class="password-toggle" onclick="togglePassword()">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        @if ($errors->has('password'))
                            <div class="error-message">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="remember-forgot">
                        <label class="checkbox-container">
                            <input id="remember_me" type="checkbox" class="checkbox-input" name="remember">
                            <span class="checkbox-label">{{ __('Remember me') }}</span>
                        </label>
                        
                        @if (Route::has('password.request'))
                            <a class="forgot-link" href="{{ route('password.request') }}">
                                <i class="fas fa-key"></i>
                                {{ __('Forgot password?') }}
                            </a>
                        @endif
                    </div>

                    <!-- Login Button -->
                    <button type="submit" class="login-button">
                        <i class="fas fa-sign-in-alt"></i>
                        {{ __('Sign In') }}
                    </button>

                    <!-- Divider -->
                    <div class="divider">
                        <span>or continue with</span>
                    </div>

                    <!-- Social Login (Optional) -->
                    <div class="social-login">
                        <button type="button" class="social-button google">
                            <i class="fab fa-google"></i>
                            Google
                        </button>
                        <button type="button" class="social-button github">
                            <i class="fab fa-github"></i>
                            GitHub
                        </button>
                    </div>

                    <!-- Register Link -->
                    @if (Route::has('register'))
                        <div class="register-link">
                            Don't have an account?
                            <a href="{{ route('register') }}">Create account</a>
                        </div>
                    @endif
                </form>
            </div>
        </div>

        <script>
            function togglePassword() {
                const passwordInput = document.getElementById('password');
                const toggleButton = document.querySelector('.password-toggle i');
                
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    toggleButton.classList.remove('fa-eye');
                    toggleButton.classList.add('fa-eye-slash');
                } else {
                    passwordInput.type = 'password';
                    toggleButton.classList.remove('fa-eye-slash');
                    toggleButton.classList.add('fa-eye');
                }
            }

            // Add input focus effects
            document.querySelectorAll('.form-input').forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.querySelector('.form-label').style.color = 'var(--lighter-purple)';
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.querySelector('.form-label').style.color = 'var(--text-light)';
                });
            });

            // Add smooth loading animation
            document.addEventListener('DOMContentLoaded', () => {
                document.querySelector('.login-card').style.opacity = '0';
                document.querySelector('.login-card').style.transform = 'translateY(20px)';
                
                setTimeout(() => {
                    document.querySelector('.login-card').style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                    document.querySelector('.login-card').style.opacity = '1';
                    document.querySelector('.login-card').style.transform = 'translateY(0)';
                }, 100);
            });
        </script>
    </body>
</html>