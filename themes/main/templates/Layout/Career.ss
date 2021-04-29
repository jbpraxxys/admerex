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
			<a href="$Parent.Link">
				<div class="inlineBlock-parent">
					<i class="fas fa-long-arrow-alt-left s-margin-r green"></i><p class="green">Back to Careers</p>
				</div>
			</a>
		</div>
		<div class="crr-title">
			<h1 class="text-bold">$JobTitle</h1>
		</div>
		<div class="crr-desc">
			$Desc
		</div>
		<div class="crr-qualification">
			<h2 class="text-bold m-margin-b">Qualifications</h2>
			<div class="crr-qualification-content">
				<div class="qualification">
					<p class="gray--300">Career Level</p>
					<p class="text-bold">$CareerLevel</p>
				</div>
				<div class="qualification">
					<p class="gray--300">Year of Experience</p>
					<p class="text-bold">$YearExp</p>
				</div>
				<div class="qualification">
					<p class="gray--300">Qualification</p>
					<p class="text-bold">$Qualification</p>
				</div>
				<div class="qualification">
					<p class="gray--300">Job Type</p>
					<p class="text-bold">$JobType</p>
				</div>
			</div>
		</div>
		<div class="crr-highlights">
			<h2 class="text-bold m-margin-b">Job Highlights</h2>
			$JobHighlights
		</div>
		<div class="crr-requirements">
			<h2 class="text-bold m-margin-b">Job Requirements</h2>
			$JobRequirements
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
						<input type="text" name="job" placeholder="Job Post" value="$JobTitle" required>
					</div>
				</div>
				<div class="input-attached">
					<label id="file-selected" for="fileupload">
						<div class="inlineBlock-parent">
							<p class="align-b">Attach Resume</p><p class="gray--100 align-b">(DOCX or PDF files only)</p>
						</div>
					</label>
					<i class="fas fa-paperclip geen"></i>
					<input type="file" id="fileupload" class="fileuploadBtn" name="file" required hidden>
					<input type="hidden" id="file-image" name="resume" value="" required/>
				</div>
				<div class="modal__careers-form-row modal__careers-form" data-id="{$ID}">
	 				<div class="modal__careers__upload">
						<label id="file-selected{$ID}" for="fileupload{$ID}" class="custom-file-upload inlineBlock-parent"><p class="ptext">Attached Resume</p><p class="lbtn">Choose File</p></label>
					</div>
					<input type="file" id="fileupload{$ID}" class="fileuploadBtn" name="file" required hidden>
					<input type="hidden" id="file-image{$ID}" name="resume" value="" required/>
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