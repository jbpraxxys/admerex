<div class="hdr-frame">
	<div class="header <% if ClassName != HomePage %>header-scroll<% end_if %>">
		<div class="vertical-parent">
			<div class="vertical-align">
				<div class="inlineBlock-parent hdr-cntnr">
					<div class="header__logo-cntnr">
						<a href="$AbsoluteBaseURL">
							<div class="logo-container">
								<% loop HeaderFooter %>
								<div class="header__logo" style="background-image: url('$Logo2.URL');"></div>
								<div class="header__logo2" style="background-image: url('$Logo.URL');"></div>
								<% end_loop %>
							</div>
						</a>
					</div
					><div class="header__menu-cntnr">
						<div class="header__menu-hldr">
							<div class="inlineBlock-parent">
								<% loop $Menu(1) %><div class="link-hldr $Linkingmode">
										<a href="$Link">$Title</a>
								</div><% end_loop %>
							</div>	
						</div
						><div class="bar-hldr">
							<div class="vertical-parent">
								<div class="vertical-align">
									<i class="fas fa-bars"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="m-menu-hldr">
	<div class="wrapper">
		<div class="m-exit">
			<i class="fas fa-times"></i>
		</div>

		<div class="m-logo">
			<% loop HeaderFooter %>
			<div class="logo" style="background-image: url('$Logo.URL')"></div>
			<% end_loop %>
		</div>

		<div class="m-menu-cntnr">
			<% loop $Menu(1) %>
			<div class="m-link $LinkingMode">
				<a href="$Link">$Title</a>
			</div>
			<% end_loop %>
		</div>
	</div>
</div>
