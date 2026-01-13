<?php

use Illuminate\Support\Facades\Route;
use App\Models\Videotron;
use App\Models\Baliho;
use App\Models\Billboard;

// Updated: Fix for new domain setup

Route::get('/', function () {
    $featuredVideotron = Videotron::where('is_featured', true)->first();
    $featuredBaliho = Baliho::where('is_featured', true)->first();
    $featuredBillboard = Billboard::where('is_featured', true)->first();
    $heroSection = \App\Models\HeroSection::where('page_name', 'home')->first();
    $tentangKami2 = \App\Models\TentangKami2::first(); // For home2.blade.php section
    return view('welcome', compact('featuredVideotron', 'featuredBaliho', 'featuredBillboard', 'heroSection', 'tentangKami2'));
});

Route::get('/layanan/videotron', function () {
    $videotrons = Videotron::all();
    $heroSection = \App\Models\HeroSection::where('page_name', 'videotron')->first();
    return view('layanan.videotron.videotronIndex', compact('videotrons', 'heroSection'));
});

Route::get('/layanan/baliho', function () {
    $balihos = Baliho::all();
    $heroSection = \App\Models\HeroSection::where('page_name', 'baliho')->first();
    return view('layanan.baliho.balihoIndex', compact('balihos', 'heroSection'));
});

Route::get('/layanan/billboard', function () {
    $billboards = Billboard::all();
    $heroSection = \App\Models\HeroSection::where('page_name', 'billboard')->first();
    return view('layanan.billboard.billboardIndex', compact('billboards', 'heroSection'));
});

Route::get('/tentang-kami', function () {
    $heroSection = \App\Models\HeroSection::where('page_name', 'tentang_kami')->first();
    $tentangKami1 = \App\Models\TentangKami1::first();
    $tentangKami2 = \App\Models\TentangKami2::first(); // Get the first record
    return view('tentangKami.tentangKamiIndex', compact('heroSection', 'tentangKami1', 'tentangKami2'));
});

Route::get('/kontak', function () {
    $heroSection = \App\Models\HeroSection::where('page_name', 'kontak')->first();
    $kontak = \App\Models\Kontak::first();
    return view('kontak.kontakIndex', compact('heroSection', 'kontak'));
});

// Debug route - hapus setelah selesai debugging
Route::get('/debug-data', function () {
    $videotrons = Videotron::all();
    $balihos = Baliho::all();
    $billboards = Billboard::all();
    
    return response()->json([
        'videotrons_count' => $videotrons->count(),
        'balihos_count' => $balihos->count(),
        'billboards_count' => $billboards->count(),
        'sample_videotron' => $videotrons->first(),
        'sample_baliho' => $balihos->first(),
        'sample_billboard' => $billboards->first(),
    ]);
});

// Debug route untuk cek file existence
Route::get('/debug-files', function () {
    $fullPath = storage_path('app/public/img/videotron/13. GATOT SUBROTO/JI Cokroaminoto JI Gatot Subroto Denpasar Bali.jpg');
    
    return response()->json([
        'storage_path' => storage_path('app/public'),
        'videotron_folder_exists' => file_exists(storage_path('app/public/img/videotron')),
        'sample_folder_exists' => file_exists(storage_path('app/public/img/videotron/13. GATOT SUBROTO')),
        'sample_file_exists' => file_exists($fullPath),
        'sample_file_path' => $fullPath,
        'sample_file_size' => file_exists($fullPath) ? filesize($fullPath) : 0,
        'files_in_videotron' => is_dir(storage_path('app/public/img/videotron')) ? scandir(storage_path('app/public/img/videotron')) : [],
    ]);
});

// Debug route untuk cek featured items
Route::get('/debug-featured', function () {
    $featuredVideotron = Videotron::where('is_featured', true)->first();
    $featuredBaliho = Baliho::where('is_featured', true)->first();
    $featuredBillboard = Billboard::where('is_featured', true)->first();
    
    return response()->json([
        'videotron' => [
            'found' => $featuredVideotron ? true : false,
            'judul' => $featuredVideotron?->judul,
            'images_count' => $featuredVideotron ? count($featuredVideotron->images ?? []) : 0,
            'first_image' => $featuredVideotron?->images[0] ?? null,
        ],
        'baliho' => [
            'found' => $featuredBaliho ? true : false,
            'judul' => $featuredBaliho?->judul,
            'images_count' => $featuredBaliho ? count($featuredBaliho->images ?? []) : 0,
            'first_image' => $featuredBaliho?->images[0] ?? null,
        ],
        'billboard' => [
            'found' => $featuredBillboard ? true : false,
            'judul' => $featuredBillboard?->judul,
            'images_count' => $featuredBillboard ? count($featuredBillboard->images ?? []) : 0,
            'first_image' => $featuredBillboard?->images[0] ?? null,
        ],
        'all_counts' => [
            'videotron' => Videotron::count(),
            'baliho' => Baliho::count(),
            'billboard' => Billboard::count(),
        ],
    ]);
});

