<?php
// endpoints, 
class Api
{
    private $allowedEndpoints = ["users", "products"];
    private $allowedMethods = ["GET", "POST"];
    private $accessToken;
    private $database;

    // Iniiates
    public function __construct($accessToken)
    {
        $this->accessToken = $accessToken;
        $this->database = new Database();
    }

    public function handleRequest($endpoint, $method, $token)
    {
        // Endpoint Check
        if (!in_array($endpoint, $this->allowedEndpoints)) {
            return $this->response("Invalid Request", 404);
        }

        // Method Check
        if (!in_array($method, $this->allowedMethods)) {
            return $this->response("Invalid Method", 405);
        }

        // Api token check
        if ($this->accessToken != $token) {
            return $this->response("Unauthorised", 401);
        }

        switch ($method) {
            case "POST":
                return "";
                break;
            case "GET":
                return $this->getAll($endpoint);
                break;
        }
    }

    public function getAll($endpoint)
    {
        $response = $this->database->fetchAll("SELECT * FROM $endpoint");
        return json_encode($response);
    }

    public function response($message, $statusCode)
    {
        http_response_code($statusCode);
        return json_encode(["message" => $message]);
    }


    // public function requestMethod($method)
    // {
    // }

    // public function errorMessage($message)
    // {
    //     $data = ["error" => $message];
    // }

    // public function jsonEncode()
    // {
    // }
}
