<?php

use Illuminate\Database\Seeder;

class TestDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $machine = factory(\App\Machine::class)->create(['name' => 'inHolland', 'city' => 'Alkmaar']);

        $sevenUp   = factory(\App\Ingredient::class)->create(['name' => '7Up', 'liquor_percentage' => 0]);
        $gingerAle = factory(\App\Ingredient::class)->create(['name' => 'Ginger Ale', 'liquor_percentage' => 0]);

        $bacardi     = factory(\App\Ingredient::class)->create(['name' => 'Bacardi', 'liquor_percentage' => 37]);
        $belverdere  = factory(\App\Ingredient::class)->create(['name' => 'Belvedere', 'liquor_percentage' => 40]);
        $wodka       = factory(\App\Ingredient::class)->create(['name' => 'Wodka', 'liquor_percentage' => 37]);
        $blueCuracao = factory(\App\Ingredient::class)->create(['name' => 'Blue Curacao', 'liquor_percentage' => 20]);

        // Create Mojito drink
        $mojito = factory(\App\Drink::class)->create(['name' => 'Mojito', 'image' => 'images/drinks/mojito.jpg']);
        $mojito->ingredients()->sync([
            $bacardi->id   => ['amount' => 25],
            $gingerAle->id => ['amount' => 200]
        ]);

        // Create Belverder 7Up drink
        $belverdere7Up = factory(\App\Drink::class)->create(['name' => 'Belverdere 7Up', 'image' => 'images/drinks/belverdere-7up.jpg']);
        $belverdere7Up->ingredients()->sync([
            $belverdere->id => ['amount' => 25],
            $sevenUp->id    => ['amount' => 200],
        ]);

        // Create Moscow Mule drink
        $moscowMule = factory(\App\Drink::class)->create(['name' => 'Moscow Mule', 'image' => 'images/drinks/moscow-mule.jpg']);
        $moscowMule->ingredients()->sync([
            $wodka->id     => ['amount' => 25],
            $gingerAle->id => ['amount' => 200],
        ]);

        // Create Blue Lagoon
        $blueLagoon = factory(\App\Drink::class)->create(['name' => 'Blue Lagoon', 'image' => 'images/drinks/blue-lagoon.jpg']);
        $blueLagoon->ingredients()->sync([
            $blueCuracao->id => ['amount' => 25],
            $wodka->id       => ['amount' => 25],
            $sevenUp->id     => ['amount' => 200],
        ]);

        // Save stock to machine
        $machine->ingredients()->sync([
            $sevenUp->id     => ['amount' => 1500, 'position' => 0],
            $gingerAle->id   => ['amount' => 1000, 'position' => 0],
            $bacardi->id     => ['amount' => 1000, 'position' => 1],
            $belverdere->id  => ['amount' => 1000, 'position' => 2],
            $wodka->id       => ['amount' => 1000, 'position' => 3],
            $blueCuracao->id => ['amount' => 750, 'position' => 4],
        ]);
    }
}
