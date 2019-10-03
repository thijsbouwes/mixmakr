<?php

use Illuminate\Database\Seeder;
use App\Ingredient;
use App\Drink;

class TestDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sevenUp   = factory(Ingredient::class)->create(['name' => '7Up']);
        $gingerAle = factory(Ingredient::class)->create(['name' => 'Ginger Ale']);
        $cola      = factory(Ingredient::class)->create(['name' => 'Coca Cola']);
        $fanta     = factory(Ingredient::class)->create(['name' => 'Fanta']);

        $bacardi     = factory(Ingredient::class)->create(['name' => 'Bacardi', 'liquor_percentage' => 37]);
        $belvedere  = factory(Ingredient::class)->create(['name' => 'Belvedere', 'liquor_percentage' => 40]);
        $trojka      = factory(Ingredient::class)->create(['name' => 'Trojka', 'liquor_percentage' => 37]);
        $blueCuracao = factory(Ingredient::class)->create(['name' => 'Blue Curacao', 'liquor_percentage' => 20]);
        $malibu     = factory(Ingredient::class)->create(['name' => 'Malibu', 'liquor_percentage' => 20]);

        // Baco
        $baco = factory(Drink::class)->create(['name' => 'Baco', 'image' => '/images/drinks/baco.jpg']);
        $baco->ingredients()->sync([
            $bacardi->id  => ['amount' => 2],
            $cola->id     => ['amount' => 200],
        ]);

        // Create Mojito drink
        $mojito = factory(Drink::class)->create(['name' => 'Mojito', 'image' => '/images/drinks/mojito.jpg']);
        $mojito->ingredients()->sync([
            $bacardi->id   => ['amount' => 2],
            $gingerAle->id => ['amount' => 200]
        ]);

        // Create Moscow Mule drink
        $moscowMule = factory(Drink::class)->create(['name' => 'Moscow Mule', 'image' => '/images/drinks/moscow-mule.jpg']);
        $moscowMule->ingredients()->sync([
            $belvedere->id => ['amount' => 2],
            $gingerAle->id => ['amount' => 200],
        ]);

        // Create Blue Lagoon
        $blueLagoon = factory(Drink::class)->create(['name' => 'Blue Lagoon', 'image' => '/images/drinks/blue-lagoon.jpg']);
        $blueLagoon->ingredients()->sync([
            $blueCuracao->id => ['amount' => 1],
            $belvedere->id  => ['amount' => 1],
            $sevenUp->id     => ['amount' => 200],
        ]);

        // Create blue shield
        $blueShield = factory(Drink::class)->create(['name' => 'Blue Shield', 'image' => '/images/drinks/blue-shield.jpg']);
        $blueShield->ingredients()->sync([
            $blueCuracao->id => ['amount' => 1],
            $trojka->id  => ['amount' => 1],
            $sevenUp->id     => ['amount' => 200],
        ]);

        // Create Belverder 7Up drink
        $belvedere7Up = factory(Drink::class)->create(['name' => 'Belverdere 7Up', 'image' => '/images/drinks/belverdere-7up.jpg']);
        $belvedere7Up->ingredients()->sync([
            $belvedere->id => ['amount' => 2],
            $sevenUp->id    => ['amount' => 200],
        ]);

        // Malibu Cola
        $malibuCola = factory(Drink::class)->create(['name' => 'Malibu cola', 'image' => '/images/drinks/malibu-cola.jpg']);
        $malibuCola->ingredients()->sync([
            $malibu->id  => ['amount' => 2],
            $cola->id     => ['amount' => 200],
        ]);

        // Malibu 7up
        $malibuSevenUp = factory(Drink::class)->create(['name' => 'Malibu 7up', 'image' => '/images/drinks/malibu-7up.jpg']);
        $malibuSevenUp->ingredients()->sync([
            $malibu->id  => ['amount' => 2],
            $sevenUp->id     => ['amount' => 200],
        ]);

        // Create all liquor shots
        $bacardiShot = factory(Drink::class)->create(['name' => 'Bacardi Shot', 'image' => '/images/drinks/bacardi.png']);
        $bacardiShot->ingredients()->sync([
            $bacardi->id  => ['amount' => 2]
        ]);

        $belvedereShot = factory(Drink::class)->create(['name' => 'Belvedere Shot', 'image' => '/images/drinks/belvedere.jpg']);
        $belvedereShot->ingredients()->sync([
            $belvedere->id  => ['amount' => 2]
        ]);

        $trojkaShot = factory(Drink::class)->create(['name' => 'Trojka Shot', 'image' => '/images/drinks/trojka.png']);
        $trojkaShot->ingredients()->sync([
            $trojka->id  => ['amount' => 2]
        ]);

        $blueCuracaoShot = factory(Drink::class)->create(['name' => 'BlueCuracao Shot', 'image' => '/images/drinks/bluecuracao.jpg']);
        $blueCuracaoShot->ingredients()->sync([
            $blueCuracao->id  => ['amount' => 2]
        ]);

        $malibuShot = factory(Drink::class)->create(['name' => 'Malibu Shot', 'image' => '/images/drinks/malibu.jpg']);
        $malibuShot->ingredients()->sync([
            $malibu->id  => ['amount' => 2]
        ]);
    }
}
