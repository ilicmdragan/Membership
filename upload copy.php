<?php
if(isset($_POST["submit"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if the file is a valid Excel file
    if($fileType != "xls" && $fileType != "xlsx") {
        echo "Sorry, only Excel files are allowed.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Upload file if all checks pass
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

            // Process the Excel file and insert data into MySQL database
            require 'path/to/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;

// Now you can use IOFactory without any issues
$objPHPExcel = IOFactory::load($target_file);

            require_once 'PHPExcel/IOFactory.php'; // Include PHPExcel library
            $objPHPExcel = PHPExcel_IOFactory::load($target_file);

            // Loop through the Excel file and insert data into MySQL
            foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
                foreach ($worksheet->getRowIterator() as $row) {
                    $data = $row->getCellIterator();
                    // Process data and insert into MySQL table
                    // Example: $data->getCellByColumnAndRow(1)->getValue()
                }
            }

            // Close the MySQL connection or any other necessary cleanup
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>
