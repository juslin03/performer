<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use App\Models\ServiceList;
use Illuminate\Http\Request;

class ServiceListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service_category = ServiceCategory::all();

        $services_list = ServiceList::all();
        return view('admin.services-list.index', [
            'service_cats' => $service_category,
            'services_list' => $services_list,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $service_list = new ServiceList();
        $service_list->service_category_id = $request->input(
            'service_category_id'
        );
        $service_list->title = $request->input('title');
        $service_list->description = $request->input('description');
        $service_list->price = $request->input('price');
        $service_list->duration = $request->input('duration');

        try {
            $service_list->save();

            $value = 'success';
            $request->session()->flash('statuscode', $value);

            return redirect()
                ->back()
                ->with('status', 'Service List added successfully!');
        } catch (\Throwable $e) {
            $value = 'error';
            $request->session()->flash('statuscode', $value);
            return redirect()
                ->back()
                ->with('status', 'Error occured!');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $service_list_to_edit = ServiceList::findOrFail($id);
        $service_cats = ServiceCategory::all();

        if (!$service_list_to_edit) {
            $value = 'error';
            $request->session()->flash('statuscode', $value);
            return redirect()
                ->back()
                ->with('status', 'This service cannot be found');
        } else {
            return view('admin.services-list.edit', [
                'service_list_to_edit' => $service_list_to_edit,
                'service_cats' => $service_cats,
            ]);
        }
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
        $sv_list_to_update = ServiceList::findOrFail($id);

        if (!$sv_list_to_update) {
            $value = 'error';
            $request->session()->flash('statuscode', $value);
            return redirect()
                ->back()
                ->with('status', 'Error, this service cannot be found.');
        } else {
            $sv_list_to_update->title = $request->input('title');
            $sv_list_to_update->price = $request->input('price');
            $sv_list_to_update->duration = $request->input('duration');
            $sv_list_to_update->description = $request->input('description');

            try {
                $sv_list_to_update->update();

                $value = 'success';
                $request->session()->flash('statuscode', $value);
                return redirect('/services-list')->with(
                    'status',
                    'Service list has been updated !'
                );
            } catch (\Throwable $e) {
                $request->session()->flash('statuscode', 'error');
                return redirect()
                    ->back()
                    ->with(
                        'status',
                        'An error occured while updating service list.'
                    );
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