// Clear cache route
Route::get('/clear-cache', function () {
    \Illuminate\Support\Facades\Artisan::call('cache:clear');
    \Illuminate\Support\Facades\Artisan::call('view:clear');
    \Illuminate\Support\Facades\Artisan::call('config:clear');
    \Illuminate\Support\Facades\Artisan::call('route:clear');
    
    return response()->json([
        'message' => 'Cache cleared successfully!',
        'cleared' => [
            'cache' => true,
            'view' => true,
            'config' => true,
            'route' => true,
        ]
    ]);
});

// Auto-fix route - run hero section seeder
Route::get('/fix-hero', function () {
    try {
        \Illuminate\Support\Facades\Artisan::call('db:seed', ['--class' => 'HeroSectionSeeder']);
        return response()->json([
            'success' => true,
            'message' => 'Hero section seeder executed successfully!',
            'output' => \Illuminate\Support\Facades\Artisan::output(),
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Error running seeder',
            'error' => $e->getMessage(),
        ]);
    }
});

// Auto-fix route - run all location seeders to update Google Maps links
Route::get('/fix-seeders', function () {
    try {
        \Illuminate\Support\Facades\Artisan::call('db:seed', ['--class' => 'VideotronSeeder']);
        \Illuminate\Support\Facades\Artisan::call('db:seed', ['--class' => 'BalihoSeeder']);
        \Illuminate\Support\Facades\Artisan::call('db:seed', ['--class' => 'BillboardSeeder']);
        return response()->json([
            'success' => true,
            'message' => 'All location seeders executed successfully!',
            'output' => \Illuminate\Support\Facades\Artisan::output(),
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Error running seeders',
            'error' => $e->getMessage(),
        ]);
    }
});

// Debug folder structure
Route::get('/debug-folders', function () {
    $videotronPath = storage_path('app/public/img/videotron');
    $balihoPath = storage_path('app/public/img/baliho');
    $billboardPath = storage_path('app/public/img/billboard');
    
    $videotronFolders = is_dir($videotronPath) ? array_map('basename', array_filter(glob($videotronPath . '/*'), 'is_dir')) : [];
    $balihoFolders = is_dir($balihoPath) ? array_map('basename', array_filter(glob($balihoPath . '/*'), 'is_dir')) : [];
    $billboardFolders = is_dir($billboardPath) ? array_map('basename', array_filter(glob($billboardPath . '/*'), 'is_dir')) : [];
    
    // Check first folder in each
    $firstVideotron = count($videotronFolders) > 0 ? $videotronFolders[0] : null;
    $firstBaliho = count($balihoFolders) > 0 ? $balihoFolders[0] : null;
    $firstBillboard = count($billboardFolders) > 0 ? $billboardFolders[0] : null;
    
    return response()->json([
        'videotron' => [
            'path' => $videotronPath,
            'exists' => is_dir($videotronPath),
            'folder_count' => count($videotronFolders),
            'folders' => $videotronFolders,
            'first_folder' => $firstVideotron,
            'first_folder_images' => $firstVideotron ? (is_dir($videotronPath . '/' . $firstVideotron) ? scandir($videotronPath . '/' . $firstVideotron) : []) : [],
        ],
        'baliho' => [
            'path' => $balihoPath,
            'exists' => is_dir($balihoPath),
            'folder_count' => count($balihoFolders),
            'folders' => $balihoFolders,
            'first_folder' => $firstBaliho,
            'first_folder_images' => $firstBaliho ? (is_dir($balihoPath . '/' . $firstBaliho) ? scandir($balihoPath . '/' . $firstBaliho) : []) : [],
        ],
        'billboard' => [
            'path' => $billboardPath,
            'exists' => is_dir($billboardPath),
            'folder_count' => count($billboardFolders),
            'folders' => $billboardFolders,
            'first_folder' => $firstBillboard,
            'first_folder_images' => $firstBillboard ? (is_dir($billboardPath . '/' . $firstBillboard) ? scandir($billboardPath . '/' . $firstBillboard) : []) : [],
        ],
    ]);
});
