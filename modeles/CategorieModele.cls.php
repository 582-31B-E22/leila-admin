<?php
class CategorieModele extends AccesBd
{
    /**
     * Cherche tout les enregistrements de la table categorie
     */
    public function tout() {
        return $this->lireTout('SELECT * FROM categorie ORDER BY cat_id ASC');
    }

    public function ajouter() {
        
    }
}