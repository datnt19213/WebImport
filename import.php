<?php
require("./Data/connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Import</title>
  <link rel="stylesheet" href="./Css/index.css" />
</head>

<body>
  <div class="import-container">
    <p class="import-title">Now, Let's import your file</p>
    <form method="POST" enctype="multipart/form-data" class="import-form">
      <div class="import-box">
        <p class="file-name" id="filename"></p>

        <!-- No css the below "input" tag -->
        <input style="display: none" type="file" name="excel" id="fileinput" />
        <!-- ----------------------------- -->

        <label for="fileinput" class="import-btn-label">
          <p class="import-icon">➕</p>
          <p class="label">Choose your file</p>
        </label>
      </div>
      <button type="submit" class="import-btn" name="fileImport">
        Import File
        <?php echo PHP_VERSION ?>
      </button>
    </form>
  </div>
  <?php
  if (isset($_POST["fileImport"])) {
    $fileName = $_FILES["excel"]["name"];
    echo $fileName;
    $fileExtension = explode('.', $fileName);
    $fileExtension = strtolower(end($fileExtension));

    $newFileName = date("Y.m.d") . '-' . date("H.i.s") . "." . $fileExtension;

    $targetDirectory = "./uploads/" . $newFileName;
    move_uploaded_file($_FILES["excel"]["tmp_name"], $targetDirectory);

    error_reporting(0);
    ini_set('display_errors', 0);

    require "excelReader/excel_reader2.php";
    require "excelReader/SpreadsheetReader.php";

    $reader = new SpreadsheetReader($targetDirectory);
    // link video to use this module
    // https://www.youtube.com/watch?v=yTo22GBGPzs&t=364s

    if ($reader) {
      echo "<script>alert('Read True')</script>";
    } else {
      echo "<script>alert('Read Fail')</script>";
    }

    foreach ($reader as $key => $row) {
      $englishWords = $row[0];
      $wordsLength = $row[1];
      $wordsMeans = $row[2];

      $insertQuery = "INSERT INTO dictionary(words, length, means) VALUES('" . $englishWords . "','" . $wordsLength . "','" . $wordsMeans . "')";
      $result = mysqli_query($conn, $insertQuery);
      // if ($result) {
      //   echo "<script>
      //           confirm('IMPORT SUCCESSFULLY');
      //         </script>";
      // } else {
      //   echo "<script>
      //           confirm('----------------------');
      //         </script>";
      // }
    }
    echo "<script>
                confirm('IMPORT SUCCESSFULLY');
              </script>";
    // echo '<meta http-equiv="refresh" content="0;URL=?page=listimport" />';
  }
  ?>
</body>

</html>