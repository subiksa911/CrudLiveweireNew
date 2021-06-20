<?php

namespace App\Http\Livewire;

use App\Models\Jurusan;
use Livewire\Component;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use Livewire\WithPagination;

class Mahasiswas extends Component
{

    use WithPagination;
    public $mahasiswa, $nama, $nim, $prodi, $jurusan, $alamat,$mahasiswaID, $searchQuery;
    public $isModal;
    public function render()
    {
        $jurusans = Jurusan::all();
        $prodis = Prodi::all();
        $searchQuery = '%'.$this->searchQuery.'%';
        $mahasiswas = Mahasiswa::where('nama','LIKE',$searchQuery)
                ->orderBy('created_at','DESC')->paginate(5);
        return view('livewire.mahasiswas', compact('prodis','jurusans'),[
            'mahasiswas'=>$mahasiswas
        ]);
    }
    public function create()
    {

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
            session()->flash('message', $this->mahasiswaID ? $this-> nama . ' Edited successfully':$this->nama . ' Added successfully');
            $this->closeModal();
            $this -> resetFields();



    }

    public function edit($id)
    {
        $jurusans = Jurusan::all();
        $prodis = Prodi::all();
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
        session()->flash('message', $mahasiswa->nama . ' Deleted successfully');

    }
}
