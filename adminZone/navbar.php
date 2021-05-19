<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="index.html">
            <!-- <img src="./assets/images/logo.svg" alt="logo" /> </a> -->
            TECHSHOP
            <a class="navbar-brand brand-logo-mini" href="index.html">
                <!-- <img src="./assets/images/logo-mini.svg" alt="logo" /> </a> -->
                <img src="<?php echo $domain."/assets/image/icon.png";?>" alt="logo" />
            </a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav">
            <li class="nav-item font-weight-semibold d-none d-lg-block">Hỗ trợ : +84354714955</li>
        </ul>
        <!--<form class="ml-auto search-form d-none d-md-block" action="#">
            <div class="form-group">
              <input type="search" class="form-control" placeholder="Search Here">
            </div>
          </form> -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
                <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                    <img class="img-xs rounded-circle" src="<?php echo $domain."/dashboard/avatar/defaultAvatar.jpg"?>" alt="Profile image"> </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                    <div class="dropdown-header text-center">
                        <img class="img-md rounded-circle" src="<?php echo $domain."/dashboard/avatar/defaultAvatar.jpg"?>" alt="Profile image">
                        <p class="mb-1 mt-3 font-weight-semibold"><?=$dataAdmin['name']?></p>
                        <p class="font-weight-light text-muted mb-0">4501104147</p>
                    </div>
                    <a href="<?php echo $domain."/adminZone/actions/actionLogOut.php";?>" class="dropdown-item" style="cursor: pointer;">Sign Out<i class="dropdown-item-icon ti-power-off"></i></a>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>