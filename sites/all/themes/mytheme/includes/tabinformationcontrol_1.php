<?php function Untitled_tabinformationcontrol_1() { 
?>
   <div class=" bd-tabinformationcontrol-2 tabbable">
    <ul class=" bd-menu-3 nav nav-tabs navbar-left">
    <li class=" bd-menuitem-3">
    <a href="#"><span>Item 1</span></a>
    <a href="#"><span>Item 2</span></a>
    <a href="#"><span>Item 3</span></a>
</li>
</ul>
    <div class=" bd-container-18">
        
        <div class=" bd-productreviews-1">
    <div class=" bd-container-19">
    
    
 </div>
    <div class=" bd-productreview-1">
    <?php Untitled_render_template_from_includes('reviewheader_1', array()); ?>
	
		<?php Untitled_render_template_from_includes('reviewmetadata_1', array()); ?>
	
		<?php Untitled_render_template_from_includes('reviewtext_1', array()); ?>
	
		<?php Untitled_render_template_from_includes('reviewrating_2', array()); ?>
</div>
    <div class=" bd-reviewform-1">
    <h2 class=" bd-container-20">Add review</h2>
    <form action="#" method="post">
        <p>
            <label for="rating">Rating</label>
            <div class=" bd-rating-5">
    <span class=" bd-icon-39"></span>
    <span class=" bd-icon-39"></span>
    <span class=" bd-icon-39"></span>
    <span class=" bd-icon-39"></span>
    <span class=" bd-icon-39"></span>
</div>
        </p>
        <p>
            <label for="author">Author</label>
            <input class=" bd-bootstrapinput form-control" id="author" name="author" type="text" value="" size="30" style="width: 255px">
        </p>
        <p>
            <label for="email">Email</label>
            <input class=" bd-bootstrapinput form-control" id="email" name="email" type="email" value="" size="30" style="width: 255px">
        </p>
        <p>
            <label for="review">Review</label>
            <textarea class=" bd-bootstrapinput form-control" id="review" name="review" cols="45" rows="8" aria-required="true" style="width: 270px"></textarea>
        </p>
        <p>
            <input name="submit" class=" bd-button" type="submit" value="Submit">
        </p>
    </form>
</div>
</div>
    </div>
</div><?php }