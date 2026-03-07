<?php

class ProjectForm {

    public $title;
    public $client;
    public $description;
    public $ticketNumber;
    public $workingTickets;
    public $waitingTickets;
    public $contract;
    public $errors = [];

    

    // Constructeur pour initialiser les propriétés depuis $_POST
    function __construct($data)
    {
        $this->title = trim($data["project-title"] ?? "");
        $this->client = trim($data["project-client"] ?? "");
        $this->description = trim($data["project-description"] ?? "");
        $this->ticketNumber = $data["ticketNumber"] ?? 0;
        $this->workingTickets = $data["workingTickets"] ?? 0;
        $this->waitingTickets = $data["waitingTickets"] ?? 0;
        $this->contract = $data["contract"] ?? "";
    }

    // Validation des données
    public function validate()
    {
        if (empty($this->title)) {
            $this->errors["title"] = "Le titre du projet est obligatoire.";
        }
        if (empty($this->client)) {
            $this->errors["client"] = "Le client du projet est obligatoire.";
        }

        return empty($this->errors);
    }

    // Créer un nouveau projet en base de données
    public function save($pdo)
    {

        if (!$this->validate()) {
            return false;
        }
            
        $sql = "INSERT INTO project (title, client, `description`, ticketNumber, workingTickets, waitingTickets, `contract`) 
                VALUES (:title, :client, :description, :ticketNumber, :workingTickets, :waitingTickets, :contract)";
        
        $stmt = $pdo->prepare($sql);
        
        $stmt->execute([
            ":title"            => $this->title,
            ":client"           => $this->client,
            ":description"      => $this->description,
            ":ticketNumber"     => $this->ticketNumber,
            ":workingTickets"   => $this->workingTickets,
            ":waitingTickets"    => $this->waitingTickets,
            ":contract"         => $this->contract
        ]);
        
        return true;
    }

    // Mettre à jour un projet existant
    public function update($pdo, $id)
    {
        if (!$this->validate()) {
            return false;
        }

        $sql = "UPDATE project 
                SET title = :title,
                    client = :client,
                    `description` = :description,
                    ticketNumber = :ticketNumber, 
                    workingTickets = :workingTickets, 
                    waitingTickets = :waitingTickets, 
                    `contract` = :contract
                WHERE id = :id";
        
        $stmt = $pdo->prepare($sql);
        
        $stmt->execute([
            ":title"            => $this->title,
            ":client"           => $this->client,
            ":description"      => $this->description,
            ":ticketNumber"     => $this->ticketNumber,
            ":workingTickets"   => $this->workingTickets,
            ":waitingTickets"    => $this->waitingTickets,
            ":contract"         => $this->contract,
            ":id"               => $id
        ]);


        //UPDATE TICKETS WITH PROJECT ID

        // ID du projet
        $projectId = $id;
        $newProjectTitle = $this->title;

        $stmt2 = $pdo->prepare("UPDATE ticket SET project = :title WHERE idProject = :id");
        $stmt2->execute([
            ':title' => $newProjectTitle,
            ':id'    => $projectId
        ]);

        return true;
    }

    // Récupérer les erreurs
    public function getErrors()
    {
        return $this->errors;
    }

    // Vérifier si le formulaire est valide
    public function isValid()
    {
        return empty($this->errors);
    }
}

?>