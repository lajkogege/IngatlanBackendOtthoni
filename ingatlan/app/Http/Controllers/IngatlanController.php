<?php

namespace App\Http\Controllers;

use App\Models\Ingatlan;
use App\Models\Kategoriak;
use Illuminate\Http\Request;

class IngatlanController extends Controller
{
    //összes ingatlan lekérése a kategoriákkal eggyütt
    public function osszesAdat()
    {
        // Lekérjük az ingatlanokat és a kapcsolódó kategóriát
        $ingatlanok = Ingatlan::with('kategoria')->get();

        // Válasz visszaadása JSON formátumban
        return response()->json($ingatlanok);
    }

    //uj ingatlan felvitele
    public function postIngatlanok(Request  $request)
    {
        $ingatlan = new Ingatlan();
        $ingatlan->kategoria = $request->kategoria;
        $ingatlan->leiras = $request->leiras;
        $ingatlan->hirdetesDatuma = $request->hirdetesDatuma;
        $ingatlan->tehermentes = $request->tehermentes;
        $ingatlan->ar = $request->ar;
        $ingatlan->save();
    }


    //inagtlan törlése
    public function deleteIngatlan($id)
    {
        // Megkeressük az ingatlant az id alapján
        $ingatlan = Ingatlan::find($id);
        // Ha nem található az ingatlan, 404-es hiba válasz
        if (!$ingatlan) {
            return response()->json([
                'message' => 'Ingatlan nem található!'
            ], 404);
        }
        // Az ingatlan törlése
        $ingatlan->delete();
        // Válasz visszaadása, hogy a törlés sikeres
        return response()->json([
            'message' => 'Ingatlan sikeresen törölve!'
        ]);
    }
}
