<?php
include "../config.php";
   

    try {
      /* Establish the database connection */
      $db=config::getconnexion();

      /* select all the weekly tasks from the table googlechart */
      $result = $db->query('SELECT nom,stock FROM produit');

     


      $rows = array();
      $table = array();
      $table['cols'] = array(

       
        array('label' => 'nom', 'type' => 'string'),
        array('label' => 'quantite', 'type' => 'number')

    );
        /* Extract the information from $result */
        foreach($result as $r) {

          $temp = array();

          // the following line will be used to slice the Pie chart

          $temp[] = array('v' => (string) $r['nom']); 

          // Values of each slice

          $temp[] = array('v' => (int) $r['stock']); 
          $rows[] = array('c' => $temp);
        }

    $table['rows'] = $rows;

    // convert data into JSON format
    $jsonTable = json_encode($table);
    //echo $jsonTable;
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }

    ?>