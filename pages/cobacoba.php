<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    <table class="table table-striped table-bordered first" id="dataTables-example">
        <thead>
            <tr>
                <th>No</th>
                <!--<th>ID</th>-->
                <th>Blurb Cerita</th>
                <th>Kategori</th>
            </tr>
        </thead>
        <tbody>
        <?php
    
            include '../config.php';
            $query = "SELECT * FROM data_cerita ORDER BY RAND() limit 104";
            //$query = "SELECT * FROM data_cerita WHERE id_cerita NOT IN (1,2,3,4,5,27,28,29,30,31,53,54,55,56,57,79,80,81,82,83,105,106,107,108,109,110)";
            $exe   = mysqli_query($conn, $query);
            $total = mysqli_num_rows($exe);
            $queri = mysqli_query($conn, $query);
            $i = 1; 

            if (false === $exe){
                echo mysqli_error($conn);
            }
            while ($row = mysqli_fetch_array($queri)) {
        ?>

        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $row[1]; ?></td>
            <td><?php echo $row[4]; ?></td>                                    
        </tr>
            <?php
                $i = $i+1;
            }
            ?>  
        </tbody>
    </table>
</body>
</html>
