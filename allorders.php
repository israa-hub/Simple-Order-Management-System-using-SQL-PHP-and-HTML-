<!DOCTYPE html>
<html>
    <head>
        <title>ALL</title>

        <meta charset="UTF-8">

          
    </head>

    <body>
        <h1>Orders</h1>   

        <h3>Search For ALL Orders - Results</h3>

        <br />

		<?php						
			// 1: set up the connection to the database:
			$dsn = 'mysql:host=localhost;dbname=D00262160';
			$username = 'D00262160';
			$password = 'rnl3pO2A';

			// 2: create a PDO and 
			// 3: catch any connection problems
			try {
				$db = new PDO($dsn, $username, $password);
			} catch (PDOException $e) {
				$error_message = $e->getMessage();
				echo "<h1>DATABASE PROBLEM: " . $error_message . ".</h1>";
				exit();
			}
			
			// 4: create the SQL command to SELECT ALL friends from the DB table
			$query = "SELECT * FROM Orders";
			
			// 5: "PREPARED STATEMENTS": minimising the possibility of hacked information flowing from DB to website (and vice-versa) 
			$statement = $db->prepare($query);
			$statement->execute();
			
			// ALL of the relevant records are stored in an ARRAY called $all_queries
			$all_queries = $statement->fetchAll();
			
			$statement->closeCursor();
		?>

		<!-- 6: Create the HTML for the TABLE and TOP (HEADING) Row -->
		<table>
				<tr>
					<th>OrderID</th>
					<th>OrderDate</th>
					<th>CustomerID</th>
					
				</tr>

			<!-- 7: LOOP THROUGH EACH RECORD in the DB TABLE -->
			<!--       (a) ALL of the records are stored in an ARRAY called $all_queries -->
			<!--       (b) Each time round the loop, one record is chosen and stored in the variable $one_query -->
			<!--       (c) Important to realise that each record (i.e. $one_query) has 4 parts in it, the four DB Table FIELDS -->
			<!--       (d) Note the foreach loop doesn't need a counter variable -->
			<!--       (e) We will write each record into a table row, so we need to write <tr> and <td> tags appropriately -->
			<?php foreach ($all_queries as $one_query) : ?>
				<tr>
					<!-- Note how to write PHP code INSIDE a Tag -->
					<td><?php echo $one_query['OrderID']; ?></td>
					<td><?php echo $one_query['OrderDate']; ?></td>
					<td><?php echo $one_query['CustomerID']; ?></td>
					
				</tr>
			<?php endforeach; ?>
		</table>

        <br />

        <input type="button" onclick="window.location.href = 'index.html'" value="Home" />

        <br />
    </body>
</html>









