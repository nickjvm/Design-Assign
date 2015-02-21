<?php if (!isset($show) || $show==true) : ?>

	<footer class="footer ">
		<div class="container">
		<div class="row">
	    <div class="span8 partners">
		      <h4>Partners</h4>
		      <ul class="partners-list inline list-unstyled">
		        <li>
		          <a href="http://aigaiowa.org">
		          	<img src="<?php print img_path().'aiga.png'; ?>"/>
		          </a>
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
	        <li>
	          <a href="https://www.flickr.com/search/?w=33082011%40N02&q=design%20assign" target="_blank">
	            <span class="fa-stack fa-2x">
	              <i class="fa fa-circle fa-stack-2x"></i>
	              <i class="fa fa-stack-1x fa-flickr"></i>
	            </span>
	          </a>
	        </li>
	      </ul>
	      <a class="hashtag-search" href="https://twitter.com/search?q=%23designassign">#DesignAssign</a>
	    </div>
	</div>
</div>
	</footer>
<?php endif; ?>
</div><!-- / #wrapper -->

<div id="debug"></div>
<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo js_path(); ?>jquery-1.7.2.min.js"><\/script>')</script>

<!-- This would be a good place to use a CDN version of jQueryUI if needed -->
<?php echo Assets::js(); ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-49858843-1', 'aiga.org');
  ga('send', 'pageview');

</script>
</body>
</html>