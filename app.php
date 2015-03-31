<?php

function connect() {
    $conn = new PDO(
        'mysql:host=localhost;dbname=tweets',
        'mateusz',
        'biszk0pt'
    );

    $conn->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

    return $conn;
}

# Connect to the DB
$conn = connect();

class Tweet {
    public $body;
    public $pubDate;

    public function __construct($body)
    {
        $this->setBody($body);
        $this->setPubDate(new DateTime);
    }

    public function setBody($body)
    {
        if (strlen($body) > 140) {
            throw new InvalidArgumentException;
        }

        $this->body = $body;
    }

    public function setPubDate(DateTime $date)
    {
        $this->pubdate = $date->format('Y/m/d H:i:s');
    }
}

$sql = "INSERT INTO `tweet` (body) VALUES (:body)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":body", $body);

$form = $_POST;
$body = $form[ 'body' ];

$result = $stmt->execute();

function fetchTweets($conn) {
    $stmt = $conn->query('SELECT * FROM tweet');

    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

$tweets = [];

$tweets = fetchTweets($conn);

foreach($tweets as $tweet) {
    echo "<h2>{$tweet->body}</h2>";
    echo "<p>{$tweet->pubdate}</p>";
}

if($result) {
    echo "Your text has been posted";

    }// end if
else {
    echo '0 results';
    }// end else

?>
