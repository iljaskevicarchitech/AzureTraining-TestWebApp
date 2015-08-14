<html>

<?php 
	echo "Hello World! From Azure Training PHP app <br>";

 	$serverName = "pk57ue77n9.database.windows.net,1433";
	$connectionInfo = array("Database"=>"igortestappdb", "UID"=>"iljaskevic", "PWD"=>"Password@1");
	$conn = sqlsrv_connect( $serverName, $connectionInfo);

	//$query = "INSERT INTO Task_List (Id, Task_Name) VALUES (?,?); SELECT * FROM Task_List;";
	$query = "SELECT * FROM Task_List;";

	echo $query."<br>";
	$params = array(2, "Test Task 2");
	//$stmt = sqlsrv_query($conn, $query, $params);
	/*$stmt = sqlsrv_query($conn, $query);

	// Consume the first result (rows affected by INSERT) without calling sqlsrv_next_result.
	echo "Rows affected: ".sqlsrv_rows_affected($stmt)."<br />";

	// Move to the next result and display results.
	$next_result = sqlsrv_next_result($stmt);
	if( $next_result ) {
	   while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
	      echo $row['Id'].": ".$row['Task_Name']."<br />"; 
	   }
	} elseif( is_null($next_result)) {
	     echo "No more results.<br />";
	} else {
	     die(print_r(sqlsrv_errors(), true));
	}*/

	$result = sqlsrv_query($conn,$query);
	while( $obj = sqlsrv_fetch_object( $result )) {
    	echo $obj->Id.'-'.$obj->Task_Name.'<br />';
    }
?>

</html>
