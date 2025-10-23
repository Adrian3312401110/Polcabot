<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register - PolCaBot</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center p-4 relative overflow-hidden bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900">
  
  <!-- Background Animation -->
  <div class="absolute inset-0 overflow-hidden">
    <div class="absolute w-96 h-96 bg-blue-500/10 rounded-full blur-3xl -top-48 -left-48 animate-pulse"></div>
    <div class="absolute w-96 h-96 bg-orange-500/10 rounded-full blur-3xl -bottom-48 -right-48 animate-pulse"></div>
    <div class="absolute w-64 h-64 bg-purple-500/10 rounded-full blur-3xl top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 animate-pulse"></div>
  </div>

  <!-- Main Container -->
  <div class="relative w-full max-w-6xl flex bg-white/95 backdrop-blur-xl rounded-3xl shadow-2xl overflow-hidden">
    
    <!-- Left Side - Brand -->
    <div class="hidden lg:flex lg:w-1/2 bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 p-12 items-center justify-center relative overflow-hidden">
      <div class="relative z-10 text-center">
        <div class="mb-8">
          <img src="{{ asset('images/robot.png') }}" alt="Robot PolCaBot" class="mx-auto w-64 h-64 object-contain">
        </div>
        <h1 class="text-5xl font-bold text-white mb-4">
          <span class="text-white">Pol</span>
          <span class="text-orange-500">Ca</span>
          <span class="text-blue-500">Bot</span>
        </h1>
        <p class="text-slate-300 text-lg">Your Smart Campus Assistant</p>
      </div>
    </div>

    <!-- Right Side - Register Form -->
    <div class="w-full lg:w-1/2 p-8 md:p-12 flex flex-col justify-center">
      <div class="w-full max-w-md mx-auto">
        
        <h2 class="text-4xl font-bold text-slate-900 mb-2">Welcome!</h2>
        <p class="text-slate-600 mb-8">Create your account to get started</p>

        <!-- Error Messages -->
        @if($errors->any())
        <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
          @foreach($errors->all() as $error)
            <p class="text-sm">{{ $error }}</p>
          @endforeach
        </div>
        @endif

        <!-- Register Form -->
        <form method="POST" action="{{ route('register.submit') }}" class="space-y-5">
          @csrf
          
          <!-- Username -->
          <div>
            <label class="block text-sm font-semibold text-slate-900 mb-2">Username</label>
            <input 
              type="text" 
              name="username" 
              value="{{ old('username') }}"
              placeholder="Enter your username"
              class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition-all" 
              required>
          </div>

          <!-- Email -->
          <div>
            <label class="block text-sm font-semibold text-slate-900 mb-2">Email address</label>
            <input 
              type="email" 
              name="email" 
              value="{{ old('email') }}"
              placeholder="Enter your email"
              class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition-all" 
              required>
          </div>

          <!-- Password -->
          <div>
            <label class="block text-sm font-semibold text-slate-900 mb-2">Password</label>
            <input 
              type="password" 
              name="password" 
              placeholder="Minimum 6 characters"
              class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition-all" 
              required>
          </div>

          <!-- Confirm Password -->
          <div>
            <label class="block text-sm font-semibold text-slate-900 mb-2">Confirm Password</label>
            <input 
              type="password" 
              name="confirmPassword" 
              placeholder="Re-enter your password"
              class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition-all" 
              required>
          </div>

          <!-- Submit Button -->
          <button 
            type="submit"
            class="w-full bg-gradient-to-r from-green-600 to-green-700 text-white py-3 rounded-lg font-semibold hover:from-green-700 hover:to-green-800 transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
            Sign Up
          </button>

          <!-- Login Link -->
          <p class="text-center text-slate-600">
            Have an account?
            <a href="{{ route('login') }}" class="text-blue-600 font-semibold hover:text-blue-700 transition-colors">
              Sign In
            </a>
          </p>
        </form>

      </div>
    </div>
  </div>

  <!-- Mobile Logo -->
  <div class="lg:hidden absolute top-4 left-4">
    <h1 class="text-3xl font-bold">
      <span class="text-white">Pol</span>
      <span class="text-orange-500">Ca</span>
      <span class="text-blue-500">Bot</span>
    </h1>
  </div>

</body>
</html>