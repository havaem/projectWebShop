<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="profile-image">
                    <img class="img-xs rounded-circle" src="<?php echo $domain."/dashboard/avatar/defaultAvatar.jpg"?>" alt="profile image">
                    <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                    <p class="profile-name"><?=$dataAdmin['name']?></p>
                    <p class="designation"><?=$dataAdmin['permission']==1?"ADMIN 2 LEVEL":"ADMIN LOW LEVEL" ?></p>
                </div>
            </a>
        </li>
        <li class="nav-item nav-category">Main Menu</li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo $domain."/adminZone/pages/dashboard/dashboard.php";?>">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo $domain."/adminZone/pages/controlAccount/";?>">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Quản lý tài khoản</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo $domain."/adminZone/pages/controlProduct/";?>">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Quản lý sản phẩm</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo $domain."/adminZone/pages/controlOrder/";?>">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Quản lý đơn hàng</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo $domain."/adminZone/pages/controlVoucher/";?>">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Quản lý voucher</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo $domain."/adminZone/pages/controlAdmin/";?>">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Quản lý admin</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo $domain."/adminZone/changePassword.php";?>">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Đổi mật khẩu</span>
            </a>
        </li>
    </ul>
</nav>