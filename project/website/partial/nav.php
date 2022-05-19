<!-- NAVIGATION -->
<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class="active"><a href="index.php">Home</a></li>
                        <?php
                        include_once '../DB_CONNECTION.php';
                        $query = "SELECT * from category ";
                        $result = mysqli_query($connection, $query);
                        while($row = mysqli_fetch_assoc($result)){
                            $id = $row['id'];
                            echo '<li><a href="show_product.php?category_name='.$row['name'].'">'.$row['name'].'</a></li>';
                        }
                        ?>
						
						
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->