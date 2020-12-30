<!doctype html>

<html lang="en">

<head>
	<meta charset="utf-8">
	<title>MPA</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
	<?php require('config.php'); ?>
	<?php
	session_start();
	require('menu.php'); ?>
	<div id="global">
		<div id="contenu">

			<h2>HOMEPAGE</h2>
			<?php
			if (isset($_SESSION['login'])) {
				echo 'Bonjour ' . $_SESSION['login'] . '<br>';

				$login = $_SESSION['login'];
				$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
				$query = "SELECT * from user where login='$login' and level = 1";
				$level = "";
				$result = mysqli_query($conn, $query);
				$level = mysqli_num_rows($result);
				$conn->close();

				if ($level === 1) {
			?>
					<!-- Modal -->
					<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#addtitle">Add new content</button>
					<div class="modal fade" id="addtitle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Add a content</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>

								<form action="" method="POST">
									<div class="modal-body">

										<div class="form-group">
											<label>Title</label>
											<input type="text" class="form-control" id="title" placeholder="Enter title">
										</div>

										<div class="form-group">
											<label>Year</label>
											<input type="integer" class="form-control" id="year" placeholder="Year">
										</div>

										<div class="form-group">
											<label for="studio">Studio</label>
											<select id="studio" name="studio">
												<?php
												$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
												$query = "SELECT name FROM studio";
												$queryResult = $conn->query($query);
												while ($queryRow = $queryResult->fetch_row()) { ?>
													<option value="<?php echo $queryRow[0]; ?>"> <?php echo $queryRow[0]; ?></option>
												<?php }
												$conn->close();
												?>
											</select>
										</div>

										<div class="form-group">
											<label>Imdb</label>
											<input type="integer" class="form-control" id="imdb_id" placeholder="imdb">
										</div>

									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="button" class="btn btn-primary" onclick="addContent();refreshPage();" data-dismiss="modal">Add</button>
									</div>

								</form>
							</div>
						</div>


					</div>



			<?php
				}
			}

			?>

			<div id="tableMovies">
				<p> Table of the movies</p>

				<center>
					<?php
					$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
					$query = 'SELECT c.title as title,c.year as cyear,c.imdb_id as cimdb ,s.name as sname ,cat.name as catname FROM content c, studio s,category cat WHERE c.studio=s.id and cat.id=s.category ORDER BY c.id';
					$queryResult = $conn->query($query);
					echo '<table>
			<tr>
			<td>Title</td>
			<td>Production Year</td>
			<td>IMDB ID</td>
			<td>Studio Name</td>
			<td>Member Of</td>
			</tr>';
					while ($queryRow = $queryResult->fetch_row()) {
						echo "<tr>";
						for ($i = 0; $i < $queryResult->field_count; $i++) {
							echo "<td>$queryRow[$i]</td>";
						}
						echo "</tr>";
					}
					echo "</table>";
					$conn->close();
					?></center>

			</div>

			<div id="tableInfringing">
				<p> Table of the infringings</p>
				<center>
					<?php
					$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
					$query = 'SELECT d.name as domainName,l.url as lurl,c.title as title,s.name as sname
				from domain d,link l, content c, studio s
				where c.studio=s.id and l.content=c.id and l.domain=d.id';

					$queryResult = $conn->query($query);
					echo '<table>
				<tr>
				<td>Domain</td>
				<td>URL Year</td>
				<td>Title</td>
				<td>Studio</td>
				</tr>';
					while ($queryRow = $queryResult->fetch_row()) {
						echo "<tr>";
						for ($i = 0; $i < $queryResult->field_count; $i++) {
							echo "<td>$queryRow[$i]</td>";
						}
						echo "</tr>";
					}
					echo "</table>";


					$conn->close();

					?></center>
				</p>
			</div>

		</div><!-- #contenu -->



		<div id="pied">

		</div><!-- #pied -->
	</div><!-- #global -->
	<script type="text/javascript" src="js/add.js"></script>
	<script type="text/javascript" src="js/common.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>