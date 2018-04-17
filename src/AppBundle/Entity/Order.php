<?php

namespace AppBundle\Entity;

/**
 * @ORM\Entity
 * @ORM\Table(name="orders")
 */
class Order
{
    /**
     * @ORM\Order_id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $order_id;

    /**
     * @ORM\Order_mrid
     * @ORM\Column(type="integer")
     */
    private $order_mrid;

    //...

    private $billing_address;

    public function __construct($order)
    {
        $this->order_id = $order->order_id;
        $this->order_id = $order->order_mrid;
        // ...
    }

    public function addBillingAddress(BillingAddress $billingAddress)
    {
        $this->billing_address = $billingAddress;
    }

    public function getBillingAddress()
    {
        return $this->billing_address;
    }
}