<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
    	$categories = [
    		[    			
    			'name' => 'Mobiles',
    			'slug' => 'mobiles',
    		],
    		[    			
    			'name' => 'Audio',
    			'slug' => 'audio',
    		],
    		[    			
    			'name' => 'Computer',
    			'slug' => 'computer',
    		],
    		[    			
    			'name' => 'Household',
    			'slug' => 'household',
    		],
    		[    			
    			'name' => 'Kitchen',
    			'slug' => 'kitchen',
    		],
    		
    	];

    	foreach ($categories as $category) {
    		$data = Category::where('name', $category['name'])->first();
    		if(!$data){
    			Category::create($category);
    		}
    	}
    }
}
