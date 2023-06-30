<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Internship;
use App\Models\Application;
use App\Http\Requests\InternshipRequest;

class InternshipController extends Controller
{
    /**
     * Affiche une liste des stages.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $internships = Internship::with('application')->orderBy('id', 'desc')->get();

        return view('content.internship.index', compact('internships'));
    }

    /**
     * Affiche le formulaire de création d'un nouveau stage.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $applications = Application::all();

        return view('content.internship.create', compact('applications'));
    }

    /**
     * Enregistre un nouveau stage.
     *
     * @param  \App\Http\Requests\InternshipRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InternshipRequest $request)
    {
        Internship::create($request->validated());

        return redirect()->route('internships.index')->withSuccess(__('New Internship Added Successfully.'));
    }

    /**
     * Affiche les détails d'un stage spécifique.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $internship = Internship::findOrFail($id);

        return view('content.internship.show', compact('internship'));
    }

    /**
     * Affiche le formulaire d'édition d'un stage spécifique.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $internship = Internship::findOrFail($id);
        $applications = Application::all();

        return view('content.internship.edit', compact('internship', 'applications'));
    }

    /**
     * Met à jour un stage spécifique dans la base de données.
     *
     * @param  \App\Http\Requests\InternshipRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InternshipRequest $request, $id)
    {
        $internship = Internship::findOrFail($id);
        $internship->update($request->validated());

        return redirect()->route('internships.index')->withSuccess(__('Internship Updated Successfully.'));
    }

    /**
     * Supprime un stage spécifique de la base de données.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $internship = Internship::findOrFail($id);
        $internship->delete();

        return redirect()->route('internships.index')->withSuccess(__('Internship Deleted Successfully.'));
    }
}
