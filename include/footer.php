<div class="footer-part">
    <ul>
        <li>
            <a href="index.php">
                <img src="images/home.png" alt="" style="height: 22px;">
                <img src="images/home.png" alt="" style="height: 22px;">
            </a>
        </li>
        <li>
            <a href="category.php">
                <img src="images/master.svg" alt="">
                <img src="images/master-active.svg" alt="">
            </a>
        </li>
        <li>
            <a href="comment.php">
                <img src="images/messages.svg" alt="">
                <img src="images/messages-active.svg" alt="">
            </a>
        </li>
        <?php
        if(isset($_SESSION['id'])){
            ?>
            <li>
                <a href="job_details.php">
                    <img src="images/user.svg" alt="">
                    <img src="images/user-active.svg" alt="">
                </a>
            </li>
            <?php
        }
        ?>
        <!--<li>
            <a href="settings.php">
                <img src="images/settings.svg" alt="">
                <img src="images/settings-active.svg" alt="">
            </a>
        </li>-->
    </ul>
</div>