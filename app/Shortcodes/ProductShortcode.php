<?php
/**
 * Created by PhpStorm.
 * User: INTEX
 * Date: 14/05/2018
 * Time: 3:23 PM
 */

namespace App\Shortcodes;


use App\Services\LandingProductService;
use Illuminate\Support\Facades\View;

class ProductShortcode
{
    private $landingProductService;

    public function __construct(LandingProductService $landingProductService)
    {
        $this->landingProductService = $landingProductService;
    }

    public function register($shortcode, $content)
    {
          $id = $shortcode->id;
        $limit = $shortcode->limit;
        $order = $shortcode->order;
        $products = $this->landingProductService->activeProducts($id, $limit, $order);
//        dd($products);
        $view = '';
        if(is_array($products)) {
            foreach ($products as $product) {
                $view .= View::make('front-end.component.landingComponent.products', compact('product'));
            }
        }else{
            $product = $products;
            $view .= View::make('front-end.component.landingComponent.products', compact('product'));
        }
        return $view;
    
    }
}