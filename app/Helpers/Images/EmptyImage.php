<?php

namespace App\Helpers\Images;

class EmptyImage
{

    public static function isNull($product)
    {
        return $product->images->contains("product_id",$product->id);
    }

    public static function getImage($product)
    {
        if(self::isNull($product))      
              return "storage/".$product->images[0]->name;    
        return "imgs/no_image.jpg";
    }

}