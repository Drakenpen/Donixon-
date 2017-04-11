

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <div id="MenuContainer">
        <ul id="navigation">
                    <button><li>
                        <a href="<?php echo URL; ?>home/index">HOME</a>
                    </li></button>
                    <button><li>
                        <a href="<?php echo URL; ?>comments/index">COMMENTIES</a>
                    </li></button>
                    <?php if ( $this->model->IsLoggedInSession()) : ?>
                    <?php if ( $this->model->IsAdmin()) : ?>
                    <button><li>
                        <a href="<?php echo URL; ?>comments/admin">(╯°□°）╯︵ ┻━┻</a>
                    </li></button>
                    <?php endif; ?>
                    <button><li>
                        <a href="<?php echo URL; ?>login/logout">LOGOUT</a>
                    </li></button>
                    <?php endif; ?>
        </ul>
    </div> 
</body>

</html>
