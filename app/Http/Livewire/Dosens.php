<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Dosen;
use App\Models\Matkul;
use Livewire\WithPagination;


class Dosens extends Component
{
    public $dosen , $nama ,$nidn, $telephone, $bidang ,$dosen_id, $search;
    public $isModal;
    use WithPagination;
    public function render()
    {
        $matkul = Matkul::all();
        $search = '%'.$this->search.'%';
        $dosens = Dosen::where('nama','LIKE',$search)
        ->orderBy('created_at', 'Desc')->paginate(5);
        return view('livewire.dosens', compact('matkul'),[
            'dosens'=>$dosens
        ]);
    }
    public function createdosen()
    {
        $this->resetFields();
        $this->openModal();
    }

    public function resetFields()
    {
        $this->nama ='';
        $this->nidn='';
        $this->telephone ='';
        $this->bidang ='';
        $this->dosen_id ="";
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
            'nidn'=> 'required|numeric',
            'telephone'=> 'required|numeric',
            'bidang'=> 'required|string',
        ]);

        dosen::updateOrCreate(
            ['id' => $this->dosen_id],
            [
                'nama'=>$this->nama,
                'nidn'=>$this->nidn,
                'telephone'=>$this->telephone,
                'bidang'=>$this->bidang,

            ]
            );

            session()->flash('message', $this->dosen_id ? $this-> nama . ' Edited successfully':$this->nama . ' Added successfully');
            $this -> resetFields();
            $this -> closeModal();
    }
    public function edit($id)
    {
        $matkul =Matkul::all();
        $dosen = Dosen::find($id);
        $this-> dosen_id = $id;
        $this->nama =$dosen->nama;
        $this->nidn =$dosen->nidn;
        $this->telephone =$dosen->telephone;
        $this->bidang =$dosen->bidang;


        $this->openModal();

    }
    public function delete($id)
    {
        $dosen = Dosen::find($id);
        $dosen-> delete();
        session()->flash('message', $dosen->nama . ' Deleted Successfully');

    }

}