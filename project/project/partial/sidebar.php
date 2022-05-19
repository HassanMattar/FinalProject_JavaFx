<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item"><a href="index.php"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main">Dashboard</span></a>
            </li>
            <li class=" nav-item"><a href="#"><i class="la la-television"></i><span class="menu-title" data-i18n="nav.templates.main">Category</span><span
                            class="badge badge badge-info badge-pill float-right mr-2">
                        <?php
                        include_once "DB_CONNECTION.php";
                        $query="SELECT * from categories";
                        $result=mysqli_query($connection,$query);
                        echo mysqli_num_rows($result);

                        ?>
</span></a>
                <ul class="menu-content">
                    <ul class="menu-content">
                        <li><a class="menu-item" href="add_category.php" data-i18n="nav.templates.horz.classic">Add New Category</a>
                        </li>
                        <li><a class="menu-item" href="show_all_category.php" data-i18n="nav.templates.horz.top_icon">Show All Category</a>
                        </li>
                    </ul>

                </ul>
            </li>



            <li class=" nav-item"><a href="#"><i class="la la-television"></i><span class="menu-title" data-i18n="nav.templates.main">Product</span><span
                            class="badge badge badge-info badge-pill float-right mr-2">
                        <?php
                        include_once "DB_CONNECTION.php";
                        $query="SELECT * from product";
                        $result=mysqli_query($connection,$query);
                        echo mysqli_num_rows($result);

                        ?>
</span></a>
                <ul class="menu-content">
                    <ul class="menu-content">
                        <li><a class="menu-item" href="add_Product.php" data-i18n="nav.templates.horz.classic">Add New Product</a>
                        </li>
                        <li><a class="menu-item" href="show_Product.php" data-i18n="nav.templates.horz.top_icon">Show All Product</a>
                        </li>
                    </ul>

                </ul>
            </li>


            <li class=" nav-item"><a href="#"><i class="la la-television"></i><span class="menu-title" data-i18n="nav.templates.main">Stores</span><span
                            class="badge badge badge-info badge-pill float-right mr-2">
                        <?php
                        include_once "DB_CONNECTION.php";
                        $query="SELECT * from stores";
                        $result=mysqli_query($connection,$query);
                        echo mysqli_num_rows($result);

                        ?>
</span></a>
                <ul class="menu-content">
                    <ul class="menu-content">
                        <li><a class="menu-item" href="add_stores.php" data-i18n="nav.templates.horz.classic">Add New Stores</a>
                        </li>
                    </ul>

                </ul>
            </li>



    </div>
</div>
