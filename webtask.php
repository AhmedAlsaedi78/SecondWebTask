<?php

$servername = "sql304.infinityfree.com";
$username = "if0_42468997";
$password = "Z1jgea07YVz4J";
$dbname = "if0_42468997_webtaskdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");

if (isset($_POST["submit"])) {
    $name = trim($_POST["name"]);
    $age = intval($_POST["age"]);

    if ($name !== "" && $age > 0) {
        $stmt = $conn->prepare("INSERT INTO users (name, age, status) VALUES (?, ?, 0)");
        $stmt->bind_param("si", $name, $age);
        $stmt->execute();
        $stmt->close();

        header("Location: " . $_SERVER["PHP_SELF"]);
        exit();
    }
}

if (isset($_POST["toggle"])) {
    $id = intval($_POST["id"]);

    $stmt = $conn->prepare("UPDATE users SET status = IF(status = 0, 1, 0) WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();

    header("Location: " . $_SERVER["PHP_SELF"]);
    exit();
}

$result = $conn->query("SELECT id, name, age, status FROM users ORDER BY id ASC");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Table</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 40px;
        }

        .add-form {
            margin-bottom: 20px;
        }

        input,
        button {
            padding: 8px;
            margin: 4px;
        }

        table {
            border-collapse: collapse;
            width: 600px;
            max-width: 100%;
            text-align: center;
        }

        th,
        td {
            border: 1px solid black;
            padding: 10px;
        }

        th {
            background-color: #eeeeee;
        }

        button {
            cursor: pointer;
        }
    </style>
</head>

<body>

<form class="add-form" method="POST" action="">
    <label>Name:</label>
    <input type="text" name="name" required>

    <label>Age:</label>
    <input type="number" name="age" min="1" required>

    <button type="submit" name="submit">Submit</button>
</form>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Age</th>
        <th>Status</th>
        <th>Action</th>
    </tr>

    <?php if ($result && $result->num_rows > 0): ?>

        <?php while ($row = $result->fetch_assoc()): ?>

            <tr>
                <td><?php echo $row["id"]; ?></td>
                <td><?php echo htmlspecialchars($row["name"]); ?></td>
                <td><?php echo $row["age"]; ?></td>
                <td><?php echo $row["status"]; ?></td>
                <td>
                    <form method="POST" action="">
                        <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                        <button type="submit" name="toggle">Toggle</button>
                    </form>
                </td>
            </tr>

        <?php endwhile; ?>

    <?php else: ?>

        <tr>
            <td colspan="5">No records found</td>
        </tr>

    <?php endif; ?>
</table>

</body>
</html>

<?php

$conn->close();

?>