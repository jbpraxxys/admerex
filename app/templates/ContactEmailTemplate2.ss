<!doctype html>
<html>
	<head>
		<style>
			@import url("https://fonts.googleapis.com/css?family=Ubuntu&display=swap");
			
			html {
				font-family: 'Ubuntu', sans-serif;
			}

			/** 
			 * COLORS
			 */
			.color--black {
				color: #333;
			}

			.color--gray {
				color: #5f5f5f;
			}

			.color--brown {
				color: #30292a;
			}

			.color--white {
				color: #ffffff;
			}

			strong {
				font-weight: bold;
			}
			 

			/** 
			 * EMAIL : Template
			 */
			.email-template__holder {
				width: 900px;
				padding: 50px 0px;
				margin: auto;
				background: #ececec;
			}

			.email-template__card {
				width: 80%;
				margin: auto;
				background: white;
			}

			.email-template__card-limit {
				width: 80%;
				margin: auto;
				background: white;
			}

			.email-template__header {
				text-align: center;
				width: 100%;
				padding-top: 60px;
			}

			.email-template__logo {
				max-width: 250px;
				color: #005792;
			}

			.email-template__description {
				padding-top: 10px;
				padding-bottom: 60px;
			}

			.email-template__description > * {
				font-size: 1.1em;
			}

		</style>
	</head>
	<body>
		<div class="email-template__holder">
			<div class="email-template__card">
				<div class="email-template__card-limit">
					<div class="email-template__header">
						<img class="email-template__logo" src="https://lh3.googleusercontent.com/CS2dKRNVGG7ldozi4d4LJxGO6MSBcNMq204H2tTJyAq67jmcLyR_m4Qjrfdh9Eg4QOO2Quf9xjZI_napCzmwHckwUX2DvBgBa3iquyuiLmEChDeDOiTluc7z8uj27R4LxAlqy4arSgAdICCqfbNtiDH0XhlYOOjN2jRaBPkAmB-XCPILs1TUsByF1hP6twKEpwqFkn-ZB73J0aQtH6J6QyE9VOcJHe3voBhuYy4s542d7OIl98DrdC_GQncfumxK91Oqft1mNT-9wVAGQ_bz7dpZIJcZySAZdBFySLZRCkk69FkrNFbSiJQ4Zi16x4-qLmTmJVsyQAKU0E09c17ASSopNGM18ySwyG--drRRHSc_f9tKfkcLvbIq8OIbV_rehOzGQhpgUshwoBJpcmtlxG4-XOTuTev4OqPQgd9tfS-KMN40srdyz8tM3X6QCId0FdOEcbDiYIVR14TCfGjC93YOT9skmUluOxExc-m4l0IRlfhyVQ2jHHfrcO2oadXrxlXwzq__9-ujCUReuYXzENDrFspwThBL6sJXux_Z7cZFPLmx-lQT2wBe9qVOKN5opNC3MEKttWH8Z8V0Il0b-ssqo1bPOGes3erNcUOo-LtPLcLmMCr8Ses-KQ=w1317-h637">
					</div>
					<div class="email-template__description">
						<br>
						<p class="color--back"><strong>Message Details</strong></p>
						<br>
						<p class="color--back"><strong>Full Name :</strong> {$fullname}</p>
						<p class="color--back"><strong>Contact Number :</strong> {$contact}</p>
						<p class="color--back"><strong>Line of Business :</strong> {$business}</p>
						<p class="color--back"><strong>Email Address :</strong> {$email}</p>
						<p class="color--back"><strong>Service interested In :</strong> {$service}</p>
						<br>
						<br>
						<p class="color--back">Thank You,</p>
						<p class="color--back">Best Regards</p>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>