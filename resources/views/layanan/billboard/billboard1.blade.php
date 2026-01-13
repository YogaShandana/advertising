<section class="billboard-grid-section py-5">
  <div class="container">
    <!-- Main Title -->
    <div class="row mb-5">
      <div class="col-12 text-center">
        <h2 class="display-4 fw-bold text-white">
          @if(count($billboards) > 0)
            Lokasi Billboard Kami
          @else
            Lokasi belum tersedia
          @endif
        </h2>
      </div>
    </div>

    <!-- Grid Items -->
    @if(count($billboards) > 0)
    <div class="row g-4">
      @foreach ($billboards as $index => $billboard)
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 100 }}">
        <div class="billboard-card text-center">
          <h3 class="text-white mb-3 fw-bold text-uppercase" style="letter-spacing: 1px;">{{ $billboard->judul }}</h3>
          
          <!-- Image Slider / Single Image -->
          <div class="image-container mb-3" style="border-radius: 15px; overflow: hidden; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);">
            @php
              $photos = $billboard->images ?? [];
              $photoCount = count($photos);
            @endphp
            
            @if($photoCount > 1)
              <!-- Carousel for multiple images -->
              <div id="carouselBillboard-{{ $index }}" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  @foreach($photos as $photoIndex => $photo)
                    <div class="carousel-item {{ $photoIndex === 0 ? 'active' : '' }}">
                      <img src="{{ asset('storage/' . $photo) }}" class="d-block w-100" alt="Foto {{ $photoIndex + 1 }}" style="height: 250px; object-fit: cover; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#billboardModal-{{ $index }}">
                    </div>
                  @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselBillboard-{{ $index }}" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselBillboard-{{ $index }}" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
            @elseif($photoCount === 1)
              <!-- Single image -->
              <img src="{{ asset('storage/' . $photos[0]) }}" class="w-100" alt="Foto" style="height: 250px; object-fit: cover; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#billboardModal-{{ $index }}">
            @else
              <!-- No image placeholder -->
              <div class="d-flex align-items-center justify-content-center bg-secondary" style="height: 250px;">
                <p class="text-white mb-0">Belum ada foto</p>
              </div>
            @endif
          </div>
          
          <p class="text-white mb-4 px-2" style="font-size: 1rem; opacity: 0.95;">
            {{ Str::limit($billboard->deskripsi, 100) }}
          </p>
          
          <div class="d-flex gap-2 justify-content-center">
            <a href="#" class="btn btn-outline-light px-4 py-2 rounded-1" data-bs-toggle="modal" data-bs-target="#billboardModal-{{ $index }}" style="border: 1px solid white; font-size: 0.9rem; border-radius: 10px; font-weight: 600; flex: 1;">
              Detail
            </a>
            <a href="https://wa.me/6289524653992?text=Hallo%20saya%20mau%20booking%20Billboard%0A%0ALokasi%3A%20{{ urlencode($billboard->judul) }}%0AAtas%20Nama%3A%20%0APada%20Tanggal%3A%20%0AKategori%20iklan%3A%20%0A%0AApakah%20tersedia%3F" target="_blank" class="btn btn-outline-light px-4 py-2 rounded-1" style="border: 1px solid white; font-size: 0.9rem; border-radius: 10px; font-weight: 600; flex: 1;">
              Booking
            </a>
          </div>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="billboardModal-{{ $index }}" tabindex="-1" aria-labelledby="billboardModalLabel-{{ $index }}" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content rounded-4 border-0 p-3">
            <div class="modal-header border-0 pb-0">
              <h3 class="modal-title fw-bold text-dark" id="billboardModalLabel-{{ $index }}" style="font-size: 2rem;">{{ $billboard->judul }}</h3>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <!-- Image Slider / Single Image -->
              @php
                $photos = $billboard->images ?? [];
                $photoCount = count($photos);
              @endphp
              
              @if($photoCount > 0)
                <div class="image-container mb-4" style="border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);">
                  @if($photoCount > 1)
                    <!-- Carousel for multiple images in modal -->
                    <div id="carouselModalBillboard-{{ $index }}" class="carousel slide" data-bs-ride="carousel">
                      <div class="carousel-indicators">
                        @foreach($photos as $photoIndex => $photo)
                          <button type="button" data-bs-target="#carouselModalBillboard-{{ $index }}" data-bs-slide-to="{{ $photoIndex }}" class="{{ $photoIndex === 0 ? 'active' : '' }}" aria-current="{{ $photoIndex === 0 ? 'true' : 'false' }}" aria-label="Slide {{ $photoIndex + 1 }}"></button>
                        @endforeach
                      </div>
                      <div class="carousel-inner">
                        @foreach($photos as $photoIndex => $photo)
                          <div class="carousel-item {{ $photoIndex === 0 ? 'active' : '' }}">
                            <img src="{{ asset('storage/' . $photo) }}" class="d-block w-100" alt="Foto {{ $photoIndex + 1 }}" style="height: 400px; object-fit: cover; cursor: zoom-in;" onclick="openImagePreview(this.src)">
                          </div>
                        @endforeach
                      </div>
                      <button class="carousel-control-prev" type="button" data-bs-target="#carouselModalBillboard-{{ $index }}" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                      </button>
                      <button class="carousel-control-next" type="button" data-bs-target="#carouselModalBillboard-{{ $index }}" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                      </button>
                    </div>
                  @else
                    <!-- Single image in modal -->
                    <img src="{{ asset('storage/' . $photos[0]) }}" class="w-100" alt="Foto" style="height: 400px; object-fit: cover; cursor: zoom-in;" onclick="openImagePreview(this.src)">
                  @endif
                </div>
              @endif
              
              <!-- Description -->
              <p class="text-dark mb-4" style="font-size: 1.1rem; line-height: 1.6;">
                {{ $billboard->deskripsi }}
              </p>
              
              <!-- Map and Calendar Row -->
              <div class="row g-3 mb-3">
                <!-- Map View -->
                <div class="col-md-6">
                  <div class="map-container" style="border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); height: 300px; display: flex;">
                    <iframe 
                      src="https://www.google.com/maps?q={{ $billboard->link_maps }}&output=embed"
                      width="100%" 
                      height="100%" 
                      style="border:0;" 
                      allowfullscreen="" 
                      loading="lazy">
                    </iframe>
                  </div>
                </div>
                
                <!-- Calendar -->
                <div class="col-md-6">
                  <div class="calendar-container p-3" style="border-radius: 8px; background-color: #ffffff; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); height: 300px; display: flex; flex-direction: column;">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                      <button class="btn btn-sm btn-outline-secondary px-2 py-1" onclick="changeMonthBillboard(-1, {{ $index }})" style="font-size: 0.8rem;">&lt;</button>
                      <h6 class="text-dark fw-bold mb-0" id="currentMonthBillboard-{{ $index }}" style="font-size: 0.9rem;"></h6>
                      <button class="btn btn-sm btn-outline-secondary px-2 py-1" onclick="changeMonthBillboard(1, {{ $index }})" style="font-size: 0.8rem;">&gt;</button>
                    </div>
                    <div class="calendar-grid flex-grow-1" id="calendarBillboard-{{ $index }}" style="overflow: hidden;"></div>
                    <div class="mt-2 pt-2 border-top">
                      <small class="text-muted d-flex align-items-center" style="font-size: 0.85rem;">
                        <span class="d-inline-block me-1" style="width: 12px; height: 12px; background-color: #dc3545; border-radius: 2px;"></span>
                        Tanggal berwarna merah sudah dibooking
                      </small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    @else
    <div class="row">
      <div class="col-12 text-center">
        <p class="text-white" style="font-size: 1.2rem; opacity: 0.8;">Belum ada lokasi billboard yang tersedia saat ini.</p>
      </div>
    </div>
    @endif
  </div>
