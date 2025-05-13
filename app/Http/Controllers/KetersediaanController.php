<?php

namespace App\Http\Controllers;

use App\Models\Ruangan; 
use Illuminate\Http\Request;

class KetersediaanController extends Controller
{
    public function index()
    {

        $ruangans = Ruangan::all();
        
        
        return view('ketersediaan.index', compact('ruangans')); // Mengirim data ke view
    }
}