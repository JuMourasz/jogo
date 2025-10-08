<?php

namespace App\Http\Controllers\request\fase;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\fase;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}

class HomeController extends Controller
{
    public function show () {
         return view ( 'fase' );

    }

    public function store (Request $request) {
        $request->validate ([
            'numero' => ['required', 'number'],
            'largura' => ['required', 'longitude'],
            'altura' => ['required', 'latitude'],
            'quantidade_inimigos' => ['required', 'number'],

        ]);

        $fase = new fase ();

        $fase->numero = $request->numero;
        $fase->largura = $request->largura;
        $fase->altura = $request->altura;
        $fase->quantidade_inimigos = $request->quantidade_inimigos;
        

        $fase->save();

        return redirect()->back();
    }

}
