<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PolCaBot</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
  <!-- Navbar -->
  <nav>
    <div class="logo" style="display: flex; align-items: center; gap: 10px;">
      <img src="{{ asset('images/logo.png') }}" alt="PolCaBot Logo" style="height:40px;">
      <span style="font-weight: bold; font-size: 20px;">
        <span style="color:white;">P</span><span style="color:orange;">o</span><span style="color:white;">l</span><span style="color:#1e90ff;">CaBot</span>
      </span>
    </div>
    <ul>
      <li><a href="#home">Home</a></li>
      <li><a href="#features">Features</a></li>
      <li><a href="#about">About</a></li>
      <li><a href="#contact">Contact</a></li>
    </ul>
    <a href="#" class="btn-signin">Sign In</a>
  </nav>

  <!-- Konten halaman -->
  @yield('content')

  <!-- Footer -->
  <footer>
    <p>© 2025 PolCaBot. All rights reserved.</p>
    <ul>
      <li><a href="#">UI Design</a></li>
      <li><a href="#">UX Design</a></li>
      <li><a href="#">Blog</a></li>
      <li><a href="#">Best Practices</a></li>
    </ul>
  </footer>
</body>
</html>
