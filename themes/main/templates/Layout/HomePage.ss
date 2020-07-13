<div class="hm_frame1">
	<div class="hm_frame1-bg">
		<% loop $HomeBanners %>
		<div class="bg-holder">
			<% if $VidFile.URL %>
			<video id="hm-fr1__vid" autoplay="" muted="" loop="" playsinline="" poster="$Banner.URL">
				<% if $VidFile %>
					<source src="$VidFile.URL">
				<% else_if $Fr1File2 %>
					<source src="$Fr1File2">
				<% end_if %>
				<p>Your browser does not support the <code>video</code> element </p>
			</video>
			<% else_if $Banner %>
			<img src="$Banner.URL" alt="">
			<% end_if %>
			<div class="gradient-bg"></div>
		</div>
		<% end_loop %>
	</div>
	<div class="frm-cntnr width--90">
		<div class="hm_frame1-content">
			<div class="frame1-slider animate-up">
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
			<div class="hm_frame1-search fadeIn">
				<form action="{$BaseHref}search" method="GET">
					<input type="text" name="q" placeholder="Search">
					<button class="btn-search">
					<div class="search-btn" style="background-image: url('$ThemeDir/images/search.png');">
					</div>
					</button>
				</form>
				<div class="progressBarContainer inlineBlock-parent">
					<% loop HomeBanners %>
					<div class="item">
						<span class="progressBar"></span>
					</div>
					<% end_loop %>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="hm_frame2">
	<div class="hm_frame2-bg" style="background-image: url('$F2Bg.URL');"></div>
	<div class="frm-cntnr width--80">
		<div class="vertical-parent">
			<div class="vertical-align">
				<div class="f2-content staggerup_hldr">
					<div class="f2-title staggerup">
						<h2>$F2Title</h2>
					</div>
					<div class="f2-desc staggerup">
						<p>$F2Desc</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="hm_frame3" id="tabs">
	<div class="hm_frame3-bg" style="background-image: url('$F3Bg.URL');"></div>
	<div class="frm-cntnr width--90">
		<div class="content-container inlineBlock-parent">
			<div class="left-cntnr staggerup_hldr1">
				<div class="tabbing-hldr fadeIn">
					<div class="tab-cntnr active" data-id="1">
						<p>$F3Title1</p>
					</div
					><div class="tab-cntnr" data-id="2">
						<p>$F3Title2</p>
					</div
					><div class="tab-cntnr" data-id="3">
						<p>$F3Title3</p>
					</div>
				</div>
				<%-- <transition name="slide-fade" mode="out-in"> --%>
				<div class="tabbing" data-target="1">
					<div class="tab-content fadeIn">
						<p>$F3Desc1</p>
					</div>
					<div class="btn-con">
						<a href="$F3link1">
						<div class="button-hldr button fadeIn">
							<p>$F3Btn1</p>
						</div>
						</a>
					</div>
				</div>
				<%-- </transition>
				<transition name="slide-fade" mode="out-in"> --%>
				<div class="tabbing" data-target="2">
					<div class="tab-content">
						<p>$F3Desc2</p>
					</div>
					<div class="btn-con">
						<a href="$F3link2">
						<div class="button-hldr button">
							<p>$F3Btn2</p>
						</div>
						</a>
					</div>
				</div>
				<%-- </transition>
				<transition name="slide-fade" mode="out-in"> --%>
				<div class="tabbing" data-target="3">
					<div class="tab-content">
						<p>$F3Desc1</p>
					</div>
					<div class="btn-con">
						<a href="$F3link3">
						<div class="button-hldr button">
							<p>$F3Btn3</p>
						</div>
						</a>
					</div>
				</div>
				<%-- </transition> --%>
			</div
			><div class="right-cntnr fadeIn">
				<div class="image-hldr">
					<%-- <transition name="slide-fade" mode="out-in"> --%>
					<div data-target="1" class="img" style="background-image: url('$F3Img1.URL');"></div>
					<%-- </transition>
					<transition name="slide-fade" mode="out-in"> --%>
					<div data-target="2" class="img" style="background-image: url('$F3Img2.URL');"></div>
					<%-- </transition>
					<transition name="slide-fade" mode="out-in"> --%>
					<div data-target="3" class="img" style="background-image: url('$F3Img3.URL');"></div>
					<%-- </transition> --%>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="hm_frame4">
	<div class="frm-cntnr">
		<div class="hm_frame4-content staggerup_hldr2">
			<div class="hm_frame4-title staggerup2">
				<h2>$F4Title</h2>
			</div>
			<div class="hm_frame4-desc staggerup2">
				<p>$F4Desc</p>
			</div>
		</div>
	</div>
