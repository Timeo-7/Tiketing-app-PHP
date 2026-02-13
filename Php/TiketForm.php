<?php


class TicketForm {

    public $title;
    public $client;
    public $users;
    public $statut;
    public $facturable;
    public $date;

    function __construct($ticket)
    {
        $this->title = $ticket["titre"];
        $this->genre = $client["client"];
        $this->users = $users["users"];
        $this->statut = $statut["statut"];
        $this->facturable = $facturable["facturable"];
        $this->date = $date["date"];
    }


    public function set_new_row()
    {
        return [
            "title" => $this->title,
            "genre" => $this->genre,
            "users" => $this->users,
            "staut" => $this->statut,
            "facturable" => $this->facturable,
            "date" => $this->date,
        ];
    }

}


?>