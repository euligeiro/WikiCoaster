<?php
namespace App\Controller;
use App\Entity\Coaster;
use App\Repository\CoasterRepository;
use App\form\CoasterFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CoasterController extends AbstractController{
   
#[Route (path: '/coaster')]
public function index(CoasterRepository $coasterRepository):Response{

    // Récuperer toutes les entités Coaster 
    $entities= $coasterRepository ->findAll();
    return $this -> render ('coaster/index.html.twig');
}

#[Route( path: '/coaster/add')]

public function add(EntityManagerInterface $em) : Response
{
    $coaster = new Coaster();
   /* $coaster -> setName('Space Mountains');
    $coaster -> setLenght(60);
    $coaster -> setMaxSpeed(75);
    $coaster -> setMaxHeight(68);
    $coaster -> setOperating(true);

    // Prise en compte de l'entité par Doctrine
    $em -> persist($coaster);

    //Mettre a jour la BDD 
    $em-> flush();*/

    $form=$this->createForm(CoasterFormType:: class, data: $coaster);
    return $this->render('/coaster/add.html.twing',['coasterForm=>$form->createView(),']);


}

}