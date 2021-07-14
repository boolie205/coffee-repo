<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class coffee extends Model
{
    public $table = 'coffee';
    
    static public function GetCoffeesAndOptionsAsStrings(){
        $coffees = DB::table('coffee')->select('id','name_of_coffee','CoffeeOptions','created_at')->get();

//this could be solved in a one liner but its really...really dirty.
//but it looks cool so i will leave it in a comment
//implode(" & ", array_flip(array_map(function($v) { global $mapIndex; return ++$mapIndex; }, array_filter(json_decode($coffee->CoffeeOptions,true), function($v) { return $v; }))))
         function ReMapArray($arr) {
            $ret = array();
            foreach($arr as $k => $v) {
                if($v) {
                    $ret[] = $k;
                }
            }
            return $ret;
        }

        foreach($coffees as $coffee){
            $coffee->CoffeeOptions = implode(" & ", ReMapArray(json_decode($coffee->CoffeeOptions,true)));
        }

        return $coffees;
    }

    static public function AddCoffeeAndOptions($options){
        $coffee = new coffee();
        $coffee->CoffeeOptions = $options;
        $coffee->name_of_coffee = request('coffee_name');
        $coffee->save();
    }
    use HasFactory;
}
