          
<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li class="active"><a href="<?= base_url('admin') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?= base_url('admin/posts') ?>"><i class="fa fa-bar-chart-o"></i> Posts</a></li>
        <li><a href="<?= base_url('admin/pages') ?>"><i class="fa fa-table"></i> Pages</a></li>
        <li><a href="<?= base_url('admin/categories') ?>"><i class="fa fa-edit"></i> Categories</a></li>
        <li><a href="<?= base_url('admin/displays') ?>"><i class="fa fa-font"></i> Display</a></li>
        <li><a href="<?= base_url('admin/settings') ?>"><i class="fa fa-desktop"></i> Setting </a></li>
        <li><a href="<?= base_url('admin/faq') ?>"><i class="fa fa-wrench"></i> FAQ</a></li>
        <li><a href="<?= base_url('admin/about') ?>"><i class="fa fa-file"></i> About</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right navbar-user">
        <li class="dropdown messages-dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> Messages <span class="badge">7</span> <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li class="dropdown-header">7 New Messages</li>
                <li class="message-preview">
                    <a href="#">
                        <span class="avatar"><img src="http://placehold.it/50x50"></span>
                        <span class="name">John Smith:</span>
                        <span class="message">Hey there, I wanted to ask you something...</span>
                        <span class="time"><i class="fa fa-clock-o"></i> 4:34 PM</span>
                    </a>
                </li>
                <li class="divider"></li>
                <li class="message-preview">
                    <a href="#">
                        <span class="avatar"><img src="http://placehold.it/50x50"></span>
                        <span class="name">John Smith:</span>
                        <span class="message">Hey there, I wanted to ask you something...</span>
                        <span class="time"><i class="fa fa-clock-o"></i> 4:34 PM</span>
                    </a>
                </li>
                <li class="divider"></li>
                <li class="message-preview">
                    <a href="#">
                        <span class="avatar"><img src="http://placehold.it/50x50"></span>
                        <span class="name">John Smith:</span>
                        <span class="message">Hey there, I wanted to ask you something...</span>
                        <span class="time"><i class="fa fa-clock-o"></i> 4:34 PM</span>
                    </a>
                </li>
                <li class="divider"></li>
                <li><a href="#">View Inbox <span class="badge">7</span></a></li>
            </ul>
        </li>
        <li class="dropdown alerts-dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> Alerts <span class="badge">3</span> <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="#">Default <span class="label label-default">Default</span></a></li>
                <li><a href="#">Primary <span class="label label-primary">Primary</span></a></li>
                <li><a href="#">Success <span class="label label-success">Success</span></a></li>
                <li><a href="#">Info <span class="label label-info">Info</span></a></li>
                <li><a href="#">Warning <span class="label label-warning">Warning</span></a></li>
                <li><a href="#">Danger <span class="label label-danger">Danger</span></a></li>
                <li class="divider"></li>
                <li><a href="#">View All</a></li>
            </ul>
        </li>
        <li class="dropdown user-dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?=$this->session->userdata('username')?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                <li><a href="#"><i class="fa fa-envelope"></i> Inbox <span class="badge">7</span></a></li>
                <li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
                <li class="divider"></li>
                <li><a href="#"><i class="fa fa-power-off"></i> Log Out</a></li>
            </ul>
        </li>
    </ul>

</div><!-- /.navbar-collapse -->