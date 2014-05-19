<div class="a-tab-content">
    <div class="navbar navbar-toolbar navbar-inverse navbar-static-top" role="navigation">
        <div class="container">
            <ul class="nav navbar-nav" id="atc">
                <li class="active"><a href="#atc1">Kabar Terkini</a></li>
                <li><a href="#atc2">Inspirasi</a></li>
                <li><a href="#atc3">Tempat Pelayanan</a></li>
                <li><a href="#atc4">Agenda</a></li>
            </ul>
        </div>
    </div>
    
    <div class="a-tab-body tab-content">
        <div class="tab-pane active" id="atc1">
            <?php $this->load->content('tabc_kabar_terkini'); ?>
        </div>
        <div class="tab-pane" id="atc2">Inspirasi</div>
        <div class="tab-pane" id="atc3">Tempat Pelayanan</div>
        <div class="tab-pane" id="atc4">Agenda</div>
    </div>
</div>

<script>
$(function(){
    $('#atc a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });
});
</script>