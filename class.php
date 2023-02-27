<?php
class Person {
    private $name;
    private $email;
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

$person = new Person();
//Task 2 output
$person->setName( "Tufik" );
$person->setEmail( "tufikhasan05@gmail.com" );
$taskTwoName = $person->getName();
$taskTwoEmail = $person->getEmail();

//task 3 output
if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {
    $person->setName( $_POST['name'] );
    $person->setEmail( $_POST['email'] );
    $name = $person->getName();
    $email = $person->getEmail();
} else {
    $name = "";
    $email = "";
}