<header class="header">
		<div class="header_main">
			<div class="container">
				<div class="row">

					<div class="col-lg-2 col-sm-3 col-3 order-1">
						<div class="logo_container">
							<div class="logo"><a href="index.php">Book.id</a></div>
						</div>
					</div>

					<div class="col-lg-6 col-12 order-lg-2">
						<div class="">
							<div class="">
								<div class="">
									<form>
										<div class="">
											<div class="custom_dropdown_list">
												<span class="custom_dropdown_placeholder clc">
												</span>
												
												<ul class="custom_list clc">
												</ul>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
						<div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">						

							<div class="cart">
								<div class="cart_container d-flex flex-row align-items-center justify-content-end">
									<div class="cart_icon">
										<img src="images/cart.png" alt="">
										<div class="cart_count"><span></span></div>
									</div>		

									<div class="cart_content">
										<div class="cart_text"><a href="keranjang.php">Keranjang</a></div>
										<div class="cart_price"></div>
									</div>
								</div>
							</div>

							<div class="row">
									<div class="col d-flex flex-row">
										<div class="top_bar_content ml-auto">
										
											<div class="top_bar_user">
											
												<div class="user_icon"><img src="images/user.svg" alt=""></div>
												<?php if (isset($_SESSION["pelanggan"])): ?>
												
												<div>
												<!-- <a href="nota.php?id=<?php echo $detail['id_pelanggan']; ?>">Order</a></div> -->
												<div><a href="logout.php">Sign Out</a></div>
												
												<?php else: ?>
												<div><a href="daftar.php">Register</a></div>
												<div><a href="login.php">Sign in</a></div>
												<?php endif ?>
											
											</div>
										</div>
									</div>
								</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<nav class="main_nav">
			<div class="container">
				<div class="row">
					<div class="col">
						
						<div class="main_nav_content d-flex flex-row">
							<div class="cat_menu_container">
								<div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
									<div class="cat_menu_text">MENU</div>
								</div>
							</div>

							<div class="main_nav_menu ml-auto">
								<ul class="standard_dropdown main_nav_dropdown">
									<li><a href="index.php">Beranda<i class="fas fa-chevron-down"></i></a></li>
									<li><a href="buku.php">Buku<i class="fas fa-chevron-down"></i></a></li>
									<li><a href="penulis.php">Penulis<i class="fas fa-chevron-down"></i></a></li>
									<li><a href="penerbit.php">Penerbit<i class="fas fa-chevron-down"></i></a></li>
									<li><a href="contact.php">Hubungi kami<i class="fas fa-chevron-down"></i></a></li>
								</ul>
							</div>

							<div class="menu_trigger_container ml-auto">
								<div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
									<div class="menu_burger">
										<div class="menu_trigger_text">menu</div>
										<div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</nav>
		
		<!-- Menu -->
<div class="page_menu">
			<div class="container">
				<div class="row">
					<div class="col">
						
						<div class="page_menu_content">
							
							<div class="page_menu_search">
								<form action="#">
									<input type="search" required="required" class="page_menu_search_input" placeholder="Search for products...">
								</form>
							</div>
							<ul class="page_menu_nav">
								<li class="page_menu_item has-children">
									<a href="#">Language<i class="fa fa-angle-down"></i></a>
									<ul class="page_menu_selection">
										<li><a href="#">English<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Italian<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Spanish<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Japanese<i class="fa fa-angle-down"></i></a></li>
									</ul>
								</li>
								<li class="page_menu_item has-children">
									<a href="#">Currency<i class="fa fa-angle-down"></i></a>
									<ul class="page_menu_selection">
										<li><a href="#">US Dollar<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">EUR Euro<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">GBP British Pound<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">JPY Japanese Yen<i class="fa fa-angle-down"></i></a></li>
									</ul>
								</li>
								<li class="page_menu_item">
									<a href="index.html">Home<i class="fa fa-angle-down"></i></a>
								</li>
								<li class="page_menu_item has-children">
									<a href="#">Super Deals<i class="fa fa-angle-down"></i></a>
									<ul class="page_menu_selection">
										<li><a href="#">Super Deals<i class="fa fa-angle-down"></i></a></li>
										<li class="page_menu_item has-children">
											<a href="#">Menu Item<i class="fa fa-angle-down"></i></a>
											<ul class="page_menu_selection">
												<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
												<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
												<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
												<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
											</ul>
										</li>
										<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
									</ul>
								</li>
								<li class="page_menu_item has-children">
									<a href="#">Featured Brands<i class="fa fa-angle-down"></i></a>
									<ul class="page_menu_selection">
										<li><a href="#">Featured Brands<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
									</ul>
								</li>
								<li class="page_menu_item has-children">
									<a href="#">Trending Styles<i class="fa fa-angle-down"></i></a>
									<ul class="page_menu_selection">
										<li><a href="#">Trending Styles<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
									</ul>
								</li>
								<li class="page_menu_item"><a href="blog.html">blog<i class="fa fa-angle-down"></i></a></li>
								<li class="page_menu_item"><a href="contact.html">contact<i class="fa fa-angle-down"></i></a></li>
							</ul>
							
							<div class="menu_contact">
								<div class="menu_contact_item"><div class="menu_contact_icon"><img src="images/phone_white.png" alt=""></div>+38 068 005 3570</div>
								<div class="menu_contact_item"><div class="menu_contact_icon"><img src="images/mail_white.png" alt=""></div><a href="mailto:fastsales@gmail.com">fastsales@gmail.com</a></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>