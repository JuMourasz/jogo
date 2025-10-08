<?php

namespace App\Http\Controllers\request\personagem;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Personagem;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}

class HomeController extends Controller
{
    public function show () {
         return view ( 'Personagem' );

    }

    public function store (Request $request) {
        $request->validate ([
            'name' => ['required', 'max:200'],
            'level' => ['required', 'number'],
            'hp' => ['required', 'number'],
            'mp' => ['required', 'number'],
            'attack' => ['required', 'number'],
            'defense' => ['required', 'number'],
            'special_attack' => ['required', 'number'],
            'special_defense' => ['required', 'number'],
            'speed' => ['required', 'number'],
            'exp' => ['required', 'number'],
        ]);

        $personagem = new Personagem ();

        $personagem->name = $request->name;
        $personagem->level = $request->level;
        $personagem->hp = $request->hp;
        $personagem->mp = $request->mp;
        $personagem->attack = $request->attack;
        $personagem->defense = $request->defense;
        $personagem->special_attack = $request->special_attack;
        $personagem->special_defense = $request->special_defense;
        $personagem->speed = $request->speed;
        $personagem->exp = $request->exp;

        $personagem->save();

        return redirect()->back();
    }
}
