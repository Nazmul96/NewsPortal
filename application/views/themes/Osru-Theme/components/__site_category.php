<div class="mt-4">
    <div class="sec-block mb-4">
        <a href="category.html" class="sec-title"><?php echo display('category')?> <i class="fa fa-caret-right" aria-hidden="true"></i></a>
    </div>
    <ul class="cat_list">
        <?php foreach($cat as $val){?>
            <li><a href="<?php echo base_url('category/').$val->slug?>/"><?php echo @$val->menu_lavel?> <span><?php echo @$val->total?></span></a></li>
        <?php }?>
    </ul>
</div>