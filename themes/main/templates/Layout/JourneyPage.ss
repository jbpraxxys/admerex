<div class="jrny_frame1" id="news">
	<div class="jrny_frame1-bg" style="background-image: url('$F1BG.URL');"></div>
	<div class="frm-cntnr">
		<div class="jrny_frame1-content staggerup_hldr">
			<div class="jrny_frame1-header staggerup">
				<h2>$F1Title</h2>
			</div>
			<div class="jrny_frame1-text staggerup">
				<p>$F1Desc</p>
			</div>
		</div>
	</div>
</div>
<div class="jrny_frame2">
	<div class="jrny_frame2-bg" style="background-image: url('$ThemeDir/images/f5.png');"></div>
	<div class="frm-cntnr width--90">
		<%-- <div class="content-hldr staggerup_hldr1">
			<% loop $Announcements.Sort(SortOrder) %>
			
			<div class="inlineBlock-parent journey-cntnr">
				<div class="image-hldr fadeIn">
					<div class="image" style="background-image: url('$Image.URL');"></div>
				</div
				><div class="desc-hldr">
					<div class="d-title staggerup1">
						<h2>$ATitle</h2>
					</div>
					<div class="d-date staggerup1">
						<p>$Date</p>
					</div>
					<div class="d-desc staggerup1">
						<p>$Desc</p>
					</div>
				</div>
			</div>
			<% end_loop %>
		</div> --%>
		<div class="upper-news__hldr">
			<div class="upper-news__slider">
				<% loop $Children %>
				<% if $Featured %>
				<div class="upper-news__item">
					<div class="upper-news__item-wrapper">
						<div class="upper-news__date">
							<h6>$Date.Month $Date.Format('dd'), $Date.Year</h6>
						</div>
						<div class="inlineBlock-parent upper-news__title-cntnr">
							<div class="upper-news__title align-b">
								<h1 class="text-bold line-clamp-2">$Header</h1>
							</div
							><div class="upper-news__btn align-b">
								<a href="$Link">
									<div class="button fadeIn">
										<p>Read</p>
									</div>
								</a>
							</div>
						</div>
						<div class="upper-news__banner">
							<div class="upper-news__banner-img" style="background-image: url('$Image.URL')"></div>
							<div class="gradient"></div>
						</div>
					</div>
				</div>
				<% end_if %>
				<% end_loop %>
			</div>
		</div>
		<div class="news-holder">
			<div class="inlineBlock-parent m-margin-b">
				<div class="news-holder__title">
					<h1 class="text-bold green">News</h1>
				</div
				><div class="news-holder__filter">
					<div class="select-hldr">
						<select class="sel-month" @change="filterNews" v-model="sortBy">
							<option value="" disabled="">Filter by: Date</option>
							<option value="All" selected>All</option>
					        <option value="January">January</option>
					        <option value="February">February</option>
					        <option value="March">March</option>
					        <option value="April">April</option>
					        <option value="May">May</option>
					        <option value="June">June</option>
					        <option value="July">July</option>
					        <option value="August">August</option>
					        <option value="September">September</option>
					        <option value="October">October</option>
					        <option value="November">November</option>
					        <option value="December">December</option>
					    </select> 
						<i class="fas fa-chevron-down"></i>
					</div>
				</div>
			</div>
			<div class="news-container">
				<div class="result-cntnr animate-up" v-if="news.length === 0">
				     <strong>No Results Found</strong>  
				</div>
				<div class="news-card" v-for="n in news">
					<div class="inlineBlock-parent">
						<div class="image-hldr align-t">
							<div class="image-wrap">
								<div class="img" :style="{ backgroundImage: 'url(' + n.newsImage + ')' }"></div>
							</div>
						</div
						><div class="news-teaser align-t">
							<div class="news-date">
								<h6>{{ n.newsDate | moment }}</h6>
							</div>
							<div class="news-title">
								<h3 class="line-clamp-2">{{ n.newsTitle }}</h3>
							</div>
							<div class="news-link">
								<a class="text-bold" :href="n.newsLink">READ MORE</a>
							</div>
						</div>
					</div>
				</div>
				<%-- <% loop $Children %>
				<% if $Featured %>
				<% else %>
				<div class="news-card">
					<div class="inlineBlock-parent">
						<div class="image-hldr align-t">
							<div class="image-wrap">
								<div class="img" style="background-image: url('$Image.URL')"></div>
							</div>
						</div
						><div class="news-teaser align-t">
							<div class="news-date">
								<h6>$Date.Month $Date.Format('dd'), $Date.Year</h6>
							</div>
							<div class="news-title">
								<h3 class="line-clamp-2">$Header</h3>
							</div>
							<div class="news-link">
								<a class="text-bold" href="$Link">READ MORE</a>
							</div>
						</div>
					</div>
				</div>
				<% end_if %>
				<% end_loop %> --%>
			</div>
			<div class="news-pagination align-c">
				<% include Pagination %>
			</div>
		</div>
	</div>
</div>
<div class="jrny_frame3">
	<div class="jrny_frame3-bg" style="background-image: url('$ThemeDir/images/f5.png');"></div>
	<div class="frm-cntnr staggerup_hldr2">
		<div class="jrny-img-slider">
			<% loop $Articles.Sort(SortOrder) %>
			<div class="image-cntnr">
				<div class="image fadeIn" style="background-image: url('$Image.URL');"></div>
			</div>
			<% end_loop %>
		</div>
		<div class="jrny-cont-slider">
			<% loop $Articles.Sort(SortOrder) %>
			<div class="content-hldr">
				<div class="content-cntnr">
					<div class="title staggerup2">
						<h2>$ATitle</h2>
					</div>
					<div class="date staggerup2">
						<p>$Date</p>
					</div>
					<div class="desc staggerup2">
						<p>$Desc</p>
					</div>
				</div>
			</div>
			<% end_loop %>
		</div>
	<%-- 	<div class="pagination-slider">
			<% loop $Articles %>
			    <div class="number">$ID</div>
			<% end_loop %>
		</div> --%>
	</div>
</div>