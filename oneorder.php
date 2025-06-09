<!DOCTYPE html>
<html>
    <head>
        <title>ONE</title>

        <meta charset="UTF-8">

         
    </head>

    <body>
        <h1>Orders</h1>   

        <h3>Search For a Order - Result</h3>
        <br />

		<?php						
			// Storing the friend nmae from the previous webpage's form (remember method='post'?) into a PHP VARIABLE
			$whichname = $_POST["ProductName"];
			
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
			
			// This time we want ONE record, based on the Friend name.
            $query = "SELECT * FROM Products where ProductName = :whichname";
			
			$statement = $db->prepare($query);
			
			//  BINDING...
			$statement->bindValue(":whichname", $whichname);
			$statement->execute();			
			$all_queries = $statement->fetchAll();			
			$statement->closeCursor();
		?>
		
		<table>
				<tr>
					<th>ProductID</th>
					<th>ProductName</th>
					<th>ProductPrice</th>
					<th>QuantityInStock</th>
					<th>SupplierID</th>
					
				</tr>

			<?php foreach ($all_queries as $one_query) : ?>
				<tr>
					<td><?php echo $one_query['ProductID']; ?></td>
					<td><?php echo $one_query['ProductName']; ?></td>
					<td><?php echo $one_query['ProductPrice']; ?></td>
					<td><?php echo $one_query['QuantityInStock']; ?></td>
					<td><?php echo $one_query['SupplierID']; ?></td>
					
					
				</tr>
			<?php endforeach; ?>
		</table>

        <br />

        <input type="button" onclick="window.location.href = 'index.html'" value="Home" />

        <br />
	</body>
</html>