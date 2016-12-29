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

    public function deleteEvent($event_id)
    {
        $event = $this->em->getRepository('AppBundle:Event')
            ->find($event_id);

        if($event) {
            $this->em->remove($event);
            $this->em->flush();
        }
    }

    public function getEventByUserId($user_id)
    {
        $events = $this->em->getRepository('AppBundle:Event')
            ->findBy(array('user_id' => $user_id), array('time' => 'ASC'));

        return $events;
    }
}