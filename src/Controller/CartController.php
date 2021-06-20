<?php

namespace App\Controller;

use App\Service\Cart\CartService;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CartController extends AbstractController
{
    /**
     * @Route("/panier", name="cart_index")
     */
    public function index(CartService $cartservice){

        

        return $this->render(
            'cart/index.html.twig', 
            [
                'items' => $cartservice->getFullCart(),
                'total' => $cartservice->getTotal()
            ]
        );
    }

    /**
     * @Route("/panier/add/{id}", name = "cart_add")
     */
    public function add($id, CartService $cartservice){
        $cartservice->add($id);

        return $this->redirectToRoute("cart_index");
    }

    /**
     * @Route ("/panier/remove/{id}", name="cart_remove")
     */
    public function remove($id, CartService $cartservice){
        $cartservice->remove($id);
        
        return $this->redirectToRoute("cart_index");
    }

    /**
     * @Route ("/panier/delete/{id}", name = "cart_delete")
     */
    public function delete($id, CartService $cartservice){
        $cartservice->delete($id);

        return $this->redirectToRoute("cart_index");
    }

}
