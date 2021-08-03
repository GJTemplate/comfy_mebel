<?php 
/**
* @version      4.8.0 13.08.2013
* @author       MAXXmarketing GmbH
* @package      Jshopping
* @copyright    Copyright (C) 2010 webdesigner-profi.de. All rights reserved.
* @license      GNU/GPL
*/
defined('_JEXEC') or die('Restricted access');
?>
<?php if ($this->allow_review){?>

    <div class="review_header"><?php print _JSHOP_REVIEWS?></div>
    
    <?php foreach($this->reviews as $curr){?>
        <div class="review_item">
            <div>
                <span class="review_user"><?php print $curr->user_name?></span>, 
                <span class='review_time'><?php print formatdate($curr->time);?></span>
            </div>
            <div class="review_text"><?php print nl2br($curr->review)?></div>
        </div>
    <?php }?>
    
    <?php if ($this->display_pagination){?>
        <table class="jshop_pagination">
            <tr>
                <td><div class="pagination"><?php print $this->pagination?></div></td>
            </tr>
        </table>
    <?php }?>
    <?php if ($this->allow_review > 0){?>
    
        <?php JHTML::_('behavior.formvalidation'); ?>
         
        <span class="review"><?php print _JSHOP_ADD_REVIEW_PRODUCT?></span>
        
        <form action="<?php print SEFLink('index.php?option=com_jshopping&controller=product&task=reviewsave');?>" name="add_review" method="post" onsubmit="return validateReviewForm(this.name)">
        
            <input type="hidden" name="product_id" value="<?php print $this->product->product_id?>" />
            <input type="hidden" name="back_link" value="<?php print jsFilterUrl($_SERVER['REQUEST_URI'])?>" />
		    <?php echo JHtml::_('form.token');?>
            
            <div id="jshop_review_write" >
                <div class = "row-fluid">
                    <div>
                        <input type="text" name="user_name" id="review_user_name" class="inputbox" placeholder="<?php print _JSHOP_REVIEW_USER_NAME?>" value="<?php print $this->user->username?>"/>
                    </div>
                </div>
                <div class = "row-fluid">
                    <div>
                        <input type="text" name="user_email" id="review_user_email" class="inputbox" placeholder="<?php print _JSHOP_REVIEW_USER_EMAIL?>" value="<?php print $this->user->email?>" />
                    </div>
                </div>
                <div class = "row-fluid">
                    <div>
                        <textarea name="review" id="review_review" rows="4" cols="40" placeholder="<?php print _JSHOP_REVIEW_REVIEW?>" class="jshop inputbox"></textarea>
                    </div>
                </div>
                <?php print $this->_tmp_product_review_before_submit;?>
                <div class = "row-fluid">
                    <div>
                        <input type="submit" class="btb-lg-z" value="<?php print _JSHOP_REVIEW_SUBMIT?>" />
                    </div>
                </div>
            </div>
        </form>
    <?php }else{?>
        <div class="review_text_not_login"><?php print $this->text_review?></div>
    <?php } ?>
<?php }?>