<?php

class TicketForm {

    public $title;
    public $client;
    public $description;
    public $project;
    public $collaborators;
    public $users;
    public $statut;
    public $facturable;
    public $date;
    public $idProject;
    public $errors = [];

    // Constructeur pour initialiser les propriétés depuis $_POST
    function __construct($data)
    {
        $this->title = trim($data["ticket-title"] ?? "");
        $this->client = trim($data["ticket-client"] ?? "");
        $this->description = trim($data["description"] ?? "");
        $this->project = $data["project"] ?? "No Project";
        $this->collaborators = trim($data["collaborators"] ?? "");
        $this->date = $data["date"] ?? "";
        $this->facturable = isset($data["facturable"]) ? 1 : 0;
        $this->idProject = $data["idProject"] ?? null;
    }

    // Validation des données
    public function validate()
    {
        if (empty($this->title)) {
            $this->errors["title"] = "Le titre est obligatoire.";
        }

        if (empty($this->client)) {
            $this->errors["client"] = "Le client est obligatoire.";
        }

        if (empty($this->date)) {
            $this->errors["date"] = "La date est obligatoire.";
        }

        return empty($this->errors);
    }

    // Créer un nouveau ticket en base de données
    public function save($pdo)
    {
        
        if (!$this->validate()) {
            return false;
        }

        

        if($this->idProject){
            $stmt = $pdo->prepare("SELECT title FROM project WHERE id = :id");
            $stmt->execute([':id' => $this->idProject]);
            $projectData = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($projectData) {
            $this->project = $projectData['title'];
            } else {
                $this->project = "No project";
            }
        }        


        try {
            $sql = "INSERT INTO ticket (title, client, project, `description`, collaborators, users, statut, `date`, facturable, idProject) 
                VALUES (:title, :client, :project, :description, :collaborators, :users, :statut, :date, :facturable, :idProject)";
            
            $stmt = $pdo->prepare($sql);
            
            $stmt->execute([
                ":title"          => $this->title,
                ":client"         => $this->client,
                ":project"        => $this->project,
                ":description"    => $this->description,
                ":collaborators"  => $this->collaborators,
                ":users"          => 0,
                ":statut"         => 0,
                ":date"           => $this->date,
                ":facturable"     => $this->facturable,
                ":idProject"      => $this->idProject
            ]);
            
            return true;
            
        } catch (PDOException $e) {
            $this->errors["database"] = "Erreur lors de l'enregistrement : " . $e->getMessage();
            return false;
        }
    }

    // Mettre à jour un ticket existant
    public function update($pdo, $id)
    {
        if (!$this->validate()) {
            return false;
        }

        try {
            $sql = "UPDATE ticket 
                SET title = :title, 
                    client = :client, 
                    project = :project, 
                    `description` = :description, 
                    collaborators = :collaborators, 
                    users = :users, 
                    statut = :statut, 
                    `date` = :date, 
                    facturable = :facturable,
                    idProject = :idProject
                WHERE id = :id";
            
            $stmt = $pdo->prepare($sql);
            
            $stmt->execute([
                ":title"          => $this->title,
                ":client"         => $this->client,
                ":project"        => $this->project,
                ":description"    => $this->description,
                ":collaborators"  => $this->collaborators,
                ":users"          => $this->users,
                ":statut"         => $this->statut,
                ":date"           => $this->date,
                ":facturable"     => $this->facturable,
                ":idProject"      => $this->idProject,
                ":id"             => $id
            ]);

            if ($stmt->rowCount() === 0) {
                $this->errors["database"] = "Aucun ticket trouvé avec cet ID ou aucune modification effectuée.";
                return false;
            }

            return true;
            
        } catch (PDOException $e) {
            $this->errors["database"] = "Erreur lors de la mise à jour : " . $e->getMessage();
            return false;
        }
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