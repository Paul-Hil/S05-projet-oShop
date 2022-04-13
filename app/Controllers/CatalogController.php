<?php

namespace oShop\Controllers;

// Gestion de nos pages

use oShop\Models\Product;
use oShop\Models\Category;

use function PHPSTORM_META\type;

class CatalogController extends CoreController
{
    // Page catégorie
    public function category($params)
    {   
        $categoryId = $params['id'];

        $productModel = new Product();
        //$products = $productModel->findAll();
        // dd($products);
        $products = $productModel->findCategory($categoryId);
        $categoryName = $productModel->findCategoryName($categoryId);
        
        $viewVars = [
            'category_id' => $categoryId,
            'products' => $products,
            'category' => $categoryName,
        ];

        if($viewVars['category'] == null) {
            $this->show('noProduct');
        }
        else {
            $this->show('category_products', $viewVars);
        }
    }

    public function type($params)
    {
        $typeId = $params['id'];

        $productModel = new Product();
        $products = $productModel->findType($typeId);
        $typeName = $productModel->findTypeName($typeId);

        $viewVars = [
            'type_id' => $typeId,
            'products' => $products,
            'type' => $typeName,
        ];

        if($viewVars['type'] == null) {
            $this->show('noProduct');
        }
        else {
            $this->show('type_products', $viewVars);
        }

    }

    public function marque($params) 
    {
        $marqueId = $params['id'];

        $productModel = new Product();
        $brandName = $productModel->findBrandName($marqueId);
        $products = $productModel->findBrand($marqueId);
        $categoryName = $productModel->findCategoryName($marqueId);

            $viewVars = [
                'marque_id' => $marqueId,
                'products' => $products,
                'brand' => $brandName,
                'category' => $categoryName,

            ];

            if($viewVars['brand'] == null) {
                $this->show('noProduct');
            }
            else {
                $this->show('marque_products', $viewVars);
            }
        
    }

    public function product($params)
    {
        $produitId = $params['id'];

        $productModel = new Product;
        $description = $productModel->findDescription($produitId);

        $product = $productModel->find($produitId);

        $brandName = $productModel->findBrandNameForProduct($produitId);

        $viewVars = [
            'produit_id' => $produitId,
            'description' => $description,
            'product' => $product,
            'brand'  => $brandName, 
        ];

            $this->show('product', $viewVars);
        
        

    }
}