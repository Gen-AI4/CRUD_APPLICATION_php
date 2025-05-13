<?php
//Database Connection
$conn = new mysqli("localhost", "root", "", "CRUD");
if ($conn->connect_error) {
    die("Connection failed!" . $conn->connect_error);
}










$update = FALSE;
$email = $name = "";




//update data 
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $result = $conn->query("SELECT * FROM crud WHERE id=$id");

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $email = $row['email'];
    }
    // header('location: index.php');
}

//Insert data into database
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    if (isset($_GET['edit'])) {
        $conn->query("UPDATE crud SET name='$name', email='$email' WHERE id = $id");
    } else {
        $conn->query("INSERT INTO crud(name,email) VALUES('$name','$email')");
    }
    header('location: index.php');
    exit;
}

// Delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM crud WHERE id=$id");

    header('location: index.php');
    exit;
}



//     $stmt = $conn->prepare("INSERT INTO crud (name, email) VALUES (?, ?)");
//     $stmt->bind_param("ss", $name, $email);
//     $stmt->execute();
// };



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Application</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>CRUD APPLICATION</h1>
    <div class="form">
        <fieldset>
            <legend>
                <?php
                echo $update ? "Update Student" : "Add Student"


                ?>

            </legend>
            <form method="post">
                <input type="hidden" name="" value="<?php echo $_GET['edit'] ?? '' ?>">
                <input type="text" name="name" placeholder="Name" required value="<?php echo htmlspecialchars($name); ?>">
                <input type="email" name="email" placeholder="Email" required value="<?php echo htmlspecialchars($email); ?>">
                <input type="submit" value="<?php echo $update ? "Update Student" : "Add Student" ?>">
            </form>
        </fieldset>
    </div>
    <div class="value">
        <table>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>

            <?php
            $result = $conn->query("SELECT * FROM crud");

            while ($row = $result->fetch_assoc()) :
            ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td> <span><a href="?edit=<?php echo $row['id']; ?>">Edit</a></span> | <span><a href="?delete=<?php echo $row['id']; ?>" onclick="return confirm('Do you delete this field')">Delete</a></span> </td>
                </tr>

            <?php endwhile; ?>
        </table>

    </div>
</body>

</html>