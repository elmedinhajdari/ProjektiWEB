  <!--Nav Bar-->

  <div id="nav1" class="navbar">
        <div class="container flex">
            <h1 class="logo">Buzz Hosting</h1>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="features.php">Hosting</a></li>
                    <li><a href="aboutus.php">About us</a></li>
                    <!--<li><a href="login.php" >Login</a></li>-->
                    <?php if( isset($_SESSION['username']) && !empty($_SESSION['username']) )
                    {
                    ?>
                      <li><a href="index.php?logout='1'">Logout</a></li>
                    <?php }else{ ?>
                        <li><a href="login.php">Login</a></li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
    </div>