<?php
//     $db_name = "d9tqdhk9t79t49";
//     $username = "hwerdbsemzdxcs";
//     $password = "b4ce4732e95bc55e5064a017e4d235be1f6274cdaa9673eee50c95fd86ced7a9";
//     $servename = "ec2-34-239-241-121.compute-1.amazonaws.com";
//     $conn = pg_connect("host=$servename port=5432 dbname=$db_name user=$username password=$password");

    $db = parse_url(getenv("postgres://yttgpfdezcpmwh:b5a8771ca470e873cf1c62ffbd60638d2645c51d0c0355eaec6214d99b42785d@ec2-34-233-115-14.compute-1.amazonaws.com:5432/dblt24t1fid74q"));

    $pdo = new PDO("pgsql:" . sprintf(
        "host=%s;port=%s;user=%s;password=%s;dbname=%s",
        $db["host"],
        $db["port"],
        $db["user"],
        $db["pass"],
        ltrim($db["path"], "/")
    ));
echo $db;
echo $pdo;
echo "hello";

?>
