<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Data Mahasiswa FTK</h2>
</x-slot>

<div class="py-12">

    <div class=" max-w-7xl mx-auto ...">
        <div class='bg-white overflow-hidden shadow-xl sm::rounded-lg px-4 py-4'>


            <button wire:click="create"
                class="bg-green-500 hover:bg-green-500 text-white font-bold py-2 px-2 rounded my-2"> Create
                Data</button>
            @if ($isModal)
            @include("livewire.create")
            @endif
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3">
                <div class="flex">
                    <input type="text" class="form-control" placeholder="Search...." wire:model="searchQuery">
                </div>
            </div>
            @if (session()->has('message'))
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3">
                <div class="flex">
                    <div>
                        <p class="text-sm">{{ session('message')}} </p>
                    </div>
                </div>
            </div>
            @endif
            <table class='table-fixed w-full'>
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2">No</th>
                        <th class="px-4 py-2">Nama</th>
                        <th class="px-4 py-2">NIM</th>
                        <th class="px-4 py-2">Prodi</th>
                        <th class="px-4 py-2">Jurusan</th>
                        <th class="px-4 py-2">Alamat</th>
                        <th class="px-4 py-2">Edit | Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1;?>
                    @foreach($mahasiswas as $item)
                    <tr>
                        <td style="text-align: center;">{{$no}}</td>
                        <td class="boder px-4 py-2" style="text-align: center;">{{$item-> nama}}</td>
                        <td class="boder px-4 py-2" style="text-align: center;">{{$item-> nim}}</td>
                        <td class="boder px-4 py-2" style="text-align: center;">{{$item-> prodi}}</td>
                        <td class="boder px-4 py-2" style="text-align: center;">{{$item-> jurusan}}</td>
                        <td class="boder px-4 py-2" style="text-align: center;">{{$item-> alamat}}</td>
                        <td class="boder px-4 py-2">
                            <button wire:click="edit({{ $item->id}})"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                            <button wire:click="delete({{ $item -> id}})"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>

                        </td>
                    </tr>
                    <?php $no++;?>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>