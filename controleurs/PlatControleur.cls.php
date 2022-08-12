<?php
class PlatControleur extends Controleur
{
    public function __construct($modele, $module, $action)
    {
        parent::__construct($modele, $module, $action);
        if(!isset($_SESSION['utilisateur'])) {
            Utilitaire::nouvelleRoute('utilisateur/index');
        }
    }

    /**
     * Méthode invoquée par défaut si aucune action n'est indiquée
     */
    public function index()
    {
        $this->gabarit->affecterActionParDefaut('tout');
        $this->tout();

    }

    public function tout()
    {
        $this->gabarit->affecter('plats', $this->modele->tout());
        // Nous avons aussi besoin des catégories...
        $this->gabarit->affecter('categories', $this->modele->toutesCategories());
    }

    public function ajouter() {
        // Ajouter le nouveau plat (dont les valeurs sont reçues par POST) dans la BD
        $this->modele->ajouter($_POST);
        // Rediriger vers l'affichage des plats
        Utilitaire::nouvelleRoute('plat/tout');
    }

    public function retirer() {
        $this->modele->retirer($_POST['pla_id']);
        Utilitaire::nouvelleRoute('plat/tout');
    }

    public function changer() {
        $this->modele->changer($_POST);
        Utilitaire::nouvelleRoute('plat/tout');
    }
}
