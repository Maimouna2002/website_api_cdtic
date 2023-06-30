<?php
namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\User;
use App\Models\Offer;

class ApplicationController extends Controller
{
    /**
     * Affiche une liste des applications.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = Application::with('user', 'offer')->orderBy('id', 'desc')->get();

        return view('content.applications.index', compact('applications'));
    }

    /**
     * Affiche le formulaire de création d'une nouvelle application.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $offers = Offer::all();

        return view('content.applications.create', compact('users', 'offers'));
    }

    /**
     * Enregistre une nouvelle application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'offer_id' => 'required',
            'motivation_letter' => 'required',
            'cv' => 'required',
            'status' => 'required'
        ]);

        Application::create($request->all());

        return redirect()->route('applications.index')->withSuccess(__('New Application Added Successfully.'));
    }

    /**
     * Affiche les détails d'une application spécifique.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $application = Application::with('user', 'offer')->findOrFail($id);

        return view('content.applications.show', compact('application'));
    }

    /**
     * Affiche le formulaire d'édition d'une application spécifique.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $application = Application::with('user', 'offer')->findOrFail($id);
        $users = User::all();
        $offers = Offer::all();

        return view('content.applications.edit', compact('application', 'users', 'offers'));
    }

    /**
     * Met à jour une application spécifique dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $application = Application::findOrFail($id);

        $request->validate([
            'user_id' => 'required',
            'offer_id' => 'required',
            'message' => 'required',
            'status' => 'required'
        ]);

        $application->update($request->all());

        return redirect()->route('applications.index')->withSuccess(__('Application Updated Successfully.'));
    }

    /**
     * Supprime une application spécifique de la base de données.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $application = Application::findOrFail($id);
        $application->delete();

        return redirect()->route('applications.index')->withSuccess(__('Application Deleted Successfully.'));
    }
}
