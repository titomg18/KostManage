<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - KostManage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3a0ca3;
            --accent-color: #4cc9f0;
            --success-color: #2a9d8f;
            --warning-color: #e9c46a;
        }
        
        body {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .register-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .register-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 800px;
            overflow: hidden;
        }
        
        .register-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        
        .app-logo {
            font-size: 2.5rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-bottom: 10px;
        }
        
        .app-logo i {
            color: var(--accent-color);
            font-size: 3rem;
        }
        
        .register-body {
            padding: 40px;
        }
        
        .progress-bar-custom {
            height: 8px;
            background-color: #e9ecef;
            border-radius: 4px;
            margin-bottom: 30px;
            overflow: hidden;
        }
        
        .progress-bar-fill {
            height: 100%;
            background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
            width: 33.33%;
            border-radius: 4px;
            transition: width 0.3s;
        }
        
        .step-indicator {
            display: flex;
            justify-content: space-between;
            margin-top: -20px;
            margin-bottom: 30px;
        }
        
        .step {
            text-align: center;
            position: relative;
            flex: 1;
        }
        
        .step-number {
            width: 40px;
            height: 40px;
            background: #e9ecef;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
            font-weight: bold;
            color: #6c757d;
            border: 3px solid white;
            z-index: 1;
            position: relative;
        }
        
        .step.active .step-number {
            background: var(--primary-color);
            color: white;
        }
        
        .step.completed .step-number {
            background: var(--success-color);
            color: white;
        }
        
        .step-text {
            font-size: 0.9rem;
            color: #6c757d;
        }
        
        .step.active .step-text {
            color: var(--primary-color);
            font-weight: 600;
        }
        
        .form-control {
            padding: 12px 15px;
            border-radius: 10px;
            border: 2px solid #e0e0e0;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(67, 97, 238, 0.25);
        }
        
        .password-strength {
            height: 6px;
            border-radius: 3px;
            margin-top: 5px;
            transition: all 0.3s;
        }
        
        .strength-weak { background-color: #dc3545; width: 25%; }
        .strength-fair { background-color: #ffc107; width: 50%; }
        .strength-good { background-color: var(--warning-color); width: 75%; }
        .strength-strong { background-color: var(--success-color); width: 100%; }
        
        .btn-register {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            border: none;
            padding: 12px;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.3);
        }
        
        @media (max-width: 768px) {
            .register-body {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-card">
            <div class="register-header">
                <div class="app-logo">
                    <i class="bi bi-house-heart-fill"></i>
                    KostManage
                </div>
                <p>Buat akun baru untuk mulai mengelola kost Anda</p>
            </div>
            
            <div class="register-body">
                <!-- Progress Bar -->
                <div class="progress-bar-custom">
                    <div class="progress-bar-fill" id="progressBar"></div>
                </div>
                
                <div class="step-indicator">
                    <div class="step active" id="step1">
                        <div class="step-number">1</div>
                        <div class="step-text">Data Diri</div>
                    </div>
                    <div class="step" id="step2">
                        <div class="step-number">2</div>
                        <div class="step-text">Akun</div>
                    </div>
                    <div class="step" id="step3">
                        <div class="step-number">3</div>
                        <div class="step-text">Konfirmasi</div>
                    </div>
                </div>
                
                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-triangle me-2"></i>
                        <strong>Perhatian:</strong> Mohon perbaiki kesalahan berikut:
                        <ul class="mb-0 mt-2">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                
                <form method="POST" action="{{ route('register') }}" id="registerForm">
                    @csrf
                    
                    <!-- Step 1: Personal Data -->
                    <div class="step-content" id="stepContent1">
                        <h4 class="mb-4">Informasi Pribadi</h4>
                        
                        <div class="mb-4">
                            <label for="name" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                <input type="text" 
                                       class="form-control @error('name') is-invalid @enderror" 
                                       id="name" 
                                       name="name" 
                                       value="{{ old('name') }}"
                                       placeholder="Masukkan nama lengkap Anda"
                                       required>
                            </div>
                            @error('name')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="phone" class="form-label">Nomor Telepon <span class="text-muted">(Opsional)</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-phone"></i></span>
                                <input type="tel" 
                                       class="form-control" 
                                       id="phone" 
                                       name="phone" 
                                       value="{{ old('phone') }}"
                                       placeholder="0812-3456-7890">
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <div></div>
                            <button type="button" class="btn btn-primary" onclick="nextStep(2)">
                                Selanjutnya <i class="bi bi-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Step 2: Account Data -->
                    <div class="step-content d-none" id="stepContent2">
                        <h4 class="mb-4">Informasi Akun</h4>
                        
                        <div class="mb-4">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                <input type="email" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       id="email" 
                                       name="email" 
                                       value="{{ old('email') }}"
                                       placeholder="contoh@email.com"
                                       required>
                            </div>
                            <small class="text-muted">Email ini akan digunakan untuk login dan notifikasi</small>
                            @error('email')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                    <input type="password" 
                                           class="form-control @error('password') is-invalid @enderror" 
                                           id="password" 
                                           name="password" 
                                           placeholder="Minimal 6 karakter"
                                           required>
                                </div>
                                <div class="password-strength mt-2" id="passwordStrength"></div>
                                <small class="text-muted">Gunakan kombinasi huruf dan angka</small>
                            </div>
                            
                            <div class="col-md-6 mb-4">
                                <label for="password_confirmation" class="form-label">Konfirmasi Password <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                    <input type="password" 
                                           class="form-control" 
                                           id="password_confirmation" 
                                           name="password_confirmation" 
                                           placeholder="Ketik ulang password"
                                           required>
                                </div>
                                <div id="passwordMatch" class="mt-2"></div>
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-outline-secondary" onclick="prevStep(1)">
                                <i class="bi bi-arrow-left"></i> Sebelumnya
                            </button>
                            <button type="button" class="btn btn-primary" onclick="nextStep(3)">
                                Selanjutnya <i class="bi bi-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Step 3: Confirmation -->
                    <div class="step-content d-none" id="stepContent3">
                        <h4 class="mb-4">Konfirmasi Pendaftaran</h4>
                        
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title">Ringkasan Data</h5>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <strong>Nama Lengkap:</strong>
                                        <div id="summaryName">{{ old('name') }}</div>
                                    </div>
                                    <div class="col-md-6">
                                        <strong>Email:</strong>
                                        <div id="summaryEmail">{{ old('email') }}</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <strong>Nomor Telepon:</strong>
                                        <div id="summaryPhone">{{ old('phone') ?: '-' }}</div>
                                    </div>
                                    <div class="col-md-6">
                                        <strong>Status:</strong>
                                        <span class="badge bg-success">Akun Admin</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
                                <label class="form-check-label" for="terms">
                                    Saya setuju dengan <a href="#" class="text-decoration-none">Syarat & Ketentuan</a> dan <a href="#" class="text-decoration-none">Kebijakan Privasi</a> KostManage
                                </label>
                            </div>
                            @error('terms')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="alert alert-info">
                            <i class="bi bi-info-circle me-2"></i>
                            Setelah mendaftar, Anda akan memiliki akses penuh untuk mengelola kost/kontrakan Anda.
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-outline-secondary" onclick="prevStep(2)">
                                <i class="bi bi-arrow-left"></i> Sebelumnya
                            </button>
                            <button type="submit" class="btn btn-register">
                                <i class="bi bi-check-circle"></i> Daftar Sekarang
                            </button>
                        </div>
                    </div>
                </form>
                
                <div class="text-center mt-4">
                    <p class="text-muted">
                        Sudah punya akun? <a href="{{ route('login') }}" class="text-decoration-none">Masuk di sini</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let currentStep = 1;
        
        function nextStep(step) {
            if (step === 2) {
                if (!validateStep1()) return;
            } else if (step === 3) {
                if (!validateStep2()) return;
                updateSummary();
            }
            
            document.getElementById(`stepContent${currentStep}`).classList.add('d-none');
            document.getElementById(`step${currentStep}`).classList.remove('active');
            
            document.getElementById(`stepContent${step}`).classList.remove('d-none');
            document.getElementById(`step${step}`).classList.add('active');
            
            document.getElementById('progressBar').style.width = `${(step / 3) * 100}%`;
            currentStep = step;
        }
        
        function prevStep(step) {
            document.getElementById(`stepContent${currentStep}`).classList.add('d-none');
            document.getElementById(`step${currentStep}`).classList.remove('active');
            
            document.getElementById(`stepContent${step}`).classList.remove('d-none');
            document.getElementById(`step${step}`).classList.add('active');
            
            document.getElementById('progressBar').style.width = `${(step / 3) * 100}%`;
            currentStep = step;
        }
        
        function validateStep1() {
            const name = document.getElementById('name').value.trim();
            if (!name) {
                alert('Mohon isi nama lengkap');
                return false;
            }
            return true;
        }
        
        function validateStep2() {
            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('password_confirmation').value;
            
            if (!email) {
                alert('Mohon isi email');
                return false;
            }
            
            if (!password || password.length < 6) {
                alert('Password harus minimal 6 karakter');
                return false;
            }
            
            if (password !== confirmPassword) {
                alert('Password dan konfirmasi password tidak cocok');
                return false;
            }
            
            return true;
        }
        
        function updateSummary() {
            document.getElementById('summaryName').textContent = document.getElementById('name').value;
            document.getElementById('summaryEmail').textContent = document.getElementById('email').value;
            document.getElementById('summaryPhone').textContent = document.getElementById('phone').value || '-';
        }
        
        // Password strength checker
        document.getElementById('password').addEventListener('input', function() {
            const pass = this.value;
            let strength = 0;
            const strengthBar = document.getElementById('passwordStrength');
            
            if (pass.length >= 6) strength++;
            if (pass.length >= 8) strength++;
            if (/[a-z]/.test(pass)) strength++;
            if (/[A-Z]/.test(pass)) strength++;
            if (/[0-9]/.test(pass)) strength++;
            if (/[^a-zA-Z0-9]/.test(pass)) strength++;
            
            strengthBar.className = 'password-strength';
            if (pass.length === 0) {
                strengthBar.style.display = 'none';
            } else {
                strengthBar.style.display = 'block';
                if (strength < 3) {
                    strengthBar.classList.add('strength-weak');
                } else if (strength < 4) {
                    strengthBar.classList.add('strength-fair');
                } else if (strength < 5) {
                    strengthBar.classList.add('strength-good');
                } else {
                    strengthBar.classList.add('strength-strong');
                }
            }
            
            checkPasswordMatch();
        });
        
        function checkPasswordMatch() {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('password_confirmation').value;
            const matchText = document.getElementById('passwordMatch');
            
            if (password && confirmPassword) {
                if (password === confirmPassword) {
                    matchText.innerHTML = '<span class="text-success"><i class="bi bi-check-circle"></i> Password cocok</span>';
                } else {
                    matchText.innerHTML = '<span class="text-danger"><i class="bi bi-x-circle"></i> Password tidak cocok</span>';
                }
            } else {
                matchText.innerHTML = '';
            }
        }
        
        document.getElementById('password_confirmation').addEventListener('input', checkPasswordMatch);
        
        // Form submission validation
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            if (!document.getElementById('terms').checked) {
                e.preventDefault();
                alert('Anda harus menyetujui Syarat & Ketentuan');
                return false;
            }
        });
    </script>
</body>
</html>