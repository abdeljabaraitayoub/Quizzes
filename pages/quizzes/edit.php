<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Editing</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    
    <div class="modal-dialog">
		<div class="modal-content">		
            
              <?php
              require 'connection.php';
              if (isset($_GET['id'])){
                $id = $_GET['id'];
                $requet="SELECT * FROM quizzes where id = $id";
                $q=mysqli_query($con,$requet);
                $value = mysqli_fetch_assoc($q);
              }
              ?>

            <form method="POST" action="page.php?<?php echo "id=imHere" ?>">  
		    	<input type="hidden" name="id" value="<?php echo $_GET['id']?>">
			
			       <div class="modal-header">						
		    			<h4 class="modal-title">edit QUIZZES</h4>
		    			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		    		</div>
		    		<div class="modal-body">					
		    			<div class="form-group">
		    				<label>QUIZZE title</label>
                            <input type="text" class="form-control" name="quizzeTitle" value="<?php echo $value['quizzeTitle'];?>" required>
		    			</div>
		    			<div class="form-group">
		    				<label>Cource ID</label>
                               
                                <select class='form-control' name = 'courseId' value="<?php echo $value['course_id'];?>"  required>";
                                <?php
                                $requet2 = "SELECT * FROM courses";
                                $query= mysqli_query($con,$requet2);
                                while ($value1 = mysqli_fetch_assoc($query)){   
                                echo "<option>" . $value1['courseId'] . "</option>" ;
                                }
                                ?>
                                </select>     		
                        </div>
		    			<div class="form-group">    
		    				<label>Score</label>
		    				<input type="number" class="form-control" name="score" value="<?php echo $value['score'];?>"  required></input>
		    			</div>
		    			<div class="form-group">
		    				<label>la Date</label>
		    				<input type="text" class="form-control" name="date" value="<?php echo $value['dateHour'];?>" required>
		    			</div>					
		    		</div>
		    		<div class="modal-footer">
		    			<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
		    			<input type="submit" class="btn btn-success" value="Edit">
		    		</div>
		    </form>
		</div>
	</div>

</body>
</html>
