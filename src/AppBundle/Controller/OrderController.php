<?php
/**
 * Created by PhpStorm.
 * User: fdevienne
 * Date: 4/18/18
 * Time: 12:32 AM
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class OrderController extends Controller
{
    public function showOrder($orderId)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $order = $entityManager->getRepository('AppBundle:Order')->find($orderId);
        if (empty($order)) {
            throw $this->createNotFoundException('Unable to find specified Order');
        }

        return $this->render('AppBundle:Order:show-order.twig', ['order' => $order]);
    }

    public function showOrderList()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $orderList = $entityManager->getRepository('AppBundle:Order')->findAll();
        if (empty($orderList)) {
            throw $this->createNotFoundException('Unable to find any Order');
        }

        return $this->render('AppBundle:Order:show-order-list.twig', ['orderList' => $orderList]);
    }

    public function showOrderBy($criteria)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $orderList = $entityManager->getRepository('AppBundle:Order')->findBy($criteria);
        if (empty($orderList)) {
            throw $this->createNotFoundException('Unable to find Order with specified criteria');
        }

        return $this->render('AppBundle:Order:show-order-list.twig', ['order' => $orderList]);
    }
}