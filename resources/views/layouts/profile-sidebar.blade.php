
<div class="profile-box-username">{{auth()->user()->name}}</div>
<div class="profile-box-tabs">
    <a href="" class="profile-box-tab profile-box-tab-access">
        <i class="now-ui-icons ui-1_lock-circle-open"></i>
        تغییر رمز
    </a>
    <a href="#" class="profile-box-tab profile-box-tab--sign-out">
        <i class="now-ui-icons media-1_button-power"></i>
        خروج از حساب
    </a>
</div>
</div>
<div class="responsive-profile-menu show-md">
    <div class="btn-group">
        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-navicon"></i>
            حساب کاربری شما
        </button>
        <div class="dropdown-menu dropdown-menu-right text-right">
            <a href="profile.html" class="dropdown-item active-menu">
                <i class="now-ui-icons users_single-02"></i>
                پروفایل
            </a>
            <a href="profile-orders.html" class="dropdown-item">
                <i class="now-ui-icons shopping_basket"></i>
                همه سفارش ها
            </a>
            <a href="profile-orders-return.html" class="dropdown-item">
                <i class="now-ui-icons files_single-copy-04"></i>
                درخواست مرجوعی
            </a>
            <a href="profile-favorites.html" class="dropdown-item">
                <i class="now-ui-icons ui-2_favourite-28"></i>
                لیست علاقمندی ها
            </a>
            <a href="profile-personal-info.html" class="dropdown-item">
                <i class="now-ui-icons business_badge"></i>
                اطلاعات شخصی
            </a>
        </div>
    </div>
</div>
<div class="profile-menu hidden-md">
    <div class="profile-menu-header">حساب کاربری شما</div>
    <ul class="profile-menu-items">
        <li>
            <a href="{{route('profile')}}" {{request()->is('profile') ? 'class=active' :''}}>
                <i class="now-ui-icons users_single-02"></i>
                پروفایل
            </a>
        </li>
        <li>
            <a href="#">
                <i class="now-ui-icons shopping_basket"></i>
                همه سفارش ها
            </a>
        </li>
        <li>
            <a href="#">
                <i class="now-ui-icons ui-2_favourite-28"></i>
                لیست علاقمندی ها
            </a>
        </li>
        <li>
            <a href="#">
                <i class="now-ui-icons business_badge"></i>
                اطلاعات شخصی
            </a>
        </li>
        <li>
            <a href="{{route('twoFactorAuth')}}" {{request()->is('profile/twoFactor') ? 'class=active' :''}}>
                <i class="now-ui-icons business_badge"></i>
                احراز هویت دو مرحله ای
            </a>
        </li>
    </ul>
</div>
