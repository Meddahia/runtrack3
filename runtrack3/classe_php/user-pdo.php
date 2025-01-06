<?php
require_once ('User.php');
class Userpdo
{
    private $id;
    public $login;
    public $email;
    public $firstname;
    public $lastname;
    private $conn; // Pour stocker la connexion à la base de données
    private $isConnected = false; // Pour suivre l'état de connexion

    // Constructeur pour initialiser la connexion à la base de données avec PDO
    public function __construct($host, $username, $password, $dbname) 
    {
        try {
            $this->conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Échec de la connexion : " . $e->getMessage());
        }
    }

    // Méthode pour enregistrer un nouvel utilisateur
    public function register($login, $password, $email, $firstname, $lastname) 
    {
        $stmt = $this->conn->prepare("INSERT INTO utilisateurs (login, password, email, firstname, lastname) VALUES (:login, :password, :email, :firstname, :lastname)");
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT); // Hache le mot de passe
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->execute();
        $this->id = $this->conn->lastInsertId(); // Récupère l'id du nouvel utilisateur
        $this->login = $login;
        $this->email = $email;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        return $this->getAllInfos(); // Retourne les informations de l'utilisateur
    }

    // Méthode pour se connecter
    public function connect($login, $password) 
    {
        $stmt = $this->conn->prepare("SELECT * FROM utilisateurs WHERE login = :login");
        $stmt->bindParam(':login', $login);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) 
        {
            // Met à jour les attributs de l'utilisateur
            $this->id = $user['id'];
            $this->login = $user['login'];
            $this->email = $user['email'];
            $this->firstname = $user['firstname'];
            $this->lastname = $user['lastname'];
            $this->isConnected = true; // Utilisateur connecté
            return true; // Connexion réussie
        }
        return false; // Échec de la connexion
    }

    // Méthode pour se déconnecter
    public function disconnect() 
    {
        $this->isConnected = false; // Met à jour l'état de connexion
    }

    // Méthode pour supprimer un utilisateur
    public function delete() 
    {
        if ($this->isConnected) // Vérifie si l'utilisateur est connecté
        {
            $stmt = $this->conn->prepare("DELETE FROM utilisateurs WHERE id = :id");
            $stmt->bindParam(':id', $this->id);
            $stmt->execute();
            $this->disconnect(); // Déconnecte l'utilisateur
        }
    }

    // Méthode pour mettre à jour les informations de l'utilisateur
    public function update($login, $password, $email, $firstname, $lastname) 
    {
        if ($this->isConnected) // Vérifie si l'utilisateur est connecté
        {
            $stmt = $this->conn->prepare("UPDATE utilisateurs SET login = :login, password = :password, email = :email, firstname = :firstname, lastname = :lastname WHERE id = :id");
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT); // Hache le mot de passe
            $stmt->bindParam(':login', $login);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':firstname', $firstname);
            $stmt->bindParam(':lastname', $lastname);
            $stmt->bindParam(':id', $this->id);
            $stmt->execute();
            // Met à jour les attributs de l'objet
            $this->login = $login;
            $this->email = $email;
            $this->firstname = $firstname;
            $this->lastname = $lastname;
            return $this->getAllInfos();
        }
        return null; // L'utilisateur doit être connecté pour mettre à jour
    }

    // Méthode pour savoir si l'utilisateur est connecté
    public function isConnected() 
    {
        return $this->isConnected; // Retourne l'état de connexion
    }

    // Méthode pour obtenir toutes les informations de l'utilisateur
    public function getAllInfos() 
    {
        return [
            'id' => $this->id,
            'login' => $this->login,
            'email' => $this->email,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname
        ];
    }

    // Destructeur pour fermer la connexion à la base de données
    public function __destruct() 
    {
        $this->conn = null; // Ferme la connexion à la base de données
    }
}
?>
