<?php

class Server
{
    /**
     * Instancia mysqli
     *
     * @var [type]
     */
    private $connectionMysqli;

    /**
     * Construtor
     */
    function __construct()
    {
        $this->connectionMysqli = (is_null($this->connectionMysqli)) ? self::connect() : $this->connectionMysqli;
    }

    /**
     * Conexão MYSQLI
     *
     * 
     */
    static function connect()
    {
        return mysqli_select_db(
            mysqli_connect("localhost", "root", ""),
            "soap"
        );
    }

    /**
     * Retorna o nome do estudante conforme o ID
     *
     * @param string $id
     * @return string|null
     */
    function getStudentName(int $id):?string
    {
        $query = mysqli_query($this->connectionMysqli, "SELECT `name` FROM students WHERE id = " . $id . " ORDER BY id DESC");
        $response = mysqli_fetch_array($query);
        return $response["name"] ?? "";
    }
}

$obSoapServer = new SoapServer(null, ["url" => "http://localhost/project/soap-simple-client-server/server.php"]);
$obSoapServer->setClass("Server");
$obSoapServer->handle();
