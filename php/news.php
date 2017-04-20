<html>

<head>
</head>

<body>

<?php

		include ('mysql_connect.php');
		$start=0;
		$limit=5;
		$id=1;
		if(isset($_GET['id']))
		{
			$id=$_GET['id'];
			$start=($id-1)*$limit;
		}
		$result = mysql_query("select * from news_posts ORDER BY id DESC LIMIT $start, $limit");

		if ($result) {
				while ($query2 = mysql_fetch_array($result, MYSQL_ASSOC)) {
						echo
						'<h1><b>'.$query2['title'].'</b> </h1><br />
						<p><i>Published:'.$query2['date'].'</i></p>
						<img height="400" width="650" src="data:image;base64,'. $query2['picture'].'"/></br>
						'.$query2['text'].'<br />';
						echo '<hr>';
				}

				$pomocni=mysql_query("select * from news_posts");
				$rows=mysql_num_rows($pomocni);
				$total=ceil($rows/$limit);
				?>
				<div class="text-center">
				<?php

				echo "<ul class='pagination'>";

				for($i=1;$i<=$total;$i++){
						if($i==$id) {
							echo "<li class='active' ><a href='?id=".$i."'>".$i."</a></li>";
					 	}
							else {
								echo "<li><a href='?id=".$i."'>".$i."</a></li>";
							}
				}
				echo "</ul>";
				?>
			</div>
			<?php
		}
?>
</body>
</html>
