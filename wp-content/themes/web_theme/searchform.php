
<form action="<?php bloginfo('siteurl') ?>" method="get" class="navbar-form navbar-right search-form">
    <div class="input-group">
        <input type="text" class="form-control" name="s" id="s" autocomplete="off" placeholder="Tìm kiếm" aria-describedby="basic-addon1" />
        <input type="hidden" name="post_type" value="product" />
        <span class="input-group-addon" id="basic-addon1"><span class="fa fa-search"></span></span>
        <input type="submit" class="hidden" id="search-submit" />
        <img class="loading" width="24" height="24" src="<?= get_template_directory_uri() ?>/images/loading.gif" />
    </div>

    <div id="result">
        <ul class="list-unstyled">
            
        </ul>
    </div>
</form>