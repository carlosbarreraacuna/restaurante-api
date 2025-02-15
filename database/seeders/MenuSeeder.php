<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    public function run()
    {
        DB::table('categorias')->insert([
            ['name' => 'Picadas'],
            ['name' => 'Revolcón'],
            ['name' => 'Asados'],
            ['name' => 'Perros Calientes'],
            ['name' => 'Hamburguesas'],
            ['name' => 'Arepas'],
            ['name' => 'Pizzas'],
            ['name' => 'Adicionales'],
        ]);

        $productos = [
            // Picadas
            ['name' => 'Picada para 2', 'description' => 'Chorizo, carne, pollo, papa criolla y arepa.', 'price' => 35000, 'category_id' => 1],
            ['name' => 'Picada para 3', 'description' => 'Mayor cantidad de chorizo, carne, pollo y acompañamientos.', 'price' => 45000, 'category_id' => 1],
            ['name' => 'Picada para 4', 'description' => 'Porción generosa de chorizo, carne, pollo y más acompañamientos.', 'price' => 56000, 'category_id' => 1],
            ['name' => 'Picada para 5', 'description' => 'Ideal para grupos grandes, con variedad de carnes y guarniciones.', 'price' => 65000, 'category_id' => 1],
            ['name' => 'Picada Premium', 'description' => 'Selección especial de carnes con extras premium.', 'price' => 105000, 'category_id' => 1],

            // Revolcón
            ['name' => 'Revolcón para 2', 'description' => 'Chicharrón, carne, pollo, papas y salsas especiales.', 'price' => 30000, 'category_id' => 2],
            ['name' => 'Revolcón Premium', 'description' => 'Versión mejorada con ingredientes premium y porciones más grandes.', 'price' => 100000, 'category_id' => 2],

            // Asados
            ['name' => 'Pechuga Asada', 'description' => 'Jugosa pechuga a la parrilla con guarniciones.', 'price' => 25000, 'category_id' => 3],
            ['name' => 'Carne Asada', 'description' => 'Filete de carne asada acompañado de papas y ensalada.', 'price' => 25000, 'category_id' => 3],

            // Perros Calientes
            ['name' => 'Perro Súper', 'description' => 'Salchicha premium, queso, papas, salsas y pan suave.', 'price' => 13000, 'category_id' => 4],
            ['name' => 'Perro Ranchero', 'description' => 'Salchicha, tocineta, queso cheddar, salsa ranch y papas.', 'price' => 16000, 'category_id' => 4],
            ['name' => 'Perro Salvaje Premium', 'description' => 'El más completo, con ingredientes premium y tamaño extra grande.', 'price' => 29000, 'category_id' => 4],

            // Hamburguesas
            ['name' => 'Hamburguesa de Carne', 'description' => 'Carne 100% de res, queso cheddar, lechuga, tomate y salsas.', 'price' => 15000, 'category_id' => 5],
            ['name' => 'Hamburguesa Suprema', 'description' => 'Doble carne, doble queso, tocineta y pan especial.', 'price' => 26000, 'category_id' => 5],

            // Arepas
            ['name' => 'Arepa Mexicana', 'description' => 'Pollo, guacamole, pico de gallo y queso derretido.', 'price' => 18000, 'category_id' => 6],
            ['name' => 'Arepa Deli', 'description' => 'Rellena de pollo, champiñones y queso mozzarella.', 'price' => 20000, 'category_id' => 6],

            // Pizzas
            ['name' => 'Pizza Hawaiana (Pequeña)', 'description' => 'Jamón, piña, queso mozzarella y salsa especial.', 'price' => 20000, 'category_id' => 7],
            ['name' => 'Pizza Hawaiana (Mediana)', 'description' => 'Jamón, piña, queso mozzarella y salsa especial.', 'price' => 30000, 'category_id' => 7],
            ['name' => 'Pizza Hawaiana (Grande)', 'description' => 'Jamón, piña, queso mozzarella y salsa especial.', 'price' => 48000, 'category_id' => 7],

            ['name' => 'Pizza Super Suprema (Pequeña)', 'description' => 'Mezcla de carnes, champiñones, pimientos y extra queso.', 'price' => 28000, 'category_id' => 7],
            ['name' => 'Pizza Super Suprema (Mediana)', 'description' => 'Mezcla de carnes, champiñones, pimientos y extra queso.', 'price' => 39000, 'category_id' => 7],
            ['name' => 'Pizza Super Suprema (Grande)', 'description' => 'Mezcla de carnes, champiñones, pimientos y extra queso.', 'price' => 59000, 'category_id' => 7],

            ['name' => 'Pizza Todas las Carnes (Pequeña)', 'description' => 'Pepperoni, jamón, salchicha, tocineta y carne molida.', 'price' => 32000, 'category_id' => 7],
            ['name' => 'Pizza Todas las Carnes (Mediana)', 'description' => 'Pepperoni, jamón, salchicha, tocineta y carne molida.', 'price' => 43000, 'category_id' => 7],
            ['name' => 'Pizza Todas las Carnes (Grande)', 'description' => 'Pepperoni, jamón, salchicha, tocineta y carne molida.', 'price' => 65000, 'category_id' => 7],

            // Adicionales
            ['name' => 'Porción de tocineta', 'description' => 'Extra de tocineta crujiente.', 'price' => 8000, 'category_id' => 8],
            ['name' => 'Porción de champiñones', 'description' => 'Champiñones frescos para tu plato.', 'price' => 8000, 'category_id' => 8],
        ];

        DB::table('productos')->insert($productos);
    }
}
