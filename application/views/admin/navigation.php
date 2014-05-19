<div class="navbar navbar-masthead navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Admin</a>
        </div>
        
        <?php 
        $nav_html = '';
        $json = $this->load->view('admin/navigation_json', '', TRUE);
        echo mapNav(json_decode($json, TRUE), FALSE, 0, $active);
        ?>
    </div>
</div>