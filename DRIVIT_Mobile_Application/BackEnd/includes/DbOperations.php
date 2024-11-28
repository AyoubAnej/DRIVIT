<?php
class DbOperations
{

    private $con;


    function __construct()
    {

        require_once dirname(__FILE__) . '/DbConnect.php';

        $db = new DbConnect();
        $this->con = $db->Connect();
    }

    /*CRUD -> C -> CREATE */

    public function CreateCompte($Nom, $Prenom, $CIN, $Username, $PassWordd, $Mail)
    {
        if ($this->isUserExist($Username, $Mail)) {
            return 0;
        } else {

            //$password = md5($PassWordd);
            $ID_C = uniqid("", true);
            $ID_P = uniqid("", true);

            $stmt1 = $this->con->prepare("INSERT INTO `comptes` (`ID_C`, `Username`, `PassWordd`, `Mail`)    
                VALUES (?, ?, ?, ?);");
            $stmt1->bind_param("isss", $ID_C, $Username, $PassWordd, $Mail);

            $stmt2 = $this->con->prepare("INSERT INTO `personne` (`ID_P`, `Nom`, `Prenom`, `CIN`) 
                VALUES (?, ?, ?, ?);");
            $stmt2->bind_param("isss", $ID_P, $Nom, $Prenom, $CIN);

            $stmt3 = $this->con->prepare("INSERT INTO `utilisateur`(`ID_Personne_user`, `ID_Compte_user`) VALUES (?,?);");
            $stmt3->bind_param("ii", $ID_P, $ID_C);

            if ($stmt1->execute() and $stmt2->execute() and $stmt3->execute()) {
                return 1;
            } else {
                return 2;
            }
        }
    }

    private function isUserExist($Username, $Mail)
    {
        $stmt = $this->con->prepare("SELECT ID_C FROM comptes WHERE Username= ? OR Mail= ?");
        $stmt->bind_param("ss", $Username, $Mail);
        $stmt->execute();
        $stmt->store_result();
        return $stmt->num_rows > 0;
    }

    public function UserLogin($Username, $PassWordd)
    {
        //$password = md5($PassWordd);
        $stmt = $this->con->prepare("SELECT ID_C FROM comptes WHERE Username= ? AND PassWordd= ?");
        $stmt->bind_param("ss", $Username, $PassWordd);
        $stmt->execute();
        $stmt->store_result();
        return $stmt->num_rows > 0;
    }

    public function Recovery($Username, $Mail)
    {
        //$password = md5($PassWordd);
        $stmt = $this->con->prepare("SELECT ID_C FROM comptes WHERE Username= ? AND Mail= ?");
        $stmt->bind_param("ss", $Username, $Mail);
        $stmt->execute();
        $stmt->store_result();
        return $stmt->num_rows > 0;
    }

    public function GetinfoUser($Username)
    {
        $stmt = $this->con->prepare("SELECT ID_C FROM comptes WHERE Username = ?");
        $stmt->bind_param("s", $Username);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($ID_C);
        $stmt->fetch();
        $stmt->close();

        $stmt1 = $this->con->prepare("SELECT personne.Prenom, personne.Nom, personne.CIN, personne.ID_P, comptes.Mail,comptes.Username,comptes.ID_C
        FROM personne, comptes, utilisateur 
        WHERE personne.ID_P = utilisateur.ID_Personne_user 
        AND comptes.ID_C = utilisateur.ID_Compte_user 
        AND utilisateur.ID_Personne_user = ? 
        AND utilisateur.ID_Compte_user = ?");
        $stmt1->bind_param("ii", $ID_C, $ID_C);
        $stmt1->execute();
        $result = $stmt1->get_result()->fetch_assoc();
        $stmt1->close();

        return $result;
    }

    public function Update($Nom, $Prenom, $CIN, $Mail, $ID_C, $ID_P, $Username)
    {
        if ($this->isUserExist($Username, $Mail)) {
            //$password = md5($PassWordd);
            $stmt1 = $this->con->prepare("UPDATE `comptes` SET `Mail`=? WHERE comptes.ID_C= ?");
            $stmt1->bind_param("si", $Mail, $ID_C);

            $stmt2 = $this->con->prepare("UPDATE `personne` SET `Nom`=?,`Prenom`=?,`CIN`=? WHERE personne.ID_P = ?");
            $stmt2->bind_param("sssi", $Nom, $Prenom, $CIN, $ID_P);

            if ($stmt1->execute() and $stmt2->execute()) {
                return 1;
            } else {
                return 2;
            }
        } else {
            return 0;
        }
    }

    public function Update_Recovery($ID_C, $PassWordd, $Username, $Mail)
    {
        if ($this->isUserExist($Username, $Mail)) {
            //$password = md5($PassWordd);
            $stmt1 = $this->con->prepare("UPDATE `comptes` SET `PassWordd`=? WHERE comptes.ID_C= ?");
            $stmt1->bind_param("si", $PassWordd, $ID_C);

            if ($stmt1->execute()) {
                return 1;
            } else {
                return 2;
            }
        } else {
            return 0;
        }
    }
}
