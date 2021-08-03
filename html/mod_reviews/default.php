<?php
// No direct access
defined( '_JEXEC' ) or die;
?>
<div class="module_content <?php echo $moduleclass_sfx ?>">
	<div class="header_name"><?=$params['name']?></div>
	<div class="rewiews_list RSWS_testi_block">
		<?php foreach($rewiews as $rewiew){?>
			<div class="rewiews_item">
				<div class="rewiews_image">
					<?php 
						if($rewiew->id > 0) {
							$testi_pic_file = '';
							if(file_exists('images/com_rsmonials/'.$rewiew->id.'.gif')) {
								$testi_pic_file = 'images/com_rsmonials/'.$rewiew->id.'.gif';
							} else if(file_exists('images/com_rsmonials/'.$rewiew->id.'.png')) {
								$testi_pic_file = 'images/com_rsmonials/'.$rewiew->id.'.png';
							} else if(file_exists('images/com_rsmonials/'.$rewiew->id.'.jpg')) {
								$testi_pic_file = 'images/com_rsmonials/'.$rewiew->id.'.jpg';
							} else if(file_exists('images/com_rsmonials/'.$rewiew->id.'.jpeg')) {
								$testi_pic_file = 'images/com_rsmonials/'.$rewiew->id.'.jpeg';
							}
							if($testi_pic_file != '') {
								echo '<img src="'.$testi_pic_file.'">';
							}else{
								echo '<img src="images/logo.png">';
							} 
						} 
						?>
				</div>
				<?php
					$comment = $rewiew->comment;
					$max = 149;
					$count = mb_strlen($comment);
					$mess_first = mb_substr($comment, 0, $max, 'UTF-8');
					$mess_last = mb_substr($comment, $max, $count, 'UTF-8');
					
					$com_html = '';
					if($count > $max){
						$com_html = '<span>' . $mess_first . '</span><span class="reviews_last">' . $mess_last . '</span><a href="javascript:void(0)" class="question_show">Развернуть</a>';
					}else{
						$com_html = $comment;
					}
				?>
				<div class="review_info">
					<div class="review_text"><?=$com_html?></div>
					<div class="review_author"><?=$rewiew->fname?></div>
				</div>
			</div>
		<?php } ?>
		<div class="news_all text-center"><a href="<?=$params['link']?>" class="btn_link"><?=$params['link_name']?></a></div>
	</div>
</div>