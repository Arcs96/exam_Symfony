<?php

namespace RuralBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use RuralBundle\Entity\Alojamiento;

class DefaultController extends Controller
{
  /**
   * @Route("/home_rural", name="rural")
   */
  public function indexAction()
  {
      return $this->render('RuralBundle:Default:index.html.twig');
  }

  /**
   * @Route("/comarca", name="comarca")
   */
  public function comarcaAction()
  {
    /* APARTADO 1 */
      $repository = $this->getDoctrine()->getRepository('RuralBundle:Alojamiento');
      $alojamiento = $repository->findByPrecio_aprox(25);

      return $this->render('RuralBundle:Default:comarca.html.twig',array("alojamientos"=>$alojamiento));
  }

  /**
   * @Route("/mostrar/{nom}", name="mostrar_producto")
   */
  public function unicoAction($nom)
  {
      /* APARTADO 2 */
      $repository = $this->getDoctrine()->getRepository('RuralBundle:Alojamiento');
      $alojamiento = $repository->findByNom_alojamiento($nom);

      return $this->render('RuralBundle:Default:comarca.html.twig',array("alojamientos"=>$alojamiento));
  }



}
