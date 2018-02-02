<?php


/*$query=$pdo->prepare('SELECT * FROM blog_post ORDER BY id DESC');

$query->execute();

$blogPost=$query->fetchAll(PDO::FETCH_ASSOC);*/
?>


<!DOCTYPE html>
<html>
<head>
	<title>My Blog</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
					<h1>My blog</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8">
				<?php
					foreach($blogPost as $blogPost){ //recorridoDeLosELementosDeLaTabla
						echo'<div class="blog-post">';
						echo'<h2>'.$blogPost['title'].'</h2>';
						echo '<p>Jan 1,2020 by <a href="">Alex</a></p>';
						echo '<div class="blog-post-image"> ';
						echo '<img src="images/keyboard.jpg" height="300px" width="500px">';
						echo '</div>';
						echo '<div class="blog-post-content">';
						echo $blogPost['contenido'];
						echo '</div>';
						echo '</div>';
				}
				?>
			
		    </div>
		    <div class="col-md-4">
		    	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		    	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		    	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		    	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		    	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		    	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		    </div>
			
			<div class="row">
			<div class="col-md-12">
				<footer>
					This is a footer<br>
					<a href="<?php echo BASE_URL;?>admin">Admin Panel</a>
				</footer>	
			</div>
			
			
		</div>
	</div>

</body>
</html>