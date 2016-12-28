<?php
/**
 * Created by PhpStorm.
 * User: JeryBeary
 * Date: 12/26/16
 * Time: 8:07 PM
 */

namespace AppBundle\Manager;

use Doctrine\ORM\EntityManager;
use AppBundle\Entity\Event;

class EventManager
{
    protected $em;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    public function addEvent($event)
    {
        $this->em->persist($event);
        $this->em->flush();
    }
}