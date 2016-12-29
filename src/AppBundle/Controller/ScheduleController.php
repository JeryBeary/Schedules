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
    /**
     * scheduleAction
     *
     * loads schedules.html (page for listing events)
     *
     * @param Request $request: request to page
     * @return Request render of the page with the form
     */
    public function scheduleAction(Request $request)
    {
        $event = new Event();
        $form = $this->createForm(EventType::class, $event);

        $form->handleRequest($request);

        //current user
        $user = $this->getUser();
        $user_id = $user->getId();

        $em = $this->getDoctrine()->getManager();
        $manager = new EventManager($em);

        if($form->isSubmitted() && $form->isValid() && $request->isMethod("POST"))
        {
            $event->setUserId($user_id);
            $manager->addEvent($event);

            $this->redirect($this->generateUrl('schedule'));
        }

        //create array of this user's events to be rendered
        $events = $manager->getEventByUserId($user_id);

        return $this->render('default/schedule.html.twig', array('form' => $form->createView(),
            'events' => $events));
    }

    /**
     * deleteAction
     *
     * deletes selected event
     *
     * @param $event_id: id of event to be deleted
     * @return redirect to schedule route
     */
    public function deleteAction($event_id)
    {
        $em = $this->getDoctrine()->getManager();
        $manager = new EventManager($em);

        $manager->deleteEvent($event_id);

        return $this->redirectToRoute('schedule');
    }
}