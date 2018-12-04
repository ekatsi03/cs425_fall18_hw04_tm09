<?php 

  class General {

    // DB stuff

    private $conn;

    private $table = 'general';



    // Post Properties

    public $name;

    public $address;

    public $operator;

    public $commission_date;

    public $description;

    //public $pvID;



    // Constructor with DB

    public function __construct($db) {

      $this->conn = $db;

    }


    // Create Post

    public function create() {

          // Create query
          $query = 'INSERT INTO ' . $this->table . ' SET name = :name, address = :address, operator = :operator, commission_date = :commission date, description = :description';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->name = htmlspecialchars(strip_tags($this->name));

          $this->address = htmlspecialchars(strip_tags($this->address));

          $this->operator = htmlspecialchars(strip_tags($this->operator));

          $this->commission_date = htmlspecialchars(strip_tags($this->commission_date));

          $this->description = htmlspecialchars(strip_tags($this->description));

         // $this->pvID = $row['pvID'];



          // Bind data

          $stmt->bindParam(':name', $this->name);

         // $stmt->bindParam(':photo', $this->photo);

          $stmt->bindParam(':address', $this->address);

          $stmt->bindParam(':operator', $this->operator);

          $stmt->bindParam(':commission_date', $this->commission_date);

          $stmt->bindParam(':description', $this->description);

         // $stmt->bindParam(':pvID', $this->pvID);



          // Execute query

          if($stmt->execute()) {

            return true;

      }

      // Print error if something goes wrong

      printf("Error: %s.\n", $stmt->error);

      return false;

    }   

  }