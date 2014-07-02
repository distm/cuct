<div class="navbar navbar-masthead navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo admin_url(); ?>">Admin</a>
        </div>
        
        <div class="pull-left">
            <?php 
            $nav_html = '';
            $json = $this->load->view('admin/navigation_json', '', TRUE);
            echo mapNav(json_decode($json, TRUE), FALSE, 0, $active);
            ?>
        </div>
        
        <div class="pull-right">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo base_url('auth/logout'); ?>">Logout</a></li>
            </ul>
        </div>
    </div>
</div>