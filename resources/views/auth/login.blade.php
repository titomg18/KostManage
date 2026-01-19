<!DOCTYPE html>
<html lang="id" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - KostManage Pro</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    
    <style>
        :root {
            --primary: #667eea;
            --secondary: #764ba2;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --dark: #1f2937;
            --light: #f9fafb;
            --gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --shadow: 0 20px 40px rgba(0,0,0,0.1);
            --radius: 20px;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        
        body {
            background: var(--gradient);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow-x: hidden;
        }
        
        body::before {
            content: '';
            position: absolute;
            width: 400px;
            height: 400px;
            background: linear-gradient(135deg, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0.05) 100%);
            border-radius: 50%;
            top: -200px;
            right: -200px;
            z-index: 1;
        }
        
        body::after {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            background: linear-gradient(135deg, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0.05) 100%);
            border-radius: 50%;
            bottom: -150px;
            left: -150px;
            z-index: 1;
        }
        
        .login-container {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 1200px;
            min-height: 700px;
        }
        
        .login-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            overflow: hidden;
            display: flex;
            min-height: 700px;
            animation: fadeIn 0.8s ease;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .brand-section {
            background: var(--gradient);
            padding: 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            color: white;
            position: relative;
            overflow: hidden;
            flex: 1;
        }
        
        .brand-section::before {
            content: '';
            position: absolute;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 1px, transparent 1px);
            background-size: 50px 50px;
            top: -50%;
            left: -50%;
            opacity: 0.3;
        }
        
        .brand-logo {
            font-size: 2.8rem;
            font-weight: 700;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .brand-logo i {
            background: white;
            color: var(--primary);
            width: 70px;
            height: 70px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        
        .brand-tagline {
            font-size: 1.2rem;
            opacity: 0.9;
            margin-bottom: 40px;
            line-height: 1.6;
        }
        
        .features-list {
            list-style: none;
            margin: 30px 0;
        }
        
        .features-list li {
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 15px;
            font-size: 1.1rem;
        }
        
        .features-list i {
            background: rgba(255,255,255,0.2);
            width: 40px;
            height: 40px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }
        
        .brand-footer {
            margin-top: 40px;
            font-size: 0.9rem;
            opacity: 0.8;
        }
        
        .form-section {
            padding: 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            flex: 1;
        }
        
        .form-header {
            margin-bottom: 40px;
        }
        
        .form-header h2 {
            color: var(--dark);
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .form-header p {
            color: #6b7280;
        }
        
        .form-group {
            margin-bottom: 25px;
            position: relative;
        }
        
        .form-label {
            color: var(--dark);
            font-weight: 500;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .input-group {
            position: relative;
        }
        
        .input-group .form-control {
            padding-left: 50px;
            padding-right: 50px;
            height: 55px;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        
        .input-group .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        
        .input-group-icon {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            z-index: 10;
            font-size: 1.2rem;
        }
        
        .password-toggle {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #9ca3af;
            cursor: pointer;
            z-index: 10;
            font-size: 1.2rem;
        }
        
        .password-toggle:hover {
            color: var(--primary);
        }
        
        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        
        .form-check {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .form-check-input {
            width: 18px;
            height: 18px;
            border-radius: 4px;
            cursor: pointer;
        }
        
        .form-check-input:checked {
            background-color: var(--primary);
            border-color: var(--primary);
        }
        
        .forgot-link {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }
        
        .forgot-link:hover {
            color: var(--secondary);
        }
        
        .btn-login {
            background: var(--gradient);
            color: white;
            border: none;
            padding: 16px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1.1rem;
            width: 100%;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }
        
        .divider {
            text-align: center;
            position: relative;
            margin: 30px 0;
            color: #9ca3af;
        }
        
        .divider::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            width: 45%;
            height: 1px;
            background: #e5e7eb;
        }
        
        .divider::after {
            content: '';
            position: absolute;
            right: 0;
            top: 50%;
            width: 45%;
            height: 1px;
            background: #e5e7eb;
        }
        
        .social-login {
            display: flex;
            gap: 15px;
            margin-bottom: 30px;
        }
        
        .social-btn {
            flex: 1;
            padding: 14px;
            border-radius: 12px;
            border: 2px solid #e5e7eb;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            font-weight: 500;
            color: var(--dark);
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .social-btn:hover {
            border-color: var(--primary);
            transform: translateY(-2px);
        }
        
        .social-btn.google i { color: #ea4335; }
        .social-btn.facebook i { color: #1877f2; }
        
        .register-link {
            text-align: center;
            color: #6b7280;
            margin-top: 30px;
        }
        
        .register-link a {
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
            margin-left: 5px;
        }
        
        .register-link a:hover {
            text-decoration: underline;
        }
        
        .floating-alert {
            position: fixed;
            top: 30px;
            right: 30px;
            z-index: 9999;
            min-width: 300px;
            animation: slideInRight 0.5s ease;
        }
        
        @keyframes slideInRight {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        
        /* Responsive */
        @media (max-width: 992px) {
            .login-card {
                flex-direction: column;
                max-width: 500px;
            }
            
            .brand-section {
                padding: 40px;
            }
            
            .form-section {
                padding: 40px;
            }
            
            .brand-logo {
                font-size: 2.2rem;
            }
            
            .brand-logo i {
                width: 60px;
                height: 60px;
                font-size: 2rem;
            }
        }
        
        @media (max-width: 576px) {
            .login-container {
                padding: 10px;
            }
            
            .brand-section,
            .form-section {
                padding: 30px 20px;
            }
            
            .brand-logo {
                font-size: 1.8rem;
            }
            
            .social-login {
                flex-direction: column;
            }
        }
        
        /* Floating Particles Animation */
        .floating-particles {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 1;
            pointer-events: none;
        }
        
        .particle {
            position: absolute;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            animation: float 15s infinite linear;
        }
        
        @keyframes float {
            0% { transform: translateY(0) rotate(0deg); }
            100% { transform: translateY(-1000px) rotate(720deg); }
        }
        
        /* Loading animation */
        .loader {
            display: none;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255,255,255,0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 1s ease-in-out infinite;
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        
        .btn-login.loading .loader {
            display: block;
        }
        
        .btn-login.loading span {
            display: none;
        }
    </style>
</head>
<body>
    <!-- Floating Particles -->
    <div class="floating-particles" id="particles"></div>
    
    <!-- Alerts Container -->
    <div id="alertsContainer"></div>
    
    <div class="login-container animate__animated animate__fadeIn">
        <div class="login-card">
            <!-- Brand Section -->
            <div class="brand-section">
                <div class="brand-logo">
                    <i class="fas fa-home"></i>
                    <span>KostManage<span style="color: #fbbf24;">Pro</span></span>
                </div>
                
                <p class="brand-tagline">
                    Platform manajemen kost terintegrasi yang membantu Anda mengelola properti dengan mudah, cepat, dan efisien.
                </p>
                
                <ul class="features-list">
                    <li><i class="fas fa-chart-line"></i> Dashboard analitik real-time</li>
                    <li><i class="fas fa-money-check-alt"></i> Sistem pembayaran otomatis</li>
                    <li><i class="fas fa-robot"></i> Laporan keuangan instan</li>
                    <li><i class="fas fa-mobile-alt"></i> Aplikasi mobile-friendly</li>
                    <li><i class="fas fa-shield-alt"></i> Keamanan data terenkripsi</li>
                </ul>
                
                <div class="brand-footer">
                    <p>© 2024 KostManage Pro. Semua hak dilindungi.</p>
                </div>
            </div>
            
            <!-- Form Section -->
            <div class="form-section">
                <div class="form-header">
                    <h2>Masuk ke Dashboard</h2>
                    <p>Silakan masuk untuk mengelola kost Anda</p>
                </div>
                
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endif
                
                @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endif
                
                <form method="POST" action="{{ route('login') }}" id="loginForm">
                    @csrf
                    
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-envelope"></i>
                            Email
                        </label>
                        <div class="input-group">
                            <span class="input-group-icon">
                                <i class="fas fa-user"></i>
                            </span>
                            <input type="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   id="email" 
                                   name="email" 
                                   value="{{ old('email') }}"
                                   placeholder="masukkan email Anda"
                                   required
                                   autocomplete="email"
                                   autofocus>
                        </div>
                        @error('email')
                            <div class="invalid-feedback d-block mt-2">
                                <i class="fas fa-exclamation-circle me-1"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-lock"></i>
                            Password
                        </label>
                        <div class="input-group">
                            <span class="input-group-icon">
                                <i class="fas fa-key"></i>
                            </span>
                            <input type="password" 
                                   class="form-control @error('password') is-invalid @enderror" 
                                   id="password" 
                                   name="password" 
                                   placeholder="masukkan password Anda"
                                   required
                                   autocomplete="current-password">
                            <button type="button" class="password-toggle" id="togglePassword">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        @error('password')
                            <div class="invalid-feedback d-block mt-2">
                                <i class="fas fa-exclamation-circle me-1"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="form-options">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember" name="remember">
                            <label class="form-check-label" for="remember">Ingat saya</label>
                        </div>
                        <a href="#" class="forgot-link">Lupa password?</a>
                    </div>
                    
                    <button type="submit" class="btn-login" id="loginBtn">
                        <span>Masuk</span>
                        <div class="loader"></div>
                    </button>
                </form>
                
                <div class="divider">
                    <span>Atau masuk dengan</span>
                </div>
                
                <div class="social-login">
                    <button type="button" class="social-btn google">
                        <i class="fab fa-google"></i>
                        <span>Google</span>
                    </button>
                    <button type="button" class="social-btn facebook">
                        <i class="fab fa-facebook-f"></i>
                        <span>Facebook</span>
                    </button>
                </div>
                
                <div class="register-link">
                    Belum punya akun?
                    <a href="{{ route('register') }}">Daftar Gratis</a>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Create floating particles
        function createParticles() {
            const container = document.getElementById('particles');
            const particleCount = 15;
            
            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.classList.add('particle');
                
                // Random size and position
                const size = Math.random() * 20 + 5;
                const left = Math.random() * 100;
                const top = Math.random() * 100;
                const animationDuration = Math.random() * 20 + 10;
                const animationDelay = Math.random() * 5;
                
                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;
                particle.style.left = `${left}%`;
                particle.style.top = `${top}%`;
                particle.style.animationDuration = `${animationDuration}s`;
                particle.style.animationDelay = `${animationDelay}s`;
                
                container.appendChild(particle);
            }
        }
        
        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
        
        // Form submission with loading animation
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value.trim();
            const loginBtn = document.getElementById('loginBtn');
            
            if (!email || !password) {
                e.preventDefault();
                showAlert('warning', 'Mohon isi email dan password');
                return false;
            }
            
            // Add loading state
            loginBtn.classList.add('loading');
            
            // Simulate API call delay
            setTimeout(() => {
                loginBtn.classList.remove('loading');
            }, 2000);
            
            // If there are validation errors, remove loading state
            const errors = document.querySelectorAll('.is-invalid');
            if (errors.length > 0) {
                loginBtn.classList.remove('loading');
            }
        });
        
        // Show custom alert
        function showAlert(type, message) {
            const alertTypes = {
                success: { icon: 'check-circle', color: 'success' },
                error: { icon: 'exclamation-circle', color: 'danger' },
                warning: { icon: 'exclamation-triangle', color: 'warning' },
                info: { icon: 'info-circle', color: 'info' }
            };
            
            const alertConfig = alertTypes[type] || alertTypes.info;
            
            const alertHTML = `
                <div class="floating-alert alert alert-${alertConfig.color} alert-dismissible fade show" role="alert">
                    <i class="fas fa-${alertConfig.icon} me-2"></i>
                    ${message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            `;
            
            const container = document.getElementById('alertsContainer');
            container.innerHTML = alertHTML;
            
            // Auto remove after 5 seconds
            setTimeout(() => {
                const alert = container.querySelector('.alert');
                if (alert) {
                    alert.remove();
                }
            }, 5000);
        }
        
        // Auto-dismiss Bootstrap alerts after 5 seconds
        setTimeout(() => {
            const alerts = document.querySelectorAll('.alert:not(.floating-alert)');
            alerts.forEach(alert => {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);
        
        // Initialize particles on load
        document.addEventListener('DOMContentLoaded', function() {
            createParticles();
            
            // Add animation to form elements
            const formElements = document.querySelectorAll('.form-control');
            formElements.forEach((element, index) => {
                element.style.animationDelay = `${index * 0.1}s`;
                element.classList.add('animate__animated', 'animate__fadeInUp');
            });
            
            // Animate the login button
            const loginBtn = document.getElementById('loginBtn');
            loginBtn.style.animationDelay = '0.4s';
            loginBtn.classList.add('animate__animated', 'animate__fadeInUp');
            
            // Social buttons animation
            const socialBtns = document.querySelectorAll('.social-btn');
            socialBtns.forEach((btn, index) => {
                btn.style.animationDelay = `${0.5 + index * 0.1}s`;
                btn.classList.add('animate__animated', 'animate__fadeInUp');
            });
        });
    </script>
</body>
</html>