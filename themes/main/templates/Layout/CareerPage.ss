<div class="crr_frame1">
	<div class="crr_frame1-bg" style="background-image: url('$F1BG.URL');"></div>
	<div class="frm-cntnr">
		<div class="crr_frame1-content staggerup_hldr">
			<div class="crr_frame1-header staggerup">
				<h2>$F1Title</h2>
			</div>
			<div class="crr_frame1-text staggerup">
				<p>$F1Desc</p>
			</div>
		</div>
	</div>
</div>
<div class="crr_frame2">
	<div class="crr_frame2--bg" style="background-image: url('$ThemeDir/images/f5.png')"></div>
	<div class="frm-cntnr width--80">
		<div class="inlineBlock-parent">
			<% loop $Children %><div class="career-card">
				<div class="career-card__wrapper">
					<div class="career-title">
						<h2 class="line-clamp-2">$JobTitle</h2>
					</div>
					<div class="career-button">
						<a href="$Link">
							<div class="button-hldr button">
								<p>Apply Now</p>
							</div>
						</a>
					</div>
				</div>
			</div
			><% end_loop %>
		</div>
	</div>
</div>