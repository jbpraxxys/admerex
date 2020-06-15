<div class="hm_frame1">
	<div class="hm_frame1-bg">
		<% loop $HomeBanners %>
		<div>
			<video autoplay loop src="$VidFile.URL"></video>
		</div>
		<% end_loop %>
	</div>
	<div class="frm-cntnr width--80">
		<div class="hm_frame1-content">
			<div class="frame1-slider">
				<% loop $HomeBanners %>
				<div class="slider-hldr">
					<div class="hm_frame1-title">
						<h1>$Header</h1>
					</div>
					<div class="hm_frame1-desc">
						<p>$Desc</p>
					</div>
				</div>
				<% end_loop %>
			</div>
			<div class="hm_frame1-search">
				<form action="">
					<input type="text" placeholder="Search">
					<div class="search-btn" style="background-image: url('$ThemeDir/images/search.png');"></div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="hm_frame2">
	<div class="hm_frame2-bg" style="background-image: url('$ThemeDir/images/bg2.png');"></div>
	<div class="gradient"></div>
	<div class="frm-cntnr width--80">
		<div class="vertical-parent">
			<div class="vertical-align">
				<div class="f2-content">
					<div class="f2-title">
						<h2>$F2Title</h2>
					</div>
					<div class="f2-desc">
						<p>$F2Desc</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="hm_frame3" id="tabs">
	<div class="hm_frame3-bg" style="background-image: url('$ThemeDir/images/bgf3.png');"></div>
	<div class="frm-cntnr width--90">
		<div class="content-container inlineBlock-parent">
			<div class="left-cntnr">
				<div class="tabbing-hldr">
					<div class="tab-cntnr" @click="activetab = 1" v-bind:class="{'active':activetab == 1}">
						<p>$F3Title1</p>
					</div
					><div class="tab-cntnr" @click="activetab = 2" v-bind:class="{'active':activetab == 2}">
						<p>$F3Title2</p>
					</div
					><div class="tab-cntnr" @click="activetab = 3" v-bind:class="{'active':activetab == 3}">
						<p>$F3Title1</p>
					</div>
				</div>
				<transition name="slide-fade">
				<div class="tabbing" v-if="activetab == 1">
					<div class="tab-content">
						<p>$F3Desc1</p>
					</div>
					<a href="$F3link1">
					<div class="button-hldr button">
						<p>Learn More</p>
					</div>
					</a>
				</div>
				</transition>
				<transition name="slide-fade">
				<div class="tabbing" v-if="activetab == 2">
					<div class="tab-content">
						<p>$F3Desc2</p>
					</div>
					<a href="$F3link2">
					<div class="button-hldr button">
						<p>Learn More</p>
					</div>
					</a>
				</div>
				</transition>
				<transition name="slide-fade">
				<div class="tabbing" v-if="activetab == 3">
					<div class="tab-content">
						<p>$F3Desc1</p>
					</div>
					<a href="$F3link3">
					<div class="button-hldr button">
						<p>Learn More</p>
					</div>
					</a>
				</div>
				</transition>
			</div
			><div class="right-cntnr">
				<div class="image-hldr">
					<transition name="slide-fade">
					<div v-if="activetab == 1" class="img" style="background-image: url('$F3Img1.URL');"></div>
					</transition>
					<transition name="slide-fade">
					<div v-if="activetab == 2" class="img" style="background-image: url('$F3Img2.URL');"></div>
					</transition>
					<transition name="slide-fade">
					<div v-if="activetab == 3" class="img" style="background-image: url('$F3Img3.URL');"></div>
					</transition>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="hm_frame4">
	<div class="frm-cntnr">
		<div class="hm_frame4-content">
			<div class="hm_frame4-title">
				<h2>$F4Title</h2>
			</div>
			<div class="hm_frame4-desc">
				<p>$F4Desc</p>
			</div>
		</div>
	</div>
