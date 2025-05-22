<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonController extends Controller
{
    //membuat attribut name
    private $name = "Didin";

    //membuat method index
    public function index()
    {
        $name = $this->name;
        return view('people.index', compact('name'));
        
    }

    public function show($arg) 
    {
        $name = $arg;
        return view('people.show', compact('name'));
    }

    public function create() {
        return view('people.create');
    }

    public function store(Request $request)
    {
        $person = $request;
        return view('people.result', compact('person'));
    }
    
}

?>