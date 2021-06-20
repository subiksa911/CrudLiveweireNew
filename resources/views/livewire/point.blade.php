<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">System Point</h2>
</x-slot>

<div class="py-12">

    <div class=" max-w-7xl mx-auto ...">
        <div class='bg-white overflow-hidden shadow-xl sm::rounded-lg px-4 py-4'>
            <div class="relative text-7xl font-bold mt-5 pl-2">
                <h1>Data Point Mahasiswa</h1>
            </div>

            <button wire:click="create"
                class="bg-blue-500 hover:bg-blue-500 text-white font-bold py-2 px-2 rounded my-2"> Create</button>
            @if ($isModal)
            @include("livewire.createpoint")
            @endif
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3">
                <div class="pt-2 relative mx-auto text-gray-600">
                    <input
                        class="border-1 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
                        type="text" name="search" placeholder="Search..." wire:model="search">
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
                        <th class="px-4 py-2">Kegiatan</th>
                        <th class="px-4 py-2">Tingkat</th>
                        <th class="px-4 py-2">Point</th>
                        <th class="px-4 py-2">Validasi Dosen</th>
                        <th class="px-4 py-2">Tahun</th>
                        <th class="px-4 py-2">Penyelenggara</th>
                        <th class="px-4 py-2">Bukti</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1;?>
                    @forelse($systems as $row)
                    <tr>
                        <td class="boder px-4 py-2" style="text-align:center;">
                            {{ $no }}</td>
                        <td class="boder px-4 py-2" style="text-align:center;">
                            {{ $row -> nama }}</td>
                        <td class="boder px-4 py-2" style="text-align:center;">
                            {{ $row -> kegiatan }}</td>
                        <td class="boder px-4 py-2" style="text-align:center;">
                            {{ $row -> tingkat }}</td>
                        <td class="boder px-4 py-2" style="text-align:center;">
                            {{ $row -> point }}</td>
                        <td class="boder px-4 py-2" style="text-align:center;">
                            {{ $row -> pa }}</td>
                        <td class="boder px-4 py-2" style="text-align:center;">
                            {{ $row -> tahun }}</td>
                        <td class="boder px-4 py-2" style="text-align:center;">
                            {{ $row -> penyelenggara }}</td>
                        <td class="boder px-4 py-2" style="text-align:center;">
                            <img src="{{asset('storage/bukti')}}/{{$row->bukti}}">
                        </td>
                        <td class="boder px-4 py-2" style="text-align:center;">
                            <button wire:click="edit({{ $row -> id}})"
                                class="bg-yellow-500 hover:bg-yellow-500 text-white font-bold py-2 px-2 rounded">
                                Edit
                            </button>
                            <button wire:click="delete({{ $row -> id}})"
                                class="bg-red-500 hover:bg-red-500 text-white font-bold py-2 px-2 rounded">Delete</i></button>
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
            {{ $systems->links() }}
        </div>
        </ div>
    </div>
