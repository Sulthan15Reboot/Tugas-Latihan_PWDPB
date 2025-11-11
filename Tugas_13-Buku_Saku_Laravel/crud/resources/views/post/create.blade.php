<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buat Post Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Menggunakan shadow-md dan rounded-lg untuk konsistensi --}}
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{-- PENTING: Tambahkan enctype="multipart/form-data" untuk upload file --}}
                    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        {{-- 1. Input TITLE --}}
                        <div class="mb-4">
                            <x-input-label for="title" :value="__('Title')" />
                            {{-- Menggunakan input HTML biasa dengan kelas styling Breeze --}}
                            <input type="text" name="title" id="title"
                                class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm @error('title') border-red-500 @enderror"
                                placeholder="enter blog title"
                                value="{{ old('title') }}">

                            {{-- Menampilkan Error Validasi --}}
                            @error('title')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- 2. Input IMAGE --}}
                        <div class="mb-4">
                            <x-input-label for="image" :value="__('Image')" />
                            {{-- Input file tidak memiliki styling Breeze yang sempurna, pakai default dan beri kelas sederhana --}}
                            <input type="file" name="image" id="image"
                                class="w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none @error('image') border-red-500 @enderror">

                            @error('image')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- 3. Input BODY --}}
                        <div class="mb-6">
                            <x-input-label for="body" :value="__('Body')" />
                            <textarea name="body" id="body" rows="8"
                                class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm @error('body') border-red-500 @enderror"
                                placeholder="enter blog body">{{ old('body') }}</textarea>

                            @error('body')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Tombol Save --}}
                        <div>
                            {{-- Menggunakan component button Breeze --}}
                            <x-primary-button type="submit">
                                Simpan
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