</div>
<div class="hm_frame5">
	<div class="hm_frame5-cntnr">
		<div class="hm_frame5-bg" style="background-image: url('$ThemeDir/images/f5.png');"></div>
		<%-- <img src="$ThemeDir/images/f5.png" alt=""> --%>
		<div class="frm-cntnr width--90">
			<div class="f5-title">
				<h2>$F5Title</h2>
			</div>
			<div class="f5-desc">
				$F5Desc
			</div>
			<div class="solution-slider">
				<% loop $SolutionPage %>
				<% loop $Solutions %>
				<div class="solution-cntnr">
					<div class="solution-logo">
						<div class="logo" style="background-image: url('$Image.URL');"></div>
					</div>
					<div class="solution-title">
						<h3>$SolTitle</h3>
					</div>
					<div class="solution-desc">
						<p>$Teaser</p>
					</div>
				</div>
				<% end_loop %>
				<% end_loop %>
			</div>
			<a href="$F5Link">
			<div class="button-hldr button">
				<p>Learn More</p>
			</div>
			</a>
		</div>
	</div>
	<div class="f6-cntnr">
		<div class="f6-title">
			<h2>$F6Title</h2>
		</div>
		<div class="f6-desc">
			<p>$F6Desc</p>
		</div>
		<a href="$F6Link">
		<div class="button-hldr button">
			<p>Join Our Team</p>
		</div>
		</a>
	</div>
</div>
<div class="hm_frame7">
	<div class="frm-cntnr width--80">
		<div class="inlineBlock-parent">
			<div class="logo-holder">
				<div class="logo-title">
					<h2>$F7Title</h2>
				</div>
				<div class="logo-cntnr">
					<div class="logo" style="background-image: url('$F7IMG.URL');"></div>
				</div>
			</div
			><div class="hm_frame7-desc">
				<div class="desc-cntnr">
					<p>$F7Desc</p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="hm_frame8">
	<div class="hm_frame8-bg" style="background-image: url('$ThemeDir/images/f8.png');"></div>
	<div class="frm-cntnr width--80">
		<div class="f8-title">
			<h2>$F8Title</h2>
		</div>
		<div class="f8-image-slider">
			<% loop $Histories %>
			<div class="image-cntnr">
				<div class="image" style="background-image: url('$Image.URL');">
					<div class="content-hldr">
						<div class="content-title">
							<h2>$HTitle</h2>
						</div>
						<div class="content-desc">
							<p>$Desc</p>
						</div>
					</div>
				</div>
			</div>
			<% end_loop %>
		</div>
		<div class="year-slider-cntnr">
			<div class="year-slider">
				<% loop $Histories %>
				<div class="year-hldr">
					<div class="year-cntnr">
						<div class="year">
							<h2>$Year</h2>
						</div>
					</div>
				</div>
				<% end_loop %>
			</div>
		</div>
	</div>
</div>
<div class="hm_frame9">
	<img class="hm_frame9-bg" src="$ThemeDir/images/f9bg.png" alt="">
	<div class="frm-cntnr width--90">
		<div class="inlineBlock-parent">
			<div class="video-cntnr">
				<div class="video-thumbnail" style="background-image: url('$F9IMG.URL');"></div>
			</div
			><div class="hm_frame9-content">
				<div class="content-hldr">
					<div class="f9-title">
						<h2>$F9Title</h2>
					</div>
					<div class="f9-desc">
						<p>$F9Desc</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="hm_frame10">
	<%-- <div class="hm_frame10-bg" style="background-image: url('$ThemeDir/images/f5.png');"></div> --%>
	<img class="hm_frame10-bg" src="$ThemeDir/images/f5.png" alt="">
	<div class="frm-cntnr width--90">
		<div class="location-cntnr">
			<% loop $Locations %>
			<div class="loc-hldr">
				<div class="loc-logo">
					<img src="$Image.URL" alt="">
				</div>
				<div class="loc-title">
					<p>$Name</p>
				</div>
				<div class="loc-desc">
					<p>$Address</p>
				</div>
				<div class="loc-link">
					<a href="$LLink">View Map</a>
				</div>
				<div class="loc-details">
					$Contact
				</div>
			</div>
			<% end_loop %>
		</div>
	</div>
</div>
<div class="hm_frame11">
	<div class="frm-cntnr width--80">
		<div class="hm_frame11-title">
			<h2>$F11Title</h2>
		</div>
		<div class="affiliate-slider">
			<% loop $Affiliates %>
			<div class="affiliate-cntnr">
				<div class="vertical-parent">
					<div class="vertical-align">
						<a href="$ALink">
							<img class="affiliate-logo" src="$Image.URL" alt="">
						</a>
					</div>
				</div>
			</div>
			<% end_loop %>
		</div>
	</div>
</div>
