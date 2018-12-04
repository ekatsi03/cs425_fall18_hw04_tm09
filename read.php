<?php 

  // Headers

  header('Access-Control-Allow-Origin: *');

  header('Content-Type: application/json');



  include_once 'db.php';

  include_once 'General.php';



  // Instantiate DB & connect

  $database = new Database();

  $db = $database->connect();



  // Instantiate blog post object

  $general = new General($db);



  // Blog post query

  $result = $general->read();

  // Get row count

  $num = $result->rowCount();



  // Check if any posts

  if($num > 0) {

    // Post array

    $general_arr = array();

    // $general_arr['data'] = array();



    while($row = $result->fetch(PDO::FETCH_ASSOC)) {

      extract($row);



      $general_item = array(

        'pvID' => $pvID,

        'name' => $name,

        'address' => $address,

        'operator' => $operator,

        'commission date' => $commission_date,

        'description' => $description

      );



      // Push to "data"

      array_push($general_arr, $general_item);

      // array_push($posts_arr['data'], $post_item);

    }



    // Turn to JSON & output

    echo json_encode($general_arr);



  } else {

    // No Posts

    echo json_encode(

      array('message' => 'No Posts Found')

    );

  }