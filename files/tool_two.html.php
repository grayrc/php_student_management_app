<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Student home</title>

    <meta name="description" content="student lab completion tool 1">


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
							Tool Two
						</h1>
          </div>
					<h3>Click on the point which best describes your opinion of todays lesson</h3>
          <div class="row">
              <div class="col-md-2">
              </div>
              <div class="col-md-8">

                  <div class="row">
                      <div class="col-md-2">
                          <p class="center-vert">I had no plan</p>
                      </div>
                      <div class="col-md-8">
                          <p class="center-hor">Content was all new</p>
                          <?php
                              $self = htmlspecialchars ($_SERVER['PHP_SELF']);
                              echo("<form action = '$self' method = 'POST'>");
                          ?>
                              <?php

                              for($i = 10; $i > -10; $i--)
                              {
                                  for($j = -10; $j < 10; $j++)
                                  {
                                      //echo("<input type='radio' name='tool2' value='$i $j'>");
                                      echo("<span class='checkmark'><input class='radio-tool' type='radio' name='tool2' value='$i $j'></span>");
                                  }
                              echo("<br>");
                              }
                              ?>
                              <p class="center-hor">Content was all familiar</p>
                              <br>

                              <button type="submit" class="btn btn-default" name="tool2_submit">
                                                  Submit
                                              </button>
                              <button type="submit" class="btn btn-default" name="tool2_skip">
                                                  Skip
                                              </button>
                          </form>

                      </div>
                      <div class="col-md-2">
                          <p class="center-vert">I had no a clear plan</p>
                      </div>
                  </div>
              </div>
              <div class="col-md-2">
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
