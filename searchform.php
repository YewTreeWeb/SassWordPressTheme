<?php
/*
Template Name: Search Form
*/
?>

<form method="get" class="navbar-form" role="search" id="searchform" action="<?php bloginfo('home'); ?>/">
    <div class="form-group right-inner-addon">
        <input type="text" class="form-control" name="s" id="s" placeholder="Type here" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/>
        <button id="searchsubmit" value="Search" type="submit"><i class="glyphicon glyphicon-search"></i></button>
        <?php /*<input type="submit" id="searchsubmit" value="Search" class="btn" />*/ ?>
    </div>
</form>
