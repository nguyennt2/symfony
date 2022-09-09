<?php 
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Company;
use App\Form\Type\CompanyType;
use Symfony\Component\HttpFoundation\Request;

class IndexController extends AbstractController
{
    public function index(Request $request): Response
    {
        $companyEntity = new Company();

        $form = $this->createForm(CompanyType::class, $companyEntity,[
            'action' => $this->generateUrl('index'),
            'method' => 'POST',
        ]);
        $errors = [];
        if ($form->isSubmitted() && $form->isValid()) {
            
            $form->handleRequest($request);
            $company = $form->getData();

            $this->addFlash(
                'notice',
                'Your creation were saved!'
            );
        } else {
            foreach ($form->getErrors() as $error) {
                $this->addFlash(
                    'error',
                    $error->getMessage()
                );
            }
        }
        
        return $this->render('index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}