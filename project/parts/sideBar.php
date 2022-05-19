<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item"><a href="index.php"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main">Dashboard</span></a>
            </li>
            <li class=" nav-item"><a href="#"><i class="la la-television"></i><span class="menu-title" data-i18n="nav.templates.main">Category</span><span
                            class="badge badge badge-info badge-pill float-right mr-2">
                        <?php
                        include_once "DB_CONNECTION.php";
                        $query="SELECT * from Category";
                        $result=mysqli_query($connection,$query);
                        echo mysqli_num_rows($result);

                        ?>
</span></a>
                <ul class="menu-content">
                    <ul class="menu-content">
                        <li><a class="menu-item" href="addCategory.php" data-i18n="nav.templates.horz.classic">Add New Category</a>
                        </li>
                        <li><a class="menu-item" href="show_all_category.php" data-i18n="nav.templates.horz.top_icon">Show All Category</a>
                        </li>
                    </ul>

                </ul>
                <li class=" nav-item"><a href="#"><i class="la la-television"></i>Admin
               
                          
                    <ul class="menu-content">
                        <li><a class="menu-item" href="Add_new_Admin.php" data-i18n="nav.templates.horz.classic">Add New Admin</a>
                        </li>
                        <li><a class="menu-item" href="show_all_Admin.php" data-i18n="nav.templates.horz.top_icon">Show All Admin</a>
                        </li>
                    </ul>              
</span></a>
            </li>
            <li class=" nav-item"><a href="#"><i class="la la-television"></i>Stors
               
                          
               <ul class="menu-content">
                   <li><a class="menu-item" href="Add_new_Stor.php" data-i18n="nav.templates.horz.classic">Add New Stor</a>
                   </li>
                   <li><a class="menu-item" href="show_All_Stor.php" data-i18n="nav.templates.horz.top_icon">Show All Stor</a>
                   </li>
               </ul>

         
                
</span></a>
       </li>
            

    </div>
</div>
