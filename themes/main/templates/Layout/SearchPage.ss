<div class="search_header">
	<div class="frm-cntnr">
		<div class="frm-title">
			<h2>Search Result for &quot;{$getSearch}&quot;</h2>
		</div>
	</div>
</div>
<div class="sol_frame2 searchCon">
	<div class="sol_frame2-bg" style="background-image: url('$ThemeDir/images/f5.png');"></div>
	<div class="frm-cntnr width--90 staggerup_hldr8">
		<div class="align-c">
			<% if $PaginatedPages.Count > 0 %>
			<h2 class="l-margin-b">Solutions</h2>
			<div class="solution-container align-c">
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
			</div>
			<% end_if %>

			<% if $PaginatedPagesAnnounce.Count > 0 %>
			<h2 class="l-margin-b">Journey > Announcements</h2>
			<div class="align-c search_resCon">
				<% loop $PaginatedPagesAnnounce %>
				<div class="jrny_frame3 search-res">
					<div class="jrny-img-slider">
						<div class="image-cntnr">
							<div class="image fadeIn" style="background-image: url('$Image.URL');"></div>
						</div>
					</div>
					<div class="jrny-cont-slider">
						<div class="content-hldr">
							<div class="content-cntnr">
								<div class="title staggerup2">
									<h2>$ATitle</h2>
								</div>
								<div class="date staggerup2">
									<p>$Date</p>
								</div>
								<div class="desc staggerup2">
									<p>$Desc</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<% end_loop %>
			</div>
			<% end_if %>

			<% if $PaginatedPagesArticle.Count > 0 %>
			<h2 class="l-margin-b">Journey > Articles</h2>
			<div class="align-c search_resCon">
				<% loop $PaginatedPagesArticle %>
				<div class="jrny_frame3 search-res">
					<div class="jrny-img-slider">
						<div class="image-cntnr">
							<div class="image fadeIn" style="background-image: url('$Image.URL');"></div>
						</div>
					</div>
					<div class="jrny-cont-slider">
						<div class="content-hldr">
							<div class="content-cntnr">
								<div class="title staggerup2">
									<h2>$ATitle</h2>
								</div>
								<div class="date staggerup2">
									<p>$Date</p>
								</div>
								<div class="desc staggerup2">
									<p>$Desc</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<% end_loop %>
			</div>
			<% end_if %>

			<% if $PaginatedPages.Count = 0 && $PaginatedPagesAnnounce.Count = 0 && $PaginatedPagesArticle.Count = 0 %>
				<p style="text-align: center;">We can't find any related to your search.</p>
			<% end_if %>
		</div>
	</div>
</div>