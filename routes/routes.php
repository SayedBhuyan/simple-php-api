<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;

// Get all customers
$app->get("/customers", function(Request $request, Response $response) {
	$sql = "SELECT * FROM customers";
	
	try {
		$db = new DB();
		$db = $db->connect();
		$stmt = $db->query($sql);
		$customers = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo json_encode($customers);
	} catch (PDOException $e) {
		echo '{"error": { "text" : '.$e->getMessage().' } }';
	}
	
});


// Get Single Customer
$app->get("/customer/{id}", function(Request $request, Response $response) {
	$id = $request->getAttribute("id");
	$sql = "SELECT * FROM customers WHERE id = $id";
	
	try {
		$db = new DB();
		$db = $db->connect();
		$stmt = $db->query($sql);
		$customer = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo json_encode($customer);
	} catch (PDOException $e) {
		echo '{"error": { "text" : '.$e->getMessage().' } }';
	}
	
});


// Add new customer

$app->post("/customer/add", function(Request $request, Response $response) {
	$name = $request->getParam("name");
	$email = $request->getParam("email");
	$sql = "INSERT INTO customers(name, email) VALUES(:name, :email)";
	
	try {
		$db = new DB();
		$db = $db->connect();
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':name', $name);
		$stmt->bindParam(':email', $email);
		$stmt->execute();
		$db = null;
		echo '{"notice": {"text": "Customer Added!"}}';
	} catch (PDOException $e) {
		echo '{"error": { "text" : '.$e->getMessage().' } }';
	}
	
});


// Update Customer
$app->put("/customer/update/{id}", function(Request $request, Response $response) {
	$id = $request->getAttribute("id");
	$name = $request->getParam("name");
	$email = $request->getParam("email");
	$sql = "UPDATE customers SET 
		name = :name,
		email = :email
		WHERE id = $id
	";
	
	try {
		$db = new DB();
		$db = $db->connect();
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':name', $name);
		$stmt->bindParam(':email', $email);
		$stmt->execute();
		$db = null;
		echo '{"notice": {"text": "Customer Updated!"}}';
	} catch (PDOException $e) {
		echo '{"error": { "text" : '.$e->getMessage().' } }';
	}
	
});