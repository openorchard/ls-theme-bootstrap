        <div class="span3">
          <aside class="well sidebar-nav hidden-phone">
            <div id="mini_cart">
          		<?= $this->render_partial('shop:mini_cart'); ?>
          	</div>
            <hr>
            <nav>
                <h4>Shop by category:</h4>
            	<?= $this->render_partial('shop:categories') ?>
          	</nav>
            <hr>
          	<h4>Compare</h4>
              <div id="compare_list">
                  <?= $this->render_partial('shop:compare_list') ?>
              </div>
          </aside><!--/.well -->
        </div><!--/span-->
