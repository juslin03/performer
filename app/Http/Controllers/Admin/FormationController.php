<?php

namespace App\Http\Controllers\Admin;

use App\Models\Formation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formations = Formation::all();
        return view('admin.clients.formations.index', [
            'formations' => $formations,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.clients.formations.create');
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
            'f_title' => 'required',
            'f_desc' => 'required|min:10',
            'f_cover' => 'required|image',
        ]);

        if ($request->hasFile('f_cover')) {
            // file name with extension
            $fileNameWithExt = $request
                ->file('f_cover')
                ->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request
                ->file('f_cover')
                ->getClientOriginalExtension();

            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request
                ->file('f_cover')
                ->storeAs('public/cover_images', $fileNameToStore); //after do php artisan storage:link to link the storage in order to get image to the view
        } else {
            $fileNameToStore = 'no_file.png';
        }

        $new_formation = new Formation();

        $new_formation->f_title = $request->f_title;
        $new_formation->f_desc = $request->f_desc;
        $new_formation->user_id = auth()->user()->id;
        $new_formation->f_cover = $fileNameToStore;
        $new_formation->file_path = $path;
        $new_formation->save();

        $request->session()->flash('statuscode', 'success');
        return redirect('/admin/formations')->with(
            'status',
            'Formation cree avec success!'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $formations = Formation::all();
        $formation = Formation::findOrFail($id);

        return view('admin.clients.formations.show', [
            'formation' => $formation,
            'formations' => $formations,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $formation = Formation::findOrFail($id);

        return view('admin.clients.formations.edit', [
            'formation' => $formation,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $formationToUpdate = Formation::findOrFail($id);

        if (!$formationToUpdate) {
            $request->session()->flash('statuscode', 'error');
            return redirect()
                ->back()
                ->with('status', 'Formation introuvable');
        } elseif ($request->hasFile('f_cover')) {
            $fileNameWithExt = $request
                ->file('f_cover')
                ->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            $extension = $request
                ->file('f_cover')
                ->getClientOriginalExtension();

            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request
                ->file('f_cover')
                ->storeAs('public/cover_images', $fileNameToStore);

            $formationToUpdate->f_title = $request->input('f_title');
            $formationToUpdate->f_desc = $request->input('f_desc');
            $formationToUpdate->user_id = auth()->user()->id;
            $formationToUpdate->f_cover = $fileNameToStore;
            $formationToUpdate->file_path = $path;

            try {
                $formationToUpdate->update();
                $request->session()->flash('statuscode', 'info');
                return redirect('/admin/formations')->with(
                    'status',
                    'Formation modifiée avec succès !'
                );
            } catch (\Throwable $e) {
                $request->session()->flash('statuscode', 'error');

                // dd($e);
                return redirect()
                    ->back()
                    ->with(
                        'status',
                        'Erreur lors de la modification de la formation'
                    );
            }
        } elseif ($request->input('f_title') || $request->input('f_desc')) {
            $formationToUpdate->f_title = $request->input('f_title');
            $formationToUpdate->f_desc = $request->input('f_desc');
            $formationToUpdate->user_id = auth()->user()->id;

            try {
                $formationToUpdate->update();
                $request->session()->flash('statuscode', 'info');
                return redirect('/admin/formations')->with(
                    'status',
                    'Formation modifiée avec succès !'
                );
            } catch (\Throwable $e) {
                $request->session()->flash('statuscode', 'error');

                // dd($e);
                return redirect()
                    ->back()
                    ->with(
                        'status',
                        'Erreur lors de la modification de la formation'
                    );
            }
        } else {
            $request->session()->flash('statuscode', 'warning');

            return redirect()
                ->back()
                ->with('status', 'On dirait que vous n avez rien modifié!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $formationToRemove = Formation::findOrFail($id);

        try {
            $formationToRemove->delete();
            $request->session()->flash('statuscode', 'success');
            return response()->json([
                'status' => 'Cette formation vient d etre supprimée.',
            ]);
        } catch (\Throwable $e) {
            $request->session()->flash('statuscode', 'warning');
            return response()->json([
                'status' => 'Cette formation n a pas pu etre supprimée.',
            ]);
        }
    }
}
