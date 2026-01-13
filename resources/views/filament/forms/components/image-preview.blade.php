<div class="space-y-2">
    @if(!empty($images))
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach($images as $image)
                <div class="relative group">
                    <img 
                        src="{{ asset('storage/' . $image) }}" 
                        alt="Preview" 
                        class="w-full h-48 object-cover rounded-lg border border-gray-200 dark:border-gray-700"
                        onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%22200%22 height=%22200%22%3E%3Crect fill=%22%23ddd%22 width=%22200%22 height=%22200%22/%3E%3Ctext x=%2250%25%22 y=%2250%25%22 text-anchor=%22middle%22 dy=%22.3em%22 fill=%22%23999%22%3ENo Image%3C/text%3E%3C/svg%3E'"
                    >
                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition-all rounded-lg flex items-center justify-center">
                        <a 
                            href="{{ asset('storage/' . $image) }}" 
                            target="_blank"
                            class="opacity-0 group-hover:opacity-100 bg-white dark:bg-gray-800 px-3 py-2 rounded text-sm font-medium transition-all"
                        >
                            Lihat Full
                        </a>
                    </div>
                    <p class="mt-2 text-xs text-gray-600 dark:text-gray-400 truncate">
                        {{ basename($image) }}
                    </p>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-sm text-gray-500 dark:text-gray-400">Belum ada foto</p>
    @endif
</div>
