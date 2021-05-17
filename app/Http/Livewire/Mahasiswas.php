<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Mahasiswa;
use App\Models\Jurusan;
use App\Models\Prodi;
use Illuminate\Pagination\PaginationState;

class Mahasiswas extends Component
{
    public $mahasiswas, $nama, $nim, $prodi, $jurusan, $alamat,$mahasiswaID, $searchQuery;
    public $isModal;

    public function render()
    {
        $searchQuery = '%'.$this->searchQuery.'%';

        $this->mahasiswas = Mahasiswa::where('nama','LIKE',$searchQuery)
                ->orWhere('nim','LIKE',$searchQuery)
                ->orWhere('prodi','LIKE',$searchQuery)
                ->orWhere('jurusan','LIKE',$searchQuery)
                ->orWhere('alamat','LIKE',$searchQuery)
                ->orderBy('created_at','DESC')->get();
        return view('livewire.mahasiswas');
    }

    public function create()
    {
        $jurusan = Jurusan::all();
        $prodi = Prodi::all();
        $this->resetFields();
        $this->openModal();
    }

    public function resetFields()
    {
        $this->nama ='';
        $this->nim ='';
        $this->prodi ='';
        $this->jurusan ='';
        $this->alamat ='';
        $this->mahasiswaID = '';
    }

    public function openModal()
    {
        $this->isModal = true;

    }
    public function closeModal()
    {
        $this->isModal = false;

    }

    public function store()
    {
        $this->validate([
            'nama'=> 'required|string',
            'nim'=> 'required|string',
            'prodi'=> 'required|string',
            'jurusan'=> 'required|string',
            'alamat'=> 'required| string'
        ]);

        Mahasiswa::updateOrCreate(
            ['id' => $this->mahasiswaID],
            [
                'nama'=>$this->nama,
                'nim'=>$this->nim,
                'prodi'=>$this->prodi,
                'jurusan'=>$this->jurusan,
                'alamat'=> $this->alamat,

            ]
            );
            session()->flash('message', $this->mahasiswaID ? $this-> nama . ' Diperbaharui':$this->nama . ' Ditambahkan');
            $this->closeModal();
            $this -> resetFields();



    }

    public function edit($id)
    {
        $jurusan = Jurusan::all();
        $prodi = Prodi::all();

        $mahasiswa = Mahasiswa::find($id);
        $this->mahasiswaID = $id;
        $this->nama = $mahasiswa->nama;
        $this->nim  = $mahasiswa->nim;
        $this->prodi = $mahasiswa->prodi;
        $this->jurusan = $mahasiswa->jurusan;
        $this->alamat= $mahasiswa->alamat;

        $this->openModal();

    }
    public function delete($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa-> delete();
        session()->flash('message', $mahasiswa->nama . ' Dihapus');

    }
}