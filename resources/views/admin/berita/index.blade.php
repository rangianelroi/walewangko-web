<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Kelola Berita') }}
            </h2>
            <a href="{{ route('admin.berita.create') }}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                Tambah Baru
            </a>
        </div>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">
                
                {{-- KOREKSI: Loop variabel $berita (sesuai controller) --}}
                @forelse($berita as $item)
                <div class="item-card flex flex-row justify-between items-center">
                    <div class="flex flex-row items-center gap-x-3">
                        <img src="{{ Storage::url($item->thumbnail) }}" alt="" class="rounded-2xl object-cover w-[90px] h-[90px]">
                        <div class="flex flex-col">
                            {{-- KOREKSI: Gunakan $item->judul --}}
                            <h3 class="text-indigo-950 text-xl font-bold">{{ $item->judul }}</h3>
                            <p class="text-slate-500 text-sm">Penulis: {{ $item->penulis->name ?? 'N/A' }}</p>
                        </div>
                    </div> 
                    <div  class="hidden md:flex flex-col">
                        <p class="text-slate-500 text-sm">Tanggal</p>
                        {{-- KOREKSI: Gunakan $item->created_at --}}
                        <h3 class="text-indigo-950 text-xl font-bold">{{ $item->created_at->format('M d, Y') }}</h3>
                    </div>
                    <div class="hidden md:flex flex-row items-center gap-x-3">
                        {{-- KOREKSI: Gunakan route admin.berita.edit --}}
                        <a href="{{ route('admin.berita.edit', $item) }}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Edit
                        </a>
                        {{-- KOREKSI: Gunakan route admin.berita.destroy --}}
                        <form action="{{ route('admin.berita.destroy', $item) }}" method="POST"> 
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="font-bold py-4 px-6 bg-red-700 text-white rounded-full">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div> 
                @empty
                <p class="text-center text-gray-500">Belum ada berita.</p>
                @endforelse

            </div>
        </div>
    </div>
</x-app-layout>