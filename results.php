<?php

  $host = 'localhost';
  $dbname = 'dimitris_webvillas';
  $dbuser = 'dimitris_webvillasuser';
  $dbpass = 'Villas@@2020!';


  $recordsPerPage = 4;

  //Find current page
  if (isset($_GET['page']))
    $curPage = $_GET['page'];
  else
    $cur_page = 1;

  //Count pointer of the first record
  $startIndex = ($curPage-1) * $recordsPerPage;

  try {
    //Create PDO Object
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;", $dbuser, $dbpass);
    $sql = "SELECT count(villa_id) as recCount FROM villas";

    $statement = $pdo->query($sql);
    $record = $statement->fetch(PDO::FETCH_ASSOC);

	//Count number of records
    $pages = ceil($record['recCount']/$recordsPerPage);  //ceil -> sum up
  	$statement->closeCursor();

    $record=null;
    $sql = "SELECT * FROM villas LIMIT $startIndex, $recordsPerPage";
 	  $statement = $pdo->query($sql);
    // ακολουθεί το loop "κατανάλωσης" των αποτελεσμάτων
    while ( $record = $statement->fetch(PDO::FETCH_ASSOC) ) {
       echo "<p>villa_id: ".$record['villa_id']." --- title: ".$record['title'];
	     echo " [ <a href='edit.php?id=" . $record['villa_id'] . "'>edit</a> ] [ <a href='delete.php?id=" . $record['villa_id'] . "'>delete</a> ]</p>";
	  }
    // καθάρισμα objects
  	$statement->closeCursor();
    $pdo = null;
  } catch (PDOException $e) {
      // if something wrong happens in the try{...} block execution comes here
      print "Database Error: " . $e->getMessage() . "<br/>";
      die();
    }
?>

<p>

  <?php //τώρα θα τυπώσουμε τους συνδέσμους πλοήγησης στις σελίδες
        for ($i=1; $i<=$pages; $i++) {
          // εάν δεν είναι η τρέχουσα σελίδα, φτιάξε link
          if ($i<>$curPage) { ?>
             <a href="results.php?page=<?php echo $i ?>"><?php echo $i ?></a>&nbsp;&nbsp;

  <?php   // αν είναι η τρέχουσα σελίδα, τύπωσε απλά τον αριθμό της
          } else
             echo $i."&nbsp;&nbsp;";
        } ?>
</p>
