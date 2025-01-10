<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
   <link rel="stylesheet" href="indexst.css">
</head>
<body>
    <div class="container-my5">
        <h2 >List of Clients</h2>
        <a class="btn btn-primary mb-3 pl-10" href="/crud/create.php" role="button">New Client</a>
        <br>

        <?php
        // Show success or error message
        if (isset($_GET['status'])) {
            if ($_GET['status'] == 'deleted') {
                echo "
                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>Client deleted successfully!</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
                ";
            } elseif ($_GET['status'] == 'error') {
                echo "
                <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>There was an error deleting the client. Please try again!</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
                ";
            }
        }
        ?>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername="localhost";
                $username="root";
                $password="";
                $database="myoffice";
                
                //create connection
                $connection= new mysqli($servername,$username,$password,$database);

                //check connetion
                if($connection->connect_error){
                    die("Connection failed:" . $connection->connect_error);
                }

                //reading all row from database
                $sql="SELECT * FROM client";
                $result=$connection->query($sql);

                if($result===false){
                    die("Invalid query:" . $connection->error);
                }

                while($row= $result-> fetch_assoc()){
                    echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['phone']}</td>
                    <td>{$row['address']}</td>
                    <td>{$row['created_at']}</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='/crud/edit.php?id={$row['id']}'>Edit</a>
                        <a class='btn btn-danger btn-sm' href='/crud/delete.php?id={$row['id']}'>Delete</a>
                    </td>
                </tr>
                ";
                }
                $connection->close();
                ?>

            </tbody>
        </table>

    </div>
    
</body>
</html>