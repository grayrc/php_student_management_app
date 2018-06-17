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

    <meta name="description" content="home page for administrators">

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
						</h1>
					</div>
                    <?php
                        $self = htmlspecialchars ($_SERVER['PHP_SELF']);
                        echo("<form action = '$self' method = 'POST'>");
                    ?>
					<div class="row">
						<div class="col-md-4">
                            <div class="form-group padding-button">
                                <button type="submit" class="btn btn-default big-button" name="show_all_completion">
                                    Show completion<br>for all students
                                </button>
                            </div>
                            <div class="form-group padding-button">
                                <a class="btn btn-default big-button" href="add_student_controller.php">
                                    Add new student
                                </a>
                            </div>
                            <div class="form-group padding-button">
                                <a class="btn btn-default big-button" href='delete_student_controller.php'>
                                    Delete Student
                                </a>
                            </div>
                            <div class="form-group padding-button">
                                <a class="btn btn-default big-button" href='add_admin_controller.php'>
                                    Add administrator
                                </a>
                            </div>
                            <div class="form-group padding-button">
                                <button type="submit" class="btn btn-default big-button" name="logout">
                                    Log Off
                                </button>
                            </div>
						</div>
						<div class="col-md-8">
                            <br>
                            <div class="form-group graph-boxes">
                                <h4>
                                    Scatter graph of one tool for one lab
                                </h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="g1_tool">
                                            Tool
                                        </label>
                                        <select class="form-control" id="g1_tool" name="g1_tool_result">
                                            <option label="empty"> </option>
                                            <option value='1'>Tool 1 - Interest / Difficulty</option>
                                            <option value='2'>Tool 2 - Plan / Novelty</option>
                                            <option value='3'>Tool 3 - Feeling / Improvement</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="g1_lab">
                                            Lab
                                        </label>
                                        <select class="form-control" id="g1_lab" name="g1_lab_result">
                                          <option label="empty"> </option>
                                            <?php
                                            foreach($lab_table as $row)
                                            {
                                                echo("<option value='$row[0]'>$row[0]</option>");
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="padding-graph-button">
                                    <button type="submit" class="btn btn-default graph-button" name="show_graph1">
                                        Show graph
                                    </button>
                                </div>
                            </div>
                            <br>
                            <div class="form-group graph-boxes">
                                <h4>
                                    Scatter graph of one tool for one individual over all completed labs
                                </h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="g2_student">
                                            Student
                                        </label>
                                        <select class="form-control" id="g2_student" name="g2_student_result">
                                          <option label="empty"> </option>
                                            <?php
                                            foreach($student_table as $row)
                                            {
                                                echo("<option value='$row[0]'>$row[0]</option>");
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="g2_tool">
                                            Tool
                                        </label>
                                        <select class="form-control" id="g2_tool" name="g2_tool_result">
                                            <option label="empty"> </option>
                                            <option value='1'>Tool 1 - Interest / Difficulty</option>
                                            <option value='2'>Tool 2 - Plan / Novelty</option>
                                            <option value='3'>Tool 3 - Feeling / Improvement</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="padding-graph-button">
                                    <button type="submit" class="btn btn-default graph-button" name="show_graph2">
                                        Show graph
                                    </button>
                                </div>
                            </div>
                            <br>
                            <div class="form-group graph-boxes">
                                <h4>
                                    Line graph of average response of class for one descriptor over all completed labs
                                </h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="g3_descriptor">
                                            Scale descriptor
                                        </label>
                                        <select class="form-control" id="g3_descriptor" name="g3_descriptor_result">
                                            <option label="empty"> </option>
                                            <option value='1 x_value'>Boring -> Interesting</option>
                                            <option value='1 y_value'>Easy -> Hard</option>
                                            <option value='2 x_value'>Had no plan -> Had a clear plan</option>
                                            <option value='2 y_value'>Content was familiar -> Content was all new</option>
                                            <option value='3 x_value'>Feeling frustrated -> Feeling triumphant</option>
                                            <option value='3 y_value'>Skills have not improved -> Skills have improved</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                    </div>
                                </div>
                                <div class="padding-graph-button">
                                    <button type="submit" class="btn btn-default graph-button" name="show_graph3">
                                        Show graph
                                    </button>
                                </div>
                            </div>
                            <br>
                            <div class="form-group graph-boxes">
                                <h4>
                                    Line graph of one descriptor for one individual over all completed labs
                                </h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="g4_student">
                                            Student
                                        </label>
                                        <select class="form-control" id="g4_student" name="g4_student_result">
                                          <option label="empty"> </option>
                                            <?php
                                            foreach($student_table as $row)
                                            {
                                                echo("<option value='$row[0]'>$row[0]</option>");
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="g4_descriptor">
                                            Tool
                                        </label>
                                        <select class="form-control" id="g4_descriptor" name="g4_descriptor_result">
                                            <option label="empty"> </option>
                                            <option value='1 x_value'>Boring -> Interesting</option>
                                            <option value='1 y_value'>Easy -> Hard</option>
                                            <option value='2 x_value'>Had no plan -> Had a clear plan</option>
                                            <option value='2 y_value'>Content was familiar -> Content was all new</option>
                                            <option value='3 x_value'>Feeling frustrated -> Feeling triumphant</option>
                                            <option value='3 y_value'>Skills have not improved -> Skills have improved</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="padding-graph-button">
                                    <button type="submit" class="btn btn-default graph-button" name="show_graph4">
                                        Show graph
                                    </button>
                                </div>
                            </div>
						</div>
					</div>
                    </form>
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
