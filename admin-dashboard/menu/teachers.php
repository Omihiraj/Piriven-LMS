<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lms";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
<?php
if (isset($_POST['no'])) {

    $qty = $_POST['no'];

    echo "<div><button id='teacher-add' onclick='loadTeachAdd()'>Add New +</button></div>";
    echo "<div>";
    echo "<div id='head-upper'>
        <div class='col-t'>
            Show <select id='teachers-qty' onclick='qtyLoad()'>
                    <option>$qty</option>
                    <option value='10'>10</option>
                    <option value='25'>25</option>
                    <option value='50'>50</option>
                </select> Teachers
        </div>
        <div class='col-t'></div>
        <div class='col-t'></div>
        <div class='col-t'>
        <div class='input-icons'>
            <i class='fa fa-search icon'></i><input type='text' id='t-search' placeholder='Search..'/>
        </div>
        </div>
        
    </div>";
    $show_tid = array();
    $show_tname = array();
    $show_tcontact = array();
    $sql   = "SELECT * FROM teacher";
    $query = mysqli_query($conn, $sql);
    if ($query) {

        echo "<table  class='display' style='width:100%;'>";
        echo "<thead>
            <tr>
                <th>Teacher ID</th>
                <th>Teacher Name</th>
                <th>Teacher Contact No</th>
            </tr>
        </thead>";
        echo "<tbody>";
        if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                $t_id      = $row["t_id"];
                $t_name    = $row["t_name"];
                $t_contact = $row["t_contact"];

                $show_tid[] = $t_id;
                $show_tname[] = $t_name;
                $show_tcontact[] = $t_contact;
            }
            $all_qty = count($show_tid);
            if ($all_qty < $qty) {
                for ($i = 0; $i <= $all_qty - 1; $i++) {
                    echo "<tr>
                    <td>$show_tid[$i]</td>
                    <td>$show_tname[$i]</td>
                    <td>$show_tcontact[$i]</td>
            </tr>";
                }
            } else if ($all_qty >= $qty) {
                for ($i = 0; $i <= $qty - 1; $i++) {
                    echo "<tr>
                    <td>$show_tid[$i]</td>
                    <td>$show_tname[$i]</td>
                    <td>$show_tcontact[$i]</td>
            </tr>";
                }
            }
        }
        echo "</tbody>";
        echo "</table>";
    }
    echo "  <div class='col-t'></div>
            <div class='col-t'></div>
            <div class='col-t'></div>
            <div class='col-t'><button class='next-button'>1</button><button class='next-button'>2</button><button class='next-button'>Next</button></div>
    ";
    echo "</div>";
}
