<?php
// Establish a database connection
$user = 'root';
$pass = '';
$db = 'location_voiture';
$db = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");

// Function to check if the ID and password match a user record in the database
function authenticateUser($id, $password, $db) {
    $query = " SELECT comptes.Username,comptes.PassWordd from	comptes , admin
    where comptes.ID_C = admin.ID_Compte_admin and comptes.Username = '$id' AND comptes.PassWordd='$password'";
    
    $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) == 1) {
        return true;
    }

    return false;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $password = $_POST['password'];

    if (authenticateUser($id, $password, $db)) {
        // Authentication successful, redirect to the dashboard page
        header("Location: /drivit/dashboard.php#");
        exit;
    } else {
        // Authentication failed, display an error message
        $error_message = "Invalid ID or password. Please try again.";
    }
}

// Close the database connection
mysqli_close($db);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .login-button {
            display: block;
            width: 100%;
            padding: 10px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .login-button:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login Page</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="id">ID:</label>
                <input type="text" id="id" name="id" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button class="login-button" type="submit">Login</button>
        </form>
        <?php if (isset($error_message)): ?>
            <div class="error-message"><?php echo $error_message; ?></div>
        <?php endif; ?>
    </div>
</body>
</html>
-------------------------------
<?php
// Establish a database connection
$user = 'root';
$pass = '';
$db = 'location_voiture';
$db = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");

// Function to check if the ID and password match a user record in the database
function authenticateUser($id, $password, $db) {
    $query = " SELECT comptes.Username,comptes.PassWordd from	comptes , admin
    where comptes.ID_C = admin.ID_Compte_admin and comptes.Username = '$id' AND comptes.PassWordd='$password'";
    
    $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) == 1) {
        return true;
    }

    return false;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $password = $_POST['password'];

    if (authenticateUser($id, $password, $db)) {
        // Authentication successful, redirect to the dashboard page
        header("Location: /drivit/dashboard.php#");
        exit;
    } else {
        // Authentication failed, display an error message
        $error_message = "Invalid ID or password. Please try again.";
    }
}

// Close the database connection
mysqli_close($db);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .login-button {
            display: block;
            width: 100%;
            padding: 10px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .login-button:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
            margin-top: 10px;
        }





.login-button {

  cursor: pointer;
  background-color: green;
  border: 1px solid #91C9FF;
  outline: none;
  transition: 1s ease-in-out;
}



.login-button:hover {
  transition: 1s ease-in-out;
  background: #4F95DA;
}

.login-button:hover svg {
  stroke-dashoffset: -480;
}

.login-button span {
  color: white;
  font-size: 18px;
  font-weight: 100;
}
    </style>
</head>
<body>
    <div class="container">
        <h2>Login Page</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="id">ID:</label>
                <input type="text" id="id" name="id" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button class="login-button" type="submit">Login</button>
        </form>
        <?php if (isset($error_message)): ?>
            <div class="error-message"><?php echo $error_message; ?></div>
        <?php endif; ?>
    </div>
</body>
</html>
-------------------------------
<?php
// Establish a database connection
$user = 'root';
$pass = '';
$db = 'location_voiture';
$db = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");

// Function to check if the ID and password match a user record in the database
function authenticateUser($id, $password, $db) {
    $query = " SELECT comptes.Username,comptes.PassWordd from	comptes , admin
    where comptes.ID_C = admin.ID_Compte_admin and comptes.Username = '$id' AND comptes.PassWordd='$password'";
    
    $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) == 1) {
        return true;
    }

    return false;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $password = $_POST['password'];

    if (authenticateUser($id, $password, $db)) {
        // Authentication successful, redirect to the dashboard page
        header("Location: /drivit/dashboard.php#");
        exit;
    } else {
        // Authentication failed, display an error message
        $error_message = "Invalid ID or password. Please try again.";
    }
}

// Close the database connection
mysqli_close($db);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .login-button {
            display: block;
            width: 100%;
            padding: 10px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .login-button:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
            margin-top: 10px;
        }





.login-button {

display: block;

  line-height: 50px;
  font-weight: bold;
  text-decoration: none;
  background: #333;
  text-align: center;
  color: #fff;
  text-transform: uppercase;
  letter-spacing: 1px;
  border: 3px solid #333;
  transition: all .35s;
}



.login-button:hover {
  width: 200px;
  border: 3px solid #2ecc71;
  background: transparent;
  color: #2ecc71;

}
a:hover + .icon{
  border: 3px solid #2ecc71;
  right: -25%;
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
        <h2>Login Page</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="id">ID:</label>
                <input type="text" id="id" name="id" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button class="login-button" type="submit">Login</button>
        </form>
        <?php if (isset($error_message)): ?>
            <div class="error-message"><?php echo $error_message; ?></div>
        <?php endif; ?>
    </div>
</body>
</html>