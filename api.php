<?php
//  http://localhost:8888/api.php?endpoint=products
// http://localhost:8888/api.php?endpoint=products&id=3



include "init.php";

$api_key = 1234567891;

$database = new Database();

$products = $database->fetchAll("SELECT * FROM products;");
// dd($products);


// die(Input::get("api_key", "get"));
// echo json_encode($products);



if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if (!Input::has("api_key", "get")) {
        $data = ["error" => "Api key not provided."];
        echo json_encode($data);
        exit();
    }

    if (Input::get("api_key", "get") != $api_key) {
        $data = ["error" => "API key invalid"];
        echo json_encode($data);
        exit();
    }


    if (((Input::has("endpoint", "get")) && Input::get("endpoint", "get") == "products")) {

        // GET SPECIFIC PRODUCT BY Price - ENDPOINT #3
        // TYPE CASTING
        if (Input::has("price", "get")) {
            $productPrice =  (float) Input::get("price", "get");

            // var_dump($productPrice); //float(300) string(3) "300"
            // die();
            $filteredProducts = [];
            foreach ($products as $product) {
                if ($product["product_price"] >= $productPrice) {
                    // var_dump($productPrice >= $product["price"]);
                    // die();
                    $filteredProducts[] = $product;


                    // echo json_encode($product);

                    // exit();
                }
            }
            echo json_encode($filteredProducts);
            exit();
        }

        // GET SPECIFIC PRODUCT BY ID - ENDPOINT #2
        if (Input::has("id", "get")) {
            $productId = Input::get("id", "get");
            // echo json_encode($products = ["totla_sales" => 200]);
            foreach ($products as $product) {
                // dd($product);

                if ($productId == $product["id"]) {
                    echo json_encode($product);
                    // break; (loop only)
                    exit();
                }
            }
        }



        // GET ALL PRODUCTS - ENDPOINT #1
        echo json_encode($products);
    } else {
        $data = ["error" => "No Endpoint Found!"];
        echo json_encode($data);
    }
} else {
    $data = ["error" => "Method not allowed"];
    echo json_encode($data);
}
