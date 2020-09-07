<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $abouts = About::all();
        $aboutsCount = About::all()->count();

        return view('admin.aboutus', [
            'abouts' => $abouts,
            'aboutsCount' => $aboutsCount,
        ]);
    }

    public function show($id)
    {
        # code...
    }

    public function store(Request $request)
    {
        $about = new About();
        $about->title = $request->input('title');
        $about->subtitle = $request->input('subtitle');
        $about->description = $request->input('description');

        $about->save();

        $value = 'success';
        $request->session()->flash('statuscode', $value);
        return redirect('/about-us')->with(
            'status',
            'Data added for `about us`'
        );
    }

    public function edit($id)
    {
        $aboutToEdit = About::findOrFail($id);

        return view('admin.abouts.edit', ['about' => $aboutToEdit]);
    }

    public function update(Request $request, $id)
    {
        $aboutUsId = About::findOrFail($id);

        $aboutUsId->title = $request->input('title');
        $aboutUsId->subtitle = $request->input('subtitle');
        $aboutUsId->description = $request->input('description');

        $aboutUsId->update();

        $value = 'info';
        $request->session()->flash('statuscode', $value);
        return redirect('/about-us')->with(
            'status',
            'About has been updated successfully !'
        );
    }

    public function destroy(Request $request, $id)
    {
        $aboutUsToRemove = About::findOrFail($id);

        try {
            $aboutUsToRemove->delete();

            $value = 'error';
            $request->session()->flash('statuscode', $value);
            return redirect('/about-us')->with(
                'status',
                'About us has been deleted successfully!'
            );
        } catch (\Throwable $e) {
            $value = 'error';
            $request->session()->flash('statuscode', $value);
            return redirect()
                ->back()
                ->with('status', 'Error occured!');
        }
    }
}
