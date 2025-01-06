<?php

class User
{
    private $id;
    public $login;
    public $email;
    public $firstname;
    public $lastname;
    private $conn; // Pour stocker la connexion à la base de données
    private $isConnected = false; // Pour suivre l'état de connexion

    // Constructeur pour initialiser la connexion à la base de données
    public function __construct($host, $username, $password, $dbname) 
    {
        $this->conn = new mysqli($host, $username, $password, $dbname);

        // Vérifie la connexion
        if ($this->conn->connect_error) 
        {
            die("Échec de la connexion : " . $this->conn->connect_error);
        }
    }

    // Méthode pour enregistrer un nouvel utilisateur
    public function register($login, $password, $email, $firstname, $lastname) 
    {
        $stmt = $this->conn->prepare("INSERT INTO utilisateurs (login, password, email, firstname, lastname) VALUES (?, ?, ?, ?, ?)");
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT); // Hache le mot de passe
        $stmt->bind_param("sssss", $login, $hashedPassword, $email, $firstname, $lastname);
        $stmt->execute();
        $this->id = $this->conn->insert_id; // Récupère l'id du nouvel utilisateur
        $this->login = $login;
        $this->email = $email;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $stmt->close();
        return $this->getAllInfos(); // Retourne les informations de l'utilisateur
    }

    // Méthode pour se connecter
    public function connect($login, $password) 
    {
        $stmt = $this->conn->prepare("SELECT * FROM utilisateurs WHERE login = ?");
        $stmt->bind_param("s", $login);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) 
        {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) 
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
            $stmt = $this->conn->prepare("DELETE FROM utilisateurs WHERE id = ?");
            $stmt->bind_param("i", $this->id);
            $stmt->execute();
            $stmt->close();
            $this->disconnect(); // Déconnecte l'utilisateur
        }
    }

    // Méthode pour mettre à jour les informations de l'utilisateur
    public function update($login, $password, $email, $firstname, $lastname) 
    {
        if ($this->isConnected) // Vérifie si l'utilisateur est connecté
        {
            $stmt = $this->conn->prepare("UPDATE utilisateurs SET login = ?, password = ?, email = ?, firstname = ?, lastname = ? WHERE id = ?");
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT); // Hache le mot de passe
            $stmt->bind_param("sssssi", $login, $hashedPassword, $email, $firstname, $lastname, $this->id);
            $stmt->execute();
            // Met à jour les attributs de l'objet
            $this->login = $login;
            $this->email = $email;
            $this->firstname = $firstname;
            $this->lastname = $lastname;
            $stmt->close();
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
        $this->conn->close();
    }
}
?>
