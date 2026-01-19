<!DOCTYPE html>
<html lang="id" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - KostManage Pro</title>
    
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
        
        /* Background responsif */
        body {
            background: #764ba2;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow-x: hidden;
            padding: 20px;
        }
        
        /* Lingkaran bawah */
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
        
        /* Container utama */
        .register-container {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 1200px;
            min-height: 700px;
            margin: 20px auto;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        /* Card register */
        .register-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            overflow: hidden;
            display: flex;
            width: 100%;
            min-height: 650px;
            max-height: 90vh;
            animation: fadeIn 0.8s ease;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        /* Section brand */
        .brand-section {
            background: var(--gradient);
            padding: clamp(30px, 5vw, 60px);
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
            font-size: clamp(1.8rem, 4vw, 2.8rem);
            font-weight: 700;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .brand-logo i {
            background: white;
            color: var(--primary);
            width: clamp(50px, 8vw, 70px);
            height: clamp(50px, 8vw, 70px);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: clamp(1.5rem, 3vw, 2.5rem);
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        
        .brand-tagline {
            font-size: clamp(1rem, 1.5vw, 1.2rem);
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
            font-size: clamp(0.9rem, 1.2vw, 1.1rem);
        }
        
        .features-list i {
            background: rgba(255,255,255,0.2);
            width: clamp(35px, 5vw, 40px);
            height: clamp(35px, 5vw, 40px);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: clamp(1rem, 1.5vw, 1.2rem);
            flex-shrink: 0;
        }
        
        .brand-footer {
            margin-top: 40px;
            font-size: clamp(0.8rem, 1vw, 0.9rem);
            opacity: 0.8;
        }
        
        /* Section form - FIXED untuk scrollable */
        .form-section {
            padding: clamp(30px, 5vw, 60px);
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            flex: 1;
            overflow-y: auto;
            max-height: 100%;
        }
        
        .form-content {
            flex: 1;
            width: 100%;
        }
        
        .form-header {
            margin-bottom: 30px;
        }
        
        .form-header h2 {
            color: var(--dark);
            font-weight: 700;
            margin-bottom: 8px;
            font-size: clamp(1.5rem, 3vw, 2rem);
            line-height: 1.3;
        }
        
        .form-header p {
            color: #6b7280;
            font-size: clamp(0.9rem, 1.5vw, 1rem);
            line-height: 1.5;
        }
        
        /* PERBAIKAN UTAMA: Label yang tidak kepotong */
        .form-group {
            margin-bottom: 25px;
            position: relative;
            width: 100%;
        }
        
        .form-label-wrapper {
            margin-bottom: 10px;
            width: 100%;
        }
        
        .form-label {
            color: var(--dark);
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: clamp(0.95rem, 1.2vw, 1.05rem);
            line-height: 1.5;
            margin-bottom: 5px;
            flex-wrap: wrap;
        }
        
        .form-label i {
            color: var(--primary);
            font-size: 1rem;
            min-width: 20px;
        }
        
        .label-text {
            flex: 1;
            min-width: 0;
            word-wrap: break-word;
            overflow-wrap: break-word;
        }
        
        .label-optional {
            color: #6b7280;
            font-weight: 400;
            font-size: 0.9em;
            margin-left: 4px;
        }
        
        .input-group {
            position: relative;
            width: 100%;
        }
        
        .input-group .form-control {
            padding-left: 50px;
            padding-right: 50px;
            height: 55px;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
            width: 100%;
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
            padding: 5px;
        }
        
        .password-toggle:hover {
            color: var(--primary);
        }
        
        /* Password strength indicator */
        .password-strength {
            height: 6px;
            border-radius: 3px;
            margin-top: 8px;
            transition: all 0.3s;
            width: 0;
        }
        
        .strength-weak { 
            background-color: #dc3545; 
            width: 25%; 
        }
        
        .strength-fair { 
            background-color: #ffc107; 
            width: 50%; 
        }
        
        .strength-good { 
            background-color: #28a745; 
            width: 75%; 
        }
        
        .strength-strong { 
            background-color: #20c997; 
            width: 100%; 
        }
        
        .strength-text {
            font-size: 0.85rem;
            margin-top: 5px;
            min-height: 20px;
        }
        
        .password-match {
            font-size: 0.85rem;
            margin-top: 5px;
            min-height: 20px;
        }
        
        .form-text {
            font-size: 0.85rem;
            color: #6b7280;
            margin-top: 5px;
            display: block;
            line-height: 1.4;
        }
        
        .form-check {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-top: 5px;
            width: 100%;
        }
        
        .form-check-input {
            width: 18px;
            height: 18px;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 3px;
            flex-shrink: 0;
        }
        
        .form-check-input:checked {
            background-color: var(--primary);
            border-color: var(--primary);
        }
        
        .form-check-label {
            font-size: clamp(0.85rem, 1.2vw, 0.95rem);
            line-height: 1.5;
            flex: 1;
            min-width: 0;
            word-wrap: break-word;
            overflow-wrap: break-word;
        }
        
        .terms-link {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            white-space: nowrap;
        }
        
        .terms-link:hover {
            text-decoration: underline;
        }
        
        .btn-register {
            background: var(--gradient);
            color: white;
            border: none;
            padding: 16px;
            border-radius: 12px;
            font-weight: 600;
            font-size: clamp(1rem, 1.5vw, 1.1rem);
            width: 100%;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 15px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            height: 55px;
        }
        
        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }
        
        .login-link {
            text-align: center;
            color: #6b7280;
            margin-top: 25px;
            padding-top: 15px;
            border-top: 1px solid #e5e7eb;
            font-size: clamp(0.85rem, 1.2vw, 0.95rem);
        }
        
        .login-link a {
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
            margin-left: 5px;
        }
        
        .login-link a:hover {
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
        
        .btn-register.loading .loader {
            display: block;
        }
        
        .btn-register.loading span {
            display: none;
        }
        
        /* Error message styling */
        .invalid-feedback {
            display: block;
            margin-top: 8px;
            color: var(--danger);
            font-size: 0.85rem;
            line-height: 1.4;
        }
        
        .invalid-feedback i {
            margin-right: 5px;
        }
        
        .is-invalid {
            border-color: var(--danger) !important;
        }
        
        .is-invalid:focus {
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1) !important;
        }
        
        /* Responsive Design - PERBAIKAN SCROLL */
        /* Tablet */
        @media (max-width: 992px) {
            body {
                padding: 15px;
                align-items: flex-start;
            }
            
            .register-container {
                min-height: 100vh;
                margin: 0;
                align-items: flex-start;
            }
            
            .register-card {
                flex-direction: column;
                min-height: auto;
                max-height: 90vh;
                margin: 20px 0;
            }
            
            .brand-section {
                padding: 30px;
                flex: 0 0 auto;
            }
            
            .form-section {
                padding: 30px;
                overflow-y: auto;
                flex: 1;
                min-height: 0;
            }
            
            .brand-logo {
                justify-content: center;
            }
            
            .brand-tagline {
                text-align: center;
            }
            
            .features-list li {
                font-size: 1rem;
            }
            
            .form-group {
                margin-bottom: 20px;
            }
        }
        
        /* Mobile (portrait) - FIXED untuk scrollable */
        @media (max-width: 576px) {
            body {
                padding: 0;
                align-items: flex-start;
                background: #764ba2;
                height: 100vh;
                overflow: hidden;
            }
            
            .register-container {
                margin: 0;
                width: 100%;
                height: 100vh;
                max-width: 100%;
                min-height: 100vh;
                padding: 0;
                align-items: stretch;
            }
            
            .register-card {
                border-radius: 0;
                min-height: 100vh;
                max-height: 100vh;
                flex-direction: column;
                margin: 0;
                width: 100%;
                height: 100%;
            }
            
            .brand-section {
                padding: 25px 20px;
                flex: 0 0 auto;
                max-height: 40vh;
                overflow-y: auto;
            }
            
            .form-section {
                padding: 25px 20px;
                overflow-y: auto;
                flex: 1;
                min-height: 0;
                max-height: 60vh;
            }
            
            .form-content {
                min-height: min-content;
            }
            
            .brand-logo {
                font-size: 1.6rem;
            }
            
            .brand-logo i {
                width: 50px;
                height: 50px;
                font-size: 1.8rem;
            }
            
            .brand-tagline {
                font-size: 0.95rem;
                margin-bottom: 25px;
            }
            
            .features-list {
                margin: 15px 0;
            }
            
            .features-list li {
                font-size: 0.9rem;
                margin-bottom: 12px;
            }
            
            .features-list i {
                width: 35px;
                height: 35px;
                font-size: 1rem;
            }
            
            .form-header {
                margin-bottom: 20px;
            }
            
            .form-header h2 {
                font-size: 1.5rem;
            }
            
            .form-header p {
                font-size: 0.9rem;
            }
            
            .form-label {
                font-size: 0.95rem;
                margin-bottom: 8px;
            }
            
            .input-group .form-control {
                height: 50px;
                font-size: 0.95rem;
                padding-left: 45px;
                padding-right: 45px;
            }
            
            .input-group-icon {
                left: 15px;
                font-size: 1.1rem;
            }
            
            .password-toggle {
                right: 15px;
                font-size: 1.1rem;
            }
            
            .btn-register {
                height: 50px;
                font-size: 1rem;
                margin-top: 10px;
                margin-bottom: 15px;
            }
            
            .form-check-label {
                font-size: 0.85rem;
            }
            
            .login-link {
                margin-top: 20px;
                padding-top: 15px;
            }
        }
        
        /* Mobile landscape */
        @media (max-height: 600px) and (orientation: landscape) {
            body {
                padding: 10px;
                align-items: flex-start;
                height: 100vh;
                overflow: hidden;
            }
            
            .register-container {
                min-height: 100vh;
                margin: 0;
                height: 100vh;
            }
            
            .register-card {
                min-height: 95vh;
                max-height: 95vh;
                margin: 10px 0;
            }
            
            .brand-section {
                padding: 20px;
                flex: 0 0 40%;
                overflow-y: auto;
                max-height: 100%;
            }
            
            .form-section {
                padding: 20px;
                overflow-y: auto;
                flex: 1;
                min-height: 0;
            }
            
            .features-list {
                margin: 10px 0;
            }
            
            .features-list li {
                margin-bottom: 8px;
                font-size: 0.85rem;
            }
            
            .form-group {
                margin-bottom: 15px;
            }
        }
        
        /* Desktop besar */
        @media (min-width: 1400px) {
            .register-container {
                max-width: 1300px;
            }
            
            .register-card {
                min-height: 750px;
            }
        }
        
        /* Desktop kecil */
        @media (max-width: 1200px) and (min-width: 993px) {
            .register-card {
                min-height: 600px;
            }
            
            .brand-section, .form-section {
                padding: 40px;
            }
        }
        
        /* Custom scrollbar untuk form-section */
        .form-section::-webkit-scrollbar {
            width: 6px;
        }
        
        .form-section::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        
        .form-section::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 10px;
        }
        
        .form-section::-webkit-scrollbar-thumb:hover {
            background: #a8a8a8;
        }
        
        /* Custom scrollbar untuk brand-section di mobile */
        .brand-section::-webkit-scrollbar {
            width: 4px;
        }
        
        .brand-section::-webkit-scrollbar-track {
            background: rgba(255,255,255,0.1);
            border-radius: 10px;
        }
        
        .brand-section::-webkit-scrollbar-thumb {
            background: rgba(255,255,255,0.3);
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <!-- Floating Particles -->
    <div class="floating-particles" id="particles"></div>
    
    <!-- Alerts Container -->
    <div id="alertsContainer"></div>
    
    <div class="register-container animate__animated animate__fadeIn">
        <div class="register-card">
            <!-- Brand Section -->
            <div class="brand-section">
                <div class="brand-logo">
                    <i class="fas fa-home"></i>
                    <span>KostManage<span style="color: #fbbf24;">Pro</span></span>
                </div>
                
                <p class="brand-tagline">
                    Bergabunglah dengan platform manajemen kost terintegrasi untuk mengelola properti Anda dengan mudah, cepat, dan efisien.
                </p>
                
                <ul class="features-list">
                    <li><i class="fas fa-user-plus"></i> Registrasi mudah dan cepat</li>
                    <li><i class="fas fa-chart-line"></i> Dashboard analitik real-time</li>
                    <li><i class="fas fa-money-check-alt"></i> Sistem pembayaran otomatis</li>
                    <li><i class="fas fa-robot"></i> Laporan keuangan instan</li>
                    <li><i class="fas fa-shield-alt"></i> Keamanan data terenkripsi</li>
                </ul>
                
                <div class="brand-footer">
                    <p>© 2024 KostManage Pro. Semua hak dilindungi.</p>
                </div>
            </div>
            
            <!-- Form Section - SCROLLABLE -->
            <div class="form-section">
                <div class="form-content">
                    <div class="form-header">
                        <h2>Buat Akun Baru</h2>
                        <p>Isi data berikut untuk mulai mengelola kost Anda</p>
                    </div>
                    
                    @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        <strong>Perhatian:</strong> Mohon perbaiki kesalahan berikut:
                        <ul class="mb-0 mt-2 ps-3">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif
                    
                    <form method="POST" action="{{ route('register') }}" id="registerForm">
                        @csrf
                        
                        <div class="form-group">
                            <div class="form-label-wrapper">
                                <label class="form-label">
                                    <i class="fas fa-user"></i>
                                    <span class="label-text">Nama Lengkap</span>
                                </label>
                            </div>
                            <div class="input-group">
                                <span class="input-group-icon">
                                    <i class="fas fa-user-circle"></i>
                                </span>
                                <input type="text" 
                                       class="form-control @error('name') is-invalid @enderror" 
                                       id="name" 
                                       name="name" 
                                       value="{{ old('name') }}"
                                       placeholder="Masukkan nama lengkap Anda"
                                       required
                                       autocomplete="name"
                                       autofocus>
                            </div>
                            @error('name')
                                <div class="invalid-feedback">
                                    <i class="fas fa-exclamation-circle me-1"></i> {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <div class="form-label-wrapper">
                                <label class="form-label">
                                    <i class="fas fa-phone"></i>
                                    <span class="label-text">Nomor Telepon</span>
                                    <span class="label-optional">(Opsional)</span>
                                </label>
                            </div>
                            <div class="input-group">
                                <span class="input-group-icon">
                                    <i class="fas fa-mobile-alt"></i>
                                </span>
                                <input type="tel" 
                                       class="form-control @error('phone') is-invalid @enderror" 
                                       id="phone" 
                                       name="phone" 
                                       value="{{ old('phone') }}"
                                       placeholder="Contoh: 0812-3456-7890"
                                       autocomplete="tel">
                            </div>
                            <span class="form-text">Digunakan untuk notifikasi dan komunikasi</span>
                            @error('phone')
                                <div class="invalid-feedback">
                                    <i class="fas fa-exclamation-circle me-1"></i> {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <div class="form-label-wrapper">
                                <label class="form-label">
                                    <i class="fas fa-envelope"></i>
                                    <span class="label-text">Email</span>
                                </label>
                            </div>
                            <div class="input-group">
                                <span class="input-group-icon">
                                    <i class="fas fa-at"></i>
                                </span>
                                <input type="email" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       id="email" 
                                       name="email" 
                                       value="{{ old('email') }}"
                                       placeholder="Masukkan email Anda"
                                       required
                                       autocomplete="email">
                            </div>
                            <span class="form-text">Email ini akan digunakan untuk login dan notifikasi</span>
                            @error('email')
                                <div class="invalid-feedback">
                                    <i class="fas fa-exclamation-circle me-1"></i> {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <div class="form-label-wrapper">
                                <label class="form-label">
                                    <i class="fas fa-lock"></i>
                                    <span class="label-text">Password</span>
                                </label>
                            </div>
                            <div class="input-group">
                                <span class="input-group-icon">
                                    <i class="fas fa-key"></i>
                                </span>
                                <input type="password" 
                                       class="form-control @error('password') is-invalid @enderror" 
                                       id="password" 
                                       name="password" 
                                       placeholder="Minimal 6 karakter"
                                       required
                                       autocomplete="new-password">
                                <button type="button" class="password-toggle" id="togglePassword">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <div class="password-strength" id="passwordStrength"></div>
                            <div class="strength-text" id="strengthText"></div>
                            <span class="form-text">Gunakan kombinasi huruf besar, kecil, angka, dan simbol</span>
                            @error('password')
                                <div class="invalid-feedback">
                                    <i class="fas fa-exclamation-circle me-1"></i> {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <div class="form-label-wrapper">
                                <label class="form-label">
                                    <i class="fas fa-lock"></i>
                                    <span class="label-text">Konfirmasi Password</span>
                                </label>
                            </div>
                            <div class="input-group">
                                <span class="input-group-icon">
                                    <i class="fas fa-key"></i>
                                </span>
                                <input type="password" 
                                       class="form-control" 
                                       id="password_confirmation" 
                                       name="password_confirmation" 
                                       placeholder="Ulangi password Anda"
                                       required
                                       autocomplete="new-password">
                                <button type="button" class="password-toggle" id="toggleConfirmPassword">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <div id="passwordMatch" class="password-match"></div>
                        </div>
                        
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input @error('terms') is-invalid @enderror" 
                                       type="checkbox" 
                                       id="terms" 
                                       name="terms" 
                                       required>
                                <label class="form-check-label" for="terms">
                                    Saya setuju dengan 
                                    <a href="#" class="terms-link">Syarat & Ketentuan</a> 
                                    dan 
                                    <a href="#" class="terms-link">Kebijakan Privasi</a>
                                    KostManage Pro
                                </label>
                            </div>
                            @error('terms')
                                <div class="invalid-feedback">
                                    <i class="fas fa-exclamation-circle me-1"></i> {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <button type="submit" class="btn-register" id="registerBtn">
                            <span>Daftar Sekarang</span>
                            <div class="loader"></div>
                        </button>
                    </form>
                    
                    <div class="login-link">
                        Sudah punya akun?
                        <a href="{{ route('login') }}">Masuk di sini</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Create floating particles
        function createParticles() {
            const container = document.getElementById('particles');
            const particleCount = window.innerWidth < 768 ? 8 : 15;
            
            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.classList.add('particle');
                
                // Random size and position
                const size = Math.random() * 15 + 5;
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
        
        // Toggle confirm password visibility
        document.getElementById('toggleConfirmPassword').addEventListener('click', function() {
            const confirmPasswordInput = document.getElementById('password_confirmation');
            const icon = this.querySelector('i');
            
            if (confirmPasswordInput.type === 'password') {
                confirmPasswordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                confirmPasswordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
        
        // Password strength checker
        function checkPasswordStrength(password) {
            let strength = 0;
            let feedback = '';
            
            // Length check
            if (password.length >= 6) strength++;
            if (password.length >= 8) strength++;
            
            // Character type checks
            const hasLower = /[a-z]/.test(password);
            const hasUpper = /[A-Z]/.test(password);
            const hasNumber = /[0-9]/.test(password);
            const hasSpecial = /[^a-zA-Z0-9]/.test(password);
            
            if (hasLower) strength++;
            if (hasUpper) strength++;
            if (hasNumber) strength++;
            if (hasSpecial) strength++;
            
            // Feedback
            if (password.length < 6) {
                feedback = 'Password terlalu pendek';
            } else if (strength < 3) {
                feedback = 'Password lemah';
            } else if (strength < 4) {
                feedback = 'Password cukup';
            } else if (strength < 5) {
                feedback = 'Password baik';
            } else {
                feedback = 'Password sangat kuat';
            }
            
            return { strength, feedback };
        }
        
        document.getElementById('password').addEventListener('input', function() {
            const password = this.value;
            const strengthBar = document.getElementById('passwordStrength');
            const strengthText = document.getElementById('strengthText');
            
            if (password.length === 0) {
                strengthBar.className = 'password-strength';
                strengthBar.style.width = '0';
                strengthText.textContent = '';
                strengthText.style.color = '';
                return;
            }
            
            const { strength, feedback } = checkPasswordStrength(password);
            
            // Reset classes
            strengthBar.className = 'password-strength';
            
            // Set strength indicator
            if (strength < 3) {
                strengthBar.classList.add('strength-weak');
                strengthText.textContent = feedback;
                strengthText.style.color = '#dc3545';
            } else if (strength < 4) {
                strengthBar.classList.add('strength-fair');
                strengthText.textContent = feedback;
                strengthText.style.color = '#ffc107';
            } else if (strength < 5) {
                strengthBar.classList.add('strength-good');
                strengthText.textContent = feedback;
                strengthText.style.color = '#28a745';
            } else {
                strengthBar.classList.add('strength-strong');
                strengthText.textContent = feedback;
                strengthText.style.color = '#20c997';
            }
            
            checkPasswordMatch();
        });
        
        // Password match checker
        function checkPasswordMatch() {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('password_confirmation').value;
            const matchText = document.getElementById('passwordMatch');
            
            if (password && confirmPassword) {
                if (password === confirmPassword) {
                    matchText.innerHTML = '<span class="text-success"><i class="fas fa-check-circle me-1"></i>Password cocok</span>';
                } else {
                    matchText.innerHTML = '<span class="text-danger"><i class="fas fa-times-circle me-1"></i>Password tidak cocok</span>';
                }
            } else {
                matchText.innerHTML = '';
            }
        }
        
        document.getElementById('password_confirmation').addEventListener('input', checkPasswordMatch);
        
        // Form submission with validation
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            const name = document.getElementById('name').value.trim();
            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('password_confirmation').value;
            const terms = document.getElementById('terms').checked;
            const registerBtn = document.getElementById('registerBtn');
            
            // Basic validation
            let hasError = false;
            
            if (!name) {
                showAlert('warning', 'Mohon isi nama lengkap');
                hasError = true;
            }
            
            if (!email) {
                showAlert('warning', 'Mohon isi email');
                hasError = true;
            }
            
            if (!password) {
                showAlert('warning', 'Mohon isi password');
                hasError = true;
            }
            
            if (!confirmPassword) {
                showAlert('warning', 'Mohon konfirmasi password');
                hasError = true;
            }
            
            if (!terms) {
                showAlert('warning', 'Anda harus menyetujui Syarat & Ketentuan');
                hasError = true;
            }
            
            if (password && password.length < 6) {
                showAlert('warning', 'Password harus minimal 6 karakter');
                hasError = true;
            }
            
            if (password !== confirmPassword) {
                showAlert('warning', 'Password dan konfirmasi password tidak cocok');
                hasError = true;
            }
            
            if (hasError) {
                e.preventDefault();
                return false;
            }
            
            // Add loading state
            registerBtn.classList.add('loading');
            
            // Simulate API call delay
            setTimeout(() => {
                registerBtn.classList.remove('loading');
            }, 2000);
            
            // If there are validation errors, remove loading state
            const errors = document.querySelectorAll('.is-invalid');
            if (errors.length > 0) {
                registerBtn.classList.remove('loading');
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
        
        // Adjust layout on window resize
        function adjustLayout() {
            const formSection = document.querySelector('.form-section');
            const brandSection = document.querySelector('.brand-section');
            
            // Reset heights
            formSection.style.maxHeight = '';
            brandSection.style.maxHeight = '';
            
            // Untuk mobile portrait
            if (window.innerWidth <= 576) {
                const windowHeight = window.innerHeight;
                formSection.style.maxHeight = '60vh';
                brandSection.style.maxHeight = '40vh';
            }
            
            // Untuk mobile landscape
            if (window.innerHeight < 600 && window.innerWidth > window.innerHeight) {
                formSection.style.maxHeight = '70vh';
                brandSection.style.maxHeight = '30vh';
            }
        }
        
        // Initialize particles and layout on load
        document.addEventListener('DOMContentLoaded', function() {
            createParticles();
            adjustLayout();
            
            // Add animation to form elements
            const formGroups = document.querySelectorAll('.form-group');
            formGroups.forEach((group, index) => {
                group.style.animationDelay = `${index * 0.1}s`;
                group.classList.add('animate__animated', 'animate__fadeInUp');
            });
            
            // Animate the register button
            const registerBtn = document.getElementById('registerBtn');
            registerBtn.style.animationDelay = '0.6s';
            registerBtn.classList.add('animate__animated', 'animate__fadeInUp');
            
            // Check password match on load if values exist
            checkPasswordMatch();
            
            // Auto-focus on name field
            setTimeout(() => {
                document.getElementById('name').focus();
            }, 300);
            
            // Ensure form section is scrollable
            const formContent = document.querySelector('.form-content');
            if (formContent.scrollHeight > document.querySelector('.form-section').clientHeight) {
                document.querySelector('.form-section').classList.add('scrollable');
            }
        });
        
        // Adjust layout on window resize
        window.addEventListener('resize', function() {
            adjustLayout();
        });
        
        // Prevent form from submitting on Enter key press except for button
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' && e.target.type !== 'submit' && e.target.type !== 'button') {
                e.preventDefault();
            }
        });
    </script>
</body>
</html>