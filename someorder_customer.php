<!DOCTYPE html>
<html>
    <head>
        <title>Some order customer name </title>

        <meta charset="UTF-8">

         
    </head>

    <body>
        <h1>Orders</h1>   

        <h3>Search For Order based on customer name - Result</h3>
        <br />

		<?php						
			// Storing the hobby from the previous webpage's form 
			$whichName = $_POST["CustomerName"];
			
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
			
			// This time we want SOME records, based on the hobby
			$query = "SELECT *
			from Orders,Customers,Products,OrderDetails
			where Orders.OrderID = OrderDetails.OrderID
			and Customers.CustomerID = Orders.CustomerID
			and Products.ProductID = OrderDetails.ProductID
			and Customers.CustomerName = :whichName";
			
			$statement = $db->prepare($query);
			
			//  BINDING...
			$statement->bindValue(":whichName", $whichName);
			$statement->execute();			
			$all_queries = $statement->fetchAll();
			$statement->closeCursor();
		?>
		
		<table>
				<tr>
					<th>OrderID</th>
					<th>OrderDate</th>
					<th>CustomerName</th>
					<th>ProductName</th>
					<th>QuantityOrdered</th>




				</tr>

			<?php foreach ($all_queries as $one_query) : ?>
				<tr>
					<td><?php echo $one_query['OrderID']; ?></td>
					<td><?php echo $one_query['OrderDate']; ?></td>
					<td><?php echo $one_query['CustomerName']; ?></td>
					<td><?php echo $one_query['ProductName']; ?></td>
					<td><?php echo $one_query['QuantityOrdered']; ?></td>
						
				</tr>
			<?php endforeach; ?>
		</table>

        <br />

        <input type="button" onclick="window.location.href = 'index.html'" value="Home" />

        <br />
	</body>
</html>