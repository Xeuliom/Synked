<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <style>
    :root {
      --primary-color: #4f46e5;       /* Vibrant purple */
      --primary-hover: #3730a3;      /* Darker purple */
      --secondary-color: #7c3aed;    /* Lighter purple */
      --text-color: #1e293b;         /* Dark gray for text */
      --bg-color: rgba(160, 215, 241, 0.44);
    }

    body {
      background-color: var(--bg-color);
      padding-top: 75px;
      min-height: 200vh; /* For demonstration */
    }

    /* Navbar styles */
    .navbar-custom {
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 1050;
      background: var(--bg-color);
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      transition: all 0.3s ease;
    }

    .navbar>.container-fluid {
      padding-left: 0;
      padding-right: 0;
      margin-left: 0;
      margin-right: 0;
    }

    /* Image brand styling */
    .navbar-brand-img {
      height: 50px;
      transition: all 0.3s ease;
      margin-left: 2rem;
    }

    .navbar-brand-img:hover {
      transform: scale(1.03);
      opacity: 0.9;
    }

    /* Nav item styling */
    .nav-link-custom {
      color: var(--primary-color) !important;
      font-weight: 500;
      margin: 0 0.5rem;
      padding: 0.5rem 1rem !important;
      border-radius: 8px;
      transition: all 0.3s ease;
      position: relative;
      opacity: 0.9;
    }

    .nav-link-custom:hover {
      color: var(--primary-hover) !important;
      background: rgba(79, 70, 229, 0.05);
      transform: translateY(-2px);
      opacity: 1;
    }

    .nav-link-custom::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 0;
      height: 2px;
      background: var(--primary-color);
      transition: all 0.3s ease;
      opacity: 0;
    }

    .nav-link-custom:hover::after {
      width: 70%;
      opacity: 0.7;
    }

    /* Scrolled state */
    .navbar-scrolled {
      background: rgba(255, 255, 255, 0.85) !important;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .navbar-scrolled .nav-link-custom {
      color: var(--primary-color) !important;
    }

    .navbar-scrolled .nav-link-custom:hover {
      color: var(--primary-hover) !important;
    }

    /* Mobile menu */
    @media (max-width: 991.98px) {
      .navbar-collapse {
        padding-left: 1rem;
        background: rgba(255, 255, 255, 0.95);
        margin-top: 0.5rem;
        border-radius: 8px;
      }

      .navbar-brand-img {
        margin-left: 1rem;
        height: 40px;
      }
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-custom fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php?action=home">
        <img src="assets/long.png" alt="Synked Logo" class="navbar-brand-img">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link nav-link-custom" href="index.php?action=profile">
              <i class="fas fa-user me-2"></i>Mon Profil
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-custom" href="index.php?action=logout">
              <i class="fas fa-sign-out-alt me-2"></i>Déconnexion
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <script>
    window.addEventListener('scroll', function() {
      const navbar = document.querySelector('.navbar-custom');
      const scrollPosition = window.scrollY;
      
      if (scrollPosition > 30) {
        navbar.classList.add('navbar-scrolled');
        // Smooth transition for links
        document.querySelectorAll('.nav-link-custom').forEach(link => {
          link.style.opacity = '0.95';
        });
      } else {
        navbar.classList.remove('navbar-scrolled');
        // Reset link opacity
        document.querySelectorAll('.nav-link-custom').forEach(link => {
          link.style.opacity = '0.9';
        });
      }
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>