<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// $user = factory(App\User::class, 3)->create();
        // $customer = factory(App\Customer::class, 3)->create();
        //$category = factory(App\Category::class, 2)->create();
        //$product = factory(App\Product::class, 6)->create();
        $productImg = factory(App\ProductImg::class, 6)->create();

    }
}
