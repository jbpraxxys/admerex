<%-- <div class="cntct_frame1">
	<div class="inlineBlock-parent">
		<div class="cntct_form-hldr align-t">
			<div class="cntct_form staggerfade_hldr">
				<form action="" id="contactForm" method="post">
					<div class="input-hldr">
						<input type="text" name="fullname" placeholder="Full Name" required>
					</div>
					<div class="input-hldr">
						<input type="text" name="email" placeholder="E-mail Address" required>
					</div>
					<div class="input-hldr">
						<input type="text" name="contact" placeholder="Contact Number" onkeydown="return ( event.ctrlKey || event.altKey 
				                    || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
				                    || (95<event.keyCode && event.keyCode<106)
				                    || (event.keyCode==8) || (event.keyCode==9) 
				                    || (event.keyCode>34 && event.keyCode<40) 
				                    || (event.keyCode==46) )" required>
					</div>
					<div class="input-hldr">
						<textarea type="text" name="messagedetails" placeholder="Message" required></textarea>
					</div>
					<div class="button-hldr">
						<button id="contactBtn">Send Us</button>
						<input type="hidden" name="postFlag" value="1">
					</div>
				</form>
			</div>
		</div
		><div class="map_hldr align-t">
			<div class="map-hldr l-margin-t">
				<div id="map" class="map"></div>
			</div>
		</div>
	</div>
</div> --%>

<div class="cntct_frame1">
	<div class="cntct_frame1-bg" style="background-image: url('$F1BG.URL');"></div>
	<div class="frm-cntnr">
		<div class="content">
			<div class="cntct_frame1-title">
				<h2>$F1Title</h2>
			</div>
			<div class="cntct_frame1-desc">
				<p>$F1Desc</p>
			</div>
		</div>
	</div>
</div>

<div class="cntct_frame2">
	<div class="frm-cntnr width--90">
		<div class="inlineBlock-parent" id="lightgallery">
			<% loop $Medias %><div class="connect-cntnr" href="$Image.URL">
				<div class="image-hldr">
					<div class="image" style="background-image: url('$Image.URL');"></div>
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
	<div class="frm-cntnr" id="tabs">
		<div class="top-hldr">
			<div class="inlineBlock-parent">
				<div class="tabbing-select">
					<div class="tab-slct" @click="activetab = 1" v-bind:class="{'active':activetab == 1}">
						<p>Applicant Inquiry</p>
					</div>
					<div class="tab-slct" @click="activetab = 2" v-bind:class="{'active':activetab == 2}">
						<p>Client Inquiry</p>
					</div>
				</div
				><div class="top-desc">
					<p>Interested in joining our team? Fill up the form below!</p>
				</div>
			</div>
		</div>
		<div class="form-hldr">
			<div v-if="activetab == 1" class="inlineBlock-parent">
				<div class="left-hldr">
					<h2>Want to partner with us?</h2>
					<p>Interested in being our partner?</p>
				</div
				><div class="right-hldr">
					<form action="">
						<div class="inlineBlock-parent">
							<div class="input-hldr">
								<input type="text" placeholder="Full Name">
							</div
							><div class="input-hldr">
								<input type="text" placeholder="Contact Number">
							</div>
						</div>
						<div class="inlineBlock-parent">
							<div class="input-hldr">
								<input type="text" placeholder="E-mail">
							</div
							><div class="input-hldr">
								<input type="text" placeholder="Job Post">
							</div>
						</div>
						<div class="button-holder">
							<button>Submit</button>
						</div>
					</form>
				</div>
			</div>
			<div v-if="activetab == 2" class="inlineBlock-parent">
				<div class="left-hldr">
					<h2>Join Us and #ExperienceHappy</h2>
					<p>1500 teammates in Makati, Cebu and Mandaluyong!</p>
				</div
				><div class="right-hldr">
					<form action="">
						<div class="inlineBlock-parent">
							<div class="input-hldr">
								<input type="text" placeholder="Full Name">
							</div
							><div class="input-hldr">
								<input type="text" placeholder="Line of Business">
							</div>
						</div>
						<div class="inlineBlock-parent">
							<div class="input-hldr">
								<input type="text" placeholder="E-mail">
							</div
							><div class="input-hldr">
								<input type="text" placeholder="Service Interested In">
							</div>
						</div>
						<div class="inlineBlock-parent">
							<div class="input-hldr">
								<input type="text" placeholder="Contact Number">
							</div>
						</div>
						<div class="button-holder">
							<button>Submit</button>
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
		<div class="inlineBlock-parent">
			<div class="mascot-hldr">
				<div class="mascot" style="background-image: url('$ThemeDir/images/mascot.png');">
					<a href="" class="messenger">
						<img src="$ThemeDir/images/messenger.png" alt="">
					</a>
				</div>
			</div
			><div class="text-hldr">
				<div class="desc">
					<p>This is all fine and dandy, but if you want reach us more conveniently and faster, check us out on Facebook Messenger!</p>
				</div>
				<div class="button-hldr button">
					<a href="">
						Check Us Out
					</a>
				</div>
			</div>
			
		</div>
	</div>
</div>