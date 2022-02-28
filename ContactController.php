<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request,MailerInterface $mailer)
    {

        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $contactFormData = $form->getData();
            $email = (new Email())
            ->from($contactFormData['email'])
            ->to('info@timechip.cz')
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Zpráva z webového formuláře')
            ->text($contactFormData['zprava']);
            $mailer->send($email);
            $this->addFlash('success', 'Váš email byl úspěšně možná odeslán');
            return $this->redirectToRoute('contact');
        }
        
        
        
        
        
        return $this->render('contact/index.html.twig', [
            'email_form' => $form->createView(),
            'title' => "Kontakt"
        ]);
    }
}
