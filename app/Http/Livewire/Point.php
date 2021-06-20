<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\System;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\Dosen;
use App\Models\Tahun;
use App\Models\Tingkat;

class Point extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $system ,$nama ,$kegiatan , $point , $pa , $tahun , $penyelenggara ,$bukti, $systemID, $tingkat;
    public $isModal;
    public $search;
    public function render()
    {
        $tingkats = Tingkat::all();
        $tahuns = Tahun::all();
        $dosens = Dosen::all();
        $search = '%'.$this->search.'%';
        $systems = System::where('nama','LIKE',$search)
                        ->orderBy('id','DESC')->paginate(5);
        return view('livewire.point',compact('dosens','tahuns','tingkats'),[
            'systems'=>$systems
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
        $this->kegiatan ='';
        $this->tingkat ='';
        $this->point ='';
        $this->pa ='';
        $this->tahun ='';
        $this->penyelenggara ='';
        $this->bukti = '';
        $this->systemID = '';
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
            'nama'=>'required|string',
            'kegiatan'=> 'required|string',
            'tingkat'=>'required|string',
            'point'=> 'required|string',
            'pa'=> 'required|string',
            'tahun'=> 'required|string',
            'penyelenggara'=> 'required| string',
            'bukti'=> 'required| max:5120'
        ]);

        if(!empty($this->bukti))
        {
            $this->bukti->store('bukti','public');
        }
        System::updateOrCreate(
            ['id' => $this->systemID],
            [
                'nama'=>$this->nama,
                'kegiatan'=>$this->kegiatan,
                'tingkat'=>$this->tingkat,
                'point'=>$this->point,
                'pa'=>$this->pa,
                'tahun'=>$this->tahun,
                'penyelenggara'=>$this->penyelenggara,
                'bukti'=> $this->bukti->hashName(),

            ]
            );
            session()->flash('message', $this->systemID ? $this->nama . ' Edited successfully':$this->nama . ' Added successfully');
            $this->closeModal();
            $this -> resetFields();



    }

    public function edit($id)
    {
        $tingkats = Tingkat::all();
        $tahuns = Tahun::all();
        $dosens = Dosen::all();
        $system = System::find($id);
        $this->systemID = $id;
        $this->nama = $system->nama;
        $this->kegiatan = $system->kegiatan;
        $this->tingkat = $system->tingkat;
        $this->point  = $system->point;
        $this->pa = $system->pa;
        $this->tahun = $system->tahun;
        $this->penyelenggara = $system->penyelenggara;
        $this->bukti= $system->bukti;

        $this->openModal();

    }
    public function delete($id)
    {
        $system = System::find($id);
        $system-> delete();
        session()->flash('message', $system->nama . ' Deleted successfully');

    }
}
