<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>?
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="">
                        <div class="mb-4">
                            <label for="fornama" class="block text-gray-700 text-sm font-bold mb-2">Nama</label>
                            <input type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="fornama" placeholder="Masukkan Nama" wire:model="nama">
                            @error('nama') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="forkegiatana"
                                class="block text-gray-700 text-sm font-bold mb-2">Kegiatan</label>
                            <input type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="forkegiatan" placeholder="Masukkan Kegiatan" wire:model="kegiatan">
                            @error('kegiatan') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="fortingkat" class="block text-gray-700 text-sm font-bold mb-2">Tingkat</label>
                            <select name="tingkat" class="form-control" wire:model="tingkat">
                                <option value="">--Pilih Tingkat---</option>
                                @foreach($tingkats as $itm)
                                <option value="{{$itm->tingkat}}">{{$itm->tingkat}}</option>
                                @endforeach
                            </select>
                            @error('tingkat') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="forpoint" class="block text-gray-700 text-sm font-bold mb-2">Point</label>
                            <input type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="forpoint" placeholder="Masukkan Point" wire:model="point">
                            @error('point') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="forpa" class="block text-gray-700 text-sm font-bold mb-2">Validasi PA*</label>
                            <select name="pa" class="form-control" wire:model="pa">
                                <option value="">Masukkan Nama PA</option>
                                @foreach($dosens as $ds)
                                <option value="{{$ds->nama}}">{{$ds->nama}}</option>
                                @endforeach
                            </select>
                            @error('pa') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="fortahun" class="block text-gray-700 text-sm font-bold mb-2">Tahun</label>
                            <select id="tahun" name="tahun" class="form-control" wire:model="tahun">
                                <option value="">Pilih Tahun</option>
                                @foreach($tahuns as $thn)
                                <option value="{{$thn->tahun}}">{{$thn->tahun}}</option>
                                @endforeach
                            </select>
                            @error('tahun') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="forpenyelenggara"
                                class="block text-gray-700 text-sm font-bold mb-2">Penyelenggara</label>
                            <input type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="forpenyelenggara" placeholder="Masukkan Tahun" wire:model="penyelenggara">
                            @error('penyelenggara') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="forbukti" class="block text-gray-700 text-sm font-bold mb-2">Bukti
                                Kegiatan</label>
                            <input type="file"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="forbukti" name="bukti" placeholder="Masukkan Bukti" wire:model="bukti">
                            @error('bukti') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <button wire:click.prevent="store()" type="button"
                            class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Save
                        </button>
                    </span>
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                        <button wire:click="closeModal()" type="button"
                            class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Cancel
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>
