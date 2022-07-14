<?php
class UtilisateurControleur extends Controleur
{
    /**
     * Méthode invoquée par défaut si aucune action n'est indiquée
     */
    public function index($params)
    {
        //$this->gabarit->affecterActionParDefaut('tout');
        //$this->tout($params);

    }

    public function connexion()
    {
        $courriel = $_POST['uti_courriel'];
        $mdp = $_POST['uti_mdp'];

        $utilisateur = $this->modele->un($courriel);

        $erreur = false;
        if(!$utilisateur || !password_verify($mdp, $utilisateur->uti_mdp)) {
            $erreur = "Combinaison courriel/mot de passe erronée";
        }
        else if($utilisateur->uti_confirmation != '') {
            $erreur = "Compte non confirmé : vérifiez vos courriels";
        }
        else if(!$utilisateur->uti_actif) {
            $erreur = "Compte pas activé : communiquez avec votre administrateur";
        }

        if(!$erreur) {
            // Sauvegarder l'état de connexion

            // Rediriger vers categorie/tout
            Utilitaire::nouvelleRoute('categorie/tout');
        }
        else {
            
        }
    }
}
