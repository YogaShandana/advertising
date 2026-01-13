<section class="py-5 bg-white">
  <div class="container py-5">
    <!-- Header Section -->
    <div class="text-center mb-5">
      <h2 class="fw-bold mb-3" style="font-size: 2.5rem; color: #000;">{{ $tentangKami2 && $tentangKami2->judul ? $tentangKami2->judul : 'Mengapa Memilih Kami?' }}</h2>
      <p class="text-muted mx-auto" style="max-width: 700px; font-size: 1rem; line-height: 1.6;">
        {{ $tentangKami2 && $tentangKami2->deskripsi ? $tentangKami2->deskripsi : 'Kami berkomitmen memberikan layanan periklanan luar ruang terbaik dengan jangkauan luas dan dampak maksimal untuk bisnis Anda.' }}
      </p>
    </div>

    <!-- 3 Columns Stats -->
    <div class="row g-4 text-center">
      @if($tentangKami2 && $tentangKami2->icon1)
      <div class="col-md-4">
        <div class="p-3">
          <!-- Icon -->
          <div class="mb-4">
            @php
              $icons = config('icons');
              $iconSvg = $icons[$tentangKami2->icon1] ?? $icons['bi-person-check'];
            @endphp
            {!! $iconSvg !!}
          </div>
          
          <!-- Number -->
          <h2 class="fw-bold mb-3" style="font-size: 3.5rem; color: #000;">{{ $tentangKami2->angka_icon1 }}</h2>
          
          <!-- Description -->
          <p class="text-muted mx-auto" style="max-width: 300px; font-size: 0.95rem;">
            {{ $tentangKami2->deskripsi_icon1 }}
          </p>
        </div>
      </div>
      @else
      <div class="col-md-4">
        <div class="p-3">
          <!-- Icon -->
          <div class="mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-person-check" viewBox="0 0 16 16">
              <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
              <path d="M8.256 14a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z"/>
            </svg>
          </div>
          
          <!-- Number -->
          <h2 class="fw-bold mb-3" style="font-size: 3.5rem; color: #000;">500+</h2>
          
          <!-- Description -->
          <p class="text-muted mx-auto" style="max-width: 300px; font-size: 0.95rem;">
            Klien puas yang telah mempercayakan promosi bisnis mereka kepada kami.
          </p>
        </div>
      </div>
      @endif

      @if($tentangKami2 && $tentangKami2->icon2)
      <div class="col-md-4">
        <div class="p-3">
          <!-- Icon -->
          <div class="mb-4">
            @php
              $icons = config('icons');
              $iconSvg = $icons[$tentangKami2->icon2] ?? $icons['bi-geo-alt'];
            @endphp
            {!! $iconSvg !!}
          </div>
          
          <!-- Number -->
          <h2 class="fw-bold mb-3" style="font-size: 3.5rem; color: #000;">{{ $tentangKami2->angka_icon2 }}</h2>
          
          <!-- Description -->
          <p class="text-muted mx-auto" style="max-width: 300px; font-size: 0.95rem;">
            {{ $tentangKami2->deskripsi_icon2 }}
          </p>
        </div>
      </div>
      @else
      <div class="col-md-4">
        <div class="p-3">
          <!-- Icon -->
          <div class="mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
              <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10"/>
              <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
            </svg>
          </div>
          
          <!-- Number -->
          <h2 class="fw-bold mb-3" style="font-size: 3.5rem; color: #000;">50+</h2>
          
          <!-- Description -->
          <p class="text-muted mx-auto" style="max-width: 300px; font-size: 0.95rem;">
            Titik lokasi strategis tersebar di seluruh wilayah Bali dan sekitarnya.
          </p>
        </div>
      </div>
      @endif

      @if($tentangKami2 && $tentangKami2->icon3)
      <div class="col-md-4">
        <div class="p-3">
          <!-- Icon -->
          <div class="mb-4">
            @php
              $icons = config('icons');
              $iconSvg = $icons[$tentangKami2->icon3] ?? $icons['bi-award'];
            @endphp
            {!! $iconSvg !!}
          </div>
          
          <!-- Number -->
          <h2 class="fw-bold mb-3" style="font-size: 3.5rem; color: #000;">{{ $tentangKami2->angka_icon3 }}</h2>
          
          <!-- Description -->
          <p class="text-muted mx-auto" style="max-width: 300px; font-size: 0.95rem;">
            {{ $tentangKami2->deskripsi_icon3 }}
          </p>
        </div>
      </div>
      @else
      <div class="col-md-4">
        <div class="p-3">
          <!-- Icon -->
          <div class="mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-award" viewBox="0 0 16 16">
              <path d="M9.669.864 8 0 6.331.864l-1.858.282-.842 1.68-1.337 1.32L2.6 6l-.306 1.854 1.337 1.32.842 1.68 1.858.282L8 12l1.669-.864 1.858-.282.842-1.68 1.337-1.32L13.4 6l.306-1.854-1.337-1.32-.842-1.68zm1.196 1.193.684 1.365 1.086 1.072L12.387 6l.248 1.506-1.086 1.072-.684 1.365-1.51.229L8 10.874l-1.355-.702-1.51-.229-.684-1.365-1.086-1.072L3.614 6l-.25-1.506 1.087-1.072.684-1.365 1.51-.229L8 1.126l1.356.702z"/>
              <path d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1z"/>
            </svg>
          </div>
          
          <!-- Number -->
          <h2 class="fw-bold mb-3" style="font-size: 3.5rem; color: #000;">10+</h2>
          
          <!-- Description -->
          <p class="text-muted mx-auto" style="max-width: 300px; font-size: 0.95rem;">
            Tahun pengalaman dalam industri periklanan dan media luar ruang.
          </p>
        </div>
      </div>
      @endif
    </div>
  </div>
</section>

<style>
  /* Hover Effect for Icons */
  .bi-clipboard-check {
    transition: transform 0.3s ease;
  }
  
  .col-md-4:hover .bi-clipboard-check {
    transform: scale(1.1);
  }
</style>
