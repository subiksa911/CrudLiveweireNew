<?php

namespace App\Models;

use App\Http\Livewire\Dosens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    use HasFactory;
    protected $table = "systems";
    protected $fillable =['nama','kegiatan','tingkat','point','pa','tahun','penyelenggara','bukti'];



}