</div>
<div class="hm_frame5">
	<div class="hm_frame5-cntnr">
		<div class="hm_frame5-bg" style="background-image: url('$ThemeDir/images/f5.png');"></div>
		<%-- <img src="$ThemeDir/images/f5.png" alt=""> --%>
		<div class="frm-cntnr width--90 staggerup_hldr3">
			<div class="f5-title staggerup3">
				<h2>$F5Title</h2>
			</div>
			<div class="f5-desc staggerup3">
				$F5Desc
			</div>
			<div class="solution-slider staggerup3">
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
				<p>$F5Btn</p>
			</div>
			</a>
		</div>
	</div>
	<div class="f6-cntnr staggerup_hldr4">
		<div class="f6-title staggerup4">
			<h2>$F6Title</h2>
		</div>
		<div class="f6-desc staggerup4">
			<p>$F6Desc</p>
		</div>
		<a href="$F6Link">
		<div class="button-hldr button staggerup4">
			<p>$F6Btn</p>
		</div>
		</a>
	</div>
</div>
<div class="hm_frame7">
	<div class="frm-cntnr width--80 staggerup_hldr5">
		<div class="inlineBlock-parent">
			<div class="logo-holder">
				<div class="logo-title staggerup5">
					<h2>$F7Title</h2>
				</div>
				<div class="logo-cntnr staggerup5">
					<div class="logo" style="background-image: url('$F7IMG.URL');"></div>
				</div>
			</div
			><div class="hm_frame7-desc">
				<div class="desc-cntnr staggerup5">
					<p>$F7Desc</p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="hm_frame8">
	<div class="hm_frame8-bg" style="background-image: url('$F8Bg.URL');"></div>
	<div class="frm-cntnr">
		<div class="f8-title fadeIn">
			<h2>$F8Title</h2>
			<ion-icon name="chevron-back-outline"></ion-icon>
		</div>
		<div class="f8-image-slider fadeIn">
			<% loop $Histories %>
			<div class="image-cntnr">
				<div class="image" style="background-image: url('$Image.URL');">
					<div class="gradient"></div>
					<div class="content-hldr">
						<div class="content-title">
							<h2>$HTitle</h2>
						</div>
						<div class="content-desc">
							<p>$Desc</p>
						</div>
					</div>
				</div>
				<div class="m-content fadeIn">
					<div class="content-title">
						<h2>$HTitle</h2>
					</div>
					<div class="content-desc">
						<p>$Desc</p>
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
			<div class="video-cntnr fadeIn">
				<div class="video-thumbnail" data-remodal-target="vid1" style="background-image: url('$F9IMG.URL');">
					<img src="$ThemeDir/images/play.png" alt="">
				</div>
			</div
			><div class="hm_frame9-content">
				<div class="content-hldr staggerup_hldr7">
					<div class="f9-title staggerup7">
						<h2>$F9Title</h2>
					</div>
					<div class="f9-desc staggerup7">
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
	<div class="frm-cntnr width--90 staggerup_hldr8">
		<div class="location-cntnr">
			<% loop $Locations %>
			<div class="loc-hldr">
				<div class="loc-logo staggerup8">
					<img src="$Image.URL" alt="">
				</div>
				<div class="loc-title">
					<p>$Name</p>
				</div>
				<div class="loc-desc">
					<p>$Address</p>
				</div>
				<div class="loc-link">
					<a href="$LLink" target="_blank">View Map</a>
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
		<div class="hm_frame11-title fadeIn">
			<h2>$F11Title</h2>
		</div>
		<div class="affiliate-slider staggerup_hldr9">
			<% loop $Affiliates %>
			<div class="affiliate-cntnr">
				<div class="vertical-parent">
					<div class="vertical-align">
						<a href="$ALink">
							<img class="affiliate-logo staggerup9" src="$Image.URL" alt="">
						</a>
					</div>
				</div>
			</div>
			<% end_loop %>
		</div>
	</div>
</div>

<% include VideoModal %>
