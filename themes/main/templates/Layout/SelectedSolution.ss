<% loop $Parent %>
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
<% end_loop %>
<div class="selected-sol">
	<div class="selected-bg" style="background-image: url('$ThemeDir/images/selected-sol.png')"></div>
	<div class="selected-sol_cntnr width--90">
		<div class="inlineBlock-parent">
			<div class="solution-nav align-t">
				<div class="solution-nav__wrapper">
					<div class="solution-nav__header">
						<h3 class="text-bold">SOLUTIONS</h3>
					</div>
					<div class="solution-nav__holder">
						<% loop $Parent %>
						<% loop $Children %>
						<div class="nav-item $LinkingMode"><a href="$Link">$Header</a></div>
						<% end_loop %>
						<% end_loop %>
					</div>
				</div>
			</div
			><div class="solution-content align-t">
				<div class="solution-content__wrapper">
					<div class="solution-icon">
						<img src="$Image.URL" alt="">
					</div>
					<div class="solution-content__header">
						<h1 class="text-bold">$Header</h1>
					</div>
					<div class="solution-content__desc">
						$Desc
					</div>
					<div class="button-hldr">
						<a href="">
							<div class="button-hldr button">
								<p>Contact Us</p>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>