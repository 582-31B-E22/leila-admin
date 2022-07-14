<?php
class CategorieControleur extends Controleur
{
    /**
     * Méthode invoquée par défaut si aucune action n'est indiquée
     */
    public function index($params)
    {
        $this->gabarit->affecterActionParDefaut('tout');
        $this->tout($params);

    }

    public function tout($params)
    {
        # code...
    }
}
