<?php

namespace App\Http\Controllers\Client;

use App\Models\Menu;
use App\Models\SousMenu;
use App\Models\Evenement;
use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formations = Formation::all();
        $events = Evenement::all();
        return view('frontend.welcome', [
            'formations' => $formations,
            'events' => $events,
        ]);
    }

    public function menu(Request $request)
    {
        $menus = Menu::all();
        // $menuId = Menu::first();
        // $nbre_sous_menu = Menu::find(2)
        //     ->sous_menu()
        //     ->count();
        // dd($nbre_sous_menu);
        $sm = DB::table('menus')
            ->join('sous_menus', 'menus.id', '=', 'sous_menus.menu_id')
            ->count();
        // dd($sm);
        $smenus = SousMenu::all();
        // ->where('menu_id');
        // dd($menus, $smenus);
        return view('admin.clients.index', [
            'menus' => $menus,
            'smenus' => $smenus,
            'sm' => $sm,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $menu = new Menu();
        $menu->menu = $request->input('menu');
        $menu->descmenu = $request->input('descmenu');
        // $menu->status = $request->input('status');

        try {
            $menu->save();

            $request->session()->flash('statuscode', 'success');

            return redirect('/menus')->with(
                'status',
                'Menu cree avec success !'
            );
        } catch (\Throwable $e) {
            $request->session()->flash('statuscode', 'error');
            return redirect()
                ->back()
                ->with(
                    'status',
                    'Une erreur a survenu lors de la creation du menu.'
                );
        }
    }

    /**
     * display one event
     * @param int $id, $slug
     * @return \Illuminate\Http\Response
     */
    public function show_event($slug)
    {
        $event = Evenement::findOrFail($slug);
        $formations = Formation::all();
        $oneEvent = Evenement::find(1);
        return view('frontend.events.show', [
            'event' => $event,
            'formations' => $formations,
            'oneEvent' => $oneEvent,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $nbre_sous_menu = SousMenu::all();
        $menu = Menu::find($id);
        dd($nbre_sous_menu, $menu);
        // $sm = DB::table('menus')->join(
        //     'sous_menus',
        //     'menus.id',
        //     '=',
        //     'sous_menus.menu'
        // )->count();
        // dd([
        //     'menu' => $menu->menu,
        //     'nombre de sous menu' => $nbre_sous_menu,
        // ]);
        return view('admin.clients.show', [
            'submenus' => $nbre_sous_menu,
            'menu' => $menu,
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
