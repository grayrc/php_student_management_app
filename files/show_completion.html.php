<?php
include 'access_control.php';
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Home</title>



    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  </head>
  <body>

    <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2">
				</div>
				<div class="col-md-8 content">
					<div class="page-header">
						<h1>
							Administration Tools
              <button class="btn btn-default pull-right" name="home" onclick="window.location = 'admin_controller.php'">
                Home
              </button>
						</h1>

					</div>
          <h2>Student Lab Completion</h2>
                    <table class="table table-condensed table-hover table-striped completion_table">
                        <thead>
                            <tr>
                                <th>
                                    Student
                                </th>
                                <?php
                                    foreach($lab_table as $lab)
                                    {
                                        echo("<th>$lab[0]</th>");
                                    }
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php


                                foreach ($table_data as $row) {
                                  echo("<tr>");
                                  foreach ($row as $col) {
                                    if($col == 'X')
                                    {
                                        echo("<td class='completed'>$col</td>");
                                    }
                                    else {
                                      echo("<td>$col</td>");
                                    }

                                  }
                                  echo("</tr>");
                                }
                            ?>
                        </tbody>
                    </table>
				</div>
				<div class="col-md-2">
				</div>
			</div>
		</div>
	</div>
</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>
