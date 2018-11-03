<?php

// app/config/routing.php
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();
$collection->add('blog_list', new Route('/blog/{page}', array(
    '_controller' => 'AppBundle:Blog:list',
), array(
    'page' => '\d+'
)));

$collection->add('blog_show', new Route('/blog/{slug}', array(
    '_controller' => 'AppBundle:Blog:show',
)));



return $collection;