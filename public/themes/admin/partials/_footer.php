	
	<footer class="container-fluid footer">
		<p class="pull-right">
			Executed in {elapsed_time} seconds, using {memory_usage}.
			<br/>
			Powered by <a href="http://cibonfire.com" target="_blank"><i class="icon-fire">&nbsp;</i>&nbsp;Bonfire</a> <?php echo BONFIRE_VERSION ?>
		</p>
	</footer>

	<div id="debug"><!-- Stores the Profiler Results --></div>

  <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="<?php echo js_path(); ?>jquery-1.7.2.min.js"><\/script>')</script>
  <script>
       var bonfire = {
       		baseUrl:'<?php echo base_url(); ?>',
       		path:function(path) {
       			var base = bonfire.baseUrl;
       			var base_arr = base.split("/");
       			base_arr.pop();

       			var path_array = path.split("/");
       			if(!path_array[0]) {
       				path_array.shift();
       			}
       			if(path_array[0] != base_arr[base_arr.length-1]) {
       				path_array.unshift(base_arr.pop());
       			}
       			var url_array = base_arr.concat(path_array);
       			return url_array.join('/');
       		}
       };
       bonfire['<?php echo $this->security->get_csrf_token_name(); ?>']
                         = '<?php echo $this->security->get_csrf_hash(); ?>';
     </script>
	<?php echo Assets::js(); ?>
</body>
</html>
