<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use app\Models\Party;

class AppController extends Controller
{
    public function index()
    {
        $party = new Party();
        $party->full_name = "Subresh Thakulla";
        $party->save();


        return "database operation"; 
    }
}
