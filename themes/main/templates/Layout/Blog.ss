<div class="blog">
	<div class="frm-cntnr width--90">
		<div class="back-btn">
			<a href="$Parent.Link">
				<div class="inlineBlock-parent">
					<i class="fas fa-long-arrow-alt-left s-margin-r green"></i><p class="green">Back to Journal</p>
				</div>
			</a>
		</div>
		<div class="blog-content">
			<div class="blog-date">
				<h6 class="gray--600">$Date.Month $Date.Format('dd'), $Date.Year</h6>
			</div>
			<div class="blog-title">
				<h1 class="text-bold">$Header</h1>
			</div>
			<div class="blog-desc">
				$Desc
			</div>
		</div>
		<div class="blog-image">
			<div class="image" style="background-image: url('$Image.URL')"></div>
		</div>
		<div class="blog-btn">
			<a href="$Parent.Link">
				<div class="button-hldr button">
					<p>Back</p>
				</div>
			</a>
		</div>
		<div class="blog-holder">
			<div class="inlineBlock-parent">
				<div class="blog-holder__title">
					<h1 class="text-bold green">Related Article</h1>
				</div>
			</div>
			<div class="blog-container">
				<% loop $Parent.Children %>
				<% if $isCurrent %>
				<% else %>
				<div class="blog-card">
					<div class="inlineBlock-parent">
						<div class="image-hldr align-t">
							<div class="image-wrap">
								<div class="img" style="background-image: url('$Image.URL')"></div>
							</div>
						</div
						><div class="blog-teaser align-t">
							<div class="blog-date">
								<h6>$Date.Month $Date.Format('dd'), $Date.Year</h6>
							</div>
							<div class="blog-title">
								<h3 class="line-clamp-2">$Header</h3>
							</div>
							<div class="blog-link">
								<a class="text-bold" href="$Link">READ MORE</a>
							</div>
						</div>
					</div>
				</div>
				<% end_if %>
				<% end_loop %>
			</div>
		</div>
	</div>
</div>