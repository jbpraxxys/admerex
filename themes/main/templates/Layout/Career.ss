<% loop $Parent %>
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
<% end_loop %>
<div class="crr_frame2">
	<div class="crr_frame2--bg" style="background-image: url('$ThemeDir/images/f5.png')"></div>
	<div class="frm-cntnr width--90 selected">
		<div class="back-btn">
			<a href="">
				<div class="inlineBlock-parent">
					<i class="fas fa-long-arrow-alt-left s-margin-r green"></i><p class="green">Back to Careers</p>
				</div>
			</a>
		</div>
		<div class="crr-title">
			<h1 class="text-bold">Customer Service Representative</h1>
		</div>
		<div class="crr-desc">
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</div>
		<div class="crr-qualification">
			<h2 class="text-bold m-margin-b">Qualifications</h2>
			<div class="crr-qualification-content">
				<div class="qualification">
					<p class="gray--300">Career Level</p>
					<p class="text-bold">1-4 Years Experienced Employee</p>
				</div>
				<div class="qualification">
					<p class="gray--300">Year of Experience</p>
					<p class="text-bold">1 year</p>
				</div>
				<div class="qualification">
					<p class="gray--300">Qualification</p>
					<p class="text-bold">Bachelor's/College Degree</p>
				</div>
				<div class="qualification">
					<p class="gray--300">Job Type</p>
					<p class="text-bold">Full time</p>
				</div>
			</div>
		</div>
		<div class="crr-highlights">
			<h2 class="text-bold m-margin-b">Job Highlights</h2>
			<ul>
				<li>Competitive salary</li>
				<li>HM0 from Day 1 of employment</li>
			</ul>
		</div>
		<div class="crr-requirements">
			<h2 class="text-bold m-margin-b">Job Requirements</h2>
			<ul>
				<li>Competitive salary</li>
				<li>HM0 from Day 1 of employment</li>
				<li>Willing to work for night shift and shifting schedule</li>
			</ul>
		</div>
		<div class="career-form">
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
				<div class="input-attached">
					<div class="inlineBlock-parent">
						<p class="align-b">Attach Resume</p><p class="gray--100 align-b">(DOCX or PDF files only)</p>
					</div>
				</div>
				<div class="input-pitch">
					<textarea type="text" name="pitch" placeholder="Applicant Pitch"></textarea>
				</div>
				<div class="button-holder">
					<button id="contactBtn">Submit</button>
					<input type="hidden" name="postFlag" value="1">
				</div>
			</form>
		</div>
	</div>
</div>