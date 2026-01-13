<?php
/**
 * Storage Fallback Script
 * Digunakan ketika symbolic link tidak bisa dibuat di server
 * File ini akan serve file dari storage/app/public
 */

// Dapatkan path yang diminta
$requestUri = $_SERVER['REQUEST_URI'];
$requestPath = parse_url($requestUri, PHP_URL_PATH);

// Hapus /storage/ dari path
$filePath = preg_replace('#^/storage/#', '', $requestPath);

// Decode URL encoding (spasi, dll)
$filePath = urldecode($filePath);

// Path lengkap ke file di storage
$fullPath = __DIR__ . '/../storage/app/public/' . $filePath;

// Debug logging (hapus setelah selesai)
// error_log("Storage Redirect - Request: $requestPath");
// error_log("Storage Redirect - Full Path: $fullPath");
// error_log("Storage Redirect - File Exists: " . (file_exists($fullPath) ? 'YES' : 'NO'));

// Cek apakah file ada
if (file_exists($fullPath) && is_file($fullPath)) {
    // Set content type berdasarkan ekstensi
    $extension = pathinfo($fullPath, PATHINFO_EXTENSION);
    $mimeTypes = [
        'jpg' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'png' => 'image/png',
        'gif' => 'image/gif',
        'webp' => 'image/webp',
        'svg' => 'image/svg+xml',
        'pdf' => 'application/pdf',
        'css' => 'text/css',
        'js' => 'application/javascript',
    ];
    
    $contentType = $mimeTypes[strtolower($extension)] ?? 'application/octet-stream';
    
    // Set headers
    header('Content-Type: ' . $contentType);
    header('Content-Length: ' . filesize($fullPath));
    header('Cache-Control: public, max-age=31536000');
    
    // Output file
    readfile($fullPath);
    exit;
}

// File tidak ditemukan - return informasi debug
http_response_code(404);
header('Content-Type: application/json');
echo json_encode([
    'error' => '404 - File not found',
    'requested_path' => $requestPath,
    'full_path' => $fullPath,
    'file_exists' => file_exists($fullPath),
    'is_file' => is_file($fullPath),
    'parent_dir_exists' => file_exists(dirname($fullPath)),
]);
exit;
