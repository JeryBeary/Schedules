<?php
/**
 * Created by PhpStorm.
 * User: JeryBeary
 * Date: 12/24/16
 * Time: 1:38 AM
 */

namespace AppBundle\Controller;

use AppBundle\Form\RegistrationType;
use AppBundle\Entity\User;
use AppBundle\Manager\UserManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class RegistrationController extends Controller
{
    /**
     * registerAction
     *
     * loads registration page, including form functionality
     *
     * @param Request $request: request to page
     * @return Request render of the page with the form or redirect to login page
     */
    public function registerAction(Request $request)
    {
        //building form
        $user = new User();
        $form = $this->createForm(RegistrationType::class, $user);

        $error_msg = "";

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid() && $request->isMethod("POST"))
        {
            //bcrypt encoding of inputted password for security
            $password = $this->get('security.password_encoder')
                ->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);

            $em = $this->getDoctrine()->getManager();
            $user_manager = new UserManager($em);
            $user_manager->addUser($user);

            return $this->redirect($this->generateUrl('login'));
        }
        else if($form->isSubmitted() && !$form->isValid() && $request->isMethod("POST"))
        {
            $error_msg = "You have either entered an already existing username or your passwords
            do not match";
        }

        return $this->render('default/index.html.twig', array('form' => $form->createView(),
            'error_msg' => $error_msg));
    }
}