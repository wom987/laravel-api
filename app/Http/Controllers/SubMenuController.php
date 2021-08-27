<?php

namespace App\Http\Controllers;

use App\Models\SubMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubMenuController extends Controller
{
    public function index()
    {
        $submenu = DB::table('sub_menus')
            ->select()
            ->where('eliminado', 'false')
            ->get();
        return $submenu;
    }
    public function store(Request $request)
    {
       
        try {
            $submenu = new SubMenu();
            $submenu->id_menu = $request->id_menu;
            $submenu->nombre = $request->nombre;
            $submenu->estado = $request->estado;
            $submenu->eliminado = 'false';
            $submenu->save();
            return true;
        } catch (\Throwable $th) {
            return response()->json([
                'message'=>$th
            ]);
        }
    }
    public function update(Request $request, $id)
    {
        try {

            $submenu = SubMenu::findOrFail($id);
            $submenu->id_menu = $request->id_menu;
            $submenu->nombre = $request->nombre;
            $submenu->estado = $request->estado;
            $submenu->save();
            return $submenu;
        } catch (\Throwable $th) {
            return response()->json([
                'message'=>$th
            ]);
        }
    }
    public function destroy($id)
    {
        try {
            $submenu = SubMenu::findOrFail($id);
            $submenu->eliminado = 'true';
            $submenu->save();
            return true;
        } catch (\Throwable $th) {
            return response()->json([
                'message'=>$th
            ]);
        }
    }
}
