<div class="ftr-frame">
	<div class="go-top">
		<a href="#top">
			<div class="arrow">
				<i class="fas fa-chevron-up"></i>
			</div>
		</a>
	</div>
	<div class="ftr-cntnr inlineBlock-parent">
		<div class="logo-hldr align-t">
			<% loop $HeaderFooter %>
			<a href="">
				<div class="ftr-logo" style="background-image: url('$Logo2.URL');"></div>
			</a>
			<% end_loop %>
			<div class="ftr-link">
				<a class="ppolicy" href="privacy-policy">Privacy Policy</a>
			</div>
			<div class="social-link">
				<% loop $HeaderFooter %>
				<div class="inlineBlock-parent">
					<% if $fblink %>
					<a href="$fblink" target="_blank">
						<img src="$ThemeDir/images/fb.svg" alt="">
					</a>
					<% end_if %>
					<% if $iglink %>
					<a href="$iglink" target="_blank">
						<img src="$ThemeDir/images/ig.svg" alt="">
					</a>
					<% end_if %>
					<% if $twitterlink %>
					<a href="$twitterlink" target="_blank">
						<img src="$ThemeDir/images/twitter.svg" alt="">
					</a>
					<% end_if %>
				</div>
				<% end_loop %>
			</div>
		</div
		><div class="pursuit align-t">
			<div id="pursuit" class="pursuit-title">
				<p>PURSUIT</p><i class="fas fa-caret-down"></i>
			</div>
			<div class="inlineBlock-parent">
				<div id="pursuittog" class="left-side">
					<% loop $SolutionPage %>
					<% loop $Solutions %>
					<div class="ftrlink">
						<a href="$SolutionPage.Link">$SolTitle</a>
					</div>
					<% end_loop %>
					<% end_loop %>
				</div>
			</div>
		</div
		><div class="contact align-t">
			<div id="contact" class="contact-title">
				<p>CONTACT</p><i class="fas fa-caret-down"></i>
			</div>
			<% loop $HeaderFooter %>
			<div id="contact-tog" class="contact-cntnr">
				<% if $ftrphone %>
				<a href="tel:$ftrphone" target="_blank" style="display: inline-block">
					<div class="inlineBlock-parent">
						<img src="$ThemeDir/images/phone.svg" alt=""><p>$ftrphone</p>
					</div>
				</a>
				<% end_if %>
				<% if $ftrmail %>
				<a href="mailto:$ftrmail" target="_blank" style="display: inline-block">
					<div class="inlineBlock-parent">
						<img src="$ThemeDir/images/message.svg" alt=""><p>$ftrmail</p>
					</div>
				</a>
				<% end_if %>
			</div>
			<% end_loop %>
		</div>
	</div>
	<div class="ftr-bottom">
		<% loop $HeaderFooter %>
		<p>$copyright</p>
		<% end_loop %>
	</div>
</div>