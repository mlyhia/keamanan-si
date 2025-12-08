<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>2FA Verification - {{ config('app.name', 'Laravel') }}</title>

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
                --success-green: #10B981;
                --error-red: #EF4444;
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

            .verification-container {
                width: 100%;
                max-width: 480px;
                padding: 2rem;
                position: relative;
            }

            .verification-card {
                background: var(--card-bg);
                backdrop-filter: blur(10px);
                border: 1px solid rgba(124, 58, 237, 0.2);
                border-radius: 20px;
                padding: 3rem 2.5rem;
                box-shadow: 
                    0 20px 40px rgba(0, 0, 0, 0.4),
                    0 0 60px rgba(124, 58, 237, 0.1);
                position: relative;
                overflow: hidden;
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                text-align: center;
            }

            .verification-card:hover {
                transform: translateY(-5px);
                box-shadow: 
                    0 25px 50px rgba(0, 0, 0, 0.5),
                    0 0 80px rgba(124, 58, 237, 0.15);
            }

            .verification-card::before {
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
                margin-bottom: 2rem;
            }

            .logo {
                display: inline-flex;
                align-items: center;
                gap: 0.75rem;
                margin-bottom: 1.5rem;
            }

            .logo-icon {
                width: 48px;
                height: 48px;
                background: linear-gradient(135deg, var(--primary-purple), var(--light-purple));
                border-radius: 12px;
                display: flex;
                align-items: center;
                justify-content: center;
                color: white;
                font-size: 1.4rem;
                box-shadow: 0 4px 15px rgba(124, 58, 237, 0.3);
            }

            .logo-text {
                font-size: 1.75rem;
                font-weight: 700;
                background: linear-gradient(135deg, var(--primary-purple), var(--light-purple));
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }

            .security-badge {
                display: inline-flex;
                align-items: center;
                gap: 0.75rem;
                padding: 0.75rem 1.5rem;
                background: rgba(124, 58, 237, 0.1);
                border: 1px solid rgba(124, 58, 237, 0.3);
                border-radius: 50px;
                margin-bottom: 2rem;
                color: var(--lighter-purple);
                font-size: 0.95rem;
                font-weight: 500;
            }

            .instruction-text {
                color: var(--text-gray);
                font-size: 1rem;
                margin-bottom: 2rem;
                line-height: 1.6;
            }

            .instruction-text strong {
                color: var(--text-light);
                font-weight: 600;
            }

            .app-icon-grid {
                display: flex;
                justify-content: center;
                gap: 1.5rem;
                margin-bottom: 2.5rem;
            }

            .app-icon {
                width: 60px;
                height: 60px;
                background: rgba(15, 15, 35, 0.7);
                border: 2px solid rgba(124, 58, 237, 0.3);
                border-radius: 16px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 1.5rem;
                color: var(--lighter-purple);
                transition: all 0.3s ease;
            }

            .app-icon:hover {
                transform: translateY(-3px);
                border-color: var(--primary-purple);
                box-shadow: 0 5px 15px rgba(124, 58, 237, 0.2);
            }

            .app-icon.google {
                color: #4285F4;
            }

            .app-icon.microsoft {
                color: #00A4EF;
            }

            .app-icon.authy {
                color: #EC681C;
            }

            .form-group {
                margin-bottom: 2rem;
            }

            .form-label {
                display: block;
                margin-bottom: 1rem;
                color: var(--text-light);
                font-weight: 600;
                font-size: 1.1rem;
                text-align: center;
            }

            .code-input-container {
                display: flex;
                justify-content: center;
                gap: 0.75rem;
                margin-bottom: 1rem;
            }

            .code-input {
                width: 55px;
                height: 65px;
                text-align: center;
                background: rgba(15, 15, 35, 0.7);
                border: 2px solid rgba(124, 58, 237, 0.3);
                border-radius: 12px;
                color: var(--text-light);
                font-family: 'Instrument Sans', sans-serif;
                font-size: 1.5rem;
                font-weight: 600;
                transition: all 0.3s ease;
            }

            .code-input:focus {
                outline: none;
                border-color: var(--primary-purple);
                box-shadow: 0 0 0 3px rgba(124, 58, 237, 0.1);
                background: rgba(15, 15, 35, 0.9);
                transform: translateY(-2px);
            }

            .code-input.filled {
                border-color: var(--success-green);
                background: rgba(16, 185, 129, 0.1);
            }

            .code-input.error {
                border-color: var(--error-red);
                background: rgba(239, 68, 68, 0.1);
            }

            .error-message {
                color: var(--error-red);
                font-size: 0.95rem;
                margin-top: 1rem;
                padding: 0.75rem 1rem;
                background: rgba(239, 68, 68, 0.1);
                border: 1px solid rgba(239, 68, 68, 0.3);
                border-radius: 8px;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 0.75rem;
                animation: shake 0.5s ease;
            }

            @keyframes shake {
                0%, 100% { transform: translateX(0); }
                25% { transform: translateX(-5px); }
                75% { transform: translateX(5px); }
            }

            .hint-text {
                color: var(--text-gray);
                font-size: 0.9rem;
                margin-top: 0.5rem;
                text-align: center;
            }

            .verification-button {
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

            .verification-button:hover:not(:disabled) {
                transform: translateY(-2px);
                box-shadow: 0 10px 25px rgba(124, 58, 237, 0.3);
                background: linear-gradient(135deg, var(--light-purple), var(--primary-purple));
            }

            .verification-button:active:not(:disabled) {
                transform: translateY(0);
            }

            .verification-button:disabled {
                opacity: 0.5;
                cursor: not-allowed;
            }

            .timer-container {
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 0.75rem;
                margin-bottom: 1.5rem;
                color: var(--text-gray);
                font-size: 0.95rem;
            }

            .timer {
                font-weight: 600;
                color: var(--lighter-purple);
                font-feature-settings: "tnum";
            }

            .timer.expiring {
                color: var(--error-red);
                animation: pulse 1s infinite;
            }

            @keyframes pulse {
                0%, 100% { opacity: 1; }
                50% { opacity: 0.5; }
            }

            .actions-container {
                display: flex;
                gap: 1rem;
                margin-top: 2rem;
            }

            .secondary-button {
                flex: 1;
                padding: 0.875rem;
                background: transparent;
                border: 2px solid rgba(124, 58, 237, 0.3);
                border-radius: 12px;
                color: var(--text-light);
                font-family: 'Instrument Sans', sans-serif;
                font-size: 0.95rem;
                font-weight: 500;
                cursor: pointer;
                transition: all 0.3s ease;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 0.75rem;
            }

            .secondary-button:hover {
                background: rgba(124, 58, 237, 0.1);
                border-color: var(--primary-purple);
                transform: translateY(-2px);
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
                animation: float 20s infinite ease-in-out;
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

            .qr-placeholder {
                width: 200px;
                height: 200px;
                background: linear-gradient(45deg, transparent 49%, rgba(124, 58, 237, 0.1) 50%, transparent 51%),
                            linear-gradient(-45deg, transparent 49%, rgba(124, 58, 237, 0.1) 50%, transparent 51%);
                background-size: 20px 20px;
                border: 2px dashed rgba(124, 58, 237, 0.3);
                border-radius: 12px;
                margin: 0 auto 2rem;
                display: flex;
                align-items: center;
                justify-content: center;
                position: relative;
                overflow: hidden;
            }

            .qr-placeholder::before {
                content: '';
                position: absolute;
                width: 180px;
                height: 180px;
                background: var(--card-bg);
                border-radius: 8px;
            }

            .qr-placeholder i {
                position: relative;
                z-index: 1;
                font-size: 3rem;
                color: rgba(124, 58, 237, 0.5);
            }

            @media (max-width: 640px) {
                .verification-container {
                    padding: 1rem;
                }
                
                .verification-card {
                    padding: 2rem 1.5rem;
                }
                
                .code-input-container {
                    gap: 0.5rem;
                }
                
                .code-input {
                    width: 45px;
                    height: 55px;
                    font-size: 1.25rem;
                }
                
                .app-icon-grid {
                    gap: 1rem;
                }
                
                .app-icon {
                    width: 50px;
                    height: 50px;
                    font-size: 1.25rem;
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

        <div class="verification-container">
            <div class="verification-card">
                <!-- Logo and Security Badge -->
                <div class="logo-container">
                    <div class="logo">
                        <div class="logo-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <span class="logo-text">SecureAuth</span>
                    </div>
                    <div class="security-badge">
                        <i class="fas fa-fingerprint"></i>
                        Two-Factor Authentication
                    </div>
                </div>

                <!-- Instruction Text -->
                <p class="instruction-text">
                    Masukkan <strong>kode 6 digit</strong> dari aplikasi autentikasi Anda untuk melanjutkan
                </p>

                <!-- App Icons -->
                <div class="app-icon-grid">
                    <div class="app-icon google" title="Google Authenticator">
                        <i class="fab fa-google"></i>
                    </div>
                    <div class="app-icon microsoft" title="Microsoft Authenticator">
                        <i class="fab fa-microsoft"></i>
                    </div>
                    <div class="app-icon authy" title="Authy">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                </div>

                <form method="POST" action="{{ route('2fa.verify') }}" id="verificationForm">
                    @csrf

                    <!-- 2FA Code Input -->
                    <div class="form-group">
                        <label for="code" class="form-label">
                            <i class="fas fa-key"></i>
                            Kode Verifikasi 2FA
                        </label>
                        
                        <div class="code-input-container">
                            @for($i = 0; $i < 6; $i++)
                                <input type="text" 
                                       class="code-input" 
                                       maxlength="1" 
                                       data-index="{{ $i }}"
                                       oninput="moveToNext(this, {{ $i }})"
                                       onkeydown="handleKeyDown(event, {{ $i }})">
                            @endfor
                        </div>
                        
                        <input type="hidden" name="code" id="fullCode">
                        
                        <!-- Error Message -->
                        @if ($errors->any())
                            <div class="error-message">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $errors->first('code') }}
                            </div>
                        @endif
                        
                        <p class="hint-text">
                            Kode akan berubah setiap 30 detik
                        </p>
                    </div>

                    <!-- Timer -->
                    <div class="timer-container">
                        <i class="fas fa-clock"></i>
                        <span>Kode berlaku: </span>
                        <span class="timer" id="countdown">30</span>
                        <span>detik</span>
                    </div>

                    <!-- Verification Button -->
                    <button type="submit" class="verification-button" id="verifyButton" disabled>
                        <i class="fas fa-check-circle"></i>
                        {{ __('Verifikasi') }}
                    </button>

                    <!-- Action Buttons -->
                    <div class="actions-container">
                        <button type="button" class="secondary-button" onclick="clearCode()">
                            <i class="fas fa-eraser"></i>
                            Clear
                        </button>
                        <button type="button" class="secondary-button" onclick="resendCode()">
                            <i class="fas fa-redo"></i>
                            Resend Code
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <script>
            // DOM Elements
            const codeInputs = document.querySelectorAll('.code-input');
            const fullCodeInput = document.getElementById('fullCode');
            const verifyButton = document.getElementById('verifyButton');
            const countdownElement = document.getElementById('countdown');
            
            let timer = 30;
            let countdownInterval;

            // Initialize
            document.addEventListener('DOMContentLoaded', () => {
                startTimer();
                focusFirstInput();
                
                // Add loading animation
                document.querySelector('.verification-card').style.opacity = '0';
                document.querySelector('.verification-card').style.transform = 'translateY(20px)';
                
                setTimeout(() => {
                    document.querySelector('.verification-card').style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                    document.querySelector('.verification-card').style.opacity = '1';
                    document.querySelector('.verification-card').style.transform = 'translateY(0)';
                }, 100);
            });

            // Timer functions
            function startTimer() {
                clearInterval(countdownInterval);
                timer = 30;
                updateTimerDisplay();
                
                countdownInterval = setInterval(() => {
                    timer--;
                    updateTimerDisplay();
                    
                    if (timer <= 0) {
                        clearInterval(countdownInterval);
                        showCodeExpired();
                    }
                }, 1000);
            }

            function updateTimerDisplay() {
                countdownElement.textContent = timer.toString().padStart(2, '0');
                
                if (timer <= 10) {
                    countdownElement.classList.add('expiring');
                } else {
                    countdownElement.classList.remove('expiring');
                }
            }

            function showCodeExpired() {
                const errorDiv = document.createElement('div');
                errorDiv.className = 'error-message';
                errorDiv.innerHTML = '<i class="fas fa-exclamation-triangle"></i> Kode telah kadaluarsa. Silakan minta kode baru.';
                
                const formGroup = document.querySelector('.form-group');
                formGroup.appendChild(errorDiv);
                
                // Clear all inputs
                clearCode();
                
                // Remove error after 5 seconds
                setTimeout(() => {
                    errorDiv.remove();
                }, 5000);
            }

            // Code input functions
            function moveToNext(input, index) {
                const value = input.value;
                
                // Only allow numbers
                if (!/^\d$/.test(value)) {
                    input.value = '';
                    return;
                }
                
                // Add filled class
                input.classList.add('filled');
                
                // Move to next input if available
                if (index < 5 && value !== '') {
                    codeInputs[index + 1].focus();
                }
                
                updateFullCode();
                checkCodeCompletion();
            }

            function handleKeyDown(event, index) {
                // Handle backspace
                if (event.key === 'Backspace') {
                    event.preventDefault();
                    
                    if (codeInputs[index].value === '' && index > 0) {
                        // Move to previous input if current is empty
                        codeInputs[index - 1].focus();
                        codeInputs[index - 1].value = '';
                        codeInputs[index - 1].classList.remove('filled');
                    } else {
                        // Clear current input
                        codeInputs[index].value = '';
                        codeInputs[index].classList.remove('filled');
                    }
                    
                    updateFullCode();
                    checkCodeCompletion();
                }
                
                // Handle arrow keys
                if (event.key === 'ArrowLeft' && index > 0) {
                    codeInputs[index - 1].focus();
                }
                if (event.key === 'ArrowRight' && index < 5) {
                    codeInputs[index + 1].focus();
                }
            }

            function updateFullCode() {
                let fullCode = '';
                codeInputs.forEach(input => {
                    fullCode += input.value;
                });
                fullCodeInput.value = fullCode;
            }

            function checkCodeCompletion() {
                const fullCode = fullCodeInput.value;
                const isComplete = fullCode.length === 6;
                
                // Enable/disable verify button
                verifyButton.disabled = !isComplete;
                
                // Add/remove error class
                codeInputs.forEach(input => {
                    if (isComplete) {
                        input.classList.remove('error');
                    }
                });
            }

            function clearCode() {
                codeInputs.forEach(input => {
                    input.value = '';
                    input.classList.remove('filled', 'error');
                });
                fullCodeInput.value = '';
                verifyButton.disabled = true;
                focusFirstInput();
            }

            function focusFirstInput() {
                if (codeInputs[0]) {
                    codeInputs[0].focus();
                }
            }

            function resendCode() {
                // Show loading state
                const resendButton = document.querySelector('[onclick="resendCode()"]');
                const originalHTML = resendButton.innerHTML;
                resendButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Mengirim...';
                resendButton.disabled = true;
                
                // Simulate API call
                setTimeout(() => {
                    // Reset timer
                    startTimer();
                    
                    // Clear inputs
                    clearCode();
                    
                    // Show success message
                    const successDiv = document.createElement('div');
                    successDiv.className = 'error-message';
                    successDiv.style.background = 'rgba(16, 185, 129, 0.1)';
                    successDiv.style.borderColor = 'rgba(16, 185, 129, 0.3)';
                    successDiv.style.color = 'var(--success-green)';
                    successDiv.innerHTML = '<i class="fas fa-check-circle"></i> Kode baru telah dikirim!';
                    
                    const formGroup = document.querySelector('.form-group');
                    const existingError = formGroup.querySelector('.error-message');
                    if (existingError) {
                        existingError.remove();
                    }
                    formGroup.appendChild(successDiv);
                    
                    // Reset button
                    resendButton.innerHTML = originalHTML;
                    resendButton.disabled = false;
                    
                    // Remove success message after 3 seconds
                    setTimeout(() => {
                        successDiv.remove();
                    }, 3000);
                }, 1500);
            }

            // Form submission
            document.getElementById('verificationForm').addEventListener('submit', function(e) {
                const fullCode = fullCodeInput.value;
                
                if (fullCode.length !== 6) {
                    e.preventDefault();
                    
                    // Show error
                    codeInputs.forEach(input => {
                        input.classList.add('error');
                    });
                    
                    const errorDiv = document.createElement('div');
                    errorDiv.className = 'error-message';
                    errorDiv.innerHTML = '<i class="fas fa-exclamation-circle"></i> Harap masukkan 6 digit kode lengkap';
                    
                    const formGroup = document.querySelector('.form-group');
                    const existingError = formGroup.querySelector('.error-message');
                    if (existingError) {
                        existingError.remove();
                    }
                    formGroup.appendChild(errorDiv);
                    
                    return false;
                }
                
                // Show loading state
                verifyButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memverifikasi...';
                verifyButton.disabled = true;
            });
        </script>
    </body>
</html>