<?php

class InscriptionForm {

    public $type;
    public $email;
    public $password;
    public $verifpassword;

    function __construct($connexion)
    {
        $this->type = $type["type"];
        $this->email = $email["email"];
        $this->password = $password;["password"];
        $this->verifpassword = $verifpassword;["verifpassword"];
        
    }


    public function set_new_row()
    {
        return [
            $this->type = $type["type"];
            $this->email = $email["email"];
            $this->password = $password;["password"];
            $this->verifpassword = $verifpassword;["verifpassword"];
        ];
    }

}


?>