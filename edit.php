<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "myoffice";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

$id = "";
$name = "";
$email = "";
$phone = "";
$address = "";
$errorMessage = "";
$successMessage = "";

// Get to show the client data
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["id"])) {
        header("location:/crud/index.php");
        exit;
    }
    $id = $_GET["id"];
    $sql = "SELECT * FROM client WHERE id=$id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();
    if (!$row) {
        header("location:/crud/index.php");
        exit;
    }
  
    $name = $row["name"];
    $email = $row["email"];
    $phone = $row["phone"];
    $address = $row["address"];
} else {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];

    do {
        if (empty($id) || empty($name) || empty($email) || empty($phone) || empty($address)) {
            $errorMessage = "All fields are required";
            break;
        }

        $sql = "UPDATE client SET name='$name', email='$email', phone='$phone', address='$address' WHERE id=$id";

        if ($connection->query($sql) === TRUE) {
            $successMessage = "Client updated successfully";
            header("location: /crud/index.php");
            exit;
        } else {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }
    } while (false);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>Edit Client</h2>
        <?php
        if(!empty($errorMessage)){
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>$errorMessage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
            </div>
            ";
        }

        ?>


        <form method="post">
            <input type="hidden"  name="id" value="<?php echo $id;?>">
            <div class="row mb-3">
                <label class="col sm-3 col-form-label fw-bold">Name</label>
                <div class="sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col sm-3 col-form-label fw-bold">Email</label>
                <div class="sm-6">
                    <input type="text" class="form-control" name="email" value="<?php echo $email;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col sm-3 col-form-label fw-bold">Phone</label>
                <div class="sm-6">
                    <input type="text" class="form-control" name="phone" value="<?php echo $phone;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col sm-3 col-form-label fw-bold">Address</label>
                <div class="sm-6">
                    <input type="text" class="form-control" name="address" value="<?php echo $address;?>">
                </div>
            </div>

            <?php
            if(!empty($successMessage)){
                echo"
                <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>$successMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
                        </div>
                    </div>
                </div>
                ";

            }

            ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm d-grid">
                    <button type="sumbit" class="btn btn-primary">Submit</button>
                </div>
                    
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/crud/index.php" role="button">Cancel</a>
                </div>
            </div>

        </form>
    </div>
</body>
</html>