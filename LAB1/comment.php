`<?php
include 'vendor/autoload.php';
include 'user.php';
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Positive;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints\Email;

class Comment {
    public string $msg;
    public User $user;

    public function __construct(User $user, string $msg)
    {
        $this->msg = $msg;
        $this->user = $user;
    }
}

$user1 = new User(1, 'Mstislav', 'Mstislav@mail.ru', 'password1');
$user2 = new User(2, 'Bebrovsky', 'Bebrovsky@mail.ru', 'password2');
$user3 = new User(3, 'Limonov', 'Limonov@mail.ru', 'password3');
$user4 = new User(4, 'Rudnev', 'Rudnev@mail.ru', 'password4');
$user5 = new User(5, 'Tyulnikov', 'Tylnikov@mail.ru', 'password5');
$user6 = new User(6, 'Alesha', 'Alesha@mail.ru', 'password6');

$userArray = [$user1, $user2, $user3, $user4, $user5, $user6];

$comArray = [];

for ($i = 0; $i < count($userArray); $i++) {
    array_push($comArray, new Comment($userArray[$i],"$i.msg.$i"));
};

?>

<?php
if ($_POST) {
    $time = strtotime($_POST["commentTime"]);
    $time = date('d.m.Y H.i.s', $time);
    echo '<br>' . "Task2:" . '<br>' . '<br>';  
    foreach ($comArray as $com) {
        if (date('d.m.Y H.i.s', $com->user->getTime()) > $time) {
            echo '<br>' . $com->user . ': message>>     ' . $com->msg . '<br>';
        }
    }
}
?>
<form action="" method="post">
    commentDate:    <input type="datetime-local" name="commentTime" /><br/>
    <input type="submit"/><br/>
</form>