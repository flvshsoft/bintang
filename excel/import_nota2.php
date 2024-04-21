<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

$servername = "localhost"; // Replace with your server name
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$database = "sh_bintang"; // Replace with your MySQL database name

$stmt_gas = FALSE; //TRUE or FALSE
// Lokasi file XLS
$xlsFile = 'excel/NOTA PUTIH CABANG JAMBI 2024.xlsx';

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



// EXCEL
// Membaca file XLS
$spreadsheet = IOFactory::load($xlsFile);
// $worksheet = $spreadsheet->getActiveSheet();
// Get a specific sheet by index (zero-based)
$sheetIndex = 11; // Change this to the index of the sheet you want
$worksheet = $spreadsheet->getSheet($sheetIndex);

// Get all worksheets
$worksheetIterator = $spreadsheet->getWorksheetIterator();

// // Loop through each worksheet
// foreach ($worksheetIterator as $worksheet) {
// Get the worksheet name
// $worksheetName = $worksheet->getTitle();

// Output or do something with the worksheet name
// echo "Worksheet Name: $worksheetName\n";
// echo "<br>";
// }
// print_r($worksheet->getTitle());
// exit;
// ========================================================================================
// DO - tidak duplikat
// Mendapatkan jumlah baris dan kolom
$highestRow = $worksheet->getHighestRow();
$highestColumn = $worksheet->getHighestColumn();

