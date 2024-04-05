<?php

include_once "../db.php";

class Factuur
{
    private $db;

    private $table = "rekeningen"; // Correcte tabelnaam

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function addFactuur($datum, $klant_id, $product_id, $tafel_id, $tijd, $inclBTW, $btwTotaal)
    {
        $sql = "INSERT INTO $this->table (datum, klant_id, product_id, tafel_id, bedrag) VALUES (:datum, :klant_id, :product_id, :tafel_id, :bedrag)";
        $this->db->execute($sql, ["datum" => $datum, "klant_id" => $klant_id, "product_id" => $product_id, "tafel_id" => $tafel_id, "bedrag" => $btwTotaal]);
    }

    public function getFactuur($id = null)
    {
        $sql = "SELECT * FROM $this->table";
        if ($id != null) {
            $sql .= " WHERE rekening_id = :id"; // Correcte kolomnaam voor ID
        }
        $stmt = $this->db->execute($sql, ["id" => $id]);
        return $stmt->fetchAll();
    }

    public function selectKlanten()
    {
        $sql = "SELECT * FROM klanten";
        $stmt = $this->db->execute($sql);
        return $stmt->fetchAll();
    }

    public function selectProducten()
    {
        $sql = "SELECT * FROM producten";
        $stmt = $this->db->execute($sql);
        return $stmt->fetchAll();
    }

    public function selectTafels()
    {
        $sql = "SELECT * FROM tafels";
        $stmt = $this->db->execute($sql);
        return $stmt->fetchAll();
    }

    public function deleteFactuur($id)
    {
        $sql = "DELETE FROM $this->table WHERE rekening_id = :id";
        $stmt = $this->db->execute($sql, ["id" => $id]);
    }

    // Andere methoden kunnen hier worden toegevoegd als dat nodig is

}

?>
