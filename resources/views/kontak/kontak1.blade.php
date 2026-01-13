<section class="py-5 bg-light">
    <div class="container py-lg-5">
        <div class="row g-5">
            <!-- Left Column: Contact Info -->
            <div class="col-lg-5" data-aos="fade-right">
                <div class="pe-lg-4">
                    <span class="d-inline-block py-1 px-3 rounded-pill bg-primary bg-opacity-10 text-primary fw-bold small mb-3 letter-spacing-1">
                        HUBUNGI KAMI
                    </span>
                    <h2 class="display-5 fw-bold mb-4 text-dark">
                        {{ $kontak && $kontak->judul ? $kontak->judul : 'Mari Diskusikan' }} <br>
                        <span class="text-primary position-relative">
                            {{ $kontak && $kontak->sub_judul ? $kontak->sub_judul : 'Project Anda' }}
                            <svg class="position-absolute start-0 bottom-0 w-100" height="10" viewBox="0 0 100 10" preserveAspectRatio="none" style="z-index:-1; opacity:0.2;">
                                <path d="M0 5 Q 50 10 100 5" stroke="#1c4a86" stroke-width="8" fill="none" />
                            </svg>
                        </span>
                    </h2>
                    <p class="text-secondary lead mb-5">
                        {{ $kontak && $kontak->deskripsi ? $kontak->deskripsi : 'Kami siap membantu bisnis Anda tumbuh lebih besar dengan solusi periklanan luar ruang yang efektif.' }}
                    </p>

                    <!-- Contact Details -->
                    <div class="row g-4">
                        <!-- Address -->
                        <div class="col-md-6">
                            <div class="d-flex align-items-start">
                                <div class="flex-shrink-0 d-flex align-items-center justify-content-center bg-white rounded-circle shadow-sm text-primary" style="width: 50px; height: 50px;">
                                    @if($kontak && $kontak->icon_alamat)
                                        @php
                                            $icons = config('icons');
                                            $iconSvg = $icons[$kontak->icon_alamat] ?? $icons['bi-geo-alt-fill'];
                                        @endphp
                                        {!! $iconSvg !!}
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                            <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                                        </svg>
                                    @endif
                                </div>
                                <div class="ms-3">
                                    <h6 class="fw-bold mb-1">{{ $kontak && $kontak->judul_alamat ? $kontak->judul_alamat : 'Alamat Kantor' }}</h6>
                                    <p class="text-secondary mb-0 small">{!! $kontak && $kontak->deskripsi_alamat ? nl2br(e($kontak->deskripsi_alamat)) : 'Jl. Pulau Saelus No. 50X / 61<br>Denpasar, Bali' !!}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Phone & Fax -->
                        <div class="col-md-6">
                            <div class="d-flex align-items-start">
                                <div class="flex-shrink-0 d-flex align-items-center justify-content-center bg-white rounded-circle shadow-sm text-primary" style="width: 50px; height: 50px;">
                                    @if($kontak && $kontak->icon_telepon)
                                        @php
                                            $icons = config('icons');
                                            $iconSvg = $icons[$kontak->icon_telepon] ?? $icons['bi-telephone-fill'];
                                        @endphp
                                        {!! $iconSvg !!}
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                                        </svg>
                                    @endif
                                </div>
                                <div class="ms-3">
                                    <h6 class="fw-bold mb-1">{{ $kontak && $kontak->judul_telepon ? $kontak->judul_telepon : 'Telepon & Fax' }}</h6>
                                    <p class="text-secondary mb-0 small">{!! $kontak && $kontak->deskripsi_telepon ? nl2br(e($kontak->deskripsi_telepon)) : 'Phone: (0361) 232355<br>Fax: (0361) 221874' !!}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="col-md-6">
                            <div class="d-flex align-items-start">
                                <div class="flex-shrink-0 d-flex align-items-center justify-content-center bg-white rounded-circle shadow-sm text-primary" style="width: 50px; height: 50px;">
                                    @if($kontak && $kontak->icon_email)
                                        @php
                                            $icons = config('icons');
                                            $iconSvg = $icons[$kontak->icon_email] ?? $icons['bi-envelope-fill'];
                                        @endphp
                                        {!! $iconSvg !!}
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                            <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4.697l-5.803 3.546a.401.401 0 0 1-.4.013L4 5.304 0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Z"/>
                                        </svg>
                                    @endif
                                </div>
                                <div class="ms-3">
                                    <h6 class="fw-bold mb-1">{{ $kontak && $kontak->judul_email ? $kontak->judul_email : 'Email' }}</h6>
                                    <p class="text-secondary mb-0 small">{{ $kontak && $kontak->deskripsi_email ? $kontak->deskripsi_email : 'tribhakti77@yahoo.com' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Director -->
                        <div class="col-md-6">
                            <div class="d-flex align-items-start">
                                <div class="flex-shrink-0 d-flex align-items-center justify-content-center bg-white rounded-circle shadow-sm text-primary" style="width: 50px; height: 50px;">
                                    @if($kontak && $kontak->icon_direktur)
                                        @php
                                            $icons = config('icons');
                                            $iconSvg = $icons[$kontak->icon_direktur] ?? $icons['bi-person-badge-fill'];
                                        @endphp
                                        {!! $iconSvg !!}
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-badge-fill" viewBox="0 0 16 16">
                                            <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2zm4.5 0a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1zM8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6m5 2.755C12.146 12.825 10.623 12 8 12s-4.146.826-5 1.755V14a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1z"/>
                                        </svg>
                                    @endif
                                </div>
                                <div class="ms-3">
                                    <h6 class="fw-bold mb-1">{{ $kontak && $kontak->judul_direktur ? $kontak->judul_direktur : 'Direktur' }}</h6>
                                    <p class="text-secondary mb-0" style="font-size: 0.8rem;">{!! $kontak && $kontak->deskripsi_direktur ? nl2br(e($kontak->deskripsi_direktur)) : 'I Made Sukadana, SE<br>+62 81 139 6778<br>+62 81 558 217 777<br>+62 361 853 8778' !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Contact Form -->
            <div class="col-lg-7" data-aos="fade-left">
                <div class="bg-white p-4 p-md-5 rounded-4 shadow-lg border border-1">
                    <h4 class="fw-bold mb-4">Kirim Pesan</h4>
                    
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control bg-light border-0" id="name" placeholder="Nama Lengkap">
                                    <label for="name">Nama Lengkap</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control bg-light border-0" id="email" placeholder="Email Address">
                                    <label for="email">Email Address</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control bg-light border-0" id="subject" placeholder="Subjek Pesan">
                                    <label for="subject">Subjek Pesan</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control bg-light border-0" placeholder="Tulis pesan Anda disini" id="message" style="height: 150px"></textarea>
                                    <label for="message">Pesan Anda</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary btn-lg rounded-pill px-5 w-100 shadow-sm hover-up" type="submit">
                                    Kirim Pesan Sekarang
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>      
    </div>
</section>

<style>
    .letter-spacing-1 {
        letter-spacing: 1px;
    }
    
    .form-control:focus {
        box-shadow: none;
        background-color: #fff !important;
        border: 1px solid #1c4a86 !important;
    }
    
    .hover-up {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .hover-up:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(28, 74, 134, 0.2) !important;
    }
</style>
