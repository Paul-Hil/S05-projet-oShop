<?php 

namespace oShop\Models;

use PDO;
use oShop\Utils\Database;

class Type extends CoreModel
{
    private $name;
    private $footer_order;

    public function findAllForFooter()
    {
         // Seule la requête change par rapport à findAll()
         $sql = 'SELECT *
         FROM `type`
         WHERE `footer_order` != 0
         ORDER BY `footer_order` ASC
         LIMIT 5';

         // On récupère la connexion à PDO
        $pdo = Database::getPDO();

        // On exécute la requête
        $pdoStatement = $pdo->query($sql);

        // On récupère un objet de type Type
        $types = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'oShop\Models\Type');

        // On le renvoie
        return $types;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of footer_order
     */
    public function getFooter_order()
    {
        return $this->footer_order;
    }

    /**
     * Set the value of footer_order
     *
     * @return  self
     */
    public function setFooter_order($footer_order)
    {
        $this->footer_order = $footer_order;

        return $this;
    }
}