<div class="sol_frame1">
	<div class="sol_frame1-bg" style="background-image: url('$F1BG.URL');"></div>
	<div class="frm-cntnr">
		<div class="sol_frame1-content staggerup_hldr">
			<div class="sol_frame1-header staggerup">
				<h2>$F1Title</h2>
			</div>
			<div class="sol_frame1-text staggerup">
				<p>$F1Desc</p>
			</div>
		</div>
	</div>
</div>
<div class="sol_frame2">
	<div class="sol_frame2-bg" style="background-image: url('$ThemeDir/images/f5.png');"></div>
	<div class="frm-cntnr width--90 staggerup_hldr8">
		<div class="solution-container">
			<% loop $Children %><div id="$ID" class="solution-hldr">
				<a href="$Link">
					<div class="solution-logo staggerup8">
						<img src="$Image.URL" alt="">
					</div>
					<div class="solution-title animate-up">
						<p>$Header</p>
					</div>
				</a>
			</div
			><% end_loop %>
		</div>
	</div>
</div>