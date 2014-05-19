<div class="a-navigation" role="navigation">
    <?php 
    $json = $this->load->view('default/navigation_json', '', TRUE);
    echo mapNav(json_decode($json, TRUE), FALSE, 0, $active);
    ?>
</div>
