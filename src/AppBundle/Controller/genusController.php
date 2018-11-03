<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Description of geneController
 *
 * @author kantaree
 */
class genusController extends Controller {
    /**
     * Matches /genus exactly
     * 
     * @Route("/genus", name="genus_show")
     */
    
    public function showAction() {
        $number = mt_rand(0, 100);
        return new Response(
            '<html><body>Show Action number:'.$number.'</body></html>'
        );  
    }

    /**
     * Matches /genus/*
     * 
     * @Route("/genus/{$slug}", name="genus_list")
     */
    public function listAction($slug) {
        $number = mt_rand(0, 100);
        return new Response(
            '<html><body>list Action number: '.$slug.'='.$number.'</body></html>'
        );
    }
}
