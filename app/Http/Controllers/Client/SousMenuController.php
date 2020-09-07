<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\SousMenu;
use Illuminate\Http\Request;

class SousMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $submenus = SousMenu::all();
        // $menus = Menu::all();

        // return view('admin.clients.sub.index', [
        //     'submenus' => $submenus,
        //     'menus' => $menus,
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id)
    {
        // $menuId = Menu::findOrFail($id);
        // // $submenus = SousMenu::all();
        // if (!$menuId) {
        //     $request->session()->flash('statuscode', 'error');
        //     return redirect()
        //         ->back()
        //         ->with('status', 'Menu not found');
        // } else {
        //     return view('admin.clients.sub.create', [
        //         'menu' => $menuId,
        //         // 'submenus' => $submenus,
        //     ]);
        // }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $menuID = Menu::findOrFail($id);
        if ($menuID) {
            $submenu = new SousMenu();
            $submenu->submenu = $request->input('submenu');
            $submenu->descsubmenu = $request->input('descsubmenu');
            $submenu->menu_id = $request->input('menu_id');

            try {
                $submenu->save();

                $request->session()->flash('statuscode', 'success');
                return redirect()
                    ->back()
                    ->with('status', 'Sous menu cree avec success!');
            } catch (\Throwable $e) {
                $request->session()->flash('statuscode', 'warning');
                return redirect()
                    ->back()
                    ->with(
                        'status',
                        'Des erreurs ont apparues lors de la creation du sous-menu'
                    );
            }
        } else {
            $request->session()->flash('statuscode', 'warning');
            return redirect()
                ->back()
                ->with('status', 'Ce menu est introuvable.');
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
        //
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
        //
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
