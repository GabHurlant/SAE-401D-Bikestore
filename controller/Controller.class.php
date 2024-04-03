<?php
class Controller
{

    private $action;
    private $user;
    private $mdp;
    private $id;
    private $name;

    public function __construct(array $arguments = array())
    {
        if (!empty($arguments)) {
            foreach ($arguments as $key => $value) {
                $this->{$key} = $value;
            }
        }
    }

    public function __get($nom)
    {
        return $this->$nom;
    }

    public function __set($nom, $valeur)
    {
        $this->$nom = $valeur;
    }

    public function invoke()
    {
        if (isset($this->action)) {
            session_start();
            session_regenerate_id();

            if ($this->action == "") {
                // Display the login form
                $this->displayLoginForm();
            } else {
                $this->action = "home";
            }
            $this->{$this->action}();
        }
    }
}
