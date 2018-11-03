<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class productController extends Controller
{
    /**
     * @Route("/product", name="product")
     */
    public function indexAction(Request $request)
    {
        $products = $this->getDoctrine()
                ->getRepository('AppBundle:Product')
                ->findAll();
        $fizz = array();
        
      //  for($i=1; $i<= 50 ;$i ++){
      //      if($i % 2 == 0){
      //          $fizz[] = $i;
      //      }
            
     //   }
        
    //    $fizz[] = '<br>';
        for($i=1; $i<= 100 ;$i ++){
            if($i % 3 == 0 &&  $i % 5 != 0 ){
                $fizz[] = 'Fizz';
            }elseif($i % 5 == 0 &&  $i % 3 != 0 ){
                 $fizz[] = 'Buzz';
            }elseif($i % 3 == 0 &&  $i % 5 == 0 ) {
                 $fizz[] = 'FizzBuzz';
            }else{
                $fizz[] = $i;
            }
            
        }
        
        return $this->render('product/list.html.twig',array(
            'products' => $products, 'fizz' => $fizz, 'f2'=> 'f2'
        ));
    }
    
        /**
     * @Route("/product/add", name="product_add")
     */
    public function addAction(Request $request)
    {
      
        $product = new Product;
        // category detail moredetail timeadd
        $form = $this->createFormBuilder($product)
                ->add('name', TextType::class, array('attr' => array('class' => 'form-control','style' => 'margin-buttom:15px')) )
                ->add('category', ChoiceType::class, array(
                        'choices' => array(
                            'Fashoin' => 'Fashion',
                            'Toy' => 'Toy',
                            'Home' => 'Home',
                        ),
                        'choice_attr' => function($val, $key, $index) {
                            // adds a class like attending_yes, attending_no, etc
                            return ['class' => 'attending_'.strtolower($key)];
                        },
                    ), array('attr' => array('class' => 'form-control','style' => 'margin-buttom:15px')) )
            ->add('detail', TextareaType::class, array('attr' => array('class' => 'form-control','style' => 'margin-buttom:15px')) )
            ->add('moredetail', TextareaType::class, array('attr' => array('class' => 'form-control','style' => 'margin-buttom:15px')) )
            ->add('timeadd', DateTimeType::class, array('data' => new \DateTime("now"),'attr' => array('class' => 'form-control','style' => 'margin-buttom:15px')) )
            ->add('save', SubmitType::class, array('label' => 'Add New Product', 'attr' => array('class' => 'btn btn-primary','style' => 'margin-buttom:15px')) )
             
            ->getForm();

        
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            // Get Data    // category detail moredetail timeadd
            $name = $form['name']->getData();
            $category = $form['category']->getData();
            $detail = $form['detail']->getData();
            $moredetail = $form['moredetail']->getData();
            $timeadd = $form['timeadd']->getData();
            //$timeadd = new\DateTime('now');
            $dateadd = '-';
            
            $product->setName($name);
            $product->setCategory($category);
            $product->setDetail($detail);
            $product->setMoredetail($moredetail);
            $product->setTimeadd($timeadd);
            $product->setDateadd($dateadd);
                    
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();
            
            $this->addFlash('notice', 'Add Completed');
            
            return $this->redirectToRoute('product');
                    
        
        }
            return $this->render('product/add.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    
    /**
     * @Route("/product/detail/{id}", name="product_detail")
     */
    public function detailAction($id,Request $request)
    {
        $number = $id;
        $product = $this->getDoctrine()
                ->getRepository('AppBundle:Product')
                ->find($id);
       
            $product->setName($product->getName());
            $product->setCategory($product->getcategory());
            $product->setDetail($product->getdetail());
            $product->setMoredetail($product->getmoredetail());
            $product->setTimeadd($product->gettimeadd());

          
      
            
        $form = $this->createFormBuilder($product)
            ->add('name', TextType::class, array('attr' => array('class' => 'form-control','style' => 'margin-buttom:15px')) )
            ->add('category', ChoiceType::class, array(
                        'choices' => array(
                        'Fashoin' => 'fashion',
                        'Toy' => 'toy',
                        'Home' => 'home',
                    ),
                    'choice_attr' => function($val, $key, $index) {
                        // adds a class like attending_yes, attending_no, etc
                        return ['class' => 'attending_'.strtolower($key)];
                    },
                ), array('attr' => array('class' => 'form-control','style' => 'margin-buttom:15px')) )
            ->add('detail', TextareaType::class, array('attr' => array('class' => 'form-control','style' => 'margin-buttom:15px')) )
            ->add('moredetail', TextareaType::class, array('attr' => array('class' => 'form-control','style' => 'margin-buttom:15px')) )
            ->add('timeadd', DateTimeType::class, array('attr' => array('class' => 'form-control','style' => 'margin-buttom:15px')) )
            ->add('save', SubmitType::class, array('label' => 'Save Product', 'attr' => array('class' => 'btn btn-primary','style' => 'margin-buttom:15px')) ) 
            ->getForm();
    
        

        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            // Get Data    // category detail moredetail timeadd
            $name = $form['name']->getData();
            $category = $form['category']->getData();
            $detail = $form['detail']->getData();
            $moredetail = $form['moredetail']->getData();
            $timeadd = new\DateTime('now');
            $dateadd = '-';
            
            $em = $this->getDoctrine()->getManager();
            $product = $em->getRepository('AppBundle:Product')->find($id);
            
            $product->setName($name);
            $product->setCategory($category);
            $product->setDetail($detail);
            $product->setMoredetail($moredetail);
            $product->setTimeadd($timeadd);
            $product->setDateadd($dateadd);
      
            $em->flush();
            
            $this->addFlash('notice', 'Save Completed');
            
            return $this->redirectToRoute('product');
                    
        
        }
            
        return $this->render('product/detail.html.twig',array(
            'form' => $form->createView(),
        ));
    }
       /**
     * @Route("/product/delete/{id}", name="product_delete")
     */
    public function deleteAction($id)
    {
       $em = $this->getDoctrine()->getManager();
       $product = $em->getRepository('AppBundle:Product')->find($id);
       
       $em->remove($product);
       $em->flush();
       
       $this->addFlash('notice', 'Product Deleted');
       
       return $this->redirectToRoute('product');
    }
}
