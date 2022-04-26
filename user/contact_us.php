<?php
include_once "includes/header.php";
?>
<article id="contact-us">
    <div class="title">Contact Us</div>
    <div class="ContactUsform">
        <div class="container1">
            <div class="content">
                <div class="left-side">
                    <div class="address details">
                        <i class="fas fa-map-marker-alt"></i>
                        <div class="topic">Location</div>
                        <div class="text-one">Technology Park</div>
                        <div class="text-two">Bukit Jalil</div>
                    </div>
                    <div class="phone details">
                        <i class="fas fa-phone-alt"></i>
                        <div class="topic">Phone</div>
                        <div class="text-one">+6012 345 6789</div>
                        <div class="text-two">+6019 876 5432</div>
                    </div>
                    <div class="email details">
                        <i class="fas fa-envelope"></i>
                        <div class="topic">Email</div>
                        <div class="text-one">blablabla@gmail.com</div>
                        <div class="text-two">blablabla@gmail.com</div>
                    </div>
                </div>
                <div class="right-side">
                    <div class="topic-text">Send us a message</div>
                    <p>If you have any problem in this website, you can send us message from here. It's our pleasure to
                        help you.</p>
                    <form action="#">
                        <div class="input-box flex-item">
                            <input type="text" placeholder="Enter your name">
                            <i class="fas fa-check-circle"></i>
                            <i class="fas fa-exclamation-circle"></i>
                            <small>Error message</small>
                        </div>
                        <div class="input-box flex-item">
                            <input type="text" placeholder="Enter your email">
                            <i class="fas fa-check-circle"></i>
                            <i class="fas fa-exclamation-circle"></i>
                            <small>Error message</small>
                        </div>
                        <div class="input-box flex-item">
                            <input type="tel" placeholder="Enter your contact number">
                            <i class="fas fa-check-circle"></i>
                            <i class="fas fa-exclamation-circle"></i>
                            <small>Error message</small>
                        </div>
                        <div class="input-box message-box flex-item">
                            <textarea name="message" id="message" cols="30" rows="5"
                                placeholder="Enter your message"></textarea>
                            <i class="fas fa-check-circle"></i>
                            <i class="fas fa-exclamation-circle"></i>
                            <small>Error message</small>
                        </div>
                        <div class="button">
                            <input type="button" value="Send Now">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</article>
<?php include_once "./includes/footer.php"; ?>