<?php
namespace App\Controller;

use Omines\DataTablesBundle\DataTableFactory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="index")
     *
     */
    public function index(Request $request, DataTableFactory $dataTableFactory)
    {
        $table = $dataTableFactory->create();
        $products = $this->getDataFromJson();
        return $this->render('list.html.twig',
            ['datatable' => $table,
                'products' => $products]);
    }
    /**
     * @Route("/json", name="json")
     *
     */
    public function getDataFromJson()
    {
        $json_data = file_get_contents('../assets\data\data.json');
        $product = json_decode($json_data, true);

        return $product;
    }
}
