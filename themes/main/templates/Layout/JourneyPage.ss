<div class="jrny_frame1">
	<div class="jrny_frame1-bg" style="background-image: url('$F1BG.URL');"></div>
	<div class="frm-cntnr">
		<div class="jrny_frame1-content">
			<div class="jrny_frame1-header">
				<h2>$F1Title</h2>
			</div>
			<div class="jrny_frame1-text">
				<p>$F1Desc</p>
			</div>
		</div>
	</div>
</div>
<div class="jrny_frame2">
	<div class="jrny_frame2-bg" style="background-image: url('$ThemeDir/images/f5.png');"></div>
	<div class="frm-cntnr width--90">
		<div class="content-hldr">
			<% loop $Announcements %>
			
			<div class="inlineBlock-parent journey-cntnr">
				<div class="image-hldr">
					<div class="image" style="background-image: url('$Image.URL');"></div>
				</div
				><div class="desc-hldr">
					<div class="d-title">
						<h2>$ATitle</h2>
					</div>
					<div class="d-date">
						<p>$Date</p>
					</div>
					<div class="d-desc">
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
	<div class="frm-cntnr">
		<div class="jrny-img-slider">
			<% loop $Articles %>
			<div class="image-cntnr">
				<div class="image" style="background-image: url('$Image.URL');"></div>
			</div>
			<% end_loop %>
		</div>
		<div class="jrny-cont-slider">
			<% loop $Articles %>
			<div class="content-hldr">
				<div class="content-cntnr">
					<div class="title">
						<h2>$ATitle</h2>
					</div>
					<div class="date">
						<p>$Date</p>
					</div>
					<div class="desc">
						<p>$Desc</p>
					</div>
				</div>
			</div>
			<% end_loop %>
		</div>
	</div>
</div>