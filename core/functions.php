<?php
// session_start();
require_once "config.php";

function setMessage($type, $alert)
{
    $_SESSION['alert'] = [
        'type' => $type,
        'alert' => $alert
    ];
}
function showMessage()
{
    if (isset($_SESSION['alert'])) {

        $type = $_SESSION['alert']['type'];
        $alert = $_SESSION['alert']['alert'];

        echo "
        <div class='alert alert-$type alert-dismissible fade show text-center' role='alert'>
            $alert
            <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
        </div>
        ";

        unset($_SESSION['alert']);
    }
}
function emailExists($email)
{
    $usersJson = __DIR__ . "/../data/users.json";

    if (file_exists($usersJson)) {
        $users = json_decode(file_get_contents($usersJson), true);
    } else {
        $users = [];
    }

    foreach ($users as $user) {
        if ($user['email'] === $email) {
            return true;
        }
    }

    return false;
}

function register($name, $email, $address, $phone, $password)
{
    $usersJson = __DIR__ . "/../data/users.json";
    $oldData = json_decode(file_get_contents($usersJson), true);

    $hashPassword = password_hash($password, PASSWORD_DEFAULT);

    $userData = [
        'name' => $name,
        'email' => $email,
        'address' => $address,
        'phone' => $phone,
        'password' => $hashPassword,
        'role' => "user"
    ];

    $oldData[] = $userData;
    file_put_contents($usersJson, json_encode($oldData, JSON_PRETTY_PRINT));

    return true;
}
function addAdmin($name, $email, $address, $phone, $password)
{
    $userJson = __DIR__ . '/../data/users.json';
    $oldData = json_decode(file_get_contents($userJson), true);

    $hashPassword = password_hash($password, PASSWORD_DEFAULT);
    $newAdmin = [
        'name' => $name,
        'email' => $email,
        'address' => $address,
        'phone' => $phone,
        'password' => $hashPassword,
        'role' => "admin"
    ];

    $oldData[] = $newAdmin;

    file_put_contents($userJson, json_encode($oldData, JSON_PRETTY_PRINT));

    return true;
}

function login($email, $password, $role)
{
    $usersJson = __DIR__ . "/../data/users.json";
    $users = json_decode(file_get_contents($usersJson), true);

    foreach ($users as $user) {
        if ($user['email'] == $email && password_verify($password, $user['password']) && $user['role'] == $role) {
            $_SESSION['user'] = [
                'name' => $user['name'],
                'email' => $user['email'],
                'address' => $user['address'],
                'phone' => $user['phone'],
                'role' => $user['role']
            ];
            return true;
        }
    }
    return false;
}

// function loginAdmin($email, $password, $role)
// {

//     $usersJson = __DIR__ . "/../data/users.json";
//     $users = json_decode(file_get_contents($usersJson), true);

//     foreach ($users as $user) {
//         if ($role == "admin" && $user['email'] == $email && password_verify($password, $user['password'])) {
//             $_SESSION['user'] = [
//                 'name' => $user['name'],
//                 'email' => $user['email'],
//                 'address' => $user['address'],
//                 'phone' => $user['phone'],
//                 'role' => $user['role']
//             ];
//             return true;
//         }
//     }
//     return false;
// }


function createProduct($name, $oldPrice, $newPrice, $relativePath, $description)
{
    $productsJson = __DIR__ . "/../data/products.json";
    if (file_exists($productsJson)) {
        $oldData = json_decode(file_get_contents($productsJson), true);
    } else {
        $oldData = [];
    }

    if (empty($oldData)) {
        $newId = 1;
    } else {
        $ids = array_column($oldData, 'id');
        $newId = max($ids) + 1;
    }

    $productData = [
        'id' => $newId,
        'name' => $name,
        'oldPrice' => $oldPrice,
        'newPrice' => $newPrice,
        'imagePath' =>  str_replace("\/", "/", $relativePath),
        'description' => $description
    ];

    $oldData[] = $productData;
    file_put_contents($productsJson, json_encode($oldData, JSON_PRETTY_PRINT));

    return true;
}





function getProducts()
{
    $productsJson = __DIR__ . "/../data/products.json";
    if (file_exists($productsJson)) {
        $products = json_decode(file_get_contents($productsJson), true);
    } else {
        $products = [];
    }

    return $products;
}



function getProductById($id)
{
    $productsJson = __DIR__ . "/../data/products.json";
    if (file_exists($productsJson)) {
        $products = json_decode(file_get_contents($productsJson), true);
    } else {
        $products = [];
    }

    foreach ($products as $product) {
        if ($product['id'] == $id) {
            return $product;
        }
    }

    return $products;
}


function addToCard($id, $name, $quantity, $price)
{

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }


    $found = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id'] == $id) {
            $item['quantity'] += $quantity;
            $found = true;
            // $_SESSION['cartItemQuantity'] = [
            //     'id' => $item['id'],
            //     'quantity' => $item['quantity']
            // ];
            break;
        }
    }

    $newProduct = [
        'id' => $id,
        'pName' => $name,
        'quantity' => $quantity,
        'price' => $price
    ];

    if (!$found) {
        $_SESSION['cart'][] = $newProduct;
    }
    // echo "<pre>";
    // var_dump($_SESSION['cart']);
    // echo "</pre>";
    // exit;
}

