<html>
<head>
    <title>Add Peminjam</title>
</head>
 
<body>
    <a href="index_pm.php">Go to Home</a>
    <br/><br/>
 
    <form action="add_pm.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Nama Peminjam</td>
                <td><input type="text" name="nama_peminjam" required></td>
            </tr>
            <tr> 
                <td>Jumlah</td>
                <td><input type="number" name="jumlah" required></td>
            </tr>
            <tr> 
                <td>Tingkat</td>
                <td><input type="text" name="tingkat" required></td>
            </tr>   
            <tr> 
                <td>Tanggal Peminjam</td>
                <td><input type="date" name="tanggal_peminjam" required></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>
    
    <?php
 
    // Check If form submitted, insert form data into peminjam table.
    if(isset($_POST['Submit'])) {
        $nama_peminjam = $_POST['nama_peminjam'];
        $jumlah = $_POST['jumlah'];
        $tingkat = $_POST['tingkat'];
        $tanggal_peminjam = $_POST['tanggal_peminjam'];
        
        // include database connection file
        include_once("config_pm.php");
                
        // Insert data into table peminjam
        $result = mysqli_query($mysqli, "INSERT INTO peminjam(nama_peminjam, jumlah, tingkat, tanggal_peminjam) 
                  VALUES('$nama_peminjam', '$jumlah', '$tingkat', '$tanggal_peminjam')");
        
        // Show message when data added
        if($result) {
            echo "Data added successfully. <a href='index_pm.php'>View Data</a>";
        } else {
            echo "Error: " . mysqli_error($mysqli);
        }
    }
    ?>
</body>
</html>