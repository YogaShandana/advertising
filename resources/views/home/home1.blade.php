<section class="py-5" style="background-color: #1c4a86;">
  <div class="container py-5">
    <!-- Main Heading -->
    <h2 class="text-center text-white fw-bold mb-5" style="font-size: 2.5rem;" data-aos="fade-up">
      LOKASI UNGGULAN
    </h2>

    <!-- 3 Columns Grid -->
    <div class="row g-4">
      <!-- Column 1: Videotron -->
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
        <div class="home-card text-center">
          <h4 class="text-white fw-semibold mb-3" style="font-size: 1.5rem;">
            {{ $featuredVideotron?->judul ?? 'VIDEOTRON' }}
          </h4>
          
          <!-- Image Slider / Single Image -->
          <div class="image-container mb-3" style="border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);">
            @php
              $photos = $featuredVideotron?->images ?? [];
              $photoCount = count($photos);
            @endphp
            
            @if($photoCount > 1)
              <!-- Carousel for multiple images -->
              <div id="carouselVideotron" class="carousel slide">
                <div class="carousel-inner">
                  @foreach($photos as $photoIndex => $photo)
                    <div class="carousel-item {{ $photoIndex === 0 ? 'active' : '' }}">
                      <img src="{{ asset('storage/' . $photo) }}" 
                           class="d-block w-100" 
                           alt="Foto {{ $photoIndex + 1 }}" 
                           style="height: 250px; object-fit: cover;"
                           loading="{{ $photoIndex === 0 ? 'eager' : 'lazy' }}">
                    </div>
                  @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselVideotron" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselVideotron" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
            @elseif($photoCount === 1)
              <!-- Single image -->
              <img src="{{ asset('storage/' . $photos[0]) }}" class="w-100" alt="Foto" style="height: 250px; object-fit: cover;" loading="eager">
            @else
              <!-- No image placeholder -->
              <div class="d-flex align-items-center justify-content-center bg-secondary" style="height: 250px;">
                <p class="text-white mb-0">Belum ada foto</p>
              </div>
            @endif
          </div>
          
          <p class="text-white mb-4" style="opacity: 0.95; font-size: 1rem;">
            {{ Str::limit($featuredVideotron?->deskripsi ?? 'Lokasi strategis untuk videotron Anda.', 100) }}
          </p>
          
          <a href="{{ url('/layanan/videotron') }}" class="btn btn-outline-light px-5 py-2 rounded-1 mx-auto d-block" style="border: 2px solid white; font-weight: 600; width: 80%;">
            Videotron
          </a>
        </div>
      </div>

      <!-- Column 2: Baliho -->
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
        <div class="home-card text-center">
          <h4 class="text-white fw-semibold mb-3" style="font-size: 1.5rem;">
            {{ $featuredBaliho?->judul ?? 'BALIHO' }}
          </h4>
          
          <!-- Image Slider / Single Image -->
          <div class="image-container mb-3" style="border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);">
            @php
              $photos = $featuredBaliho?->images ?? [];
              $photoCount = count($photos);
            @endphp
            
            @if($photoCount > 1)
              <!-- Carousel for multiple images -->
              <div id="carouselBaliho" class="carousel slide">
                <div class="carousel-inner">
                  @foreach($photos as $photoIndex => $photo)
                    <div class="carousel-item {{ $photoIndex === 0 ? 'active' : '' }}">
                      <img src="{{ asset('storage/' . $photo) }}" 
                           class="d-block w-100" 
                           alt="Foto {{ $photoIndex + 1 }}" 
                           style="height: 250px; object-fit: cover;"
                           loading="{{ $photoIndex === 0 ? 'eager' : 'lazy' }}">
                    </div>
                  @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselBaliho" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselBaliho" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
            @elseif($photoCount === 1)
              <!-- Single image -->
              <img src="{{ asset('storage/' . $photos[0]) }}" class="w-100" alt="Foto" style="height: 250px; object-fit: cover;" loading="eager">
            @else
              <!-- No image placeholder -->
              <div class="d-flex align-items-center justify-content-center bg-secondary" style="height: 250px;">
                <p class="text-white mb-0">Belum ada foto</p>
              </div>
            @endif
          </div>
          
          <p class="text-white mb-4" style="opacity: 0.95; font-size: 1rem;">
            {{ Str::limit($featuredBaliho?->deskripsi ?? 'Lokasi strategis untuk baliho Anda.', 100) }}
          </p>
          
          <a href="{{ url('/layanan/baliho') }}" class="btn btn-outline-light px-5 py-2 rounded-1 mx-auto d-block" style="border: 2px solid white; font-weight: 600; width: 80%;">
            Baliho
          </a>
        </div>
      </div>

      <!-- Column 3: Billboard -->
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
        <div class="home-card text-center">
          <h4 class="text-white fw-semibold mb-3" style="font-size: 1.5rem;">
            {{ $featuredBillboard?->judul ?? 'BILLBOARD' }}
          </h4>
          
          <!-- Image Slider / Single Image -->
          <div class="image-container mb-3" style="border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);">
            @php
              $photos = $featuredBillboard?->images ?? [];
              $photoCount = count($photos);
            @endphp
            
            @if($photoCount > 1)
              <!-- Carousel for multiple images -->
              <div id="carouselBillboard" class="carousel slide">
                <div class="carousel-inner">
                  @foreach($photos as $photoIndex => $photo)
                    <div class="carousel-item {{ $photoIndex === 0 ? 'active' : '' }}">
                      <img src="{{ asset('storage/' . $photo) }}" 
                           class="d-block w-100" 
                           alt="Foto {{ $photoIndex + 1 }}" 
                           style="height: 250px; object-fit: cover;"
                           loading="{{ $photoIndex === 0 ? 'eager' : 'lazy' }}">
                    </div>
                  @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselBillboard" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselBillboard" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
            @elseif($photoCount === 1)
              <!-- Single image -->
              <img src="{{ asset('storage/' . $photos[0]) }}" class="w-100" alt="Foto" style="height: 250px; object-fit: cover;" loading="eager">
            @else
              <!-- No image placeholder -->
              <div class="d-flex align-items-center justify-content-center bg-secondary" style="height: 250px;">
                <p class="text-white mb-0">Belum ada foto</p>
              </div>
            @endif
          </div>
          
          <p class="text-white mb-4" style="opacity: 0.95; font-size: 1rem;">
            {{ Str::limit($featuredBillboard?->deskripsi ?? 'Lokasi strategis untuk billboard Anda.', 100) }}
          </p>
          
          <a href="{{ url('/layanan/billboard') }}" class="btn btn-outline-light px-5 py-2 rounded-1 mx-auto d-block" style="border: 2px solid white; font-weight: 600; width: 80%;">
            Billboard
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
  /* Home Card Styling */
  .home-card {
    padding: 2rem 1.5rem;
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(10px);
    border-radius: 30px;
    transition: transform 0.3s ease;
    min-height: 550px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }

  .home-card:hover {
    transform: translateY(-5px);
  }

  /* Button Hover Effect */
  .btn-outline-light:hover {
    background-color: rgba(255, 255, 255, 0.2);
    border-color: white;
    transform: translateY(-2px);
    transition: all 0.3s ease;
  }

  /* Responsive */
  @media (max-width: 768px) {
    .map-container iframe {
      height: 200px;
    }
  }
</style>
