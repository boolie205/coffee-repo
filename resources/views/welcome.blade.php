<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->


        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
    <form method="POST" action="/">
    @csrf
    <h1>Coffee Maker</h1>
    <h4>Select Coffee Type</h4>
  <select id="coffee_type" name="coffee_name">
  <option value="latte">latte</option>
  <option value="Cappuccino">Cappuccino</option>
  <option value="Espresso">Espresso</option>
  <option value="Moccha">Moccha</option>
  <option value="Americano">Americano</option>
  </select>
  <br/>
  <input type="checkbox" id="sugar" name="sugar">
  <label for="sugar">Sugar? </label> 
  <input type="checkbox" id="milk" name="milk">
  <label for="milk">Milk? </label> 
  <input type="checkbox" id="sweetener" name="sweetener">
  <label for="sweetener">Sweetener?</label> 
  <input type="checkbox" id="irish" name="irish">
  <label for="irish">irish?</label> 
  <br/>
  <button type="submit">Submit coffee</button>
</form>

<h1>  Previously made coffees  </h1>

@foreach($coffees as $coffee)
    <p> {{{$coffee->name_of_coffee}}} With:  {{{$coffee->CoffeeOptions}}} </p>
@endforeach


    </body>
</html>
