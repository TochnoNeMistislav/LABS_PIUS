<?php
include 'vendor/autoload.php';
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Validation;

class User
{
    public int $id;
    public string $name;
    public string $email;
    public string $password;
    private $creationTime;

    public function getTime() {
        return $this->creationTime;
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('id', new Assert\NotBlank());
        $metadata->addPropertyConstraint('id', new Assert\Positive());
        $metadata->addPropertyConstraint('name', new Assert\NotBlank());
        $metadata->addPropertyConstraint('name', new Assert\NotNull());
        $metadata->addPropertyConstraint('name', new Assert\Length(array(
            'min'        => 5,
            'max'        => 25,
        )));
        $metadata->addPropertyConstraint('email', new Assert\Email(array(
            'message' => 'The email "{{ value }}" is not a valid email.',
        )));
        $metadata->addPropertyConstraint('password', new Assert\NotBlank());
        $metadata->addPropertyConstraint('password', new Assert\Length(array(
            'min'        => 5,
            'max'        => 25,
        )));
    }

    public function __construct(int $id, string $name, string $email, string $password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->creationTime = strtotime(date('d.m.Y H.i.s'));
    }

    public function __toString()
    {
        return 'Id: ' . $this->id . " Name: " . $this->name . " Email: " . $this->email;
    }
}

$user0 = new User(-1, 'WrongUser', 'WrongUser@mail.ru', 'WrongUser');
$user1 = new User(1, 'Rightuser', 'RightUser@mail.ru', 'Rightuser');

$users = [$user0, $user1];

$validator = Validation::createValidatorBuilder()
    ->addMethodMapping('loadValidatorMetadata')
    ->getValidator();

echo '<br>' . "Task1:" . '<br>' . '<br>';    
foreach($users as $user){
    $violations = $validator->validate($user);
    if (count($violations) > 0) {
        echo $user . '<br>';
        echo "WrongUser" . '<br>' . '<br>';
    }
    else {
        echo $user . '<br>';
        echo "RightUser" . '<br>' . '<br>';
    }
}