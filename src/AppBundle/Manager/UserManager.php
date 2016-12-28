<?php

/**
 * Created by PhpStorm.
 * User: JeryBeary
 * Date: 12/22/16
 * Time: 7:16 PM
 */

namespace AppBundle\Manager;

use Doctrine\ORM\EntityManager;
use AppBundle\Entity\User;

class UserManager
{
    protected $em;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    public function addUser($user)
    {
        $this->em->persist($user);
        $this->em->flush();
    }
}