<?php if (!isset($show) || $show==true) : ?>

	<footer class="footer  container">
		<div class="row">
	    <div class="span8 partners">
		      <h4>Partners</h4>
		      <ul class="partners-list inline list-unstyled">
		        <li>
		          <img src="<?php print img_path().'aiga.png'; ?>"/>
		        </li>
		      </ul>
		      <div class="disclaimer">
		        <p>&copy; <?php print date("Y");?>, All Rights Reserved. </p>
		        <p>AIGA | the professional association for design</p>
	      </div>
	    </div>
	    <div class="span4">
	      <h4>Connect</h4>
	      <ul class="inline connect">
	        <li>
	          <a href="mailto:designassign@aigaiowa.org" target="_blank">
	            <span class="fa-stack fa-2x">
	              <i class="fa fa-circle fa-stack-2x"></i>
	              <i class="fa fa-stack-1x fa-envelope"></i>
	            </span>
	          </a>
	        </li>
	        <li>
	          <a href="https://www.facebook.com/AIGAIowa" target="_blank">
	            <span class="fa-stack fa-2x">
	              <i class="fa fa-circle fa-stack-2x"></i>
	              <i class="fa fa-stack-1x fa-facebook"></i>
	            </span>
	          </a>
	        </li>
	        <li>
	          <a href="http://twitter.com/AIGAIowa" target="_blank">
	            <span class="fa-stack fa-2x">
	              <i class="fa fa-circle fa-stack-2x"></i>
	              <i class="fa fa-stack-1x fa-twitter"></i>
	            </span>
	          </a>
	        </li>
	      </ul>
	      <a class="hashtag-search" href="https://twitter.com/search?q=%23designassign">#DesignAssign</a>
	    </div>
	</div>
	</footer>
<?php endif; ?>

<div id="debug"></div>
<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo js_path(); ?>jquery-1.7.2.min.js"><\/script>')</script>

<!-- This would be a good place to use a CDN version of jQueryUI if needed -->
<?php echo Assets::js(); ?>

</body>
</html>