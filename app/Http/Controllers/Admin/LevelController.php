<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Level;

class LevelController extends Controller
{
    /**
     * Affiche une liste des niveaux.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels = Level::orderBy('id', 'desc')->get();

        return view('content.levels.index', compact('levels'));
    }

    /**
     * Affiche le formulaire de création d'un nouveau niveau.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.levels.create');
    }

    /**
     * Enregistre un nouveau niveau.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        Level::create($request->all());

        return redirect()->route('levels.index')->withSuccess(__('New Level Added Successfully.'));
    }

    /**
     * Affiche les détails d'un niveau spécifique.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $level = Level::findOrFail($id);

        return view('content.levels.show', compact('level'));
    }

    /**
     * Affiche le formulaire d'édition d'un niveau spécifique.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $level = Level::findOrFail($id);

        return view('content.levels.edit', compact('level'));
    }

    /**
     * Met à jour un niveau spécifique dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $level = Level::findOrFail($id);

        $request->validate([
            'name' => 'required|string',
        ]);

        $level->update($request->all());

        return redirect()->route('levels.index')->withSuccess(__('Level Updated Successfully.'));
    }

    /**
     * Supprime un niveau spécifique de la base de données.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $level = Level::findOrFail($id);
        $level->delete();

        return redirect()->route('levels.index')->withSuccess(__('Level Deleted Successfully.'));
    }
}
