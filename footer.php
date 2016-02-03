	<footer id="footer">
        <div class="container clearfix">
        	
            <p class="about-txt wow fadeInDown">Nova is a design, advertising, digital, and experiences creative agency in Phnom Penh. If you are interested in our services, please get in touch.</p>
            <div class="contact-info">
                <div class="wow fadeInUp">
                    <h5>Come Visit</h5>
                    <p>29B, Mao Tse Toung Boulevard Phnom Penh, Cambodia</p>
                </div>
                <div class="wow fadeInUp one-third">
                    <h5>Socialize</h5>
                    <p><a href="https://www.facebook.com/novadesign.cambodia" target="_blank">Facebook</a></p>
                    <p><a href="https://www.linkedin.com/company/nova-cambodia" target="_blank">LinkedIn</a></p>
                </div>
                <div class="wow fadeInUp two-third last">
                    <h5>Contact Us</h5>
                    <p>+855 (0)23 223 577<br/>
                    <a href="mailto:info@novacambodia.com">info@novacambodia.com</a></p>
                </div>
                <div class="wow fadeInUp footer-nav">
                    <h5>Join our team</h5>
                    <p><a href="http://www.novacambodia.com/careers/">Careers</a></p>
                </div>
            </div> <!-- .contact-info -->
            
            <div class="clear"></div>
            
            <p class="copyright">
                <?php if ( ot_get_option( 'copyright' ) ): ?>
                    <?php echo ot_get_option( 'copyright' ); ?>
                <?php else: ?>
                    <?php bloginfo(); ?> &copy; <?php echo date( 'Y' ); ?>. <?php _e( 'All Rights Reserved.', SP_TEXT_DOMAIN ); ?>
                <?php endif; ?>
            </p><!--/.copyright-->
            
        </div><!-- .container .clearfix -->
    </footer><!-- #footer -->

</div> <!-- #wrapper -->

<?php wp_footer(); ?>

</body>
</html>