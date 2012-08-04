<?
    $curPageIndex = $pagination->getCurrentPageIndex();
    $pageNumber = $pagination->getPageCount();
    $suffix = isset($suffix) ? $suffix : null;
?>
    <span>
        Showing:  <strong><?= ($pagination->getFirstPageRowIndex()+1).'-'.($pagination->getLastPageRowIndex()+1) ?></strong>
        of <strong><?= $pagination->getRowCount() ?></strong> records.
    </span>
        <br>
        <ul>
        
            <? if ($curPageIndex): ?><a href="<?= $base_url.'/'.$curPageIndex.$suffix ?>">&larr; Previous</a><? endif ?>
            <? for ($i = 1; $i <= $pageNumber; $i++): ?>
            
                <? if ($i != $curPageIndex+1): ?>
                    <li>
                        <a href="<?= $base_url.'/'.$i.$suffix ?>">
                            <?= $i ?>
                        </a>
                    </li>
                <? endif ?>
                
                <? if ($i == $curPageIndex+1):?>
                    <li class="<?= ($i == $curPageIndex+1) ? 'disabled' : null ?>">
                        <? if ($i != $curPageIndex+1): ?><a href="<?= $base_url.'/'.$i.$suffix ?>/"><? endif ?>
                            <a href="#">
                                <?= $i ?>
                            </a>
                        <? if ($i != $curPageIndex+1): ?></a><? endif ?>
                    </li>
                <? endif ?>
                <? endfor ?>
                
            <? if ($curPageIndex < $pageNumber-1): ?><a href="<?= $base_url.'/'.($curPageIndex+2).$suffix ?>">Next page &rarr;</a><? endif ?>

        </ul>
            
            
    
<!--Ending Pagination-->