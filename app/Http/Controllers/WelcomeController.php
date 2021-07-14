<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\coffee;
class WelcomeController extends Controller
{
    public function store(){
        coffee::AddCoffeeAndOptions(json_encode(array("milk" => !!request("milk"),"sugar" => !!request("sugar"),"sweetener" => !!request("sweetener"),"irish" => !!request("irish"))));
        //return new list
        $coffees = coffee::GetCoffeesAndOptionsAsStrings();
        return view('welcome',compact ('coffees'));
    }

    public function show(){
        $coffees = coffee::GetCoffeesAndOptionsAsStrings();
        return view('welcome', compact ('coffees'));
    }
}
