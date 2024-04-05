<?php
include 'db.php';
$db = new Database();

$db->users("test", 3, 10);
$data = $db->selectData();

// HTML voor de tabel en knoppen
echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>";

foreach ($data as $row) {
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['name']}</td>
            <td>{$row['email']}</td>
            <td>{$row['password']}</td>
            <td><button onclick='editUser({$row['id']})'>Edit</button></td>
            <td><button onclick='deleteUser({$row['id']})'>Delete</button></td>
          </tr>";
}

echo "</table>";

// JavaScript-functies voor bewerken en verwijderen
echo "<script>
        function editUser(id) {
            // Implementeer bewerkingslogica hier
            alert('Editing user with ID: ' + id);
        }

        function deleteUser(id) {
            // Implementeer verwijderingslogica hier
            alert('Deleting user with ID: ' + id);
        }
      </script>";
      echo "<style>
      table {
          width: 100%;
          border-collapse: collapse;
          margin-top: 20px;
      }
      th, td {
          padding: 10px;
          border: 1px solid #ddd;
          text-align: left;
      }
      th {
          background-color: #f2f2f2;
      }
      button {
          padding: 5px 10px;
          cursor: pointer;
      }
    </style>";

?>