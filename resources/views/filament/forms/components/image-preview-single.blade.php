<div>
    @if($getRecord()?->gambar)
        <div class="rounded-lg border border-gray-300 p-4 bg-white dark:bg-gray-800 dark:border-gray-600">
            <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">Preview Gambar Hero Section</h3>
            <div class="space-y-2">
                <div class="relative group">
                    <img 
                        src="{{ asset('storage/' . $getRecord()->gambar) }}" 
                        alt="Hero Section Image"
                        class="w-full h-48 object-cover rounded-lg shadow-sm hover:shadow-md transition-shadow"
                        onerror="this.src='data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' width=\'200\' height=\'200\'%3E%3Crect fill=\'%23ddd\' width=\'200\' height=\'200\'/%3E%3Ctext fill=\'%23999\' x=\'50%25\' y=\'50%25\' dominant-baseline=\'middle\' text-anchor=\'middle\' font-family=\'sans-serif\' font-size=\'14\'%3EImage not found%3C/text%3E%3C/svg%3E'"
                    >
                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-10 transition-all rounded-lg flex items-center justify-center">
                        <a 
                            href="{{ asset('storage/' . $getRecord()->gambar) }}" 
                            target="_blank"
                            class="opacity-0 group-hover:opacity-100 bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-300 px-3 py-1 rounded-md text-sm shadow-lg transition-opacity"
                        >
                            Lihat Gambar
                        </a>
                    </div>
                </div>
                <p class="text-xs text-gray-500 dark:text-gray-400">
                    Path: {{ $getRecord()->gambar }}
                </p>
            </div>
        </div>
    @endif
</div>
