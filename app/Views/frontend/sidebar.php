<div class="border mb-4">
    <span class='about-title bg-light p-2'><i class="fa fa-link me-2"></i>सम्बन्धित लिङ्कहरू</span>
    <ul class="m-0 p-0">

        <?php if(!empty($relatedLinks)): foreach($relatedLinks as $relatedLinks):?>
        <li class="list-group-item p-0 m-0 border-0 rounded-0"><a class="rlinks px-2"
                href="<?=$relatedLinks['linkUrl'] ?? ''?>" target="_blank"> <i
                    class="fa fa-link me-2"></i><?=$relatedLinks['linkTitle'] ?? ''?></a></li>
        <?php endforeach; endif?>
    </ul>
</div>

<?=view('frontend/facebook')?>


