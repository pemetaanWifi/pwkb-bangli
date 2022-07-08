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