</section>

<!-- Custom Lightbox Overlay -->
<div id="customLightbox" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.95); z-index: 999999; justify-content: center; align-items: center; backdrop-filter: blur(5px);">
    <button onclick="closeCustomLightbox()" style="position: absolute; top: 20px; right: 30px; background: none; border: none; color: white; font-size: 3rem; cursor: pointer; line-height: 1; z-index: 1000000; transition: transform 0.2s;">&times;</button>
    <img id="customLightboxImage" src="" style="max-width: 90vw; max-height: 90vh; object-fit: contain; box-shadow: 0 0 50px rgba(0,0,0,0.5); border-radius: 8px;">
</div>

<script>
  function openImagePreview(src) {
    const lightbox = document.getElementById('customLightbox');
    const img = document.getElementById('customLightboxImage');
    
    if (lightbox && img) {
      img.src = src;
      lightbox.style.display = 'flex';
      document.body.style.overflow = 'hidden'; // Prevent scrolling
    }
  }

  function closeCustomLightbox() {
    const lightbox = document.getElementById('customLightbox');
    if (lightbox) {
      lightbox.style.display = 'none';
      document.body.style.overflow = ''; // Restore scrolling
    }
  }

  // Close when clicking outside image
  document.addEventListener('DOMContentLoaded', function() {
    const lightbox = document.getElementById('customLightbox');
    if (lightbox) {
      lightbox.addEventListener('click', function(e) {
        if (e.target === this) {
          closeCustomLightbox();
        }
      });
    }
  });
</script>

