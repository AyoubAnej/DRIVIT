<!DOCTYPE html>
<html>
<head>
    <title>User List</title> 
    
    
    <li class="back">
  <a class="back-link" href="dashboard.php">
  <button class="login-button" type="submit" > </i>BACK </button>
  </a>
</li>
    <style>
               body {
            min-height: 100%;
           position: relative;
         padding-bottom: 3rem;
            margin: 0;
            padding: 0;
            text-align: center;
            width: 100%;
            background: linear-gradient(170deg, rgba(49, 57, 73, 0.8) 20%, rgba(49, 57, 73, 0.5) 20%, rgba(49, 57, 73, 0.5) 35%, rgba(41, 48, 61, 0.6) 35%, rgba(41, 48, 61, 0.8) 45%, rgba(31, 36, 46, 0.5) 45%, rgba(31, 36, 46, 0.8) 75%, rgba(49, 57, 73, 0.5) 75%), linear-gradient(45deg, rgba(20, 24, 31, 0.8) 0%, rgba(41, 48, 61, 0.8) 50%, rgba(82, 95, 122, 0.8) 50%, rgba(133, 146, 173, 0.8) 100%) #313949;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', 'Geneva', Verdana, sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        h1 {
            color: #333;
            text-align: center;
            margin-top: 0;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
      



        .login-button {

display: block;

  line-height: 50px;
  font-weight: bold;
  text-decoration: none;
  background: transparent;
  text-align: center;
  color: #fff;
  text-transform: uppercase;
  letter-spacing: 1px;
  border: 3px solid #333;
  transition: all .35s;
}



.login-button:hover {
    
  border: 3px solid #2ecc71;
  background: transparent;
  color: #2ecc71;

}
a:hover + .icon{
  border: 3px solid #2ecc71;
  
}
.icon svg{
  width: 30px;
  position: absolute;
  top: calc(50% - 15px);
  left: calc(50% - 15px);
  transform: rotate(-45deg);
  fill: #2ecc71;
  transition: all .35s;
}

    </style>
</head>
<body>
    <div class="container">
        <h1>USER LIST</h1>

        <?php
        // Database connection configuration
        $user = 'root';
        $pass = '';
        $db = 'location_voiture';
        $db = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");

        // Check if the connection was successful
        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        // SQL query to retrieve the list of users
        $sql = "SELECT * FROM `comptes` WHERE ID_C <> 1";
        $sql1 = "SELECT * FROM `personne` WHERE ID_P <> 1";
        $result = $db->query($sql);
        $result1 = $db->query($sql1);
        // Check if there are users
        
        if ($result->num_rows > 0) {
            // Display users in a table
            echo "<table>";
            echo "<tr><th>ID_PERSONNE</th><th>NOM</th><th>PRENOM</th><th>CIN</th><th>User ID</th><th>NAME</th><th>EMAIL</th><th>MOT DE PASS</th></tr>";

            // Output each user's information
            while ($row = $result1->fetch_assoc() ) {
                echo "<td>" . $row["ID_P"] . "</td>";
                echo "<td>" . $row["Nom"] . "</td>";
                echo "<td>" . $row["Prenom"] . "</td>";
                echo "<td>" . $row["CIN"] . "</td>";
               
            }

            while ($row = $result->fetch_assoc() ) {
                echo "<td>" . $row["ID_C"] . "</td>";
                echo "<td>" . $row["Username"] . "</td>";
                echo "<td>" . $row["Mail"] . "</td>";
                echo "<td>" . $row["PassWordd"] . "</td>";
                echo "</tr>";
                echo "</tr>";
            }
           
            echo "</table>";
        } else {
            echo "No users found.";
        }
        
       
  
        
  
        // Close the database connection
        $db->close();

      

        ?>
    </div>
</body>
</html>
