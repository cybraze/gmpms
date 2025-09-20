<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GM - PROGRESS MONITORING SYSTEM - BILASPUR (S.E.C.R.)</title>
        <link rel="icon" href="{{ asset('assets/admin_css/img/indian.png') }}" type="image/x-icon">

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

 <style>
  * {
    font-family: 'Poppins', sans-serif;
  }

html, body {
  height: 100%;
  margin: 0;
  padding: 0;
}

body {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh; /* Ensures full screen height */
  overflow: hidden;
  background: linear-gradient(135deg, #f8f9fa, #e0f7fa, #e1bee7, #bbdefb);
  background-size: 400% 400%;
  animation: gradientBG 15s ease infinite;
  position: relative;
}



  @keyframes gradientBG {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
  }

  .glow-circle {
    position: absolute;
    border-radius: 50%;
    background: rgba(0, 188, 212, 0.2);
    box-shadow: 0 0 60px 20px rgba(0, 188, 212, 0.3);
    animation: float 10s linear infinite;
    z-index: 0;
  }

  .glow-circle:nth-child(1) {
    width: 300px;
    height: 300px;
    top: -80px;
    left: -80px;
  }

  .glow-circle:nth-child(2) {
    width: 350px;
    height: 350px;
    bottom: -100px;
    right: -100px;
  }

  @keyframes float {
    0% { transform: translateY(0px); }
    50% { transform: translateY(-40px); }
    100% { transform: translateY(0px); }
  }

  .login-container {
    position: relative;
    z-index: 2;
    max-width: 400px;
    width: 100%;
    background: rgba(255,255,255,0.95);
    border-radius: 20px;
    padding: 40px 30px;
    box-shadow: 10px 10px 30px rgba(0,0,0,0.1), -10px -10px 30px rgba(255,255,255,0.6);
    animation: fadeIn 1.2s ease;
  }

  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(-30px); }
    to { opacity: 1; transform: translateY(0); }
  }

  .logo img {
    height: 85px;
    border-radius: 50%;
    box-shadow: 0 0 18px rgba(0,0,0,0.2);
    animation: bounce 3s infinite;
  }

  @keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-8px); }
  }

  .input-box {
    position: relative;
    margin-bottom: 25px;
  }

  .input-box input {
    width: 100%;
    padding: 14px 18px;
    border-radius: 12px;
    border: none;
    outline: none;
    background: #f1f5f9;
    box-shadow: inset 3px 3px 6px rgba(0,0,0,0.15),
                inset -3px -3px 6px rgba(255,255,255,0.8);
    transition: all 0.3s ease;
  }

  .input-box input:focus {
    background: #fff;
    box-shadow: 0 0 8px #00bcd4;
  }

  .input-box label {
    position: absolute;
    top: -10px;
    left: 18px;
    font-size: 13px;
    font-weight: 600;
    color: #555;
    background: #fff;
    padding: 0 6px;
    border-radius: 4px;
  }

  .toggle-eye {
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    font-size: 18px;
    color: #666;
  }

  .login-btn {
    width: 100%;
    padding: 14px;
    border: none;
    border-radius: 12px;
    font-size: 16px;
    font-weight: bold;
    color: #fff;
    background: linear-gradient(135deg, #ff6ec4, #7873f5, #4dd0e1);
    background-size: 300% 300%;
    cursor: pointer;
    transition: all 0.3s ease;
    animation: bubbleGlow 6s ease infinite;
    box-shadow: 4px 4px 12px rgba(0,0,0,0.2), -4px -4px 12px rgba(255,255,255,0.5);
  }

  @keyframes bubbleGlow {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
  }

  .login-btn:hover {
    transform: scale(1.06);
    box-shadow: 0 8px 20px rgba(0,188,212,0.5);
  }

  /* Mobile optimization */
  @media (max-width: 576px) {
    .glow-circle:nth-child(1),
    .glow-circle:nth-child(2) {
      display: none;
    }

    .login-container {
      padding: 30px 20px;
      border-radius: 16px;
    }

    .logo img {
      height: 70px;
    }

    .login-btn {
      font-size: 15px;
    }
  }

  @media (max-height: 600px) {
  .login-container {
    transform: scale(0.9);
  }
}

</style>

</head>
<body>

  <!-- Floating Background Circles -->
  <div class="glow-circle"></div>
  <div class="glow-circle"></div>

  <div class="login-container">
    <div class="logo text-center mb-3">
      <img src="{{ asset('assets/admin_css/img/indian.png') }}" alt="logo">
    </div>
    <h3 class="text-center mb-1 fw-bold text-dark">Welcome to GM - PMS</h3>
<p class="text-center mb-4 text-secondary fw-semibold" style="font-size: 14px;">
  GM - Progress Monitoring System,<br> Headquarter (S.E.C.R.)
</p>

   <form method="POST" action="{{ route('login.post') }}">
  @csrf
      <div class="input-box">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required>
      </div>
      <div class="input-box">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
        <i class="bi bi-eye-slash toggle-eye" id="togglePassword"></i>
      </div>
      <button class="login-btn" type="submit">Login</button>
    </form>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    // Toggle Password Visibility
    const togglePassword = document.querySelector("#togglePassword");
    const password = document.querySelector("#password");

    togglePassword.addEventListener("click", function () {
      const type = password.getAttribute("type") === "password" ? "text" : "password";
      password.setAttribute("type", type);
      this.classList.toggle("bi-eye");
      this.classList.toggle("bi-eye-slash");
    });
  </script>
</body>
</html>
