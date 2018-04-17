<?php

namespace AppBundle\Command;

use AppBundle\Entity\BillingAddress;
use AppBundle\Entity\Order;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class OrderCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('app:orders')
            ->setDescription('Manages orders');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if (file_exists("test.json")) {
            $json = json_decode(file_get_contents("test.json"));
            $orderList = $json->statistics->orders->order;
            $entityManager = $this->getContainer()->get('doctrine');
            foreach ($orderList as $item) {
                // génère une Order avec toutes les infos 'simples'
                $order = new Order($item);
                // génère une BillingAddress avec les infos de celles-ci contenues dans le JSON
                $billingAddress = new BillingAddress($item->billing_address);
                // ajoute la BillingAddress à l'Order générée plus haut
                $order->addBillingAddress($billingAddress);
                // ... pareil pour chaque entrée présente sous forme de tableau dans le JSON
                // une fois toutes les infos enregistrées on rend Order persistant
                $entityManager->persist($order);
                $entityManager->flush();
            }
        }
    }
}