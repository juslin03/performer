<?php

namespace App\Http\Controllers\Admin;

use App\Models\Evenement;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Evenement::all();

        return view('admin.clients.events.index', ['events' => $events]);
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.clients.events.create');
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
            'e_title' => 'required|min:3',
            'e_desc' => 'required|min:5',
            'e_date' => 'required',
            'e_place' => 'required',
            'e_img' => 'required',
        ]);

        if ($request->hasFile('e_img')) {
            // get file
            $fileNameWithExt = $request->file('e_img')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $ext = $request->file('e_img')->getClientOriginalExtension();

            // rename file before save to db
            $filenamed = $filename . '_' . time() . '.' . $ext;
            $path = $request
                ->file('e_img')
                ->storeAs('public/cover_images', $filenamed);

            $new_event = new Evenement();
            $slug = Str::lower(
                trim(preg_replace('/\s+/', '-', $request->e_title))
            );
            $new_event->e_title = $request->e_title;
            $new_event->e_desc = $request->e_desc;
            $new_event->e_date = $request->e_date;
            $new_event->e_place = $request->e_place;
            $new_event->e_img = $filenamed;
            $new_event->user_id = auth()->user()->id;
            $new_event->e_slug = $slug;
            $new_event->e_file_path = $path;

            try {
                $new_event->save();
                $request->session()->flash('statuscode', 'success');
                return redirect('/admin/events')->with(
                    'status',
                    'Evenement créé avec succès!'
                );
            } catch (\Throwable $e) {
                $request->session()->flash('statuscode', 'warning');
                return response()->json([
                    'status' => 'Erreur lors de la creation de l evenement.',
                ]);
            }
        } else {
            $request->session()->flash('statuscode', 'error');
            return response()->json([
                'status' =>
                    'Veuillez verifier que tous les champs ont été correctement remplis.',
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Evenement::findOrFail($id);

        return view('admin.clients.events.show', ['event' => $event]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Evenement::findOrFail($id);

        return view('admin.clients.events.edit', ['event' => $event]);
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
        $event_to_update = Evenement::findOrFail($id);

        if ($request->hasFile('e_img')) {
            // get file
            $fileNameWithExt = $request->file('e_img')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $ext = $request->file('e_img')->getClientOriginalExtension();

            // rename file before save to db
            $filenamed = $filename . '_' . time() . '.' . $ext;
            $path = $request
                ->file('e_img')
                ->storeAs('public/cover_images', $filenamed);

            $slug = Str::lower(
                trim(preg_replace('/\s+/', '-', $request->e_title))
            );
            $event_to_update->e_title = $request->input('e_title');
            $event_to_update->e_desc = $request->input('e_desc');
            $event_to_update->e_date = $request->input('e_date');
            $event_to_update->e_place = $request->input('e_place');
            $event_to_update->e_img = $filenamed;
            $event_to_update->user_id = auth()->user()->id;
            $event_to_update->e_slug = $slug;
            $event_to_update->e_file_path = $path;
            try {
                $event_to_update->update();
                $request->session()->flash('statuscode', 'info');
                return redirect('/admin/events')->with(
                    'status',
                    'Evenement modifié avec succès!'
                );
            } catch (\Throwable $e) {
                $request->session()->flash('statuscode', 'warning');
                return response()->json([
                    'status' =>
                        'Erreur lors de la modification de l evenement.',
                ]);
            }
        } elseif (
            $request->input('e_title') ||
            $request->input('e_desc') ||
            $request->input('e_date') ||
            $request->input('e_place')
        ) {
            $slug = Str::lower(
                trim(preg_replace('/\s+/', '-', $request->e_title))
            );
            $event_to_update->e_title = $request->input('e_title');
            $event_to_update->e_desc = $request->input('e_desc');
            $event_to_update->e_date = $request->input('e_date');
            $event_to_update->e_place = $request->input('e_place');
            $event_to_update->e_slug = $slug;
            $event_to_update->user_id = auth()->user()->id;

            try {
                $event_to_update->update();
                $request->session()->flash('statuscode', 'info');
                return redirect('/admin/events')->with(
                    'status',
                    'Evenement modifié avec succès!'
                );
            } catch (\Throwable $e) {
                $request->session()->flash('statuscode', 'warning');
                return response()->json([
                    'status' =>
                        'Erreur lors de la modification de l evenement.',
                ]);
            }
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
        $event = Evenement::findOrFail($id);

        try {
            $event->delete();
            $request->session()->flash('statuscode', 'success');
            return response()->json([
                'status' => 'Cet evenement vient d etre supprimé.',
            ]);
        } catch (\Throwable $e) {
            $request->session()->flash('statuscode', 'warning');
            return response()->json([
                'status' => 'Erreur lors de la suppression de cet evenement.',
            ]);
        }
    }
}
