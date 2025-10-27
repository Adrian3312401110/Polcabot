<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PolCaBot</title>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { 
      font-family: Arial, sans-serif; 
      scroll-behavior: smooth;
      transition: background-color 0.3s ease;
    }

    /* ========== LANDING PAGE STYLES ========== */
    .landing-page { display: block; }
    .landing-page.hidden { display: none; }

    /* Navbar */
    nav {
      position: fixed;
      top: 0; left: 0; width: 100%;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 50px;
      background: rgba(0, 0, 0, 0.1);
      color: #fff;
      z-index: 1000;
      backdrop-filter: blur(6px);
      box-shadow: 0 2px 6px rgba(0,0,0,0.2);
    }
    nav ul { list-style: none; display: flex; gap: 25px; }
    nav ul li a {
      color: #fff; text-decoration: none; font-weight: bold;
    }
    nav ul li a:hover { color: #1e90ff; }
    .btn-signin {
      border: 2px solid #1e90ff; border-radius: 20px;
      padding: 8px 20px; color: #1e90ff; background: transparent;
      text-decoration: none;
      cursor: pointer;
    }
    .btn-signin:hover { background: #1e90ff; color: #fff; }

    /* Section umum */
    section {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 60px;
    }

    /* Landing Page */
    #home {
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
                  url('https://www.polibatam.ac.id/wp-content/uploads/2023/05/Gedung.jpg') no-repeat center/cover;
      color: white;
      text-align: center;
      padding: 100px 20px;
    }
    .home-content {
      max-width: 800px;
      padding: 20px;
    }
    #home h1 {
      font-size: 48px;
      font-weight: bold;
      margin-bottom: 20px;
      line-height: 1.2;
    }
    .tagline {
      font-size: 20px;
      font-weight: 500;
      margin-bottom: 15px;
      color: #f0f0f0;
    }
    .subtext {
      font-size: 16px;
      line-height: 1.6;
      margin-bottom: 30px;
      color: #e0e0e0;
    }
    .btn-main {
      padding: 14px 36px;
      font-size: 16px;
      font-weight: bold;
      border: none;
      border-radius: 30px;
      background: #1e90ff;
      color: white;
      text-decoration: none;
      box-shadow: 0 4px 12px rgba(0,0,0,0.3);
      transition: background 0.3s ease;
      cursor: pointer;
    }
    .btn-main:hover {
      background: #0d6efd;
    }

    /* Features */
    #features {
      position: relative;
      background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
                  url('https://cdio2025arm.polibatam.ac.id/wp-content/uploads/2025/02/Techno-1-2048x1365.jpg') no-repeat center/cover;
      padding: 200px 0 120px;
      color: white;
      text-align: center;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .features-title {
      position: absolute;
      top: 80px;
      left: 50%;
      transform: translateX(-50%);
      z-index: 3;
      font-size: 56px;
      font-style: italic;
      font-weight: 600;
      color: #fff;
      text-shadow: 0 4px 12px rgba(0,0,0,0.6);
      letter-spacing: 1px;
    }

    .features-container {
      margin-top: 1px;
      display: flex;
      justify-content: center;
      z-index: 2;
      position: relative;
    }

    .features-box {
      background: white;
      border-radius: 16px;
      padding: 60px 70px;
      display: flex;
      align-items: flex-start;
      justify-content: space-between;
      gap: 40px;
      max-width: 1100px;
      color: black;
      box-shadow: 0 8px 24px rgba(0,0,0,0.2);
    }

    .features-text {
      flex: 1;
    }

    .features-text h2 {
      font-size: 32px;
      font-weight: 800;
      margin-bottom: 20px;
    }

    .features-text p {
      color: #444;
      line-height: 1.6;
      font-size: 15px;
    }

    .features-grid {
      flex: 1.2;
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 25px;
    }

    .feature-card {
      background: #eaf6ff;
      padding: 25px 20px;
      border-radius: 12px;
      text-align: left;
      box-shadow: 0 3px 8px rgba(0,0,0,0.1);
      transition: transform 0.3s ease;
    }

    .feature-card:hover {
      transform: translateY(-5px);
    }

    .feature-card .icon img {
      width: 40px;
      height: 40px;
      margin-bottom: 15px;
    }

    .feature-card h3 {
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .feature-card p {
      color: #555;
      font-size: 14px;
      margin-bottom: 15px;
    }

    .feature-link {
      color: #1e90ff;
      font-weight: bold;
      text-decoration: none;
      font-size: 14px;
    }

    .feature-link:hover {
      text-decoration: underline;
    }

    /* About */
    #about {
      background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), 
                  url('https://www.polibatam.ac.id/wp-content/uploads/2022/02/MG_8950-scaled.jpg') no-repeat center/cover;
      color: white;
      gap: 30px;
    }
    #about img { width: 400px; border-radius: 20px; }
    #about .text { max-width: 500px; }
    #about button {
      margin-top: 20px; padding: 10px 20px;
      background: #1e90ff; border: none; color: white; border-radius: 8px;
      cursor: pointer;
    }

    /* Contact */
    .contact-wrapper {
      display: flex;
      flex-wrap: wrap;
      gap: 40px;
      width: 100%;
      max-width: 1000px;
      margin: auto;
    }

    .contact-form {
      flex: 1;
      background: #f9f9f9;
      padding: 40px;
      border-radius: 10px;
    }

    .contact-form h2 {
      font-size: 28px;
      margin-bottom: 10px;
    }

    .contact-form .subtext {
      font-size: 16px;
      margin-bottom: 30px;
      color: #555;
    }

    .contact-form form {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    .contact-form input,
    .contact-form textarea {
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 15px;
    }

    .contact-form button {
      background: #1e90ff;
      color: white;
      padding: 12px;
      border: none;
      border-radius: 6px;
      font-weight: bold;
      cursor: pointer;
    }

    .contact-form button:hover {
      background: #0d6efd;
    }

    .contact-info {
      flex: 1;
      background: #111;
      color: white;
      padding: 40px;
      border-radius: 10px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .contact-info h3 {
      font-size: 24px;
      margin-bottom: 20px;
    }

    .contact-info p {
      margin-bottom: 10px;
      font-size: 16px;
    }

    .social-icons {
      display: flex;
      gap: 15px;
      margin-top: 30px;
    }

    .social-icons img {
      width: 32px;
      height: 32px;
      transition: transform 0.2s ease;
    }

    .social-icons img:hover {
      transform: scale(1.1);
    }

    #contact {
      background: #fff;
      flex-direction: column;
    }

    /* Footer */
    footer {
      background: #1e90ff;
      color: white;
      padding: 20px 50px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    footer ul { list-style: none; display: flex; gap: 20px; }
    footer a { color: white; text-decoration: none; }

    /* ========== DASHBOARD STYLES ========== */
    .dashboard-page { 
      display: none; 
    }
    .dashboard-page.active { 
      display: block; 
    }

    body.light-mode { background: #f5f5f5; }
    body.dark-mode { background: #1a1a2e; }

    /* Topbar */
    .topbar {
      position: fixed;
      top: 0; left: 0; right: 0;
      height: 70px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 30px;
      z-index: 1000;
      transition: background 0.3s ease;
    }
    .light-mode .topbar { background: #0ea5e9; }
    .dark-mode .topbar { background: #1e3a8a; }

    .topbar .logo {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 8px 20px;
      border: 2px solid white;
      border-radius: 8px;
    }
    .topbar .logo img { height: 35px; }
    .topbar .logo span {
      font-weight: bold;
      font-size: 20px;
      color: white;
    }

    /* Sidebar */
    .sidebar {
      position: fixed;
      top: 70px; left: 0;
      width: 260px;
      height: calc(100vh - 70px);
      padding: 80px 20px 20px 20px;
      transition: background 0.3s ease, transform 0.3s ease;
      z-index: 999;
      overflow-y: auto;
    }
    .light-mode .sidebar { background: #1e3a8a; color: white; }
    .dark-mode .sidebar { background: #0f172a; color: white; }

    .sidebar.hidden {
      transform: translateX(-100%);
    }

    .sidebar-section {
      margin-bottom: 25px;
    }
    .sidebar-section h3 {
      font-size: 13px;
      font-weight: bold;
      margin-bottom: 12px;
      opacity: 0.7;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }
    .sidebar-menu {
      list-style: none;
    }
    .sidebar-menu li {
      padding: 10px 12px;
      margin-bottom: 6px;
      border-radius: 8px;
      cursor: pointer;
      transition: background 0.2s ease;
      font-size: 13px;
      line-height: 1.4;
    }
    .light-mode .sidebar-menu li:hover { background: rgba(255,255,255,0.1); }
    .dark-mode .sidebar-menu li:hover { background: rgba(255,255,255,0.05); }

    /* Dark Mode Toggle */
    .dark-mode-toggle {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 15px;
      margin: 20px 0;
      border-radius: 8px;
      background: rgba(255,255,255,0.1);
    }
    .toggle-switch {
      position: relative;
      width: 50px;
      height: 25px;
      background: #ccc;
      border-radius: 25px;
      cursor: pointer;
      transition: background 0.3s ease;
    }
    .toggle-switch.active { background: #0ea5e9; }
    .toggle-switch::after {
      content: '';
      position: absolute;
      top: 2px;
      left: 2px;
      width: 21px;
      height: 21px;
      background: white;
      border-radius: 50%;
      transition: transform 0.3s ease;
    }
    .toggle-switch.active::after {
      transform: translateX(25px);
    }

    /* Profile Card in Sidebar */
    .profile-card {
      padding: 15px;
      border-radius: 8px;
      background: rgba(255,255,255,0.1);
      display: flex;
      align-items: center;
      gap: 12px;
      cursor: pointer;
      transition: background 0.2s ease;
    }
    .profile-card:hover {
      background: rgba(255,255,255,0.15);
    }
    .profile-card img {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      object-fit: cover;
    }
    .profile-card .name {
      font-weight: bold;
      font-size: 15px;
    }

    /* Main Content */
    .main-content {
      margin-left: 260px;
      margin-top: 70px;
      padding: 40px;
      transition: margin-left 0.3s ease;
      min-height: calc(100vh - 70px);
    }
    .main-content.expanded {
      margin-left: 0;
    }

    .light-mode .main-content { color: #333; }
    .dark-mode .main-content { color: #e5e5e5; }

    /* Welcome Section */
    .welcome-section {
      text-align: center;
      padding: 60px 20px;
      max-width: 900px;
      margin: 0 auto;
    }
    .welcome-section h1 {
      font-size: 42px;
      margin-bottom: 20px;
    }
    .light-mode .welcome-section h1 .dark-text {
      color: #333;
    }
    .dark-mode .welcome-section h1 .dark-text {
      color: white;
    }
    .welcome-section .subtitle {
      font-size: 18px;
      margin-bottom: 40px;
      opacity: 0.8;
    }

    /* Quick Action Cards */
    .quick-actions {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 20px;
      margin: 40px 0;
      max-width: 1000px;
      margin-left: auto;
      margin-right: auto;
    }
    .action-card {
      padding: 30px;
      border-radius: 12px;
      text-align: center;
      cursor: pointer;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .light-mode .action-card {
      background: white;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    .dark-mode .action-card {
      background: #2d3748;
      box-shadow: 0 2px 8px rgba(0,0,0,0.3);
    }
    .action-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 16px rgba(0,0,0,0.2);
    }
    .action-card h3 {
      font-size: 18px;
      margin-bottom: 10px;
      color: #0ea5e9;
    }
    .dark-mode .action-card h3 {
      color: #38bdf8;
    }

    /* Chat Input */
    .chat-input-container {
      position: fixed;
      bottom: 30px;
      left: 50%;
      transform: translateX(-50%);
      width: 90%;
      max-width: 700px;
      z-index: 100;
    }
    .chat-input {
      display: flex;
      align-items: center;
      gap: 15px;
      padding: 15px 25px;
      border-radius: 30px;
      transition: background 0.3s ease;
    }
    .light-mode .chat-input {
      background: white;
      box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }
    .dark-mode .chat-input {
      background: #2d3748;
      box-shadow: 0 4px 12px rgba(0,0,0,0.4);
    }
    .chat-input input {
      flex: 1;
      border: none;
      outline: none;
      font-size: 15px;
      background: transparent;
    }
    .light-mode .chat-input input { color: #333; }
    .dark-mode .chat-input input { color: white; }
    .chat-input input::placeholder {
      opacity: 0.5;
    }
    .chat-input button {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      border: none;
      background: #0ea5e9;
      color: white;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: background 0.2s ease;
    }
    .chat-input button:hover {
      background: #0284c7;
    }

    /* Profile Modal */
    .profile-modal {
      position: fixed;
      top: 0; left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0,0,0,0.6);
      display: none;
      align-items: center;
      justify-content: center;
      z-index: 2000;
    }
    .profile-modal.active {
      display: flex;
    }
    .profile-modal-content {
      padding: 40px;
      border-radius: 16px;
      max-width: 400px;
      width: 90%;
      position: relative;
    }
    .light-mode .profile-modal-content {
      background: white;
    }
    .dark-mode .profile-modal-content {
      background: #2d3748;
      color: white;
    }
    .profile-modal-content .close-btn {
      position: absolute;
      top: 15px;
      right: 15px;
      font-size: 24px;
      cursor: pointer;
      opacity: 0.6;
    }
    .profile-modal-content .close-btn:hover {
      opacity: 1;
    }
    .profile-header {
      text-align: center;
      margin-bottom: 30px;
    }
    .profile-header img {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      object-fit: cover;
      margin-bottom: 15px;
      border: 4px solid #0ea5e9;
    }
    .profile-form {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }
    .form-group label {
      display: block;
      margin-bottom: 8px;
      font-weight: bold;
      font-size: 14px;
    }
    .form-group input {
      width: 100%;
      padding: 12px;
      border-radius: 8px;
      border: 1px solid #ccc;
      font-size: 15px;
    }
    .light-mode .form-group input {
      background: #f5f5f5;
      color: #333;
    }
    .dark-mode .form-group input {
      background: #1a1a2e;
      color: white;
      border-color: #444;
    }
    .profile-actions {
      display: flex;
      gap: 10px;
      margin-top: 20px;
    }
    .profile-actions button {
      flex: 1;
      padding: 12px;
      border: none;
      border-radius: 8px;
      font-weight: bold;
      cursor: pointer;
      transition: background 0.2s ease;
    }
    .btn-save {
      background: #0ea5e9;
      color: white;
    }
    .btn-save:hover {
      background: #0284c7;
    }
    .btn-logout {
      background: #ef4444;
      color: white;
    }
    .btn-logout:hover {
      background: #dc2626;
    }

    /* Menu Toggle Button */
    .menu-toggle {
      position: fixed;
      top: 85px;
      left: 15px;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background: #0ea5e9;
      color: white;
      border: none;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 1001;
      font-size: 20px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.2);
      transition: left 0.3s ease;
    }
    .sidebar.hidden ~ .menu-toggle {
      left: 15px;
    }

    /* Responsive */
    @media (max-width: 768px) {
      .sidebar {
        transform: translateX(-100%);
      }
      .sidebar.active {
        transform: translateX(0);
      }
      .main-content {
        margin-left: 0;
      }
      .quick-actions {
        grid-template-columns: 1fr;
      }
    }
  </style>
</head>
<body class="light-mode">

  <!-- ========== LANDING PAGE ========== -->
  <div class="landing-page" id="landingPage">
    <!-- Navbar -->
    <nav>
      <div class="logo" style="display: flex; align-items: center; gap: 10px;">
        <img src="images/logo.png" alt="PolCaBot Logo" style="height:40px;">
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
      <a href="javascript:void(0)" class="btn-signin" onclick="goToDashboard()">Sign In</a>
    </nav>

    <!-- Landing Page -->
    <section id="home">
      <div class="home-content">
        <h1>
          Selamat Datang di 
          <span style="color:white;">P</span><span style="color:orange;">o</span><span style="color:white;">l</span><span style="color:#1e90ff;">CaBot</span>
        </h1>
        <p class="tagline">
          PolCaBot adalah aplikasi chatbot berbasis AI yang dirancang untuk membantu menjawab pertanyaan seputar akademik dan administrasi kampus.
        </p>
        
        <button class="btn-main" onclick="goToDashboard()">Get Started</button>
      </div>
    </section>

    <!-- FEATURES -->
    <section id="features">
      <h2 class="features-title">Features</h2>
      <div class="features-container">
        <div class="features-box">
          <div class="features-text">
            <h2>Fitur-Fitur <br> Aplikasi PolCaBot</h2>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
              Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </p>
          </div>

          <div class="features-grid">
            <div class="feature-card">
              <div class="icon">
                <img src="https://cdn-icons-png.flaticon.com/512/702/702814.png" alt="Dark Mode">
              </div>
              <h3>Dark Mode</h3>
              <p>Mode gelap untuk pengalaman nyaman di malam hari.</p>
              <a href="#" class="feature-link">View integration →</a>
            </div>

            <div class="feature-card">
              <div class="icon">
                <img src="https://cdn-icons-png.flaticon.com/512/4712/4712027.png" alt="Chatbot">
              </div>
              <h3>Chatbot</h3>
              <p>Chatbot AI cerdas untuk membantu administrasi kampus.</p>
              <a href="#" class="feature-link">View integration →</a>
            </div>

            <div class="feature-card">
              <div class="icon">
                <img src="https://cdn-icons-png.flaticon.com/512/1828/1828884.png" alt="History">
              </div>
              <h3>History</h3>
              <p>Riwayat percakapan tersimpan untuk memudahkan akses.</p>
              <a href="#" class="feature-link">View integration →</a>
            </div>

            <div class="feature-card">
              <div class="icon">
                <img src="https://cdn-icons-png.flaticon.com/512/1077/1077063.png" alt="Profile">
              </div>
              <h3>Profile</h3>
              <p>Kelola informasi pengguna dan preferensi pribadi Anda.</p>
              <a href="#" class="feature-link">View integration →</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- About -->
    <section id="about">
      <img src="https://i.pinimg.com/736x/b9/b6/0e/b9b60eb215193ce939ca6721601a846b.jpg" alt="team">
      <div class="text">
        <h2>About Us</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer non enim bibendum odio tempus mattis.</p>
        <button>Contact Us</button>
      </div>
    </section>

    <!-- Contact -->
    <section id="contact">
      <div class="contact-wrapper">
        <div class="contact-form">
          <h2>Contact Us</h2>
          <p class="subtext">Feel free to contact us at anytime. We will get back as soon as possible.</p>
          <form>
            <input type="text" placeholder="Name">
            <input type="email" placeholder="Email">
            <textarea placeholder="Message"></textarea>
            <button type="submit">Send</button>
          </form>
        </div>
        <div class="contact-info">
          <h3>Info</h3>
          <p>📧 Info@gmail.com</p>
          <p>📞 +9955442318</p>
          <p>👤 John</p>
          <p>🕒 08:56</p>
          <div class="social-icons">
            <a href="#"><img src="https://cdn-icons-png.flaticon.com/512/733/733547.png" alt="Facebook"></a>
            <a href="#"><img src="https://cdn-icons-png.flaticon.com/512/733/733579.png" alt="Twitter"></a>
            <a href="#"><img src="https://cdn-icons-png.flaticon.com/512/300/300221.png" alt="Google"></a>
          </div>
        </div>
      </div>
    </section>

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
  </div>

  <!-- ========== DASHBOARD PAGE ========== -->
  <div class="dashboard-page" id="dashboardPage">
    <!-- Topbar -->
    <div class="topbar">
      <div class="logo">
        <img src="images/logo.png" alt="PolCaBot Logo">
        <span>
          <span style="color:white;">P</span><span style="color:orange;">o</span><span style="color:white;">l</span><span style="color:#90e0ef;">CaBot</span>
        </span>
      </div>
    </div>

    <!-- Menu Toggle -->
    <button class="menu-toggle" onclick="toggleSidebar()">☰</button>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
      <div class="sidebar-section">
        <h3>History Chat</h3>
        <ul class="sidebar-menu">
          <li>Ada Organisasi apa saja di Polibatam</li>
          <li>Ada jurusan apa saja di Polibatam</li>
          <li>Jadwal Perkuliahan kelas pagi</li>
          <li>Cara daftar beasiswa Polibatam</li>
        </ul>
      </div>

      <div class="dark-mode-toggle">
        <span>🌙 Dark Mode</span>
        <div class="toggle-switch" onclick="toggleDarkMode()" id="darkModeToggle"></div>
      </div>

      <div class="profile-card" onclick="openProfile()">
        <img src="https://i.pravatar.cc/150?img=12" alt="Profile">
        <div class="name">Alex Marshall</div>
      </div>
    </div>

    <!-- Main Content -->
    <div class="main-content" id="mainContent">
      <div class="welcome-section">
        <h1>Selamat Datang di <span class="dark-text">P</span><span style="color:orange;">o</span><span class="dark-text">l</span><span style="color:#0ea5e9;">CaBot</span></h1>
        <p class="subtitle">Hai Alex Marshall, PolCaBot siap membantu menjawab segala pertanyaan akademik dari Kampus Polibatam</p>

        <div class="quick-actions">
          <div class="action-card">
            <h3>Ada Organisasi apa saja di Polibatam</h3>
            <p>Tanya tentang organisasi kemahasiswaan</p>
          </div>
          <div class="action-card">
            <h3>Ada jurusan apa saja di Polibatam</h3>
            <p>Informasi lengkap program studi</p>
          </div>
          <div class="action-card">
            <h3>Jadwal Perkuliahan kelas pagi</h3>
            <p>Cek jadwal kuliah harian</p>
          </div>
          <div class="action-card">
            <h3>Cara daftar beasiswa Polibatam</h3>
            <p>Informasi lengkap beasiswa kampus</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Chat Input -->
    <div class="chat-input-container">
      <div class="chat-input">
        <input type="text" placeholder="Ketik Pertanyaaan...">
        <button>
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z"/>
          </svg>
        </button>
      </div>
    </div>

    <!-- Profile Modal -->
    <div class="profile-modal" id="profileModal">
      <div class="profile-modal-content">
        <span class="close-btn" onclick="closeProfile()">×</span>
        <div class="profile-header">
          <img src="https://i.pravatar.cc/150?img=12" alt="Profile">
          <h2>Profile</h2>
        </div>
        <form class="profile-form">
          <div class="form-group">
            <label>Name</label>
            <input type="text" value="Alex Marshall">
          </div>
          <div class="form-group">
            <label>NIM</label>
            <input type="text" value="alex_marshall">
          </div>
          <div class="form-group">
            <label>Phone Number</label>
            <input type="tel" value="+1 915 999 9685">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" value="alexmarshall2072@gmail.com">
          </div>
          <div class="profile-actions">
            <button type="button" class="btn-save">Save</button>
            <button type="button" class="btn-logout" onclick="backToLanding()">Log Out</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    // Navigation Functions
    function goToDashboard() {
      document.getElementById('landingPage').classList.add('hidden');
      document.getElementById('dashboardPage').classList.add('active');
      document.body.style.overflow = 'hidden'; // Disable scrolling on dashboard
    }

    function backToLanding() {
      document.getElementById('dashboardPage').classList.remove('active');
      document.getElementById('landingPage').classList.remove('hidden');
      document.body.style.overflow = 'auto'; // Enable scrolling
      closeProfile(); // Close profile modal if open
    }

    // Dark Mode Toggle
    function toggleDarkMode() {
      const body = document.body;
      const toggle = document.getElementById('darkModeToggle');
      
      if (body.classList.contains('light-mode')) {
        body.classList.remove('light-mode');
        body.classList.add('dark-mode');
        toggle.classList.add('active');
      } else {
        body.classList.remove('dark-mode');
        body.classList.add('light-mode');
        toggle.classList.remove('active');
      }
    }

    // Sidebar Toggle
    function toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      const mainContent = document.getElementById('mainContent');
      
      sidebar.classList.toggle('hidden');
      if (sidebar.classList.contains('hidden')) {
        mainContent.classList.add('expanded');
      } else {
        mainContent.classList.remove('expanded');
      }
    }

    // Profile Modal
    function openProfile() {
      document.getElementById('profileModal').classList.add('active');
    }

    function closeProfile() {
      document.getElementById('profileModal').classList.remove('active');
    }

    // Close modal when clicking outside
    document.addEventListener('DOMContentLoaded', function() {
      const profileModal = document.getElementById('profileModal');
      if (profileModal) {
        profileModal.addEventListener('click', function(e) {
          if (e.target === this) {
            closeProfile();
          }
        });
      }
    });
  </script>

</body>
</html><?php /**PATH D:\laravel\Polcabot\resources\views/landing.blade.php ENDPATH**/ ?>