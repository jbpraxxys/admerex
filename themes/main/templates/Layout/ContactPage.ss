<div class="cntct_frame1">
	<div class="cntct_frame1-bg" style="background-image: url('$F1BG.URL');"></div>
	<div class="frm-cntnr staggerup_hldr">
		<div class="content">
			<div class="cntct_frame1-title staggerup">
				<h2>$F1Title</h2>
			</div>
			<div class="cntct_frame1-desc staggerup">
				<p>$F1Desc</p>
			</div>
		</div>
	</div>
</div>

<div class="cntct_frame2">
	<div class="frm-cntnr width--90 staggerup_hldr1">
		<div class="inlineBlock-parent align-t">
			<% loop $Medias.Sort(SortOrder) %><div class="connect-cntnr staggerup1 align-t">
				<div class="image-hldr <% if $Vid.URL || $ExternalLink %>video<% end_if %>" <% if $Vid.URL || $ExternalLink %>data-remodal-target="vid-$ID"<% else %> id="lightgallery"<% end_if %>">
					<div class="image" href="$Image.URL" style="background-image: url('$Image.URL');">
						<% if $Vid.URL || $ExternalLink %>
							<img src="$Top.F2Img.URL" alt="">
						<% end_if %>
					</div>
				</div>
				<div class="cdesc">
					<p>$Desc</p>
				</div>
			</div
			><% end_loop %>
		</div>
	</div>
</div>

<div class="cntct_frame3">
	<img src="$ThemeDir/images/f9bg.png" alt="">
	<div class="frm-cntnr">
		<div class="top-hldr">
			<div class="inlineBlock-parent">
				<div class="tabbing-select">
					<div id="AIbutton" class="tab-slct">
						<p>Applicant Inquiry</p>
					</div>
					<div id="CIbutton" class="tab-slct active">
						<p>Client Inquiry</p>
					</div>
				</div
				><div class="top-desc">
					<p>$F3Header</p>
				</div>
			</div>
		</div>
		<div class="form-hldr">
			<div id="AIform" class="inlineBlock-parent">
				<div class="left-hldr">
					<h2>$AIHeader</h2>
					<p>$AIDesc</p>
				</div
				><div class="right-hldr">
					<form action="" id="contactForm" method="post">
						<div class="inlineBlock-parent">
							<div class="input-hldr">
								<input type="text" name="fullname" placeholder="Full Name" required>
							</div
							><div class="input-hldr">
								<input type="text" name="contact" placeholder="Contact Number" required>
							</div>
						</div>
						<div class="inlineBlock-parent">
							<div class="input-hldr">
								<input type="text" name="email" placeholder="E-mail" required>
							</div
							><div class="input-hldr">
								<input type="text" name="job" placeholder="Job Post" required>
							</div>
						</div>
						<div class="recaptcha-hldr m-margin-b">
							<div class="g-recaptcha" data-sitekey="6LcqdLAZAAAAANs30xdLFibJHrjq63M692IMlB__"></div>
						</div>
						<div class="button-holder">
							<button id="contactBtn">Submit</button>
							<input type="hidden" name="postFlag" value="1">
						</div>
					</form>
				</div>
			</div>
			<div id="CIform" class="inlineBlock-parent">
				<div class="left-hldr">
					<h2>$CIHeader</h2>
					<p>$CIDesc</p>
				</div
				><div class="right-hldr">
					<form action="" id="contactForm2" method="post">
						<div class="inlineBlock-parent">
							<div class="input-hldr">
								<input type="text" name="fullname" placeholder="Full Name" required>
							</div
							><div class="input-hldr">
								<input type="text" name="business" placeholder="Line of Business" required>
							</div>
						</div>
						<div class="inlineBlock-parent">
							<div class="input-hldr">
								<input type="text" name="email" placeholder="E-mail" required>
							</div
							><div class="input-hldr">
								<input type="text" name="service" placeholder="Service Interested In" required>
							</div>
						</div>
						<div class="inlineBlock-parent">
							<div class="input-hldr">
								<input type="text" name="contact" placeholder="Contact Number" required>
							</div>
						</div>
						<div class="recaptcha-hldr m-margin-b">
							<div class="g-recaptcha" data-sitekey="6LcqdLAZAAAAANs30xdLFibJHrjq63M692IMlB__"></div>
						</div>
						<div class="button-holder">
							<button id="contactBtn2">Submit</button>
							<input type="hidden" name="postFlag" value="1">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="cntct_frame4">
	<div class="cntct_frame4-bg" style="background-image: url('$ThemeDir/images/f5.png');"></div>
	<div class="frm-cntnr width--70">
		<div class="inlineBlock-parent formobile-flex flex">
			<div class="mascot-hldr fadeIn">
				<div class="mascot" style="background-image: url('$F4Img1.URL');">
					<a href="$F4Link" class="messenger" target="_blank">
						<img src="$F4Img2.URL" alt="">
					</a>
				</div>
			</div
			><div class="text-hldr fadeIn">
				<div class="desc">
					<p>$F4Desc</p>
				</div>
				<div class="button-hldr button">
					<a href="$F4Link" target="_blank">
						$F4Button
					</a>
				</div>
			</div>
			
		</div>
	</div>
</div>

<% loop $Medias.Sort(SortOrder) %>
	<% include ContactModal %>
<% end_loop %>