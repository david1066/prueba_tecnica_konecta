<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;
use Carbon\Carbon;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now=Carbon::now();
        Categoria::insert([
            ["nombre"=>"Congelados", "created_at"=>$now, "updated_at"=>$now],
        ["nombre"=>"Bebidas", "created_at"=>$now, "updated_at"=>$now]]);
        
    }
}
