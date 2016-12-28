<?php
/**
 * Created by PhpStorm.
 * User: JeryBeary
 * Date: 12/24/16
 * Time: 2:16 PM
 */

namespace AppBundle\Controller;

use AppBundle\Form\EventType;
use AppBundle\Entity\Event;
use AppBundle\Manager\EventManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ScheduleController extends Controller
{
    public function scheduleAction(Request $request)
    {
        $event = new Event();
        $form = $this->createForm(EventType::class, $event);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid() && $request->isMethod("POST"))
        {
            $
        }
        return $this->render('default/schedule.html.twig', array('form' => $form->createView()));
    }
}