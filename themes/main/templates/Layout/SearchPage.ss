<div class="search_header">
	<div class="frm-cntnr">
		<div class="frm-title">
			<h2>Search Result for &quot;{$getSearch}&quot;</h2>
		</div>
	</div>
</div>
<div class="sol_frame2">
	<div class="sol_frame2-bg" style="background-image: url('$ThemeDir/images/f5.png');"></div>
	<div class="frm-cntnr width--90 staggerup_hldr8">
		<div class="solution-container" style="text-align: center;">
			<% if $PaginatedPages.Count > 0 %>
			<h2 class="l-margin-b">Solutions</h2>
			<% loop $PaginatedPages %><div class="solution-hldr">
				<div class="solution-logo staggerup8">
					<img src="$Image.URL" alt="">
				</div>
				<div class="solution-title animate-up">
					<p>$SolTitle</p>
				</div>
				<div class="solution-desc animate-up">
					<p>$Desc</p>
				</div>
			</div
			><% end_loop %>
			<% else %>
			<p style="text-align: center; padding-bottom: 100px;">We can't find any related to your search.</p>
			<% end_if %>

			<% if $PaginatedPages1.Count > 0 %>
			<h2 class="l-margin-b">Journey</h2>
			<% loop $PaginatedPages1 %><div class="solution-hldr">
				<div class="solution-logo staggerup8">
					<img src="$Image.URL" alt="">
				</div>
				<div class="solution-title animate-up">
					<p>$ATitle</p>
				</div>
				<div class="solution-desc animate-up">
					<p>$Desc</p>
				</div>
			</div
			><% end_loop %>
			<% else %>
			<p style="text-align: center; padding-bottom: 100px;">We can't find any related to your search.</p>
			<% end_if %>
		</div>
	</div>
</div>