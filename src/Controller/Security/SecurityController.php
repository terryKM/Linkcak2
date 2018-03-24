<?php

namespace App\Controller\Security;
use App\Entity\Auteur;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
class SecurityController extends Controller
{
    /**
     * Connexion d'un utilisateur
     * @Route("/connexion", name="security_connexion")
     * @param Request $request
     * @param AuthenticationUtils $authenticationUtils
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function connexion(Request $request, AuthenticationUtils $authenticationUtils)
    {
        # Récupération du message d'erreur s'il y en a un.
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastEmail = $authenticationUtils->getLastUsername();
        return $this->render('security/connexion.html.twig', array(
            'last_email'    => $lastEmail,
            'error'         => $error,
        ));
    }
    /**
     * Inscription d'un utilisateur
     * @Route("/inscription", name="security_inscription", methods={"GET", "POST"})
     * @param Request $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function inscription(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        # Création d'un nouveau client
        $user = new User();
        $user->setRoles('ROLE_MEMBRE');
        # Créer un Formulaire permettant l'ajout d'un client
        $form = $this->createFormBuilder($user)
            # Champ prenom
            ->add('prenom', TextType::class, [
                'required'      => true,
                'label'         => false,
                'attr'          => [
                    'class'         =>  'form-control',
                    'placeholder'   =>  'Saisissez votre Prénom'
                ]
            ])
            # Champ nom
            ->add('nom', TextType::class, [
                'required'      => true,
                'label'         => false,
                'attr'          => [
                    'class'         =>  'form-control',
                    'placeholder'   =>  'Saisissez votre Nom'
                ]
            ])
            ->add('adresse', TextType::class, [
                'required'      => true,
                'label'         => false,
                'attr'          => [
                    'class'         =>  'form-control',
                    'placeholder'   =>  'Saisissez votre adresse postale'
                ]
            ])
            # Champ email
            ->add('email', EmailType::class, [
                'required'      => true,
                'label'         => false,
                'attr'          => [
                    'class'         =>  'form-control',
                    'placeholder'   =>  'Saisissez votre Email'
                ]
            ])
            # Champ mot de passe
            ->add('password', PasswordType::class, [
                'required'      => true,
                'label'         => false,
                'attr'          => [
                    'class'         =>  'form-control',
                    'placeholder'   =>  '*******'
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'M\'inscrire !',
                'attr'      => [
                    'class' => 'btn btn-primary'
                ]
            ]);


        # Création d'un nouveau livreur
        $user = new User();
        $user->setRoles('ROLE_MEMBRE');
        # Créer un Formulaire permettant l'ajout d'un livreur
        $form = $this->createFormBuilder($user)
            # Champ prenom
            ->add('prenom', TextType::class, [
                'required'      => true,
                'label'         => false,
                'attr'          => [
                    'class'         =>  'form-control',
                    'placeholder'   =>  'Saisissez votre Prénom'
                ]
            ])
            # Champ nom
            ->add('nom', TextType::class, [
                'required'      => true,
                'label'         => false,
                'attr'          => [
                    'class'         =>  'form-control',
                    'placeholder'   =>  'Saisissez votre Nom'
                ]
            ])
            # Champ email
            ->add('email', EmailType::class, [
                'required'      => true,
                'label'         => false,
                'attr'          => [
                    'class'         =>  'form-control',
                    'placeholder'   =>  'Saisissez votre Email'
                ]
            ])
            ->add('type', TextType::class, [
                'required'      => true,
                'label'         => false,
                'attr'          => [
                    'class'         =>  'form-control',
                    'placeholder'   =>  'Saisissez votre véhicule'
                ]
            ])
            # Champ mot de passe
            ->add('password', PasswordType::class, [
                'required'      => true,
                'label'         => false,
                'attr'          => [
                    'class'         =>  'form-control',
                    'placeholder'   =>  '*******'
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'M\'inscrire !',
                'attr'      => [
                    'class' => 'btn btn-primary'
                ]
            ]);

                    # Création d'un nouveau producteur
        $user = new User();
        $user->setRoles('ROLE_MEMBRE');
        # Créer un Formulaire permettant l'ajout d'un producteur
        $form = $this->createFormBuilder($user)
            # Champ prenom
            ->add('prenom', TextType::class, [
                'required'      => true,
                'label'         => false,
                'attr'          => [
                    'class'         =>  'form-control',
                    'placeholder'   =>  'Saisissez votre Prénom'
                ]
            ])
            # Champ nom
            ->add('nom', TextType::class, [
                'required'      => true,
                'label'         => false,
                'attr'          => [
                    'class'         =>  'form-control',
                    'placeholder'   =>  'Saisissez votre Nom'
                ]
            ])
            # Champ email
            ->add('email', EmailType::class, [
                'required'      => true,
                'label'         => false,
                'attr'          => [
                    'class'         =>  'form-control',
                    'placeholder'   =>  'Saisissez votre Email'
                ]
            ])
            ->add('siret', TextType::class, [
                'required'      => true,
                'label'         => false,
                'attr'          => [
                    'class'         =>  'form-control',
                    'placeholder'   =>  'Saisissez votre numéro de siret'
                ]
            ])
            # Champ mot de passe
            ->add('password', PasswordType::class, [
                'required'      => true,
                'label'         => false,
                'attr'          => [
                    'class'         =>  'form-control',
                    'placeholder'   =>  '*******'
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'M\'inscrire !',
                'attr'      => [
                    'class' => 'btn btn-primary'
                ]
            ])
            /**
             * Maintenant que tous les champs ont été créés, nous allons
             * pouvoir récupérer le formulaire
             */
            ->getForm();
        # Traitement des données POST
        $form->handleRequest($request);
        # Vérification des données du Formulaire
        if ($form->isSubmitted() && $form->isValid()) :
            # Gestion du mot de passe
            $password = $passwordEncoder->encodePassword($user, $user->getPassword());
            $user->setPassword($password);
            # Insertion en BDD
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            # Redirection sur la page connexion
            return $this->redirect('connexion?inscription=success');
        endif;
        # Affichage du Formulaire dans la Vue
        return $this->render('security/inscription.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
