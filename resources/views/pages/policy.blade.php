@extends('layouts.base')
@section('title', 'Policy')
@section('content')
<!-- 
		=============================================
			Inner Banner
		============================================== 
		-->
<div class="inner-banner-one position-relative">
    <div class="container">
        <div class="position-relative">
            <div class="row">
                <div class="col-xl-6 m-auto text-center">
                    <div class="title-two">
                        <h2 class="text-white">Privacy Policy</h2>
                    </div>
                    <ul class="style-none d-flex justify-content-center page-pagination mt-15">
                        <li><a href="/">Home</a></li>
                        <li><i class="bi bi-chevron-right"></i></li>
                        <li>Privacy Policy</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <img src="{{ asset('asset/images/lazy.svg') }}" data-src="{{ asset('asset/images/shape/shape_02.svg') }}" alt="" class="lazy-img shapes shape_01">
    <img src="{{ asset('asset/images/lazy.svg') }}" data-src="{{ asset('asset/images/shape/shape_03.svg') }}" alt="" class="lazy-img shapes shape_02">
</div> <!-- /.inner-banner-one -->

<section class="faq-section position-relative pt-30 lg-pt-10">
    <div class="container">
        <div class="bg-wrapper mt-60 lg-mt-40">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" role="tabpanel" id="fc1">
                    <div class="accordion accordion-style-two" id="accordionTwo">
                        <div class="accordion-item">
                            <div class="accordion-header" id="FheadingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FcollapseOne" aria-expanded="false" aria-controls="FcollapseOne">
                                    1. Introduction
                                </button>
                            </div>
                            <div id="FcollapseOne" class="accordion-collapse collapse" aria-labelledby="FheadingOne" data-bs-parent="#accordionTwo">
                                <div class="accordion-body">
                                    <p>This Privacy Policy shows our policies and procedures on the collection, and use of your information when you use the service and tells users about their privacy rights. We use personal data to provide and improve the service we offer. By using the Connector, you agree to the collection and use of information under this Privacy Policy. </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <div class="accordion-header" id="FheadingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FcollapseTwo" aria-expanded="false" aria-controls="FcollapseTwo">
                                    2. Information Collection
                                </button>
                            </div>
                            <div id="FcollapseTwo" class="accordion-collapse collapse" aria-labelledby="FheadingTwo" data-bs-parent="#accordionTwo">
                                <div class="accordion-body">
                                    <p>Information you provide to Connector
                                        Connector collects certain personally identifiable information about you, including information that can identify, relate to, describe, and be associated with you. Examples of Personal Information that Connector collects include but are not limited to contact Information. This may include your first and last name, business location, email address, and telephone number.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <div class="accordion-header" id="FheadingThree">
                                <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#FcollapseThree" aria-expanded="false" aria-controls="FcollapseThree">
                                    3. Connector's Use of Information
                                </button>
                            </div>
                            <div id="FcollapseThree" class="accordion-collapse collapse show" aria-labelledby="FheadingThree" data-bs-parent="#accordionTwo">
                                <div class="accordion-body">
                                    <p>
                                        We collect and use the information to improve the platform following the practices described in this Privacy Policy. The purposes for collecting and using information are the following:
                                        • To operate and make available the Connector Platform. We use data to connect service seekers and service providers easily.
                                        • To analyze Connector Platform usage as necessary for improving the Connector Platform to the satisfaction of the users.
                                        • To contact you and deliver transactional information, reminders, administrative notices, marketing notifications, offers, and communications relevant to your use of the Connector Platform.

                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <div class="accordion-header" id="FheadingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FcollapseFour" aria-expanded="false" aria-controls="FcollapseFour">
                                    4. Connector’s Security of Collected Information
                                </button>
                            </div>
                            <div id="FcollapseFour" class="accordion-collapse collapse" aria-labelledby="FheadingFour" data-bs-parent="#accordionTwo">
                                <div class="accordion-body">
                                    <p>
                                        Your Connector account is password-protected so that only you have access to your account information. To continue to have this protection, do not provide your password to anyone. Also, if you share a computer, or phone you should sign out of your Connector account and close the browser window before someone else logs on.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <div class="accordion-header" id="FheadingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FcollapseFive" aria-expanded="false" aria-controls="FcollapseFive">
                                    5. Notification of Changes
                                </button>
                            </div>
                            <div id="FcollapseFive" class="accordion-collapse collapse" aria-labelledby="FheadingFive" data-bs-parent="#accordionTwo">
                                <div class="accordion-body">
                                    <p>Connector's Privacy Policy is periodically reviewed and enhanced as necessary. This Privacy Policy might change as Connector updates and expands the Connector Platform. The HileTask will endeavor to notify you of any material changes by email. Connector also encourages you to review this Privacy Policy periodically.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <div class="accordion-header" id="FheadingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FcollapseFive" aria-expanded="false" aria-controls="FcollapseFive">
                                    6. Children’s Privacy
                                </button>
                            </div>
                            <div id="FcollapseFive" class="accordion-collapse collapse" aria-labelledby="FheadingFive" data-bs-parent="#accordionTwo">
                                <div class="accordion-body">
                                    <p>This service is intended for a general audience and is not directed at children less than 18 years of age. We do not knowingly gather personal information in a manner not permitted by the rights of children in the country. If you are a guardian or parent and you believe that we have collected information from your child in a manner not permitted by law, please let us know by contacting us at info@connector.rw. We will remove that information from our servers.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <div class="accordion-header" id="FheadingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FcollapseFive" aria-expanded="false" aria-controls="FcollapseFive">
                                    7. Links to other websites
                                </button>
                            </div>
                            <div id="FcollapseFive" class="accordion-collapse collapse" aria-labelledby="FheadingFive" data-bs-parent="#accordionTwo">
                                <div class="accordion-body">
                                    <p>Our Service may contain links to other websites that we do not operate. If you click on a third-party link, you will be directed to that third-party's site. We advise you to check the Privacy Policy of every platform or site you visit. We have no control over the content, or privacy policies of any third-party sites or services.</p>
                                </div>
                            </div>
                        </div>
                    </div> <!-- /.accordion-style-two -->
                </div>
            </div>
        </div>
        <!-- ./bg-wrapper -->
        <div class="text-center border-bottom pb-150 lg-pb-50 mt-60 lg-mt-40 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
            <div class="title-three mb-30">
                <h2 class="fw-normal">Don’t get your answer?</h2>
            </div>
            <a href="{{ route('home.contact')}}" class="btn-one">Contact Us</a>
        </div>
    </div>
</section>
@endsection