<div class="row-fluid"><!--Starting fluid row for product ratings/review.-->
    <div class="span6">
        Product rating: <?= $product->rating_all ? $product->rating_all : '(no rating information)' ?>&nbsp;Stars
        <br>
        <hr>
        <?
            $reviews = $product->list_all_reviews();
            if (!$reviews->count):
        ?>
            <p>There are no reviews for this product.</p>
        <? else: ?>
            <ul>
                <? foreach ($reviews as $review): ?>
                    <li class="product_review">
                        <? if ($review->rating): ?>
                            <span><?= $review->rating ?>&nbsp;Stars</span>
                        <? endif ?>
                        <h4><?= h($review->title) ?></h4>
                        <p class="description">Posted by <?= h($review->author) ?> on <?= $review->created_at->format('%x') ?></p>
                        <p><?= nl2br(h($review->review_text)) ?></p>
                        <hr>
                    </li>
                <? endforeach ?>
            </ul>
        <? endif ?>
    </div><!--Ending main column for reviews/ratings.-->
    <div class="span6 review-submission-form" style="text-align: center;">
        <? if (isset($review_posted)): ?>
            <p>Your review has been successfully posted.</p>
        <? else: ?>
                <form>
                    <h3>Write a review</h3>
                    <label>Rating</label>
  
                        <select name="rating">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
  
                        <label for="review_title">Title</label>
                        <input id="review_title" name="review_title" type="text"/>

                        <? if (!$this->customer): ?>
                            <label for="review_author_name">Your Name</label>
                            <input id="review_author_name" name="review_author_name" type="text"/>

                            <label for="review_author_email">Email</label>
                            <input id="review_author_email" type="text" name="review_author_email"/>
                        <? endif ?>

                        <label for="review_text">Review</label>
                        <textarea rows="5" id="review_text" name="review_text"></textarea>
                        <br>
                        <input 
                            type="button" 
                            class="btn btn-inverse"
                            value="Submit" 
                            onclick="return $(this).getForm().sendRequest('shop:on_addProductReview', {
                                    extraFields: {no_flash: true}, 
                                    update:{'product_page': 'product_partial'}
                                })"/>
                    </form>
                    <? endif ?>
    </div><!--Ending last column for the reviews row.-->
</div><!--Ending fluid row for product ratings/review.-->