<?php

class utilisateur
{
    var $id;
    var $nom;
    var $prenom;
    var $mail;
    var $civilite;
    var $datenaissance;
    var $login;
    var $password;

    /**
     * utilisateur constructor.
     * @param $nom
     * @param $prenom
     * @param $mail
     * @param $civilite
     * @param $datenaissance
     * @param $login
     * @param $password
     */
    public function __construct($nom, $prenom, $mail, $civilite, $datenaissance, $login, $password)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->mail = $mail;
        $this->civilite = $civilite;
        $this->datenaissance = $datenaissance;
        $this->login = $login;
        $this->password = $password;
    }

    function addUtilisateur($nom, $prenom, $mail, $civilite, $datenaissance, $login, $password ){
        $bdd = connexion_db::getInstance();
        $bdd->exec("INSERT INTO utilisateur (nom_usr,prenom_usr,mail_usr,civilite_usr,date_naiss_usr,login,password) VALUES ('".$nom."','".$prenom."','".$mail."','".$civilite."','".$datenaissance."','".$login."','".$password."')");
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * @return mixed
     */
    public function getCivilite()
    {
        return $this->civilite;
    }

    /**
     * @param mixed $civilite
     */
    public function setCivilite($civilite)
    {
        $this->civilite = $civilite;
    }

    /**
     * @return mixed
     */
    public function getDatenaissance()
    {
        return $this->datenaissance;
    }

    /**
     * @param mixed $datenaissance
     */
    public function setDatenaissance($datenaissance)
    {
        $this->datenaissance = $datenaissance;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    function getUtilisateurById($id){
        $bdd = connexion_db::getInstance();
        $req = $bdd->query("SELECT * FROM utilisateur WHERE id_usr = '.$id.'");
        $user = $req->fetch();
        $utilisateur = new utilisateur($user['nom_usr'],$user['prenom_usr'],$user['mail_usr'],$user['civilite_usr'],$user['date_usr'],$user['login'],$user['password']);
        return $utilisateur;
    }

}