<?php 

class Client 
{
    private SoapClient $instance;

    public function __construct()
    {
        $this->instance = new SoapClient(null, [
            "location" => "http://localhost/project/soap-simple-client-server/server.php",
            "uri"      => "urn://localhost/project/soap-simple-client-server/server.php",
            "trace"    => 1
        ]);
    }

    function getName(int $id)
    {
        return $this->instance->__soapCall("getStudentName", [$id]);
    }
}