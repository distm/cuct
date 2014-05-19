<div class="a-tab-news">
    <ul class="nav nav-tabs nav-justified" id="atn">
        <li class="active"><a href="#lokal">Lokal</a></li>
        <li><a href="#nasional">Nasional</a></li>
        <li><a href="#internasional">Internasional</a></li>
    </ul>
    
    <div class="a-tab-body tab-content">
        <div class="tab-pane active" id="lokal">
            <?php $this->load->content('tabn_lokal'); ?>
        </div>
        <div class="tab-pane" id="nasional">Nasional</div>
        <div class="tab-pane" id="internasional">Internasional</div>
    </div>
</div>

<script>
$(function(){
    $('#atn a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });
});
</script>