<div id="vid_modal" class="remodal" data-remodal-id="vid1">
	 <div data-remodal-action="close" class="modal-close">
	 	<i class="fas fa-times-circle"></i>
	 </div>
 	<div class="modal-body">
 		<% if $F9Vid.URL %>
 		<video src="$F9Vid.URL" controls></video>
 		<% else_if $YTLink %>
 		<iframe src="$YTLink" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
 		<% else %>
 		<img src="$F9IMG.URL">
 		<% end_if %>
	</div>
</div>