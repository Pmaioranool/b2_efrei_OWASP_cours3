<?php

// On va imaginer qu'il y a un dossier App puis un dossier controller dedans et on va ranger cette classe (CatalogController) dedans
namespace App\Controllers; // Maintenant jai rangé CatalogController dans le dossier imaginaire App\Controllers

use App\Models\CategoriesModel;

class CoreController
{
    public function notFound()
    {
        require_once __DIR__ . '/../../templates/404.php';

    }


    public function render($view, $data = [])
    {

        $categoriesModel = new CategoriesModel();
        $headerData = $categoriesModel->GetAllCategories();
        extract($headerData);

        extract($data);


        $viewFile = __DIR__ . '/../../templates/' . $view . '.php';
        if (file_exists($viewFile)) {
            require_once __DIR__ . '/../../templates/partials/header.php';
            require_once $viewFile;
            require_once __DIR__ . '/../../templates/partials/footer.php';
        } else {
            echo "View not found: $view";
        }
    }


    public function isConnected()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /log');
            exit();
        }
    }

    public function isAdmin()
    {
        $this->isConnected();
        if (!($_SESSION['user']['titre_role'] == 'admin')) {
            header('Location: /');
            exit();
        }
    }

}