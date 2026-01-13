<section class="py-5 overflow-hidden bg-white">
    <div class="container py-lg-5">
        <div class="row align-items-center gx-lg-5">
            <!-- Left Column: Image -->
            <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right">
                <div class="position-relative pe-lg-4">
                    <!-- Decorative Elements -->
                    <div class="position-absolute" style="top: -30px; left: -30px; width: 60%; height: 60%; background: radial-gradient(circle, rgba(28, 74, 134, 0.1) 0%, rgba(255,255,255,0) 70%); z-index: -1;"></div>
                    <div class="position-absolute bottom-0 end-0 bg-primary" style="width: 150px; height: 150px; opacity: 0.05; border-radius: 50%; z-index: -1;"></div>
                    
                    <!-- Main Image -->
                    <div class="position-relative rounded-4 overflow-hidden shadow-lg border border-5 border-white">
                        <img src="{{ $tentangKami1 && $tentangKami1->gambar ? asset('storage/' . $tentangKami1->gambar) : asset('storage/img/herosection/heroSectionHome.png') }}" 
                             alt="Kantor Tri Bhakti Advertising" 
                             class="img-fluid w-100 object-fit-cover" 
                             style="height: 500px; transition: transform 0.5s ease;">
                    </div>

                    <!-- Floating Card -->
                    <div class="position-absolute bottom-0 start-0 translate-middle-y bg-white p-4 rounded-4 shadow-lg d-none d-md-block" style="max-width: 200px; margin-left: -30px; border-left: 5px solid #1c4a86;">
                        <h2 class="fw-bold text-primary mb-0">10+</h2>
                        <small class="text-secondary fw-medium">Tahun Pengalaman</small>
                    </div>
                </div>
            </div>

            <!-- Right Column: Text -->
            <div class="col-lg-6" data-aos="fade-left">
                <div class="ps-lg-3">
                    <span class="d-inline-block py-1 px-3 rounded-pill bg-primary bg-opacity-10 text-primary fw-bold small mb-3 letter-spacing-1">
                        {{ $tentangKami1 && $tentangKami1->judul ? $tentangKami1->judul : 'SIAPA KAMI' }}
                    </span>
                    
                    <h2 class="display-5 fw-bold mb-4 text-dark">
                        @if($tentangKami1 && $tentangKami1->sub_judul)
                            {!! nl2br(e($tentangKami1->sub_judul)) !!}
                        @else
                            Mitra Strategis untuk <br>
                            <span class="text-primary position-relative">
                                Pertumbuhan Bisnis
                                <svg class="position-absolute start-0 bottom-0 w-100" height="10" viewBox="0 0 100 10" preserveAspectRatio="none" style="z-index:-1; opacity:0.2;">
                                    <path d="M0 5 Q 50 10 100 5" stroke="#1c4a86" stroke-width="8" fill="none" />
                                </svg>
                            </span>
                            Anda
                        @endif
                    </h2>

                    @if($tentangKami1 && $tentangKami1->deskripsi)
                        <div class="text-secondary mb-5" style="line-height: 1.8;">
                            {!! nl2br(e($tentangKami1->deskripsi)) !!}
                        </div>
                    @else
                        <p class="text-secondary lead mb-4" style="line-height: 1.8;">
                            Tri Bhakti Advertising adalah perusahaan periklanan luar ruang yang berfokus pada penyediaan titik-titik lokasi strategis yang memberikan dampak maksimal bagi brand Anda.
                        </p>

                        <p class="text-secondary mb-5" style="line-height: 1.8;">
                            Dengan pengalaman lebih dari satu dekade, kami memahami bahwa setiap brand memiliki cerita unik. Misi kami adalah membantu Anda menceritakan kisah tersebut kepada audiens yang tepat, di waktu yang tepat, dan melalui medium yang paling efektif. Kami memadukan keahlian lokasi dengan teknologi visual terkini.
                        </p>
                    @endif
                    
                    <!-- Feature List -->
                    <div class="row g-4 mb-4">
                        @if($tentangKami1 && $tentangKami1->icon1)
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 d-flex align-items-center justify-content-center bg-primary bg-opacity-10 rounded-circle text-primary" style="width: 50px; height: 50px;">
                                    @php
                                        $icons = config('icons');
                                        $iconSvg = $icons[$tentangKami1->icon1] ?? $icons['bi-stars'];
                                    @endphp
                                    {!! $iconSvg !!}
                                </div>
                                <div class="ms-3">
                                    <h6 class="fw-bold mb-0">{{ $tentangKami1->judul_icon1 }}</h6>
                                    <small class="text-secondary">{{ $tentangKami1->deskripsi_icon1 }}</small>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 d-flex align-items-center justify-content-center bg-primary bg-opacity-10 rounded-circle text-primary" style="width: 50px; height: 50px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-stars" viewBox="0 0 16 16">
                                        <path d="M7.657 6.247c.11-.33.576-.33.686 0l.645 1.937a2.89 2.89 0 0 0 1.829 1.828l1.936.645c.33.11.33.576 0 .686l-1.937.645a2.89 2.89 0 0 0-1.828 1.829l-.645 1.936a.361.361 0 0 1-.686 0l-.645-1.937a2.89 2.89 0 0 0-1.828-1.828l-1.937-.645a.361.361 0 0 1 0-.686l1.937-.645a2.89 2.89 0 0 0 1.828-1.828zM3.794 1.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387A1.73 1.73 0 0 0 4.593 5.69l-.387 1.162a.217.217 0 0 1-.412 0L3.407 5.69A1.73 1.73 0 0 0 2.31 4.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387A1.73 1.73 0 0 0 3.407 2.31zM10.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.16 1.16 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.16 1.16 0 0 0-.732-.732L9.1 2.137a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732z"/>
                                    </svg>
                                </div>
                                <div class="ms-3">
                                    <h6 class="fw-bold mb-0">Solusi Kreatif</h6>
                                    <small class="text-secondary">Inovasi tanpa batas</small>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if($tentangKami1 && $tentangKami1->icon2)
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 d-flex align-items-center justify-content-center bg-primary bg-opacity-10 rounded-circle text-primary" style="width: 50px; height: 50px;">
                                    @php
                                        $icons = config('icons');
                                        $iconSvg = $icons[$tentangKami1->icon2] ?? $icons['bi-shield-check'];
                                    @endphp
                                    {!! $iconSvg !!}
                                </div>
                                <div class="ms-3">
                                    <h6 class="fw-bold mb-0">{{ $tentangKami1->judul_icon2 }}</h6>
                                    <small class="text-secondary">{{ $tentangKami1->deskripsi_icon2 }}</small>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 d-flex align-items-center justify-content-center bg-primary bg-opacity-10 rounded-circle text-primary" style="width: 50px; height: 50px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-shield-check" viewBox="0 0 16 16">
                                        <path d="M5.338 1.59a61 61 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.7 10.7 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.7 10.7 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.8 11.8 0 0 1-2.517 2.453 7 7 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7 7 0 0 1-1.048-.625 11.8 11.8 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 63 63 0 0 1 5.072.56"/>
                                        <path d="M10.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0"/>
                                    </svg>
                                </div>
                                <div class="ms-3">
                                    <h6 class="fw-bold mb-0">Legalitas Terjamin</h6>
                                    <small class="text-secondary">Aman & Terpercaya</small>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>

                    <a href="{{ url('/kontak') }}" class="btn btn-primary btn-lg rounded-pill px-5 shadow-sm hover-up">
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .letter-spacing-1 {
        letter-spacing: 1px;
    }
    
    .hover-up {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .hover-up:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(28, 74, 134, 0.2) !important;
    }
</style>
