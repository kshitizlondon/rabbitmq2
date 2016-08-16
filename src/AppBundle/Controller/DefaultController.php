<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }

    /**
     * @Route("/send", name="send_message_to_que")
     */
    public function sendMessageAction($message = 'Message sent from APP 2')
    {
        # get producer service
        $producer = $this->get('old_sound_rabbit_mq.hello_rabbitmq_producer');
        # publish message
        $producer->publish($message);

        return new Response($message);
    }
}
