<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun Baru</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .input-focus:focus {
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        .btn-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: all 0.3s ease;
        }
        .btn-gradient:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4">
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-40 -right-32 w-80 h-80 bg-purple-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
        <div class="absolute -bottom-40 -left-32 w-80 h-80 bg-yellow-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
        <div class="absolute top-40 left-1/2 w-80 h-80 bg-pink-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"></div>
    </div>

    <div class="max-w-md w-full glass-effect rounded-2xl shadow-2xl overflow-hidden transform transition-all duration-300 hover:shadow-3xl">
        <!-- Header Section -->
        <div class="gradient-bg text-white p-8 text-center relative overflow-hidden">
            <div class="absolute inset-0 bg-black opacity-10"></div>
            <div class="relative z-10">
                <div class="w-20 h-20 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-user-plus text-3xl text-white"></i>
                </div>
                <h1 class="text-3xl font-bold mb-2">Buat Akun Baru</h1>
                <p class="text-blue-100 opacity-90">Bergabunglah dengan komunitas kami</p>
            </div>
        </div>

        <!-- Form Section -->
        <div class="p-8">
            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl shadow-sm">
                    <div class="flex items-center mb-2">
                        <i class="fas fa-exclamation-circle text-red-500 mr-2"></i>
                        <h3 class="text-red-800 font-semibold">Perhatian</h3>
                    </div>
                    <ul class="list-disc list-inside text-red-700 text-sm space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl shadow-sm">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle text-green-500 mr-2"></i>
                        <span class="text-green-800 font-medium">{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            <form method="POST" action="/register" class="space-y-6">
                @csrf
                
                <!-- Username Field -->
                <div class="space-y-2">
                    <label for="username" class="block text-gray-700 font-medium">
                        <i class="fas fa-user text-purple-500 mr-2"></i>Username
                    </label>
                    <div class="relative">
                        <input 
                            type="text" 
                            id="username" 
                            name="username" 
                            value="{{ old('username') }}"
                            class="w-full px-4 py-3 pl-11 border border-gray-200 rounded-xl input-focus transition-all duration-200 
                                   @error('username') border-red-500 @else focus:border-purple-500 @enderror"
                            placeholder="Masukkan username Anda"
                            required>
                        <i class="fas fa-user text-gray-400 absolute left-4 top-1/2 transform -translate-y-1/2"></i>
                    </div>
                </div>

                <!-- Email Field -->
                <div class="space-y-2">
                    <label for="email" class="block text-gray-700 font-medium">
                        <i class="fas fa-envelope text-purple-500 mr-2"></i>Alamat Email
                    </label>
                    <div class="relative">
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            value="{{ old('email') }}"
                            class="w-full px-4 py-3 pl-11 border border-gray-200 rounded-xl input-focus transition-all duration-200 
                                   @error('email') border-red-500 @else focus:border-purple-500 @enderror"
                            placeholder="contoh@email.com"
                            required>
                        <i class="fas fa-envelope text-gray-400 absolute left-4 top-1/2 transform -translate-y-1/2"></i>
                    </div>
                </div>

                <!-- Password Field -->
                <div class="space-y-2">
                    <label for="password" class="block text-gray-700 font-medium">
                        <i class="fas fa-lock text-purple-500 mr-2"></i>Password
                    </label>
                    <div class="relative">
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            class="w-full px-4 py-3 pl-11 border border-gray-200 rounded-xl input-focus transition-all duration-200 
                                   @error('password') border-red-500 @else focus:border-purple-500 @enderror"
                            placeholder="Minimal 6 karakter"
                            required>
                        <i class="fas fa-lock text-gray-400 absolute left-4 top-1/2 transform -translate-y-1/2"></i>
                    </div>
                </div>

                <!-- Confirm Password Field -->
                <div class="space-y-2">
                    <label for="password_confirmation" class="block text-gray-700 font-medium">
                        <i class="fas fa-lock text-purple-500 mr-2"></i>Konfirmasi Password
                    </label>
                    <div class="relative">
                        <input 
                            type="password" 
                            id="password_confirmation" 
                            name="password_confirmation" 
                            class="w-full px-4 py-3 pl-11 border border-gray-200 rounded-xl input-focus transition-all duration-200 focus:border-purple-500"
                            placeholder="Ulangi password Anda"
                            required>
                        <i class="fas fa-lock text-gray-400 absolute left-4 top-1/2 transform -translate-y-1/2"></i>
                    </div>
                </div>

                <!-- Terms and Conditions -->
                <div class="flex items-center space-x-3 p-3 bg-blue-50 rounded-xl">
                    <input 
                        type="checkbox" 
                        id="terms" 
                        name="terms" 
                        class="w-4 h-4 text-purple-600 rounded focus:ring-purple-500"
                        required>
                    <label for="terms" class="text-sm text-gray-700">
                        Saya menyetujui <a href="#" class="text-purple-600 hover:text-purple-800 font-medium">Syarat & Ketentuan</a> dan <a href="#" class="text-purple-600 hover:text-purple-800 font-medium">Kebijakan Privasi</a>
                    </label>
                </div>

                <!-- Submit Button -->
                <button 
                    type="submit" 
                    class="w-full btn-gradient text-white py-4 px-6 rounded-xl font-semibold text-lg shadow-lg transition-all duration-300">
                    <i class="fas fa-user-plus mr-2"></i>Daftar Sekarang
                </button>
            </form>

            <!-- Divider -->
            <div class="my-6 flex items-center">
                <div class="flex-1 border-t border-gray-200"></div>
                <span class="px-4 text-gray-500 text-sm">Atau</span>
                <div class="flex-1 border-t border-gray-200"></div>
            </div>

            <!-- Social Login -->
            <div class="grid grid-cols-2 gap-4 mb-6">
                <button class="flex items-center justify-center space-x-2 py-3 px-4 border border-gray-200 rounded-xl hover:bg-gray-50 transition-colors duration-200">
                    <i class="fab fa-google text-red-500"></i>
                    <span class="text-gray-700 font-medium">Google</span>
                </button>
                <button class="flex items-center justify-center space-x-2 py-3 px-4 border border-gray-200 rounded-xl hover:bg-gray-50 transition-colors duration-200">
                    <i class="fab fa-facebook text-blue-600"></i>
                    <span class="text-gray-700 font-medium">Facebook</span>
                </button>
            </div>

            <!-- Login Link -->
            <div class="text-center">
                <p class="text-gray-600">
                    Sudah punya akun? 
                    <a href="/login" class="text-purple-600 hover:text-purple-800 font-semibold transition-colors duration-200">
                        Masuk di sini
                        <i class="fas fa-arrow-right ml-1 text-sm"></i>
                    </a>
                </p>
            </div>
        </div>

        <!-- Footer -->
        <div class="bg-gray-50 px-8 py-4 text-center border-t border-gray-100">
            <p class="text-gray-500 text-sm">
                © 2024 <span class="text-purple-600 font-semibold">Kullada Project</span>. All rights reserved.
            </p>
        </div>
    </div>

    <script>
        // Add some interactive animations
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('input');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.classList.add('ring-2', 'ring-purple-200');
                });
                input.addEventListener('blur', function() {
                    this.parentElement.classList.remove('ring-2', 'ring-purple-200');
                });
            });
        });
    </script>
</body>
</html>