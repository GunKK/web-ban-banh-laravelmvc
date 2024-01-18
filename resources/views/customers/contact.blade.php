@extends('customers.layouts.app')
@section('title', 'contact')
@section('content')
<main id="main" class="mt-5">

    <!-- ======= Book A Table Section ======= -->
    {{-- <section id="book-a-table" class="book-a-table">
        <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>Book A Table</h2>
            <p>Book <span>Your Stay</span> With Us</p>
        </div>

        <div class="row g-0">

            <div class="col-lg-4 reservation-img" style="background-image: url(assets/img/reservation.jpg);" data-aos="zoom-out" data-aos-delay="200"></div>

            <div class="col-lg-8 d-flex align-items-center reservation-form-bg">
            <form action="forms/book-a-table.php" method="post" role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-4">
                <div class="col-lg-4 col-md-6">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                    <div class="validate"></div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email">
                    <div class="validate"></div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Your Phone" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                    <div class="validate"></div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <input type="text" name="date" class="form-control" id="date" placeholder="Date" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                    <div class="validate"></div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <input type="text" class="form-control" name="time" id="time" placeholder="Time" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                    <div class="validate"></div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <input type="number" class="form-control" name="people" id="people" placeholder="# of people" data-rule="minlen:1" data-msg="Please enter at least 1 chars">
                    <div class="validate"></div>
                </div>
                </div>
                <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>
                <div class="validate"></div>
                </div>
                <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your booking request was sent. We will call back or send an Email to confirm your reservation. Thank you!</div>
                </div>
                <div class="text-center"><button type="submit">Book a Table</button></div>
            </form>
            </div><!-- End Reservation Form -->

        </div>

        </div>
    </section> --}}
    <!-- End Book A Table Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>Contact</h2>
            <p>Need Help? <span>Contact Us</span></p>
        </div>

        <div class="mb-3">
            <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d823.6258950477799!2d106.79359116328085!3d10.899222601468436!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3174d9618435c705%3A0x1429b433291e5bf8!2sChung%20C%C6%B0%20Bcons%20Bee!5e0!3m2!1sen!2s!4v1704881393031!5m2!1sen!2s"allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div><!-- End Google Maps -->

        <div class="row gy-4">

            <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
                <i class="icon bi bi-map flex-shrink-0"></i>
                <div>
                <h3>Our Address</h3>
                <p>Bcons Bee, Bình An, Đông Hòa, Dĩ An, Bình Dương</p>
                </div>
            </div>
            </div><!-- End Info Item -->

            <div class="col-md-6">
            <div class="info-item d-flex align-items-center">
                <i class="icon bi bi-envelope flex-shrink-0"></i>
                <div>
                <h3>Email Us</h3>
                <p>hau.nguyenbk8786@gmail.com</p>
                </div>
            </div>
            </div><!-- End Info Item -->

            <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
                <i class="icon bi bi-telephone flex-shrink-0"></i>
                <div>
                <h3>Call Us</h3>
                <p>+84 3848786</p>
                </div>
            </div>
            </div><!-- End Info Item -->

            <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
                <i class="icon bi bi-share flex-shrink-0"></i>
                <div>
                <h3>Opening Hours</h3>
                <div><strong>Mon-Sat:</strong> 8AM - 20PM;
                    <strong>Sunday:</strong> Closed
                </div>
                </div>
            </div>
            </div><!-- End Info Item -->

        </div>

        <form action="forms/contact.php" method="post" role="form" class="php-email-form p-3 p-md-4">
            <div class="row">
            <div class="col-xl-6 form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
            </div>
            <div class="col-xl-6 form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
            </div>
            </div>
            <div class="form-group">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
            </div>
            <div class="form-group">
            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
            </div>
            <div class="my-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
        </form><!--End Contact Form -->

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->
@endsection
