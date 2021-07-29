<!-- Top Left -->
<div class="top-left-part">
                <!-- Logo -->
                <a href="../views/index.php"><img class="img-logo"src="../assets/image/stackoverflow.png"/></a>
                <!-- Search Bar-->
                <div class="search-wrap">
                    <label clas="name-label">
                        <svg class="icon icon-user">
                            <use xlink:href="#icon-user"></use>
                        </svg>
                        <input type="text" name="main-search" id="main-search" placeholder="Search...">
                    </label>
                    <svg class="spritesheet">
                        <symbol id="icon-user" viewBox="0 0 32 32">
                            <title>user</title>
                            <path d="M18 16.5l-5.14-5.18h-.35a7 7 0 10-1.19 1.19v.35L16.5 18l1.5-1.5zM12 7A5 5 0 112 7a5 5 0 0110 0z"></path>
                        </symbol>
                    </svg>
                </div>
                <!-- Search show -->
                <div id="search-show"></div>
            </div>
            <!-- Top Right -->
            <div class="top-right-part">
                <!-- Name Wrap -->
                <div class="topic-name-wrap">
                    <a href="layout-user-login.php?username=<?php echo $profileData->userLink ?>" class="top-pic-name">
                        <!-- User Image -->
                        <div class="user-image"><img src="<?php echo $profileData->profilePic ?>" class="user-image-pic" ></div>
                        <!-- User Name -->
                        <div class="user-name top-css topic-name"><?php echo $profileData->firstName ?></div>
                    </a>
                </div>
                <!-- Notification Icon -->
                <div class="top-iconNotification top-css">
                    <svg aria-hidden="true" class="svg-icon iconInbox notification-svg" width="20" height="18" viewBox="0 0 20 18">
                        <path class="cls-1" d="M4.63 1h10.56a2 2 0 011.94 1.35L20 10.79V15a2 2 0 01-2 2H2a2 2 0 01-2-2v-4.21l2.78-8.44c.25-.8 1-1.36 1.85-1.35zm8.28 12l2-2h2.95l-2.44-7.32a1 1 0 00-.95-.68H5.35a1 1 0 00-.95.68L1.96 11h2.95l2 2h6z"></path>
                    </svg>
                    <!-- Notification List -->
                    <div class="notification-list-wrap">
                        <ul>

                        </ul>
                    </div>
                </div>
                <!-- Help Icon -->
                <div class="top-iconHelp top-css">
                    <svg aria-hidden="true" class="svg-icon iconHelp help-svg" width="18" height="18" viewBox="0 0 18 18">
                        <path class="cls-1" d="M9 1a8 8 0 100 16A8 8 0 009 1zm.81 12.13c-.02.71-.55 1.15-1.24 1.13-.66-.02-1.17-.49-1.15-1.2.02-.72.56-1.18 1.22-1.16.7.03 1.2.51 1.17 1.23zM11.77 8c-.3.34-.65.65-1.02.91l-.53.37c-.26.2-.42.43-.5.69a4 4 0 00-.09.75c0 .05-.03.16-.18.16H7.88c-.16 0-.18-.1-.18-.15.03-.66.12-1.21.4-1.66.4-.49.88-.9 1.43-1.22.16-.12.28-.25.38-.39a1.34 1.34 0 00.02-1.71c-.24-.31-.51-.46-1.03-.46-.51 0-.8.26-1.02.6-.21.33-.18.73-.18 1.1H5.75c0-1.38.35-2.25 1.1-2.76.52-.35 1.17-.5 1.93-.5 1 0 1.79.18 2.49.71.64.5.98 1.18.98 2.12 0 .57-.2 1.05-.48 1.44z"></path>
                    </svg>
                </div>
            </div>
</div>