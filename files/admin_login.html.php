<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Student home</title>

    <meta name="description" content="Administrator login page">

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
							Administrator log in
						</h1>
					</div>
                    <div class="row">
                        <div class="col-md-6">
                            <?php
                            $self = htmlspecialchars ($_SERVER['PHP_SELF']);
                            echo("<form action = '$self', method = 'POST'>");
                            ?>
                                <fieldset>
                                    <div class="form-group">
                                            
                                        <label for="user_name">
                                            User Name
                                        </label>
                                        <input class="form-control" id="user_name" name="user_name_result" required>
                                    </div>
                                    <div class="form-group">
                                            
                                        <label for="password">
                                            Password
                                        </label>
                                        <input class="form-control" id="password" name="password_result" type="password" required>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-default" name="submit">
                                            Log in
                                        </button>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                        <div class="col-md-6">
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

