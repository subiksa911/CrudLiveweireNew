<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Data Mahasiswa FTK</h2>
</x-slot>

<div class="py-12">

    <div class=" max-w-7xl mx-auto ...">
        <div class='bg-white overflow-hidden shadow-xl sm::rounded-lg px-4 py-4'>
            <div class="relative text-7xl font-bold mt-5 pl-2">
                <h1>Data Mahasiswa</h1>
            </div>

            <button wire:click="create"
                class="bg-blue-500 hover:bg-blue-500 text-white font-bold py-2 px-2 rounded my-2"> Create
                Data Mahasiswa</button>
            @if ($isModal)
            @include("livewire.create")
            @endif
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3">
                <div class="pt-2 relative mx-auto text-gray-600">
                    <input
                        class="border-1 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
                        type="text" name="search" placeholder="Search..." wire:model="searchQuery">
                </div>
            </div>
            @if (session()->has('message'))
            <div class="alert alert-primary show mb-2" role="alert"> <i data-feather="alert-circle"
                    class="w-6 h-6 mr-2"></i>{{ session('message')}}</div>
            @endif
            <table class='table-fixed w-full'>
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2">No</th>
                        <th class="px-4 py-2">Nama</th>
                        <th class="px-4 py-2">Nim</th>
                        <th class="px-4 py-2">Prodi</th>
                        <th class="px-4 py-2">Jurusan</th>
                        <th class="px-4 py-2">Alamat</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1;?>
                    @forelse($mahasiswas as $row)
                    <tr>
                        <td class="boder px-4 py-2" style="text-align:center;">
                            {{ $no }}</td>
                        <td class="boder px-4 py-2" style="text-align:center;">
                            {{ $row -> nama }}</td>
                        <td class="boder px-4 py-2" style="text-align:center;">
                            {{ $row -> nim }}</td>
                        <td class="boder px-4 py-2" style="text-align:center;">
                            {{ $row -> prodi }}</td>
                        <td class="boder px-4 py-2" style="text-align:center;">
                            {{ $row -> jurusan }}</td>
                        <td class="boder px-4 py-2" style="text-align:center;">
                            {{ $row -> alamat }}</td>
                        <td class="boder px-4 py-2" style="text-align:center;">
                            <button wire:click="edit({{ $row -> id}})"
                                class="bg-yellow-500 hover:bg-yellow-500 text-white font-bold py-2 px-2 rounded">
                                Edit
                            </button>
                            <button wire:click="delete({{ $row -> id}})"
                                class="bg-red-500 hover:bg-red-500 text-white font-bold py-2 px-2 rounded">Delete</button>
                        </td>
                    </tr>
                    <?php $no++;?>
                    @empty
                    <tr>
                        <td class="border px-4 py-2 text-black" colspan="5"> Tidak ada Data </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $mahasiswas->links() }}
        </div>
    </div>
</div>
