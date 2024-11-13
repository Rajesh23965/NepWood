<?php
if ( isset( $intro ) ):

extract( $intro );
endif

?>

<span class='about-title'><i class='fas fa-sticky-note'></i> <?php if(isset($title)): echo $title; endif?></span>
<hr />
<div class="text-justify">
    <?php if(isset($description)): echo $description; endif?>
    <a class="text-right float-right btn btn-primary" href="<?php echo base_url().'page?id='.($selectedPage ?? '').'&title='.($page_url ?? '')?>"><b>readmore <i
                class="fas fa-plus"></i></b></a>
</div>