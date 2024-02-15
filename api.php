<?php
include "init.php";

$products = "hello";

echo ($products);
die();


if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if (!Input::has("api_key")) {

        $data = ["error" => "Api key not provided."];
        echo json_encode($data);
        exit();
    }

    if (Input::get("api_key") != $api_key) {
        $data = ["error" => "API key invalid"];
        echo json_encode($data);
        exit();
    }


    if (((Input::has("endpoint")) && Input::get("endpoint") == "products")) {

        // GET SPECIFIC PRODUCT BY Price - ENDPOINT #3
        // TYPE CASTING
        if (Input::has("price")) {
            $productPrice =  (float) Input::get("price");

            // var_dump($productPrice); //float(300) string(3) "300"
            // die();
            $filteredProducts = [];
            foreach ($products as $product) {
                if ($product["price"] >= $productPrice) {
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
        if (Input::has("id")) {
            $productId = Input::get("id");
            // echo json_encode($products = ["totla_sales" => 200]);
            foreach ($products as $product) {

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
