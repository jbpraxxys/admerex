<div class="jrny_frame1">
	<div class="jrny_frame1-bg" style="background-image: url('$F1BG.URL');"></div>
	<div class="frm-cntnr">
		<div class="jrny_frame1-content staggerup_hldr">
			<div class="jrny_frame1-header staggerup">
				<h2>$F1Title</h2>
			</div>
			<div class="jrny_frame1-text staggerup">
				<p>$F1Desc</p>
			</div>
		</div>
	</div>
</div>
<div class="jrny_frame2">
	<div class="jrny_frame2-bg" style="background-image: url('$ThemeDir/images/f5.png');"></div>
	<div class="frm-cntnr width--90">
		<div class="content-hldr staggerup_hldr1">
			<% loop $Announcements %>
			
			<div class="inlineBlock-parent journey-cntnr">
				<div class="image-hldr fadeIn">
					<div class="image" style="background-image: url('$Image.URL');"></div>
				</div
				><div class="desc-hldr">
					<div class="d-title staggerup1">
						<h2>$ATitle</h2>
					</div>
					<div class="d-date staggerup1">
						<p>$Date</p>
					</div>
					<div class="d-desc staggerup1">
						<p>$Desc</p>
					</div>
				</div>
			</div>
			<% end_loop %>
		</div>
	</div>
</div>
<div class="jrny_frame3">
	<div class="jrny_frame3-bg" style="background-image: url('$ThemeDir/images/f5.png');"></div>
	<div class="frm-cntnr staggerup_hldr2">
		<div class="jrny-img-slider">
			<% loop $Articles %>
			<div class="image-cntnr">
				<div class="image fadeIn" style="background-image: url('$Image.URL');"></div>
			</div>
			<% end_loop %>
		</div>
		<div class="jrny-cont-slider">
			<% loop $Articles %>
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
			<% end_loop %>
		</div>
	<%-- 	<div class="pagination-slider">
			<% loop $Articles %>
			    <div class="number">$ID</div>
			<% end_loop %>
		</div> --%>
	</div>
</div>