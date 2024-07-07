    <aside id="sidebar">
        <div class="d-flex">
            <button class="toggle-btn" type="button">
                <i class="lni lni-grid-alt"></i>
            </button>
            <div class="sidebar-logo">
                <a href="dashboard.php">Xiteb</a>
                <p style="font-size: 0.7rem;color:white; margin:0;">User: <?=$_SESSION["user_login"]["name"]?></p>
                <p style="font-size: 0.7rem;color:white; margin:0;">Usertype: <?php 
                if($_SESSION["user_login"]["usertype"]==0)
                {
                    echo "User";
                }
                else
                {
                    echo "Admin";
                }
                ?></p>
            </div>
        </div>
        <ul class="sidebar-nav">
            <li class="sidebar-item">
                <a href="../Public/dashboard.php" class="sidebar-link">
                    <i class="lni lni-user"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <?php 
            if($_SESSION["user_login"]["usertype"]==0)
            {
                ?>
                <li class="sidebar-item">
                    <a href="../Public/upload-prescription.php" class="sidebar-link">
                        <i class="lni lni-agenda"></i>
                        <span>Upload Prescription</span>
                    </a>
                </li>
                <?php
            }
            ?>
            <li class="sidebar-item">
                <a href="notifications.php" class="sidebar-link">
                    <i class="lni lni-popup"></i>
                    <span>Notification</span>
                </a>
            </li>
        </ul>
        <div class="sidebar-footer">
            <a href="logout.php" class="sidebar-link">
                <i class="lni lni-exit"></i>
                <span>Logout</span>
            </a>
        </div>
    </aside>