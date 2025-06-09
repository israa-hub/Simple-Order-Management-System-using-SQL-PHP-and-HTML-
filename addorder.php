<!DOCTYPE html>
<html>
	<head>
		<title>ADD - php</title>

		<meta charset="UTF-8">

          
	</head>

    <body>
        <h1>Orders</h1>   

        <h3>Add Order</h3>
        <br />

		<?php						
			// Storing the 4 VALUES from the previous webpage's form (remember method='post'?) into 4 PHP VARIABLES
			$theid = $_POST["OrderID"];
			$thedate = $_POST["OrderDate"];
			$thecostumerid = $_POST["CustomerID"];
			$thecostumername = $_POST["CustomerName"];
			$thecostumertel = $_POST["CustomerTelephoneNumber"];
			$theproductid = $_POST["ProductID"];
			$thequantity = $_POST["QuantityOrdered"];

			
			
			$dsn = 'mysql:host=localhost;dbname=D00262160';
			$username = 'D00262160';
			$password = 'rnl3pO2A';

			try {
				$db = new PDO($dsn, $username, $password);
			} catch (PDOException $e) {
				$error_message = $e->getMessage();
				echo "<h1>DATABASE PROBLEM: " . $error_message . ".</h1>";
				exit();
			}
			
			// INSERTing the 4 textbox values, in one record, into the database table
			$query = 'INSERT INTO Customers (OrderID, OrderDate, CustomerID , CustomerName, CustomerTelephoneNumber ,ProductID , QuantityOrdered) VALUES (:theid, :thedate, :thecostumerid ,:thecostumername, :thecostumertel, :theproductid, :thequantity)';
    
			$statement = $db->prepare($query);
			
			// We need to BIND ALL FOUR values that were typed into the previous page's form textboxes...
			$statement->bindValue(':theid', $theid);
			$statement->bindValue(':thedate', $thename);
			$statement->bindValue(':thecostumerid', $theaddress);
			$statement->bindValue(':thecostumername', $thecostumername);
			$statement->bindValue(':thecostumertel', $thecostumertel);
			$statement->bindValue(':theproductid', $theproductid);
			$statement->bindValue(':thequantity', $thequantity);

			
			
			$statement->execute();
			$statement->closeCursor();
		?>
		
		<table>
				<tr>
					<th> OrderID</th>
					<th>OrderDate</th>
					<th>CustomerID</th>
					<th>CustomerName</th>
					<th>CustomerTelephoneNumber</th>
					<th>ProductID</th>
					<th>QuantityOrdered</th>

					
				</tr>

				<!-- NO NEED FOR A FOREACH LOOP AS WE HAVE THE 4 VALUES FROM PREVIOUS WEBPAGE -->
				<tr>
					<td><?php echo $theid; ?></td>
					<td><?php echo $thedate; ?></td>
					<td><?php echo $thecostumerid; ?></td>
					<td><?php echo $thecostumername; ?></td>
					<td><?php echo $thecostumertel; ?></td>
					<td><?php echo $theproductid; ?></td>
					<td><?php echo $thequantity; ?></td>

					
					
				</tr>
		</table>

        <br />

        <input type="button" onclick="window.location.href = 'index.html'" value="Home" />

        <br />
	</body>
</html>