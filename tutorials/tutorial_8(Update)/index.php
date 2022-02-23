<?php

$connection = new mysqli("localhost", "root", "1234567", "members_information");

$fetchData = fetch_data($connection);

// fetch query
function fetch_data($connection)
{
    $query = "SELECT * from members ORDER BY id ASC";
    $exec = mysqli_query($connection, $query);
    if (mysqli_num_rows($exec) > 0) {

        $row = mysqli_fetch_all($exec, MYSQLI_ASSOC);
        return $row;

    } else {
        return $row = [];
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>MEMBER INFORMATION</title>
<style>
     table, td, th {
      border: 1px solid #ddd;
    }
    th {
      background-color: #786dd1;
    }
    td {
      background-color: #5a616e;
      color:#fff;
    }
    table {
      border-collapse: collapse;
    }
    .table-data{
    margin-left:300px;
   margin-top:50px;
    }
    th, td {
      padding: 15px;
    }
h2 {
  margin-left:250px;
  color: #786dd1;
}
a {
  color: #e30f0b;
}
.member {
  color : red;
  text-decoration:none;
  display:block;
  padding-top:10px;
}
</style>
</head>
<body>


<div class="table-data">
        <div class="list-title">
 <h2>MEMBER INFORMATION</h2>

            </div>

    <table border="1">

        <tr>

            <th>No.</th>
            <th>Full Name</th>
            <th>Email Address</th>
            <th>Phone</th>
            <th>Birth Date</th>
            <th>Edit</th>
            <th>Delete</th>


        </tr>

<?php

if (count($fetchData) > 0) {
    $sn = 1;
    foreach ($fetchData as $data) {

        ?> <tr>
<td><?php echo $sn; ?></td>
<td><?php echo $data['username']; ?></td>
<td><?php echo $data['email']; ?></td>
<td><?php echo $data['phone']; ?></td>
<td><?php echo $data['birth_date']; ?></td>
<td><a href="edit.php?edit=<?php echo $data['id']; ?>" class="edit_btn" >Edit</a></td>
<td>				<a href="delete.php?id=<?php echo $data["id"]; ?>">Delete</a>
</td>
</tr> <?php

        $sn++;}

} else {

    ?>

      <tr>
        <td colspan="7">No Data Found</td>
      </tr>

<?php

}
?>

    </table>
    <a href="insert.php" class="member">ADD MORE MEMBERS</a>
    </div>

</body>
</html>