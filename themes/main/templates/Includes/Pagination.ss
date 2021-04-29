<div class="page-num desktop">
<% if $PaginatedBlogs.MoreThanOnePage %>
	<div class="prev"><a <% if $PaginatedBlogs.PrevLink %>href="$PaginatedBlogs.PrevLink"<% end_if %>><i class="fa fa-angle-left"></i></a></div>
	<% loop $PaginatedBlogs.Pages %>
		<% if $CurrentBool %>
			<div class="current"><a>$PageNum</a></div>
		<% else %>
			<% if $Link %>
			    <div class="num-link">
			    	<a href="$Link">$PageNum</a>
			    </div>
			<% else %>
			    ...
			<% end_if %>
		<% end_if %>
	<% end_loop %>
	<div class="next"><a <% if $PaginatedBlogs.NextLink %>href="$PaginatedBlogs.NextLink "<% end_if %>><i class="fa fa-angle-right"></i></a></div>
	<%-- <p class="page-total">Page $PaginatedBlogs.CurrentPage of $PaginatedBlogs.TotalPages</p> --%>
<% end_if %>
</div>