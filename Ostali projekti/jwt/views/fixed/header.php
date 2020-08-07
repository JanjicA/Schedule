<?php
    session_start();
?>
<body>
    <header>
        <div class="container">
            <div class="row">

                <div class="col-md-4 logo">
                    <a href="index.php"><img src="assets/images/calendar.svg" alt="logo"/></a>
                </div>

                <div class="col-md-4 name">
                    <h3><b><?php
                        if(isset($_SESSION["user"])){
                            echo "WELCOME  " . $_SESSION["user"]->name;
                        }
                    ?> </b></h3>
                </div>

                <div class="col-md-4 dugmici">
                    <?php
                        if(isset($_SESSION["user"])):
                    ?>
                        <a href="models/logout.php"  class="btn">LOGOUT</a>
                    <?php
                        else:
                    ?>
                    <a href="index.php?page=register"  class="btn">REGISTER</a>
                    <a href="index.php?page=login" class="btn">LOGIN</a>
                    <?php
                        endif;
                    ?>

                </div>
            </div>
        </div>
    </header>