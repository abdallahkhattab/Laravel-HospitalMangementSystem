@extends('WebSite.layouts.master')

@section('content')
	<!-- Main Slider Three -->
	<section class="main-slider-three">
		<div class="banner-carousel">
			<!-- Swiper -->
			<div class="swiper-wrapper">

				<div class="swiper-slide slide">
					<div class="auto-container">
						<div class="row clearfix">

							<!-- Content Column -->
							<div class="content-column col-lg-6 col-md-12 col-sm-12">
								<div class="inner-column">
									<h2>{{ __('Website/messages.trusted_health_partner') }}</h2>
									<div class="text">{{ __('Website/messages.consulting_text') }}</div>
									<div class="btn-box">
										<a href="contact.html" class="theme-btn appointment-btn"><span class="txt">{{ __('Website/messages.appointment') }}</span></a>
										<a href="services.html" class="theme-btn services-btn">{{ __('Website/messages.services') }}</a>
									</div>
								</div>
							</div>

							<!-- Image Column -->
							<div class="image-column col-lg-6 col-md-12 col-sm-12">
								<div class="inner-column">
									<div class="image">
										<img src="images/main-slider/3.jpg" alt="" />
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>

				<div class="swiper-slide slide">
					<div class="auto-container">
						<div class="row clearfix">

							<!-- Content Column -->
							<div class="content-column col-lg-6 col-md-12 col-sm-12">
								<div class="inner-column">
									<h2>{{ __('Website/messages.trusted_health_partner') }}</h2>
									<div class="text">{{ __('Website/messages.consulting_text') }}</div>
									<div class="btn-box">
										<a href="contact.html" class="theme-btn appointment-btn"><span class="txt">{{ __('Website/messages.appointment') }}</span></a>
										<a href="services.html" class="theme-btn services-btn">{{ __('Website/messages.services') }}</a>
									</div>
								</div>
							</div>

							<!-- Image Column -->
							<div class="image-column col-lg-6 col-md-12 col-sm-12">
								<div class="inner-column">
									<div class="image">
										<img src="images/main-slider/3.jpg" alt="" />
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>

				<div class="swiper-slide slide">
					<div class="auto-container">
						<div class="row clearfix">

							<!-- Content Column -->
							<div class="content-column col-lg-6 col-md-12 col-sm-12">
								<div class="inner-column">
									<h2>{{ __('Website/messages.trusted_health_partner') }}</h2>
									<div class="text">{{ __('Website/messages.consulting_text') }}</div>
									<div class="btn-box">
										<a href="contact.html" class="theme-btn appointment-btn"><span class="txt">{{ __('Website/messages.appointment') }}</span></a>
										<a href="services.html" class="theme-btn services-btn">{{ __('Website/messages.services') }}</a>
									</div>
								</div>
							</div>

							<!-- Image Column -->
							<div class="image-column col-lg-6 col-md-12 col-sm-12">
								<div class="inner-column">
									<div class="image">
										<img src="images/main-slider/3.jpg" alt="" />
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>

			</div>
			<!-- Add Arrows -->
			<div class="swiper-button-next"></div>
			<div class="swiper-button-prev"></div>
		</div>
	</section>
	<!-- End Main Slider -->

	<!-- Health Section -->
	<section class="health-section">
		<div class="auto-container">
			<div class="inner-container">
				<div class="row clearfix">

					<!-- Content Column -->
					<div class="content-column col-lg-7 col-md-12 col-sm-12">
						<div class="inner-column">
							<div class="border-line"></div>
							<!-- Sec Title -->
							<div class="sec-title">
								<h2>{{ __('Website/messages.who_we_are') }} <br> {{ __('Website/messages.pioneering_health') }}</h2>
								<div class="separator"></div>
							</div>
							<div class="text">{{ __('Website/messages.about_text') }}</div>
							<a href="about.html" class="theme-btn btn-style-one"><span class="txt">{{ __('Website/messages.more_about_us') }}</span></a>
						</div>
					</div>

					<!-- Image Column -->
					<div class="image-column col-lg-5 col-md-12 col-sm-12">
						<div class="inner-column wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
							<div class="image">
								<img src="images/resource/image-3.jpg" alt="" />
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>
	<!-- End Health Section -->

	<!-- Featured Section -->
	<section class="featured-section">
		<div class="auto-container">
			<div class="row clearfix">

				<!-- Feature Block -->
				<div class="feature-block col-lg-3 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="upper-box">
							<div class="icon flaticon-doctor-stethoscope"></div>
							<h3><a href="#">{{ __('Website/messages.medical_treatment') }}</a></h3>
						</div>
						<div class="text">{{ __('Website/messages.feature_text') }}</div>
					</div>
				</div>

				<!-- Feature Block -->
				<div class="feature-block col-lg-3 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="250ms" data-wow-duration="1500ms">
						<div class="upper-box">
							<div class="icon flaticon-ambulance-side-view"></div>
							<h3><a href="#">{{ __('Website/messages.emergency_help') }}</a></h3>
						</div>
						<div class="text">{{ __('Website/messages.feature_text') }}</div>
					</div>
				</div>

				<!-- Feature Block -->
				<div class="feature-block col-lg-3 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="500ms" data-wow-duration="1500ms">
						<div class="upper-box">
							<div class="icon fas fa-user-md"></div>
							<h3><a href="#">{{ __('Website/messages.qualified_doctors') }}</a></h3>
						</div>
						<div class="text">{{ __('Website/messages.feature_text') }}</div>
					</div>
				</div>

				<!-- Feature Block -->
				<div class="feature-block col-lg-3 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="750ms" data-wow-duration="1500ms">
						<div class="upper-box">
							<div class="icon fas fa-briefcase-medical"></div>
							<h3><a href="#">{{ __('Website/messages.medical_professionals') }}</a></h3>
						</div>
						<div class="text">{{ __('Website/messages.feature_text') }}</div>
					</div>
				</div>

			</div>
		</div>
	</section>
	<!-- End Featured Section -->

	<!-- Department Section Three -->
	<section class="department-section-three">
		<div class="image-layer" style="background-image:url(images/background/6.jpg)"></div>
		<div class="auto-container">
			<!-- Department Tabs -->
			<div class="department-tabs tabs-box">
				<div class="row clearfix">
					<!-- Column -->
					<div class="col-lg-4 col-md-12 col-sm-12">
						<!-- Sec Title -->
						<div class earl="sec-title light">
							<h2>{{ __('Website/messages.health_department') }}</h2>
							<div class="separator"></div>
						</div>
						<!-- Tab Btns -->
						<ul class="tab-btns tab-buttons clearfix">
							<li data-tab="#tab-urology" class="tab-btn">{{ __('Website/messages.urology_department') }}</li>
							<li data-tab="#tab-department" class="tab-btn active-btn">{{ __('Website/messages.neurology_department') }}</li>
							<li data-tab="#tab-gastrology" class="tab-btn">{{ __('Website/messages.gastrology_department') }}</li>
							<li data-tab="#tab-cardiology" class="tab-btn">{{ __('Website/messages.cardiology_department') }}</li>
							<li data-tab="#tab-eye" class="tab-btn">{{ __('Website/messages.eye_care_department') }}</li>
						</ul>
					</div>
					<!-- Column -->
					<div class="col-lg-8 col-md-12 col-sm-12">
						<!-- Tabs Container -->
						<div class="tabs-content">

							<!-- Tab -->
							<div class="tab" id="tab-urology">
								<div class="content">
									<h2>{{ __('Website/messages.urology_department') }}</h2>
									<div class="title">{{ __('Website/messages.neurology_department') }}</div>
									<div class="text">
										<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.</p>
										<p>Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.</p>
									</div>
									<div class="two-column row clearfix">
										<div class="column col-lg-6 col-md-6 col-sm-12">
											<h3>01 - {{ __('Website/messages.neurology_service') }}</h3>
											<div class="column-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus</div>
										</div>
										<div class="column col-lg-6 col-md-6 col-sm-12">
											<h3>02 - {{ __('Website/messages.neurology_service') }}</h3>
											<div class="column-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus</div>
										</div>
									</div>
									<a href="doctors-detail.html" class="theme-btn btn-style-two"><span class="txt">{{ __('Website/messages.view_more') }}</span></a>
								</div>
							</div>

							<!-- Tab -->
							<div class="tab active-tab" id="tab-department">
								<div class="content">
									<h2>{{ __('Website/messages.neurology_department') }}</h2>
									<div class="title">{{ __('Website/messages.neurology_department') }}</div>
									<div class="text">
										<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.</p>
										<p>Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.</p>
									</div>
									<div class="two-column row clearfix">
										<div class="column col-lg-6 col-md-6 col-sm-12">
											<h3>01 - {{ __('Website/messages.neurology_service') }}</h3>
											<div class="column-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus</div>
										</div>
										<div class="column col-lg-6 col-md-6 col-sm-12">
											<h3>02 - {{ __('Website/messages.neurology_service') }}</h3>
											<div class="column-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus</div>
										</div>
									</div>
									<a href="doctors-detail.html" class="theme-btn btn-style-two"><span class="txt">{{ __('Website/messages.view_more') }}</span></a>
								</div>
							</div>

							<!-- Tab -->
							<div class="tab" id="tab-gastrology">
								<div class="content">
									<h2>{{ __('Website/messages.gastrology_department') }}</h2>
									<div class="title">{{ __('Website/messages.neurology_department') }}</div>
									<div class="text">
										<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.</p>
										<p>Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.</p>
									</div>
									<div class="two-column row clearfix">
										<div class="column col-lg-6 col-md-6 col-sm-12">
											<h3>01 - {{ __('Website/messages.neurology_service') }}</h3>
											<div class="column-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus</div>
										</div>
										<div class="column col-lg-6 col-md-6 col-sm-12">
											<h3>02 - {{ __('Website/messages.neurology_service') }}</h3>
											<div class="column-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus</div>
										</div>
									</div>
									<a href="doctors-detail.html" class="theme-btn btn-style-two"><span class="txt">{{ __('Website/messages.view_more') }}</span></a>
								</div>
							</div>

							<!-- Tab -->
							<div class="tab" id="tab-cardiology">
								<div class="content">
									<h2>{{ __('Website/messages.cardiology_department') }}</h2>
									<div class="title">{{ __('Website/messages.neurology_department') }}</div>
									<div class="text">
										<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.</p>
										<p>Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.</p>
									</div>
									<div class="two-column row clearfix">
										<div class="column col-lg-6 col-md-6 col-sm-12">
											<h3>01 - {{ __('Website/messages.neurology_service') }}</h3>
											<div class="column-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus</div>
										</div>
										<div class="column col-lg-6 col-md-6 col-sm-12">
											<h3>02 - {{ __('Website/messages.neurology_service') }}</h3>
											<div class="column-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus</div>
										</div>
									</div>
									<a href="doctors-detail.html" class="theme-btn btn-style-two"><span class="txt">{{ __('Website/messages.view_more') }}</span></a>
								</div>
							</div>

							<!-- Tab -->
							<div class="tab" id="tab-eye">
								<div class="content">
									<h2>{{ __('Website/messages.eye_care_department') }}</h2>
									<div class="title">{{ __('Website/messages.neurology_department') }}</div>
									<div class="text">
										<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.</p>
										<p>Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.</p>
									</div>
									<div class="two-column row clearfix">
										<div class="column col-lg-6 col-md-6 col-sm-12">
											<h3>01 - {{ __('Website/messages.neurology_service') }}</h3>
											<div class="column-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus</div>
										</div>
										<div class="column col-lg-6 col-md-6 col-sm-12">
											<h3>02 - {{ __('Website/messages.neurology_service') }}</h3>
											<div class="column-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus</div>
										</div>
									</div>
									<a href="doctors-detail.html" class="theme-btn btn-style-two"><span class="txt">{{ __('Website/messages.view_more') }}</span></a>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Department Section -->

	<!-- Team Section -->
	<section class="team-section">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title centered">
				<h2>{{ __('Website/messages.medical_specialists') }}</h2>
				<div class="separator"></div>
			</div>

			<div class="row clearfix">

				<!-- Team Block -->
				<div class="team-block col-lg-3 col-md-6 col-sm-6 col-xs-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="image">
							<img src="images/resource/team-1.jpg" alt="" />
							<div class="overlay-box">
								<ul class="social-icons">
									<li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
									<li><a href="#"><span class="fab fa-google"></span></a></li>
									<li><a href="#"><span class="fab fa-twitter"></span></a></li>
									<li><a href="#"><span class="fab fa-skype"></span></a></li>
									<li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
								</ul>
								<a href="#" class="appointment">{{ __('Website/messages.make_appointment') }}</a>
							</div>
						</div>
						<div class="lower-content">
							<h3><a href="#">Dr. Andria Jonea</a></h3>
							<div class="designation">{{ __('Website/messages.cancer_specialist') }}</div>
						</div>
					</div>
				</div>

				<!-- Team Block -->
				<div class="team-block col-lg-3 col-md-6 col-sm-6 col-xs-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="250ms" data-wow-duration="1500ms">
						<div class="image">
							<img src="images/resource/team-2.jpg" alt="" />
							<div class="overlay-box">
								<ul class="social-icons">
									<li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
									<li><a href="#"><span class="fab fa-google"></span></a></li>
									<li><a href="#"><span class="fab fa-twitter"></span></a></li>
									<li><a href="#"><span class="fab fa-skype"></span></a></li>
									<li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
								</ul>
								<a href="#" class="appointment">{{ __('Website/messages.make_appointment') }}</a>
							</div>
						</div>
						<div class="lower-content">
							<h3><a href="#">Dr. Robet Samith</a></h3>
							<div class="designation">{{ __('Website/messages.heart_surgeon') }}</div>
						</div>
					</div>
				</div>

				<!-- Team Block -->
				<div class="team-block col-lg-3 col-md-6 col-sm-6 col-xs-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="500ms" data-wow-duration="1500ms">
						<div class="image">
							<img src="images/resource/team-3.jpg" alt="" />
							<div class="overlay-box">
								<ul class="social-icons">
									<li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
									<li><a href="#"><span class="fab fa-google"></span></a></li>
									<li><a href="#"><span class="fab fa-twitter"></span></a></li>
									<li><a href="#"><span class="fab fa-skype"></span></a></li>
									<li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
								</ul>
								<a href="#" class="appointment">{{ __('Website/messages.make_appointment') }}</a>
							</div>
						</div>
						<div class="lower-content">
							<h3><a href="#">Dr. Sharon Laura</a></h3>
							<div class="designation">{{ __('Website/messages.family_physician') }}</div>
						</div>
					</div>
				</div>

				<!-- Team Block -->
				<div class="team-block col-lg-3 col-md-6 col-sm-6 col-xs-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="750ms" data-wow-duration="1500ms">
						<div class="image">
							<img src="images/resource/team-4.jpg" alt="" />
							<div class="overlay-box">
								<ul class="social-icons">
									<li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
									<li><a href="#"><span class="fab fa-google"></span></a></li>
									<li><a href="#"><span class="fab fa-twitter"></span></a></li>
									<li><a href="#"><span class="fab fa-skype"></span></a></li>
									<li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
								</ul>
								<a href="#" class="appointment">{{ __('Website/messages.make_appointment') }}</a>
							</div>
						</div>
						<div class="lower-content">
							<h3><a href="#">Dr. Alex Furgosen</a></h3>
							<div class="designation">{{ __('Website/messages.ortho_specialist') }}</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>
	<!-- End Team Section -->

	<!-- Video Section -->
	<section class="video-section" style="background-image:url(images/background/5.jpg)">
		<div class="auto-container">
			<div class="content">
				<a href="https://www.youtube.com/watch?v=kxPCFljwJws" class="lightbox-image play-box"><span class="flaticon-play-button"><i class="ripple"></i></span></a>
				<div class="text">{{ __('Website/messages.care_about_health') }}</div>
				<h2>{{ __('Website/messages.we_care_about_you') }}</h2>
			</div>
		</div>
	</section>
	<!-- End Video Section -->

	<!-- Appointment Section Two -->
	<section class="appointment-section-two">
		<div class="auto-container">
			<div class="inner-container">
				<div class="row clearfix">

					<!-- Image Column -->
					<div class="image-column col-lg-6 col-md-12 col-sm-12">
						<div class="inner-column wow slideInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
							<div class="image">
								<img src="images/resource/doctor-2.png" alt="" />
							</div>
						</div>
					</div>

					<!-- Form Column -->
					<div class="form-column col-lg-6 col-md-12 col-sm-12">
						<div class="inner-column">
							<!-- Sec Title -->
							<div class="sec-title">
								<h2>{{ __('Website/messages.appointment_form') }}</h2>
								<div class="separator"></div>
							</div>

							<!-- Appointment Form -->
							<div class="appointment-form">
								<livewire:appointments.create/>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>

	<!-- Testimonial Section Two -->
	<section class="testimonial-section-two">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title centered">
				<h2>{{ __('Website/messages.what_patients_saying') }}</h2>
				<div class="separator"></div>
			</div>
			<div class="testimonial-carousel owl-carousel owl-theme">

				<!-- Testimonial Block Two -->
				<div class="testimonial-block-two">
					<div class="inner-box">
						<div class="image">
							<img src="images/resource/author-4.jpg" alt="" />
						</div>
						<div class="text">Medical Centre is a great place to get all of your medical needs. I came in for a check up and did not wait more than 5 minutes before I was seen. I can only imagine the type of service you get for more serious issues. Thanks!</div>
						<div class="lower-box">
							<div class="clearfix">
								<div class="pull-left">
									<div class="quote-icon flaticon-quote"></div>
								</div>
								<div class="pull-right">
									<div class="author-info">
										<h3>Max Winchester</h3>
										<div class="author">{{ __('Website/messages.kidney_patient') }}</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Testimonial Block Two -->
				<div class="testimonial-block-two">
					<div class="inner-box">
						<div class="image">
							<img src="images/resource/author-5.jpg" alt="" />
						</div>
						<div class="text">Medical Centre is a great place to get all of your medical needs. I came in for a check up and did not wait more than 5 minutes before I was seen. I can only imagine the type of service you get for more serious issues. Thanks!</div>
						<div class="lower-box">
							<div class="clearfix">
								<div class="pull-left">
									<div class="quote-icon flaticon-quote"></div>
								</div>
								<div class="pull-right">
									<div class="author-info">
										<h3>Jack Monita</h3>
										<div class="author">{{ __('Website/messages.kidney_patient') }}</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Testimonial Block Two -->
				<div class="testimonial-block-two">
					<div class="inner-box">
						<div class="image">
							<img src="images/resource/author-4.jpg" alt="" />
						</div>
						<div class="text">Medical Centre is a great place to get all of your medical needs. I came in for a check up and did not wait more than 5 minutes before I was seen. I can only imagine the type of service you get for more serious issues. Thanks!</div>
						<div class="lower-box">
							<div class="clearfix">
								<div class="pull-left">
									<div class="quote-icon flaticon-quote"></div>
								</div>
								<div class="pull-right">
									<div class="author-info">
										<h3>Max Winchester</h3>
										<div class="author">{{ __('Website/messages.kidney_patient') }}</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Testimonial Block Two -->
				<div class="testimonial-block-two">
					<div class="inner-box">
						<div class="image">
							<img src="images/resource/author-5.jpg" alt="" />
						</div>
						<div class="text">Medical Centre is a great place to get all of your medical needs. I came in for a check up and did not wait more than 5 minutes before I was seen. I can only imagine the type of service you get for more serious issues. Thanks!</div>
						<div class="lower-box">
							<div class="clearfix">
								<div class="pull-left">
									<div class="quote-icon flaticon-quote"></div>
								</div>
								<div class="pull-right">
									<div class="author-info">
										<h3>Jack Monita</h3>
										<div class="author">{{ __('Website/messages.kidney_patient') }}</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>
	<!-- End Testimonial Section Two -->

	<!-- Counter Section -->
	<section class="counter-section style-two" style="background-image: url(images/background/pattern-3.png)">
		<div class="auto-container">
			<!-- Fact Counter -->
			<div class="fact-counter style-two">
				<div class="row clearfix">

					<!-- Column -->
					<div class="column counter-column col-lg-3 col-md-6 col-sm-12">
						<div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
							<div class="content">
								<div class="icon flaticon-logout"></div>
								<div class="count-outer count-box">
									<span class="count-text" data-speed="2500" data-stop="2350">0</span>
								</div>
								<h4 class="counter-title">{{ __('Website/messages.satisfied_patients') }}</h4>
							</div>
						</div>
					</div>

					<!-- Column -->
					<div class="column counter-column col-lg-3 col-md-6 col-sm-12">
						<div class="inner wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="1500ms">
							<div class="content">
								<div class="icon flaticon-logout"></div>
								<div class="count-outer count-box alternate">
									+<span class="count-text" data-speed="3000" data-stop="350">0</span>
								</div>
								<h4 class="counter-title">{{ __('Website/messages.doctors_team') }}</h4>
							</div>
						</div>
					</div>

					<!-- Column -->
					<div class="column counter-column col-lg-3 col-md-6 col-sm-12">
						<div class="inner wow fadeInLeft" data-wow-delay="600ms" data-wow-duration="1500ms">
							<div class="content">
								<div class="icon flaticon-logout"></div>
								<div class="count-outer count-box">
									<span class="count-text" data-speed="3000" data-stop="2150">0</span>
								</div>
								<h4 class="counter-title">{{ __('Website/messages.success_mission') }}</h4>
							</div>
						</div>
					</div>

					<!-- Column -->
					<div class="column counter-column col-lg-3 col-md-6 col-sm-12">
						<div class="inner wow fadeInLeft" data-wow-delay="900ms" data-wow-duration="1500ms">
							<div class="content">
								<div class="icon flaticon-logout"></div>
								<div class="count-outer count-box">
									+<span class="count-text" data-speed="2500" data-stop="225">0</span>
								</div>
								<h4 class="counter-title">{{ __('Website/messages.successful_surgeries') }}</h4>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>
	<!-- End Counter Section -->

	<!-- Doctor Info Section -->
	<section class="doctor-info-section">
		<div class="auto-container">
			<div class="inner-container">
				<div class="row clearfix">

					<!-- Doctor Block -->
					<div class="doctor-block col-lg-4 col-md-6 col-sm-12">
						<div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
							<h3>{{ __('Website/messages.working_hours') }}</h3>
							<ul class="doctor-time-list">
								<li>Mon–Fri <span>8:00am–7:00pm</span></li>
								<li>Saturday <span>9:00am–5:00pm</span></li>
								<li>Sunday <span>9:00am–3:00pm</span></li>
							</ul>
							<h4>{{ __('Website/messages.emergency_cases') }}</h4>
							<div class="phone">{{ __('Website/messages.call_us') }} <strong>+898 68679 575 09</strong></div>
						</div>
					</div>

					<!-- Doctor Block -->
					<div class="doctor-block col-lg-4 col-md-6 col-sm-12">
						<div class="inner-box wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
							<h3>{{ __('Website/messages.doctors_timetable') }}</h3>
							<div class="text">{{ __('Website/messages.timetable_text') }}</div>
							<a href="#" class="detail">{{ __('Website/messages.more_detail') }}</a>
						</div>
					</div>

					<!-- Doctor Block -->
					<div class="doctor-block col-lg-4 col-md-6 col-sm-12">
						<div class="inner-box wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
							<h3>{{ __('Website/messages.primary_health_care') }}</h3>
							<div class="text">{{ __('Website/messages.healthcare_text') }}</div>
							<a href="#" class="detail">{{ __('Website/messages.contact_now') }}</a>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>
	<!-- End Doctor Info Section -->

	<!-- News Section Two -->
	<section class="news-section-two">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title centered">
				<h2>{{ __('Website/messages.latest_news') }}</h2>
				<div class="separator style-three"></div>
			</div>
			<div class="row clearfix">

				<!-- News Block Two -->
				<div class="news-block-two col-lg-6 col-md-12 col-sm-12">
					<div class="inner-box">
						<div class="image">
							<a href="blog-detail.html"><img src="images/resource/news-4.jpg" alt="" /></a>
						</div>
						<div class="lower-content">
							<div class="content">
								<ul class="post-info">
									<li><span class="icon flaticon-chat-comment-oval-speech-bubble-with-text-lines"></span> 02</li>
									<li><span class="icon flaticon-heart"></span> 126</li>
								</ul>
								<ul class="post-meta">
									<li>June 21, 2018 at 8:12pm</li>
									<li>{{ __('Website/messages.post_by') }} Admin</li>
								</ul>
								<h3><a href="blog-detail.html">Diagnostic Services for Efficient Results Picking Right</a></h3>
								<div class="text">There are a lot of women that are unaware of the numerous risks associated with their health and eventually ignore the ...</div>
								<a href="blog-detail.html" class="theme-btn btn-style-five"><span class="txt">{{ __('Website/messages.read_more') }}</span></a>
							</div>
						</div>
					</div>
				</div>

				<!-- News Block Two -->
				<div class="news-block-two col-lg-6 col-md-12 col-sm-12">
					<div class="inner-box">
						<div class="image">
							<a href="blog-detail.html"><img src="images/resource/news-5.jpg" alt="" /></a>
						</div>
						<div class="lower-content">
							<div class="content">
								<ul class="post-info">
									<li><span class="icon flaticon-chat-comment-oval-speech-bubble-with-text-lines"></span> 02</li>
									<li><span class="icon flaticon-heart"></span> 126</li>
								</ul>
								<ul class="post-meta">
									<li>June 21, 2018 at 8:12pm</li>
									<li>{{ __('Website/messages.post_by') }} Admin</li>
								</ul>
								<h3><a href="blog-detail.html">Reasons to Visit for Heart Specialist Department.</a></h3>
								<div class="text">There are a lot of women that are unaware of the numerous risks associated with their health and eventually ignore the ...</div>
								<a href="blog-detail.html" class="theme-btn btn-style-five"><span class="txt">{{ __('Website/messages.read_more') }}</span></a>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>

	<!-- Clients Section -->
	<section class="clients-section">
		<div class="outer-container">
			<div class="sponsors-outer">
				<!-- Sponsors Carousel -->
				<ul class="sponsors-carousel owl-carousel owl-theme">
					<li class="slide-item"><figure class="image-box"><a href="#"><img src="images/clients/1.png" alt=""></a></figure></li>
					<li class="slide-item"><figure class="image-box"><a href="#"><img src="images/clients/2.png" alt=""></a></figure></li>
					<li class="slide-item"><figure class="image-box"><a href="#"><img src="images/clients/3.png" alt=""></a></figure></li>
					<li class="slide-item"><figure class="image-box"><a href="#"><img src="images/clients/4.png" alt=""></a></figure></li>
					<li class="slide-item"><figure class="image-box"><a href="#"><img src="images/clients/5.png" alt=""></a></figure></li>
					<li class="slide-item"><figure class="image-box"><a href="#"><img src="images/clients/1.png" alt=""></a></figure></li>
					<li class="slide-item"><figure class="image-box"><a href="#"><img src="images/clients/2.png" alt=""></a></figure></li>
				</ul>
			</div>
		</div>
	</section>
	<!-- End Clients Section -->

@endsection