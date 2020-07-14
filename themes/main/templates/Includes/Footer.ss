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
			<div class="ftr-logoCon">
				<a href="$AbsoluteBaseURL">
					<div class="ftr-logo" style="background-image: url('$Logo2.URL');"></div>
				</a>
			</div>
			<% end_loop %>
			<div class="ftr-link">
				<a class="ppolicy" href="privacy-policy">Privacy Policy</a>
			</div>
			<div class="social-link">
				<div class="inlineBlock-parent">
				<% loop $HeaderFooter %>
				<% loop $SocialMedias %>
					<a href="$ssLink" target="_blank">
						<img src="$ssIcon.URL">
					</a>
				<% end_loop %>
				<% end_loop %>
				</div>
			</div>
		</div
		><div class="pursuit align-t">
			<div id="pursuit" class="pursuit-title">
				<% loop $HeaderFooter %>
				<p>$ftrLabel1<i class="fas fa-caret-down"></i></p>
				<% end_loop %>
			</div>
			<div class="inlineBlock-parent">
				<div id="pursuittog" class="left-side">
					<% loop $SolutionPage %>
					<% loop $Solutions %>
					<div class="ftrlink">
						<a href="$SolutionPage.Link#$ID">$SolTitle</a>
					</div>
					<% end_loop %>
					<% end_loop %>
				</div>
			</div>
		</div
		><div class="contact align-t">
			<% loop $HeaderFooter %>
			<div id="contact" class="contact-title">
				<p>$ftrLabel2<i class="fas fa-caret-down"></i></p>
			</div>
			<div id="contact-tog" class="contact-cntnr">
				<% if $ftrphone %>
				<div>
				<a href="tel:$ftrphone" target="_blank" style="display: inline-block">
					<div class="inlineBlock-parent">
						<img src="$ThemeDir/images/phone.svg" alt=""><p>$ftrphone</p>
					</div>
				</a>
				</div>
				<% end_if %>
				<% if $ftrmail %>
				<div>
				<a href="mailto:$ftrmail" target="_blank" style="display: inline-block">
					<div class="inlineBlock-parent">
						<img src="$ThemeDir/images/message.svg" alt=""><p>$ftrmail</p>
					</div>
				</a>
				</div>
				<% end_if %>
			</div>
			<% end_loop %>
		</div>
	</div>
	<div class="ftr-bottom">
		<% loop $HeaderFooter %>
		<p>Copyright &copy; $Now.Year$copyright</p>
		<% end_loop %>
	</div>
</div>