<?php
class Person {
    private $name;
    private $email;
    public function __construct( $name, $email ) {
        $this->name = $name;
        $this->email = $email;
    }
    public function setName( $name ) {
        $this->name = $name;
    }
    public function getName() {
        return $this->name;
    }

    public function setEmail( $email ) {
        $this->email = $email;
    }
    public function getEmail() {
        return $this->email;
    }
}

$person = new Person( "Tufik", "tufikhasan05@gmail.com" );
$taskTwoName = $person->getName();
$taskTwoEmail = $person->getEmail();

if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {
    $person->setName( $_POST['name'] );
    $person->setEmail( $_POST['email'] );
    $name = $person->getName();
    $email = $person->getEmail();
} else {
    $name = "";
    $email = "";
}

// $person->setName( "Tufik" );
// $person->setEmail( "tufikhasan05@gmail.com" );