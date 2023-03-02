<?php
require("./Data/connection.php")
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>List Import</title>
  <link rel="stylesheet" href="./Css/index.css" />
</head>

<body>
  <div class="list-import">
    <div class="list-container">
      <p class="list-title">Import List</p>
      <div class="table-layout">
        <div class="table">
          <div class="table-form">
            <!-- title -->
            <div class="table-header">
              <div class="tb-cell">Words</div>
              <div class="tb-cell">Length of Words</div>
              <div class="tb-cell">Means</div>
            </div>
            <!-- body -->
            <div class="tb-body">
              <?php
              $query = "SELECT * FROM dictionary";
              $rows = mysqli_query($conn, $query);

              foreach ($rows as $row) :
              ?>
                <div class="tb-row">
                  <div class="tb-cell"><?php echo $row['words']; ?></div>
                  <div class="tb-cell"><?php echo $row['length']; ?></div>
                  <div class="tb-cell"><?php echo $row['means']; ?></div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>