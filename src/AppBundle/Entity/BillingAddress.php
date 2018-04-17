<?php
/**
 * Created by PhpStorm.
 * User: fdevienne
 * Date: 4/17/18
 * Time: 11:37 PM
 */

namespace AppBundle\Entity;


class BillingAddress
{
    private $billing_lastname;

    private $billing_email;

    private $billing_address;

    private $billing_zipcode;

    private $billing_city;

    private $billing_country;

    private $billing_country_iso;

    private $billing_phone_home;

    private $billing_full_address;

    public function __construct($billingAddress)
    {
        $this->billing_lastname = $billingAddress->billing_lastname;
        $this->billing_email = $billingAddress->billing_email;
        $this->billing_address = $billingAddress->billing_address;
        $this->billing_zipcode = $billingAddress->billing_zipcode;
        $this->billing_city = $billingAddress->billing_city;
        $this->billing_country = $billingAddress->billing_country;
        $this->billing_country_iso = $billingAddress->billing_country_iso;
        $this->billing_phone_home = $billingAddress->billing_phone_home;
        $this->billing_full_address = $billingAddress->billing_full_address;
    }
}