<?php

/*
Template name: Download Gate
*/
get_header(); 
the_post();
//$terms = get_the_terms($post->ID, 'use_types');

$type = wp_get_post_terms($post->ID,'download_type');
$cta = get_field('call_to_action');
$form_descr= get_field('form_descr');

if(!$cta){
	$cta = "Submit form to download file.";
}
$gateFileType = get_field('type_of_download', $postID);
$gateFile = get_field('download_file', $postID);


if(!$gateFile && ($gateFileType == 'file')){
	$gtfiletype = 'submit';
}




$type  = $type[0]->slug;

$app_img = get_field('download_thumbnail');
$app_img= $app_img['sizes']['clients-thumb'];

$form_name = get_field('form_name');

if(!$form_name){
	$form_name = 'gt';
}



?>

<div id="content" class="content group wrapper subpage-mantle gated-content <?= $type ?>">
	<div class="shadow-wrapper">
		<div class="content">
		
			<h1 class="<?= $type ?>"><?php the_field('main_headline'); ?></h1>
			<div class="clmns">
				<div class="clmn clmns-l"><?php the_content(); ?></div>
				<div class="clmn clmns-r <?= $form_name ?>"><img src="<?= $app_img ?>" /></div>
			</div>
		</div>

		<iframe src="/salesforce-contact-form?tp=<?= $form_name ?>&formtitle=<?= $cta ?>&formdescr=<?= $form_descr ?>&gttype=<?= $type  ?>&gttitle=<?= $post->post_title ?>&gtfiletype=<?= $gtfiletype ?>" class="frame-cf" frameBorder="0" scrolling="no"></iframe> 

 		<div class="salesforce-loading-form"></div>

	</div>  

</div>
<script>
document.cookie ='gatedID=<?= $post->ID ?>; ;path=/resources/download-center/gated-form-thanks';


</script>
<?php get_footer(); ?>