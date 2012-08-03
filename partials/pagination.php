<?
    /**
    The following block of code sets up the pagination links on the bottom of the page.
    **/
    $curPageIndex = $pagination->getCurrentPageIndex();
    $pageNumber = $pagination->getPageCount();
    $suffix = isset($suffix) ? $suffix : null;
?>
    <p>
        Showing:  <strong><?= ($pagination->getFirstPageRowIndex()+1).'-'.($pagination->getLastPageRowIndex()+1) ?></strong>
        of <strong><?= $pagination->getRowCount() ?></strong> records.
        <? if ($curPageIndex): ?><a href="<?= $base_url.'/'.$curPageIndex.$suffix ?>">&larr; Previous</a><? endif ?>
        Page: <? for ($i = 1; $i <= $pageNumber; $i++): ?>
        
                
                <? if ($i != $curPageIndex+1): ?><a href="<?= $base_url.'/'.$i.$suffix ?>"><? endif ?>
                <?= $i ?>
                <? if ($i != $curPageIndex+1): ?></a><? endif ?>
                
                <? endfor ?>
                
                <? if ($curPageIndex < $pageNumber-1): ?><a href="<?= $base_url.'/'.($curPageIndex+2).$suffix ?>">Next page &rarr;</a><? endif ?>
                
            <br>
            
            

            
            
    </p>
<!--Ending Pagination-->