<style>
  .billboard-grid-section {
    background-color: #1c4a86;
    font-family: 'Darker Grotesque', sans-serif;
  }

  .billboard-card {
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

  .billboard-card:hover {
    transform: translateY(-5px);
  }

  .billboard-card .btn-outline-light:hover {
    background-color: rgba(255, 255, 255, 0.2);
    color: white;
  }

  /* Calendar Styles */
  .calendar-grid {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 3px;
    font-size: 0.75rem;
    align-content: start;
  }

  .calendar-day {
    aspect-ratio: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid #e0e0e0;
    border-radius: 4px;
    cursor: pointer;
    transition: all 0.2s;
    background-color: #f8f9fa;
    padding: 2px;
    font-size: 0.7rem;
    max-height: 30px;
  }

  .calendar-day:hover:not(.disabled):not(.header) {
    background-color: #1c4a86;
    color: white;
    transform: scale(1.05);
  }

  .calendar-day.selected {
    background-color: #1c4a86;
    color: white;
    font-weight: bold;
  }

  .calendar-day.disabled {
    background-color: #e9ecef;
    color: #adb5bd;
    cursor: not-allowed;
  }

  .calendar-day.header {
    font-weight: bold;
    background-color: #e9ecef;
    cursor: default;
    border: none;
    font-size: 0.65rem;
  }

  .calendar-day.today {
    border: 2px solid #1c4a86;
  }

  .calendar-day.booked {
    background-color: #dc3545 !important;
    color: white !important;
    cursor: not-allowed;
    opacity: 0.8;
  }

  .calendar-day.booked:hover {
    background-color: #c82333 !important;
    transform: none;
  }
</style>

<script>
  let currentMonthsBillboard = {};
  let selectedDatesBillboard = {};
  let bookedDatesBillboard = {};

  function initCalendarBillboard(index) {
    const today = new Date();
    currentMonthsBillboard[index] = new Date(today.getFullYear(), today.getMonth(), 1);
  }

  function isDateBookedBillboard(dateString, index) {
    if (!bookedDatesBillboard[index] || !Array.isArray(bookedDatesBillboard[index])) return false;
    
    const checkDate = new Date(dateString);
    
    // Check if date falls within any booking period
    for (let booking of bookedDatesBillboard[index]) {
      const startDate = booking.booking_start_date ? new Date(booking.booking_start_date) : null;
      const endDate = booking.booking_end_date ? new Date(booking.booking_end_date) : null;
      
      if (startDate && endDate && checkDate >= startDate && checkDate <= endDate) {
        return true;
      }
    }
    
    return false;
  }

  function renderCalendarBillboard(index) {
    const calendar = document.getElementById(`calendarBillboard-${index}`);
    const monthLabel = document.getElementById(`currentMonthBillboard-${index}`);
    
    if (!calendar || !monthLabel) return;

    const year = currentMonthsBillboard[index].getFullYear();
    const month = currentMonthsBillboard[index].getMonth();
    
    monthLabel.textContent = new Date(year, month).toLocaleDateString('id-ID', { 
      month: 'long', 
      year: 'numeric' 
    });

    const firstDay = new Date(year, month, 1).getDay();
    const daysInMonth = new Date(year, month + 1, 0).getDate();
    const today = new Date();
    today.setHours(0, 0, 0, 0);

    let html = '';
    
    const dayNames = ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'];
    dayNames.forEach(day => {
      html += `<div class="calendar-day header">${day}</div>`;
    });

    for (let i = 0; i < firstDay; i++) {
      html += '<div class="calendar-day disabled"></div>';
    }

    for (let day = 1; day <= daysInMonth; day++) {
      const currentDate = new Date(year, month, day);
      currentDate.setHours(0, 0, 0, 0);
      
      let classes = 'calendar-day';
      const dateString = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
      
      // Check if date is booked
      if (isDateBookedBillboard(dateString, index)) {
        classes += ' booked';
      } else if (currentDate < today) {
        classes += ' disabled';
      }
      
      if (currentDate.getTime() === today.getTime()) {
        classes += ' today';
      }
      
      if (selectedDatesBillboard[index] && selectedDatesBillboard[index].getTime() === currentDate.getTime()) {
        classes += ' selected';
      }

      html += `<div class="${classes}" onclick="selectDateBillboard('${dateString}', ${index})">${day}</div>`;
    }

    calendar.innerHTML = html;
  }

  function changeMonthBillboard(direction, index) {
    currentMonthsBillboard[index].setMonth(currentMonthsBillboard[index].getMonth() + direction);
    renderCalendarBillboard(index);
  }

  function selectDateBillboard(dateString, index) {
    const selectedDate = new Date(dateString);
    const today = new Date();
    today.setHours(0, 0, 0, 0);
    
    // Prevent selection of past dates or booked dates
    if (selectedDate < today || isDateBookedBillboard(dateString, index)) return;
    
    selectedDatesBillboard[index] = selectedDate;
    renderCalendarBillboard(index);
  }

  document.addEventListener('DOMContentLoaded', function() {
    @foreach ($billboards as $index => $billboard)
      // Store booked dates for each billboard (as array of booking periods)
      bookedDatesBillboard[{{ $index }}] = @json($billboard->bookings ?? []);
      
      initCalendarBillboard({{ $index }});
      
      // Render calendar when modal is shown
      const modalElement{{ $index }} = document.getElementById('billboardModal-{{ $index }}');
      if (modalElement{{ $index }}) {
        modalElement{{ $index }}.addEventListener('shown.bs.modal', function() {
          renderCalendarBillboard({{ $index }});
        });
      }
    @endforeach
  });
</script>
