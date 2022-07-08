<?php
    $db_name = "d9tqdhk9t79t49";
    $username = "hwerdbsemzdxcs";
    $password = "b4ce4732e95bc55e5064a017e4d235be1f6274cdaa9673eee50c95fd86ced7a9";
    $servename = "ec2-34-239-241-121.compute-1.amazonaws.com";
    $conn = pg_connect("host=$servename port=5432 dbname=$db_name user=$username password=$password");
    $dbopts = parse_url(getenv('HEROKU_POSTGRESQL_BRONZE_URL'));
    echo $dbopts;
    echo "hello";
    $dbopts = parse_url(getenv('HEROKU_POSTGRESQL_BRONZE_URL'));
    $app->register(new Csanquer\Silex\PdoServiceProvider\Provider\PDOServiceProvider('pdo'),
                   array(
                    'pdo.server' => array(
                       'driver'   => 'pgsql',
                       'user' => $dbopts["user"],
                       'password' => $dbopts["pass"],
                       'host' => $dbopts["host"],
                       'port' => $dbopts["port"],
                       'dbname' => ltrim($dbopts["path"],'/')
                       )
                   )
    );

    $db = (function(){
        $parts = (parse_url(getenv('DATABASE_URL') ?: 'postgresql://username:password@localhost:5432/your_database_name_here'));
        extract($parts);
        $path = ltrim($path, "/");
        return new PDO("pgsql:host={$host};port={$port};dbname={$path}", $user, $pass);
    })();
    
    echo $db;

?>
