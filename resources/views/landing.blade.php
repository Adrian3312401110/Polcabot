<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PolCaBot</title>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { font-family: Arial, sans-serif; scroll-behavior: smooth; }

    /* Navbar */
    nav {
  position: fixed;
  top: 0; left: 0; width: 100%;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 15px 50px;
  background: rgba(0, 0, 0, 0.1); /* transparan */
  color: #fff;
  z-index: 1000;
  backdrop-filter: blur(6px); /* efek kaca */
  box-shadow: 0 2px 6px rgba(0,0,0,0.2); /* opsional: bayangan halus */
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
  top: 80px; /* tetap */
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

/* ubah bagian ini */
.features-container {
  margin-top: 1px; /* semula 120px, dikurangi agar kotak putih lebih dekat */
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
      background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://www.polibatam.ac.id/wp-content/uploads/2022/02/MG_8950-scaled.jpg') no-repeat center/cover;
      color: white;
      gap: 30px;
    }
    #about img { width: 400px; border-radius: 20px; }
    #about .text { max-width: 500px; }
    #about button {
      margin-top: 20px; padding: 10px 20px;
      background: #1e90ff; border: none; color: white; border-radius: 8px;
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

/* Responsif */
@media (max-width: 768px) {
  .contact-wrapper {
    flex-direction: column;
  }
}
    #contact {
      background: #fff;
      flex-direction: column;
    }
    .contact-container { display: flex; gap: 40px; }
    form {
      flex: 1;
      display: flex;
      flex-direction: column;
      gap: 15px;
    }
    form input, form textarea {
      padding: 10px;
      border: none;
      border-bottom: 2px solid #ccc;
    }
    form button {
      background: #333;
      color: white;
      padding: 12px;
      border: none;
    }
    .contact-info {
      background: #111;
      color: white;
      padding: 20px;
      border-radius: 10px;
      flex: 1;
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
  </style>
</head>
<body>

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
    <a href="#" class="btn-signin">Sign In</a>
  </nav>

    <!-- Landing Page -->
<section id="home">
    <div class="home-content">
      <h1>
  Selamat Datang di 
  <span style="color:white;">P</span><span style="color:orange;">o</span><span style="color:white;">l</span><span style="color:#1e90ff;">CaBot</span>
      <p class="tagline">
        PolCaBot adalah aplikasi chatbot berbasis AI yang dirancang untuk membantu menjawab pertanyaan seputar akademik dan administrasi kampus.
      </p>
      
      <a href="#features" class="btn-main">Get Started</a>
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

</body>
</html>