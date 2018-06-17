<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Student home</title>

    <meta name="description" content="home page for students for using lab completion tools">


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
							Lab Completion Tool
						</h1>
					</div>
					<div class="row">
						<div class="col-md-5">
						<h3>
							Lab Completed
						</h3>
							<?php
								$self = htmlspecialchars ($_SERVER['PHP_SELF']);
								echo("<form action = '$self' method = 'POST'>");
							?>
							<fieldset>
								<div class="form-group">

									<label for="student_name">
										Name
									</label>
									<select class="form-control" id="student_name" name="name_result">
										<option label="empty"></option>
										<?php
											foreach($name_table as $row)
											{
												echo("<option value='$row[0]'>$row[0]</option>");
											}
										?>
									</select>
								</div>
								<div class="form-group">

									<label for="lab_id">
										Lab
									</label>
									<select class="form-control" id="lab_id" name="lab_result">
										<option label="empty"></option>
										<?php
											foreach($lab_table as $row)
											{
												echo("<option value='$row[0]'>$row[0]</option>");
											}
										?>
									</select>
								</div>
								<div class="form-group">

									<label for="password">
										Password
									</label>
									<input class="form-control" id="password" name="password_result" type="password" required>
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-default" name="submit">
										Submit
									</button>
								</div>
							</fieldset>
							</form>
						</div>
						<div class="col-md-2">
						</div>
						<div class="col-md-5">
							<h3>
								Show Completed Labs
							</h3>
							<?php
								$self = htmlspecialchars ($_SERVER['PHP_SELF']);
								echo("<form action = '$self' method = 'POST'>");
							?>
								<div class="form-group">

									<label for="student_id">
										Student ID Number
									</label>
									<input class="form-control" id="student_id" name="id_result" value="<?php echo $student_id ?>">
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-default" name="show_labs">
										Show Completed Labs
									</button>
								</div>
							</form>
						</div>
					</div>
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
