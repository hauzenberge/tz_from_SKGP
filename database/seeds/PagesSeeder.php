<?php

use Illuminate\Database\Seeder;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i <= rand(10, 100) ; $i++) { 
            App\Pages::create([
                'name' => 'Page №'.$i,
                'created_at' => now(),
                'barcode' => DNS1D::getBarcodeHTML(now(), "C128",1.4,22), 
                'updated_at' => now(),
            ]);
        }
        
    }
}
