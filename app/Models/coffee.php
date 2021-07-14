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
        foreach($coffees as $coffee){
            //decode coffee options, filter for only true values, flip the keys and values and then implode with & delimiter
            $coffee->CoffeeOptions = implode(" & ", array_flip(array_map(function($v) { global $mapIndex; return ++$mapIndex; }, array_filter(json_decode($coffee->CoffeeOptions,true), function($v) { return $v; }))));
        }

        return $coffees;
    }

    static public function AddCoffeeAndOptions($options){
        $coffee = new coffee();
        //Build array of options 
        //ideally this should be dynamic, and take in custom options by taking an array and iterating through the options
        //request function is nice enough to handle basic error checking for us. All we care about in this instance is that they are set.
        // !! for a cheeky 'type cast' to boolean
         $coffee->CoffeeOptions = $options;
         //I should make this a helper function rather than reusing.
        $coffee->name_of_coffee = request('coffee_name');
        $coffee->save();
    }
    use HasFactory;
}
