<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Sistem Saya</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <style>
        :root {
            --primary-color: #4e73df;
            --secondary-color: #858796;
            --success-color: #1cc88a;
            --info-color: #36b9cc;
            --warning-color: #f6c23e;
            --danger-color: #e74a3b;
            --light-color: #f8f9fc;
            --dark-color: #5a5c69;
        }
        
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
        }
        
        .login-container {
            max-width: 400px;
            margin: auto;
        }
        
        .login-card {
            border-radius: 15px;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
            overflow: hidden;
        }
        
        .login-header {
            background: var(--primary-color);
            color: white;
            padding: 1.5rem;
            text-align: center;
        }
        
        .login-body {
            background: white;
            padding: 2rem;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
        }
        
        .btn-login {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
            padding: 0.75rem;
            font-weight: 600;
        }
        
        .btn-login:hover {
            background-color: #3a5fc8;
            border-color: #3a5fc8;
            color: white;
        }
        
        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            color: var(--secondary-color);
            margin: 1.5rem 0;
        }
        
        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #e3e6f0;
        }
        
        .divider::before {
            margin-right: .5em;
        }
        
        .divider::after {
            margin-left: .5em;
        }
        
        .login-footer {
            background: #eaecf4;
            padding: 1rem 2rem;
            text-align: center;
            border-top: 1px solid #e3e6f0;
        }
        
        .input-group-text {
            background: white;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <h3><i class="bi bi-box-arrow-in-right me-2"></i>Masuk ke Akun</h3>
                <p class="mb-0">Selamat datang kembali!</p>
            </div>
            
                 <div class="login-body">
    
                {{-- Alert error --}}
                <div class="row">
                    @if(isset($error))
                        <div class="alert alert-danger" role="alert">
                            {{ $error }}
                        </div>
                    @endif
                </div>
                
                <form method="POST" action="/login">
                    @csrf
                    
                    <!-- Email Input -->
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                            <input 
                                type="text" 
                                class="form-control @error('username') is-invalid @enderror" 
                                id="username" 
                                name="username" 
                                placeholder="Masukkan username" 
                                value="{{ old('username') }}"
                                autocomplete="username" 
                                autofocus
                            >
                        </div>
                        @error('username')
                            <div class="invalid-feedback d-block">
                                <i class="bi bi-exclamation-circle me-1"></i>{{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <!-- Password Input -->
                    <div class="mb-3">
                        <div class="d-flex justify-content-between">
                            <label for="password" class="form-label">Password</label>
                        </div>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                            <input 
                                type="password" 
                                class="form-control @error('password') is-invalid @enderror" 
                                id="password" 
                                name="password" 
                                placeholder="Masukkan password" 
                                autocomplete="current-password"
                            >
                            <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
        
                    <!-- Remember Me Checkbox -->
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">Ingat saya</label>
                    </div>
                    
                    <!-- Submit Button -->
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-login btn-block">
                            <i class="bi bi-box-arrow-in-right me-2"></i>Masuk
                        </button>
                    </div>
                </form>
                
                <div class="divider">Atau</div>
                
                <!-- Social Login Options -->
                <div class="text-center mb-3">
                    <p class="mb-2">Masuk dengan</p>
                    <div>
                        <a href="#" class="btn btn-outline-primary btn-sm me-2">
                            <i class="bi bi-google"></i> Google
                        </a>
                        <a href="#" class="btn btn-outline-dark btn-sm">
                            <i class="bi bi-github"></i> GitHub
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="login-footer">
                <p class="mb-0">Belum punya akun? <a href="/register" class="text-decoration-none text-primary">Daftar di sini</a></p>
            </div>
        </div>
        
        <!-- Copyright Footer -->
        <div class="text-center text-white mt-3">
            <p class="mb-0">&copy; {{ date('Y') }} Rashad-Project. All rights reserved.</p>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            // Toggle icon
            this.querySelector('i').classList.toggle('bi-eye');
            this.querySelector('i').classList.toggle('bi-eye-slash');
        });
        
        // Auto close alerts after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                const alerts = document.querySelectorAll('.alert');
                alerts.forEach(function(alert) {
                    const bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                });
            }, 5000);
        });
    </script>
</body>
</html>