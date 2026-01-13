<nav id="mainNavbar" class="navbar navbar-expand-lg navbar-dark fixed-top">
  <div class="container">
    <!-- Logo & Brand -->
    <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
      <img src="{{ asset('storage/img/logo.png') }}" alt="Tri Bhakti Advertising Logo" height="40" class="me-2">
    </a>

    <!-- Toggler for Mobile -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navigation Menu -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('/') ? 'active bg-danger rounded-pill px-4' : '' }}" href="{{ url('/') }}">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle {{ Request::is('layanan*') ? 'active bg-danger rounded-pill px-4' : '' }}" 
             href="#" 
             id="layananDropdown" 
             role="button" 
             data-bs-toggle="dropdown" 
             data-bs-display="static"
             aria-expanded="false">
            Layanan
          </a>
          <ul class="dropdown-menu dropdown-menu-custom mt-3" aria-labelledby="layananDropdown">
            <li><a class="dropdown-item {{ Request::is('layanan/videotron') ? 'active' : '' }}" href="{{ url('/layanan/videotron') }}">Videotron</a></li>
            <li><a class="dropdown-item {{ Request::is('layanan/baliho') ? 'active' : '' }}" href="{{ url('/layanan/baliho') }}">Baliho</a></li>
            <li><a class="dropdown-item {{ Request::is('layanan/billboard') ? 'active' : '' }}" href="{{ url('/layanan/billboard') }}">Billboard</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('tentang-kami*') ? 'active bg-danger rounded-pill px-4' : '' }}" href="{{ url('/tentang-kami') }}">Tentang Kami</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('kontak*') ? 'active bg-danger rounded-pill px-4' : '' }}" href="{{ url('/kontak') }}">Kontak</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<style>
  /* Custom Navbar Styling */
  .navbar {
    background-color: transparent !important;
    padding: 0.75rem 0;
    z-index: 1030;
    transition: all 0.3s ease;
  }

  /* Navbar when scrolled */
  .navbar.scrolled {
    background-color: #000000 !important;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
  }

  .navbar-brand {
    color: #ffffff !important;
    font-weight: 600;
  }

  .navbar-nav .nav-link {
    color: #ffffff !important;
    font-weight: 500;
    padding: 0.5rem 1.25rem;
    margin: 0 0.25rem;
    transition: all 0.3s ease;
  }

  .navbar-nav .nav-link:hover {
    color: #f8f9fa !important;
  }

  .navbar-nav .nav-link.active {
    background-color: #dc3545 !important;
    color: #ffffff !important;
    border-radius: 50px;
  }

  /* Dropdown Menu Styling */
  .dropdown-menu-custom {
    background-color: #c92a2a !important;
    border: none;
    border-radius: 25px; /* Radius disesuaikan */
    padding: 1.25rem 1rem;
    margin-top: 25px; /* Turunkan sedikit lagi */
    min-width: 180px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    
    /* Posisi: Geser lagi ke kanan */
    left: 50%;
    transform: translateX(-20%); /* Geser lebih ke kanan */
  }

  /* Reset default positioning di mobile agar tidak berantakan */
  @media (max-width: 991px) {
    .dropdown-menu-custom {
      left: 0;
      transform: none;
      width: 100%;
      text-align: center;
    }
  }

  /* Styling Item Dropdown */
  .dropdown-menu-custom .dropdown-item {
    color: rgba(255, 255, 255, 0.6) !important;
    font-weight: 500;
    padding: 0.5rem 0;
    background: transparent !important;
    font-size: 1.2rem; /* Ukuran sama rata */
    text-align: center;
    transition: all 0.3s ease;
  }

  /* Active State & Hover */
  .dropdown-menu-custom .dropdown-item:hover,
  .dropdown-menu-custom .dropdown-item.active {
    color: #ffffff !important;
    font-weight: 700; /* Lebih tebal saat aktif */
    opacity: 1;
    transform: scale(1.05);
  }

  /* Arrow/Chevron Animation */
  .nav-link.dropdown-toggle::after {
    transition: transform 0.3s ease;
    margin-left: 0.5em;
    vertical-align: middle;
  }

  /* Putar arrow ke atas saat dropdown terbuka */
  .nav-link.dropdown-toggle.show::after {
    transform: rotate(180deg);
  }

  /* Mobile Responsive */
  @media (max-width: 991px) {
    .navbar {
      background-color: #000000 !important;
    }
    
    .navbar-nav {
      margin-top: 1rem;
    }
    
    .navbar-nav .nav-link {
      margin: 0.25rem 0;
    }
  }
</style>

<script>
  // Navbar scroll effect
  document.addEventListener('DOMContentLoaded', function() {
    const navbar = document.getElementById('mainNavbar');
    
    window.addEventListener('scroll', function() {
      if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
      } else {
        navbar.classList.remove('scrolled');
      }
    });
  });
</script>