function createOrder($name, $email, $address, $phone, $note)
{
    $ordersJson = __DIR__ . "/../data/orders.json";
    $oldData = json_decode(file_get_contents($ordersJson), true) ?? [];

    $total = $_SESSION['totalCart'];
    $items = [];
    $cartProducts = $_SESSION['cart'] ?? [];
    foreach ($cartProducts as $product) {
        $item = [
            'pName' => $product['pName'],
            'quantity' => $product['quantity'],
            'price' => $product['price'],
        ];
        $items[] = $item;
    }

    $orderData = [
        'id' => uniqid(),
        'name' => $name,
        'email' => $email,
        'address' => $address,
        'phone' => $phone,
        'note' => $note,
        'items' => $items,
        'total' => $total
    ];

    $oldData[] = $orderData;
    file_put_contents($ordersJson, json_encode($oldData, JSON_PRETTY_PRINT));

    return true;
}

function resetCart()
{
    // session_unset();
    unset($_SESSION['cart']);
    unset($_SESSION['totalCart']);
}


function getOrderByEmail($email)
{
    $ordersJson = __DIR__ . "/../data/orders.json";
    if (file_exists($ordersJson)) {
        $orders = json_decode(file_get_contents($ordersJson), true);
    } else {
        $orders = [];
    }

    $userOrders = [];
    foreach ($orders as $order) {
        if ($order['email'] === $email) {
            $userOrders[] = $order;
            // return $userOrders;
        }
    }

    return $userOrders;
}
function getAllOrder()
{
    $ordersJson = __DIR__ . "/../data/orders.json";
    if (file_exists($ordersJson)) {
        $orders = json_decode(file_get_contents($ordersJson), true);
    } else {
        $orders = [];
    }
    // var_dump($orders);
    // exit;
    return $orders;
}

function saveContact($name, $email, $message)
{
    $contactInfoJson = __DIR__ . "/../data/contactInfo.json";
    $oldData = json_decode(file_get_contents($contactInfoJson), true) ?? [];

    $contactData = [
        "name" => $name,
        "email" => $email,
        "message" => $message
    ];

    $oldData[] = $contactData;

    file_put_contents($contactInfoJson, json_encode($oldData, JSON_PRETTY_PRINT));

    return true;
}

function getContacts()
{
    $contactInfoJson = __DIR__ . "/../data/contactInfo.json";
    return file_exists($contactInfoJson) ? json_decode(file_get_contents($contactInfoJson), true) : [];
}


function getAllQuantity()
{
    if (isset($_SESSION['cart'])) {
        echo array_sum(array_column($_SESSION['cart'], 'quantity'));
    } else {
        echo 0;
    }
}

function getQuantityById($id)
{
    $count = 0;
    if (isset($_SESSION['cart'])) {

        foreach ($_SESSION['cart'] as $product) {
            if ($product['id'] == $id) {
                $count = $product['quantity'];
            }
        }
    }
    return $count;
}

function activeNavIcon($page)
{
    return ($page == basename($_SERVER['PHP_SELF'])) ? "active text-primary" : "";
}

function adminOnly()
{

    if (!isset($_SESSION['user']) || ($_SESSION['user']['role'] !== 'admin')) {

        setMessage("danger", "Access Denied! You are not authorized to access this page.");

        header("Location: ../../index.php");
        exit;
    }
}
function userOnly()
{

    if (!isset($_SESSION['user']) || ($_SESSION['user']['role'] !== 'user')) {

        setMessage("danger", "Access Denied! You are not authorized to access this page.");

        header("Location: ../../index.php");
        exit;
    }
}


function deleteProduct($id)
{
    $file = "../../data/products.json";
    $oldData = (file_exists($file)) ? json_decode(file_get_contents($file), true) : [];

    foreach ($oldData as $key => $product) {
        if ($product['id'] == $id) {
            unset($oldData[$key]);
        }
    }
    file_put_contents($file, json_encode($oldData, JSON_PRETTY_PRINT));
    return true;
}

function editProduct($id, $name, $oldPrice, $newPrice, $imagePath, $description)
{
    $file = "../../data/products.json";
    $oldData = (file_exists($file)) ? json_decode(file_get_contents($file), true) : [];

    foreach ($oldData as $key => $product) {
        if ($product['id'] == $id) {


            $oldData[$key]['name'] = $name;
            $oldData[$key]['oldPrice'] = $oldPrice;
            $oldData[$key]['newPrice'] = $newPrice;
            $oldData[$key]['imagePath'] = $imagePath;
            $oldData[$key]['description'] = $description;

            break;
        }
    }
    file_put_contents($file, json_encode($oldData, JSON_PRETTY_PRINT));
    return true;
}

function deleteContact($email)
{
    $file = "../../data/contactInfo.json";
    $oldData = (file_exists($file)) ? json_decode(file_get_contents($file), true) : [];

    foreach ($oldData as $key => $contact) {
        if ($contact['email'] == $email) {
            unset($oldData[$key]);
        }
    }
    file_put_contents($file, json_encode($oldData, JSON_PRETTY_PRINT));
    return true;
}

function getUsers($role)
{
    $usersJson = __DIR__ . "/../data/users.json";
    $allUsers = (file_exists($usersJson)) ? json_decode(file_get_contents($usersJson), true) : [];
    $users = [];
    foreach ($allUsers as $user) {
        if ($user['role'] == $role) {
            $users[] = $user;
        }
    }
    
    return $users;
    }

    function deleteUser($email)
    {
        $file = "../../data/users.json";
        $oldData = (file_exists($file)) ? json_decode(file_get_contents($file), true) : [];
    
        foreach ($oldData as $key => $user) {
            if ($user['email'] == $email) {
                unset($oldData[$key]);
            }
        }
        file_put_contents($file, json_encode($oldData, JSON_PRETTY_PRINT));
        return true;
    }