<x-layouts.main>
    <section style='min-height:80dvh'>
        <div class="p-4">
            <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-2xl font-bold text-gray-900">Tambah Bahan Baru</h2>
                    <a href="{{ route('index') }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5">
                        <i class="fas fa-arrow-left mr-2"></i>Kembali
                    </a>
                </div>
        
                <div class="bg-white rounded-lg shadow p-6">
                    <form method="POST" action="{{ route('bahan.store') }}">
                        @csrf
                        
                        
                        <div class="mb-6">
                            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900">Nama Bahan</label>
                            <input type="text" id="nama" name="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        </div>
        
                        <div class="mb-6">
                            <label for="kuantiti" class="block mb-2 text-sm font-medium text-gray-900">Kuantiti</label>
                            <input type="number" id="kuantiti" name="kuantiti" value="0" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        </div>
        
                        <button type="submit" class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none">
                            <i class="fas fa-plus-circle mr-2"></i>Tambah Bahan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-layouts.main>
