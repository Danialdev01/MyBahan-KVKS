<x-layouts.main>
    <section style='min-height:80dvh'>
        <center>

            <div class="p-4 w-full">
                <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-2xl font-bold text-gray-900">Senarai Bahan hendak dibeli</h2>
                        <a href="{{ route('bahan.create') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                            <i class="fas fa-plus mr-2"></i>Tambah Bahan
                        </a>
                    </div>
     
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">#</th>
                                    <th scope="col" class="px-6 py-3">Nama Bahan</th>
                                    <th scope="col" class="px-6 py-3">Kuantiti</th>
                                    <th scope="col" class="px-6 py-3">Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @isset($bahans)
                                    @foreach($bahans->where('status', 1) as $item)
                                    <tr class="bg-white border-b hover:bg-gray-50">
                                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                                        <td class="px-6 py-4 font-medium text-gray-900">{{ $item->nama }}</td>
                                        <td class="px-6 py-4">
                                            <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                                {{ $item->kuantiti }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 flex space-x-2">
                                            <form action="{{ route('bahan.beli', $item->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')

                                                <button type="submit" class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-3 py-2">
                                                    <i class="fas fa-cart-plus mr-1"></i>Selesai Dibeli
                                                </button>
                                            </form>
                                            
                                            <button type="button" data-modal-target="update-modal-{{ $item->id }}" data-modal-toggle="update-modal-{{ $item->id }}" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2">
                                                <i class="fas fa-edit mr-1"></i>Kemaskini
                                            </button>

                                            <!-- Main modal -->
                                            <div id="update-modal-{{$item->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                <div class="relative p-4 w-full max-w-md max-h-full">
                                                    <!-- Modal content -->
                                                    <div class="relative bg-white rounded-lg shadow-sm dark-bg-gray-700">
                                                        <!-- Modal header -->
                                                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark-border-gray-600 border-gray-200">
                                                            <h3 class="text-lg font-semibold text-gray-900 dark-text-white">
                                                                Kemaskini Bahan
                                                            </h3>
                                                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark-hover:bg-gray-600 dark-hover:text-white" data-modal-toggle="crud-modal">
                                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                                </svg>
                                                                <span class="sr-only">Close modal</span>
                                                            </button>
                                                        </div>
                                                        <!-- Modal body -->
                                                        <form action="{{ route('bahan.update', $item->id) }}" method="POST" class="p-4 md:p-5">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="grid gap-4 mb-4 grid-cols-2">
                                                                <div class="col-span-2">
                                                                    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark-text-white">Nama Bahan</label>
                                                                    <input type="text" name="nama" id="nama" value="{{ $item->nama }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark-bg-gray-600 dark-border-gray-500 dark-placeholder-gray-400 dark-text-white dark-focus:ring-primary-500 dark-focus:border-primary-500" placeholder="Type product name" required="">
                                                                </div>
                                                                <div class="col-span-2 sm:col-span-1">
                                                                    <label for="kuantiti" class="block mb-2 text-sm font-medium text-gray-900 dark-text-white">Kuantiti</label>
                                                                    <input type="number" name="kuantiti" id="kuantiti" value="{{ $item->kuantiti }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark-bg-gray-600 dark-border-gray-500 dark-placeholder-gray-400 dark-text-white dark-focus:ring-primary-500 dark-focus:border-primary-500" required="">
                                                                </div>
                                                            </div>
                                                            <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark-bg-blue-600 dark-hover:bg-blue-700 dark-focus:ring-blue-800">
                                                                <!-- <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg> -->
                                                                Kemaskini Bahan
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div> 

                                            <button type="button" data-modal-target="delete-modal-{{ $item->id }}" data-modal-toggle="delete-modal-{{ $item->id }}" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2">
                                                <i class="fas fa-trash mr-1"></i>Hapus
                                            </button>
                                            
                                            <div id="delete-modal-{{ $item->id }}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                <div class="relative w-full max-w-md max-h-full">
                                                    <div class="relative bg-white rounded-lg shadow">
                                                        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-hide="delete-modal-{{ $item->id }}">
                                                            <i class="fas fa-times"></i>
                                                            <span class="sr-only">Tutup modal</span>
                                                        </button>
                                                        <div class="p-6 text-center">
                                                            <i class="fas fa-exclamation-triangle mx-auto mb-4 text-gray-400 w-12 h-12"></i>
                                                            <h3 class="mb-5 text-lg font-normal text-gray-500">Anda pasti ingin menghapuskan {{ $item->nama }}?</h3>
                                                            <form action="{{ route('bahan.delete', $item->id) }}" method="POST" class="inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2">
                                                                    Ya, Hapuskan
                                                                </button>
                                                            </form>
                                                            <button data-modal-hide="delete-modal-{{ $item->id }}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900">
                                                                Batalkan
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach($bahans as $item)
                                @endisset
                            </tbody>
                        </table>
                    </div>
    
                    <!-- Pagination -->
                    <div class="mt-4">
                    </div>
                </div>
            </div>
        </center>
    </section>
</x-layouts.main>