// Iterasi untuk membaca data
$data = [];
$data2 = [];
for ($row = 2; $row <= $highestRow; ++$row) {
    $rowData = [];
    for ($col = 'A'; $col <= $highestColumn; ++$col) {
        $cellValue = $worksheet->getCell($col . $row)->getValue();
        $rowData[] = $cellValue;
    }
    $data[] = $rowData;
    if ($row > 4) {
        if (strlen($rowData[1]) > 3) {
            $data2[] = $rowData;
        }
    }
}
// print_r($data2);
// exit;
if ($data[0][0] != '') {
    // Menampilkan data
    $hitung = [];
    $hitung['area'] = $data[0][0];
    $hitung['salesman'] = $data[0][1];
    $hitung['branch'] = $data[0][4];
    // Start
    $sql = "SELECT * FROM `branch` WHERE `nama_branch` LIKE '" . $hitung['branch'] . "' OR  `cabang` LIKE '" . $hitung['branch'] . "'"; // Replace with your table name
    $result = $conn->query($sql);
    $row_sql_branch = $result->fetch_assoc();
    // End
    if ($row_sql_branch) {
        $id_branch = $row_sql_branch['id_branch'];
    } else {
        print_r($hitung);
        exit;
    }
    // Start
    $sql = "SELECT * FROM `area` WHERE (`id_nama_area` LIKE '" . $hitung['area'] . "' OR  `nama_area` LIKE '" . $hitung['area'] . "') and id_branch = '" . $id_branch . "'"; // Replace with your table name
    $result = $conn->query($sql);
    $row_sql = $result->fetch_assoc();
    // End
    if ($row_sql) {
        $hitung['id_area'] = $row_sql['id_area'];
        $hitung['id_branch'] = $row_sql['id_branch'];
        // Start
        $sql = "SELECT * FROM `partner` WHERE `nama_lengkap` LIKE '" . $data[0][1] . "' AND `id_branch` = '" . $hitung['id_branch'] . "'"; // Replace with your table name
        $result = $conn->query($sql);
        $row_sql2 = $result->fetch_assoc();
        // End
        if ($row_sql2) {
            $hitung['id_partner'] = $row_sql2['id_partner'];
            $hitung['week'] = $data[0][2];
            $hitung['id_asset'] = '50000001';

            // tanggal
            $unixTimestamp = ($data[0][3] - 25569) * 86400; // Convert Excel date to Unix timestamp
            $date = new DateTime("@$unixTimestamp"); // Create DateTime object using Unix timestamp
            $formattedDate = $date->format('Y-m-d H:i:s'); // Format the date as desired
            $hitung['tgl_do'] = $formattedDate;
            // Start
            $sql = "SELECT * FROM `sales` WHERE `id_partner` = '" . $hitung['id_partner'] . "' AND `id_area` = '" . $hitung['id_area'] . "' AND `week` = '" . $hitung['week'] . "'"; // Replace with your table name
            $result = $conn->query($sql);
            $row_sql3 = $result->fetch_assoc();
            // End
            if ($row_sql3) {
                $hitung['id_sales'] = $row_sql3['id_sales'];
            } else {
                if ($hitung['id_area'] != '') {
                    $sql = "INSERT INTO `sales`(`id_partner`, `id_asset`, `id_area`, `id_branch`, `km`, `week`, `tgl_do`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES (?,?,?,?,'',?,?,'',?,'','')";
                    $stmt = $conn->prepare($sql);
                    // Check if the prepare() succeeded
                    if (!$stmt) {
                        echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
                    }
                    // Bind parameters
                    $stmt->bind_param("iiiiiss", $hitung['id_partner'], $hitung['id_asset'], $hitung['id_area'], $hitung['id_branch'], $hitung['week'], $hitung['tgl_do'], $hitung['tgl_do']);

                    if ($stmt->execute()) {
                        // echo "Record updated successfully";
                        $hitung['id_sales'] = $conn->insert_id;
                    } else {
                        echo "Error updating record: " . $conn->error;
                    }
                }
            }
        }else{
            print_r($data[0]);
        }
    }
    // print_r($hitung);
    // exit;
    // ========================================================================================
    // nota
    $data3 = 0;
    if (isset($hitung['id_sales'])) {
        foreach ($data2 as $key => $value) {
            // tanggal
            $unixTimestamp = ($value[2] - 25569) * 86400; // Convert Excel date to Unix timestamp
            $date = new DateTime("@$unixTimestamp"); // Create DateTime object using Unix timestamp
            $formattedDate = $date->format('Y-m-d H:i:s'); // Format the date as desired
            $value[2] = $formattedDate;
            // konsumen
            // Start
            $temp = explode(' -', $value[3]);
            if (count($temp) > 0) {
                $value[3] = $temp[0];
            } else {
                $temp = explode('-', $value[3]);
                if (count($temp) > 0) {
                    $value[3] = $temp[0];
                }
            }
            $sql = "SELECT * FROM `customer` WHERE `nama_customer` LIKE '%" . $value[3] . "%'"; // Replace with your table name
            $result = $conn->query($sql);
            $row_sql = $result->fetch_assoc();
            // End
            if ($row_sql) {
                $value[5] = $row_sql['id_customer'];

                $sql = "INSERT INTO `nota` (`id_nota`, `no_nota`, `id_sales`, `id_partner`, `weeks`, `payment_method`, `total_beli`, `id_customer`, `id_branch`, `id_area`, `id_bank`, `tgl_bayar`, `pay`, `status`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES (NULL, ?, ?, ?, ?, 'KREDIT', ?, ?, ?, ?, '1', ?, NULL, '', '34563', '2024-04-15 22:01:52.000000', '2024-04-15 22:01:52.000000', '2024-04-15 22:01:52.000000');";
                $stmt = $conn->prepare($sql);
                // Check if the prepare() succeeded
                if (!$stmt) {
                    echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
                }
                // Bind parameters
                $stmt->bind_param("sssssssss", $value['1'], $hitung['id_sales'], $hitung['id_partner'], $hitung['week'], $value[4], $value[5], $hitung['id_branch'], $hitung['id_area'], $value[2]);

                if ($stmt_gas) {
                    if ($stmt->execute()) {
                        // echo "Record updated successfully";
                    } else {
                        echo "Error updating record: " . $conn->error;
                        exit;
                    }
                }
                $data3++;
            } else {
                print_r($value);
            }
            // print_r($value);
            // print_r([$key+1 => $value[5]]);
        }
    }
    if (count($data2) == $data3) {
        print_r([$worksheet->getTitle() => 'Oke']);
    } else {
        print_r($hitung);
        print_r([$worksheet->getTitle() => 'xxxxxxxxxxx']);
    }
}
// }

// Close connection
$conn->close();
