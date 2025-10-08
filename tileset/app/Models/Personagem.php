<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personagem extends Model
{
    protected $fillable = [
        'Name', 
        'level',
        'hp',
        'mp',
        'attack',
        'defense',
        'sepcial_attack',
        'special_defense',
        'speed',
        'exp'
    ];

    public function move(){}
    public function attack(){}
    public function specialAttack(){}
    public function heal(){}
    
}