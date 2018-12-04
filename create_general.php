<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json; charset=UTF-8');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  include_once 'db.php';
  include_once 'General.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $general = new General($db);

  echo "IRTEEE";
  echo "IRTEEE";
  echo "IRTEEE";
  echo "IRTEEE";

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  if(
    !empty($data->name) &&
    !empty($data->address) &&
    !empty($data->operator) &&
    !empty($data->commission_date)&&
    !empty($data->description)
){

  $general->name = $data->name;
  $general->address = $data->address;
  $general->operator = $data->operator;
  $general->commission_date = $data->commission_date;
  $general->description = $data->description;

  // Create Category
  if($general->create()) {
      // set response code - 201 created
      http_response_code(201);
    echo json_encode(
      array('message' => 'General Record Created')
    );
  } else {

    // set response code - 503 service unavailable
    http_response_code(503);
    echo json_encode(
      array('message' => 'General Record Not Created')
    );
  }

}

else{
    // set response code - 400 bad request
    http_response_code(400);
 
    // tell the user
    echo json_encode(array("message" => "Unable to create general record. Data is incomplete."));
}