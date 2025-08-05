<x-layouts.main>
    <section style='min-height:80dvh'>
        <center>

            <div class="p-4 w-full">
                <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-2xl font-bold text-gray-900">Bahan Telah Dibeli</h2>
                        
                    </div>
     
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">#</th>
                                    <th scope="col" class="px-6 py-3">Nama Bahan</th>
                                    <th scope="col" class="px-6 py-3">Kuantiti</th>
                                    <th scope="col" class="px-6 py-3">Tarikh</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @isset($bahans)
                                    @foreach($bahans->where('status', 2) as $item)
                                    <tr class="bg-white border-b hover:bg-gray-50">
                                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                                        <td class="px-6 py-4 font-medium text-gray-900">{{ $item->nama }}</td>
                                        <td class="px-6 py-4">
                                            <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                                {{ $item->kuantiti }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 flex space-x-2">
                                            {{ $item->updated_at->format('j / n / Y') }}
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