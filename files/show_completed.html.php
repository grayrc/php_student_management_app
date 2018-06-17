    <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Student home</title>

    <meta name="description" content="Page showing students completed labs">


    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  </head>
  <body>

    <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-3">
				</div>
				<div class="col-md-6 content">
					<div class="page-header">
						<h1>
							Completed Labs
						</h1>
					</div>
					<div class="row">
						<div class="col-md-5">
                            <h3>Graded labs completed</h3>
						    <?php
                                foreach($completed_lab_array as $entry)
                                {
                                    echo("<h4>$entry</h4> <br>");
                                }
                            ?>
						</div>
						<div class="col-md-2">
						</div>
						<div class="col-md-5">
							<h3>Graded labs still to do</h3>
                            <?php
                                foreach($labs_array as $entry)
                                {
                                    echo("<h4>$entry</h4> <br>");
                                }
                            ?>
						</div>
                        <div class="row">
                            <div class="col-md-10">
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-default" onclick="go_home()">
                                    OK
                                </button>
                            </div>
                        </div>
					</div>
				</div>
				<div class="col-md-3">
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

