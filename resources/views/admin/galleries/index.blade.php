<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Kelola Galeri Foto') }}
            </h2>
            <a href="{{ route('admin.galleries.create') }}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                Tambah Baru
            </a>
        </div>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">
                @forelse($galleries as $item)
                <div class="item-card flex flex-row justify-between items-center">
                    <div class="flex flex-row items-center gap-x-3">
                        <img src="{{ asset('storage/' .  $item->image) }}" alt="" class="rounded-2xl object-cover w-[90px] h-[90px]">
                        <div class="flex flex-col">
                            <h3 class="text-indigo-950 text-xl font-bold">{{ $item->title }}</h3>
                            <p class="text-slate-500 text-sm">Kategori: {{ $item->category }}</p>
                        </div>
                    </div> 
                    <div class="hidden md:flex flex-col">
                        <p class="text-slate-500 text-sm">Tanggal</p>
                        <h3 class="text-indigo-950 text-xl font-bold">{{ $item->date->format('d M Y') }}</h3>
                    </div>
                    <div class="hidden md:flex flex-row items-center gap-x-3">
                        <a href="{{ route('admin.galleries.edit', $item) }}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Edit
                        </a>
                        <form action="{{ route('admin.galleries.destroy', $item) }}" method="POST"> 
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="font-bold py-4 px-6 bg-red-700 text-white rounded-full">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div> 
                @empty
                <p class="text-center text-gray-500">Belum ada foto di galeri.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>