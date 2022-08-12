<?php
class CategorieControleur extends Controleur
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
        $this->tout($params);

    }

    public function tout()
    {
        $this->gabarit->affecter('categories', $this->modele->tout());
    }

    public function ajouter() {
        // Ajouter la nouvelle catégorie (dont les valeurs sont reçues par POST) dans la BD
        $this->modele->ajouter($_POST);
        // Rediriger vers l'affichage des catégories
        Utilitaire::nouvelleRoute('categorie/tout');
    }

    public function retirer() {
        $this->modele->retirer($_POST['cat_id']);
        Utilitaire::nouvelleRoute('categorie/tout');
    }

    public function changer() {
        $this->modele->changer($_POST);
        Utilitaire::nouvelleRoute('categorie/tout');
    }
}
