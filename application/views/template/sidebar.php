<?php
$uri = $this->uri->segment(2);

if ($uri == 'home') {
    $dashboard      = 'active';
    $meta           = '';
    $family         = '';
    $table          = '';
    $invite         = '';
    $arrive         = '';
    $users          = '';
} elseif ($uri == 'meta') {
    $dashboard      = '';
    $meta           = 'active';
    $family         = '';
    $table          = '';
    $invite         = '';
    $arrive         = '';
    $users          = '';
} elseif ($uri == 'family') {
    $dashboard      = '';
    $meta           = '';
    $family         = 'active';
    $table          = '';
    $invite         = '';
    $arrive         = '';
    $users          = '';
} elseif ($uri == 'table') {
    $dashboard      = '';
    $meta           = '';
    $family         = '';
    $table          = 'active';
    $invite         = '';
    $arrive         = '';
    $users          = '';
} elseif ($uri == 'invite') {
    $dashboard      = '';
    $meta           = '';
    $family         = '';
    $table          = '';
    $invite         = 'active';
    $arrive         = '';
    $users          = '';
} elseif ($uri == 'arrive') {
    $dashboard      = '';
    $meta           = '';
    $family         = '';
    $table          = '';
    $invite         = '';
    $arrive         = 'active';
    $users          = '';
} elseif ($uri == 'users') {
    $dashboard      = '';
    $meta           = '';
    $family         = '';
    $table          = '';
    $invite         = '';
    $arrive         = '';
    $users          = 'active';
} else {
    $dashboard      = '';
    $meta           = '';
    $family         = '';
    $table          = '';
    $invite         = '';
    $arrive         = '';
    $users          = '';
}
?>
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu page-sidebar-menu-accordion-submenu page-sidebar-menu-light" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="start <?=$dashboard;?>">
                <a href="<?=site_url('admin/home');?>">
                <i class="icon-home"></i>
                <span class="title">Dashboard</span>
                </a>
            </li>
            <li class="<?=$meta;?>">
                <a href="<?=site_url('admin/meta');?>">
                <i class="icon-settings"></i>
                <span class="title">Application</span>
                </a>
            </li>
            <li class="<?=$family;?>">
                <a href="<?=site_url('admin/family');?>">
                <i class="icon-users"></i>
                <span class="title">Family</span>
                </a>
            </li>
            <li class="<?=$table;?>">
                <a href="<?=site_url('admin/table');?>">
                <i class="icon-layers"></i>
                <span class="title">Table</span>
                </a>
            </li>
            <li class="<?=$invite;?>">
                <a href="<?=site_url('admin/invite');?>">
                <i class="icon-envelope"></i>
                <span class="title">Invitation</span>
                </a>
            </li>
            <li class="<?=$arrive;?>">
                <a href="<?=site_url('admin/arrive');?>">
                <i class="fa fa-exchange"></i>
                <span class="title">Arrival</span>
                </a>
            </li>
            <li class="<?=$users;?>">
                <a href="<?=site_url('admin/users');?>">
                <i class="fa fa-users"></i>
                <span class="title">Users</span>
                </a>
            </li>
        </ul>
    </div>
</div>