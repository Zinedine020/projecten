<?php
    // Start the session
    session_start();

    include 'db.php';
    $db = new Database();

    // Check if the user is logged in
    if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])) {
        header("Location: login.php");
        exit();
    }

    $data = $db->selectData();
    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gegevens</title>
    <!-- Include Bootstrap CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Your custom styles here (if any) */
        body {
            /* Add any additional styling for the body here */
            padding-top: 56px; /* Adjust padding to accommodate the fixed navbar */
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: none; /* Remove borders between table cells */
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Apply Bootstrap styles to the table */
        table.table-dark {
            background-color: #212529;
            color: #fff;
        }

        /* Apply Bootstrap styles to striped rows */
        table.table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.05);
        }

        /* Apply Bootstrap styles to buttons */
        .btn {
            /* Add any additional styling for buttons here */
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Welcome, <?php echo isset($_SESSION['user_name']) ? $_SESSION['user_name'] : ''; ?>!</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Your existing content here -->

    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $row) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['password']; ?></td>
                    <td><a href="edit.php?ID=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a></td>
                    <td>
                        <a href="delete.php?ID=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- Include Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
