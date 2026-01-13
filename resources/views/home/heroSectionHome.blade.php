@php
    $heroTitle = $heroSection?->judul ?? 'Mitra Terbaik<br>Promosi Bisnis Anda';
    $heroDesc = $heroSection?->deskripsi ?? 'Kami menyediakan layanan periklanan luar ruang premium melalui Videotron, Baliho, dan Billboard di lokasi strategis untuk memaksimalkan jangkauan dan dampak brand Anda.';
    $heroImage = $heroSection?->gambar ? asset('storage/' . $heroSection->gambar) : asset('storage/img/herosection/heroSectionHome.png');
@endphp

<section class="hero-section position-relative" style="background-image: url('{{ $heroImage }}'); background-size: cover; background-position: center; min-height: 100vh; display: flex; align-items: center;">
  <!-- Overlay -->
  <div class="position-absolute top-0 start-0 w-100 h-100" style="background: rgba(0, 0, 0, 0.4);"></div>
  
  <!-- Content -->
  <div class="container position-relative mt-lg-5" style="z-index: 2;">
    <div class="row">
      <div class="col-lg-6 col-md-8">
        <h1 class="display-3 fw-bold text-white mb-4" style="font-size: 3.5rem; line-height: 1.2; -webkit-text-fill-color: white; -webkit-text-stroke: 0; color: white !important;" data-aos="fade-down" data-aos-duration="1200">
          {!! $heroTitle !!}
        </h1>
        
        <p class="text-white mb-5" style="font-size: 1.1rem; opacity: 0.95; max-width: 500px;" data-aos="fade-up" data-aos-delay="200">
          {{ $heroDesc }}
        </p>
        
        <!-- Buttons -->
        <div class="d-flex gap-3 flex-wrap" data-aos="fade-up" data-aos-delay="400">
          <a href="#" class="btn btn-outline-light btn-lg px-5 py-3 rounded-1" style="border: 1px solid white; font-weight: 500; letter-spacing: 0.5px;">
            TENTANG KAMI
          </a>
          <a href="#" class="btn btn-outline-light btn-lg px-5 py-3 rounded-1" style="border: 1px solid white; font-weight: 500; letter-spacing: 0.5px;">
            HUBUNGI KAMI
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
  /* Hero Section Styling */
  .hero-section {
    position: relative;
    overflow: hidden;
  }

  .hero-section .btn-outline-light {
    transition: all 0.3s ease;
  }

  .hero-section .btn-outline-light:hover {
    background-color: rgba(255, 255, 255, 0.2);
    border-color: white;
    transform: translateY(-2px);
  }

  /* Responsive */
  @media (max-width: 768px) {
    .hero-section {
      min-height: 80vh;
    }
    
    .hero-section h1 {
      font-size: 2.5rem !important;
    }
    
    .hero-section p {
      font-size: 1rem !important;
    }
    
    .hero-section .btn {
      font-size: 0.9rem;
      padding: 0.75rem 2rem !important;
    }
  }
</style>
