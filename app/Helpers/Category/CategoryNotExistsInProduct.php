<?php

namespace App\Helpers\Category;

use App\Models\Product;

class CategoryNotExistsInProduct 
{
    /**
     * @return Category
     * retorna so as categorias que nao estão adicionadas ainda no produto
     */
    public static function get(Product $product)
    {
        return  \App\Models\Category::where(function($query) use($product) {
                
            foreach ($product->categories as $value) {
                $query->where("name","!=",$value->name);
            }
            
        })->get();
    }

}