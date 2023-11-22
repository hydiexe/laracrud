<?php

namespace App\Http\Controllers;

use App\Program;
use App\Edulevel;

use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programs = Program::all();
        return view('program/index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edulevels = Edulevel::all();
        return view('program.create', compact('edulevels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5',
            'edulevel_id' => 'required',
        ], [
            'name.required' => 'Nama Program tidak boleh kosong.',
            'edulevel_id.required' => 'Jenjang tidak boleh kosong.',
        ]);
        // return $request;

        $program = new Program;
        $program->name = $request->name;
        $program->edulevel_id = $request->edulevel_id;
        $program->student_price = $request->student_price;
        $program->student_max = $request->student_max;
        $program->info = $request->info;
        $program->save();

        return redirect('programs')->with('status', 'Program berhasil ditambahkan');
        // 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function show(Program $program)
    {
        $program->makeHidden(['edulevel_id']);
        // return $program;
        return view('program/show', compact('program'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function edit(Program $program)
    {
        $edulevels = Edulevel::all();
        return view('program.edit', compact('program', 'edulevels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Program $program)
    {
        $request->validate([
            'name' => 'required|min:5',
            'edulevel_id' => 'required',
        ], [
            'name.required' => 'Nama Program tidak boleh kosong.',
            'edulevel_id.required' => 'Jenjang tidak boleh kosong.',
        ]);
        // return $request;

        $program->name = $request->name;
        $program->edulevel_id = $request->edulevel_id;
        $program->student_price = $request->student_price;
        $program->student_max = $request->student_max;
        $program->info = $request->info;
        $program->save();

        return redirect('programs')->with('status', 'Program berhasil diedit');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function destroy(Program $program)
    {
        $program->delete();
        
        return redirect('programs')->with('status', 'Program berhasil dihapus');
    }
}
