<?php

namespace App\Controllers;

use App\Controllers\CoreController;
use App\Models\ProductModel;

class ProductController extends CoreController
{

    public function produits()
    {
        $productModel = new ProductModel();
        $products = $productModel->getAll();

        $this->render('products/catalogue', [
            'products' => $products,
        ]);
    }

    public function POSTProduct()
    {
        $this->isSeller();

        $titre = htmlspecialchars($_POST['titre']);
        $description = htmlspecialchars($_POST['description']);
        $prix = htmlspecialchars($_POST['prix']);
        $image = htmlspecialchars($_POST['image']);
        $rating = htmlspecialchars($_POST['rating']);
        $categorie_id = htmlspecialchars($_POST['categorie_id']);

        $productModel = new ProductModel($titre, $description, $prix, $image, $rating, $categorie_id);
        $productModel->add();

        $this->redirect('products/add', 'produits bien ajouté');
    }

    public function produit($matches)
    {
        $productModel = new ProductModel($matches['id']);
        $product = $productModel->getOne();

        $this->render('products/produit', [
            'product' => $product,
        ]);
    }

}