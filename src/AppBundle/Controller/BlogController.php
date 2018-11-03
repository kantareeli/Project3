<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
/**
 * Description of BlogController
 *
 * @author kantaree
 */
class BlogController extends Controller{
    /**
     * @Route("/blog/{page}", name="blog_list", requirements={"page": "\d+"})
     */
    public function listAction($page) {
            $number = rand(0, 100);
            return $this->render('lucky/number.html.twig',array(
            'number'=> ' Blog list <br> Page Number='.$page.' Random='.$number,
        ));
    }
    
    /**
     * @Route("/blog/{slug}",name="blog_show")
     */
    public function showAction($slug) {
            $number = rand(0, 100);
            return $this->render('lucky/number.html.twig',array(
            'number'=> ' Blog show <br> slug='.$slug.'  Random='.$number,
        ));
    }
    
    
//     /**
//     * @Route("/blog/show")
//     */
//    public function showAction() {
//            $number = rand(0, 100);
//            return $this->render('lucky/number.html.twig',array(
//            'number'=> ' Blog show '.$number,
//        ));
//    }
    
    
//     /**
//     * @Route("/blog/aaa")
//     */
//    public function aaaAction() {
//            $number = rand(0, 100);
//            return $this->render('lucky/number.html.twig',array(
//            'number'=> ' Blog aaa '.$number,
//        ));
//    }
}
