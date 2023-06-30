<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Domain;

class DomainController extends Controller
{
    /**
     * Affiche une liste des domaines.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $domains = Domain::orderBy('id', 'desc')->get();

        return view('content.domains.index', compact('domains'));
    }

    /**
     * Affiche le formulaire de création d'un nouveau domaine.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.domains.create');
    }

    /**
     * Enregistre un nouveau domaine.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
        ]);

        Domain::create($request->all());

        return redirect()->route('domains.index')->withSuccess(__('New Domain Added Successfully.'));
    }

    public function status($id, $status)
    {
      Domain::findOrFail($id)->update(['status' => $status]);

        return redirect()->route('domains.index')->withSuccess(__('Status Updated Successfully.'));
    }

    /**
     * Affiche les détails d'un domaine spécifique.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $domain = Domain::findOrFail($id);

        return view('content.domains.show', compact('domain'));
    }

    /**
     * Affiche le formulaire d'édition d'un domaine spécifique.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $domain = Domain::findOrFail($id);

        return view('content.domains.edit', compact('domain'));
    }

    /**
     * Met à jour un domaine spécifique dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $domain = Domain::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
        ]);

        $domain->update($request->all());

        return redirect()->route('domains.index')->withSuccess(__('Domain Updated Successfully.'));
    }

    /**
     * Supprime un domaine spécifique de la base de données.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $domain = Domain::findOrFail($id);
        $domain->delete();

        return redirect()->route('domains.index')->withSuccess(__('Domain Deleted Successfully.'));
    }
}
