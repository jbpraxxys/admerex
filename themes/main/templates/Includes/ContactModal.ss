<div id="vid_modal" class="remodal" data-remodal-id="vid-$ID">
	 <div data-remodal-action="close" class="modal-close">
	 	<i class="fas fa-times-circle"></i>
	 </div>
 	<div class="modal-body">
 		<% if $Vid.URL %>
 		<video src="$Vid.URL" controls></video>
 		<% else_if $ExternalLink %>
 		<iframe src="$ExternalLink" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
 		<% else %>
 		<img src="$Image.URL">
 		<% end_if %>
	</div>
</div>