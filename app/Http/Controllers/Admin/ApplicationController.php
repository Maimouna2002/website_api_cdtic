<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\ApplicationRequest;
use App\Models\Application;
use App\Models\User;
use App\Models\Offer;


class ApplicationController extends Controller
{

  public function countApplications()
{
    // Compter le nombre de candidatures
    $nombreCandidatures = Application::count();

    // Retourner le nombre de candidatures
    return $nombreCandidatures;
}
  public function create()
{
  $users = User::all();
  $offers = Offer::all();

  return view('content.applications.create', compact('users', 'offers'));

    // Code pour afficher le formulaire de création d'une nouvelle application
}
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ApplicationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApplicationRequest $request)
    {
        $application = new Application();
        $application->user_id = $request->user_id;
        $application->offer_id = $request->offer_id;
        $application->cv = $request->file('cv')->store('cvs');
        $application->motivation_letter = $request->file('motivation_letter')->store('motivation_letters');
        $application->status = $request->status ?? 'pending';
        $application->save();

        return redirect()->route('applications.index')->with('success', 'Candidature soumise avec succès.');
    }
    public function status($id, $status)
    {
        Application::findOrFail($id)->update(['status' => $status]);

        return redirect()->route('applications.index')->withSuccess(__('Status Updated Successfully.'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ApplicationRequest  $request
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(ApplicationRequest $request, Application $application)
    {
        $application->user_id = $request->user_id;
        $application->offer_id = $request->offer_id;
        if ($request->hasFile('cv')) {
            $application->cv_path = $request->file('cv')->store('cvs');
        }
        if ($request->hasFile('motivation_letter')) {
            $application->motivation_letter_path = $request->file('motivation_letter')->store('motivation_letters');
        }
        $application->status = $request->status ?? 'pending';
        $application->save();

        return redirect()->route('applications.index')->with('success', 'Candidature mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        $application->delete();
        return redirect()->route('applications.index')->with('success', 'Candidature supprimée avec succès.');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = Application::all();
        return view('content.applications.index', compact('applications'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        return view('content.applications.edit', compact('application'));
    }
}
