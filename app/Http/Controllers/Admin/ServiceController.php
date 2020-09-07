<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = ServiceCategory::all();
        $serviceCount = ServiceCategory::all()->count();
        return view('admin.services.index', [
            'serviceCount' => $serviceCount,
            'services' => $services,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $service = new ServiceCategory();

        $service->service_name = $request->input('service_name');
        $service->service_description = $request->input('service_description');

        try {
            $service->save();
            $value = 'success';
            $request->session()->flash('statuscode', $value);
            return redirect('/service-category')->with(
                'status',
                'Service category has been added !'
            );
        } catch (\Throwable $e) {
            die($e);
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
    public function edit($id)
    {
        $serviceId = ServiceCategory::findOrFail($id);

        if ($serviceId) {
            return view('admin.services.edit', ['service' => $serviceId]);
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
        $serviceToUpdate = ServiceCategory::findOrFail($id);

        if ($serviceToUpdate) {
            $serviceToUpdate->service_name = $request->input('service_name');
            $serviceToUpdate->service_description = $request->input(
                'service_description'
            );
            $serviceToUpdate->status = $request->input('status');
            try {
                $serviceToUpdate->update();

                $value = 'info';
                $request->session()->flash('statuscode', $value);

                return redirect('/service-category')->with(
                    'status',
                    'Service category has been updated successfully!'
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $serviceToDestroy = ServiceCategory::findOrFail($id);

        try {
            $serviceToDestroy->delete();
            // $value = 'error';
            // $request->session()->flash('statuscode', $value);

            return response()->json([
                'status' => 'This category has been deleted',
            ]);
            // return redirect('/service-category')->with(
            //     'status',
            //     'This category has been deleted !'
            // );
        } catch (\Throwable $e) {
            var_dump($e);
        }
    }
}
