<?php get_header( 'buddypress' ); ?>

	<div class="container main-buddypress">
		<div class="padding-10">

		<?php do_action( 'bp_before_activation_page' ); ?>

		<div class="page" id="activate-page">


			<div class="title-special border-radius" style="margin-bottom: 10px;">
                    <div class="padding-10">
                        <h2><?php if ( bp_account_was_activated() ) :
				_e( 'Account Activated', 'buddypress' );
			else :
				_e( 'Activate your Account', 'buddypress' );
			endif; ?></h2>
                    </div>
                </div>

			<?php do_action( 'template_notices' ); ?>

			<?php do_action( 'bp_before_activate_content' ); ?>

			<?php if ( bp_account_was_activated() ) : ?>

				<?php if ( isset( $_GET['e'] ) ) : ?>
					<p><?php _e( 'Your account was activated successfully! Your account details have been sent to you in a separate email.', 'buddypress' ); ?></p>
				<?php else : ?>
					<p><?php printf( __( 'Your account was activated successfully! You can now <a href="%s">log in</a> with the username and password you provided when you signed up.', 'buddypress' ), wp_login_url( bp_get_root_domain() ) ); ?></p>
				<?php endif; ?>

			<?php else : ?>

				<p><?php _e( 'Please provide a valid activation key.', 'buddypress' ); ?></p>

				<form action="" method="get" class="standard-form" id="activation-form">

					<label for="key"><?php _e( 'Activation Key:', 'buddypress' ); ?></label>
					<input type="text" name="key" id="key" value="" />

					<p class="submit">
						<input type="submit" name="submit" value="<?php _e( 'Activate', 'buddypress' ); ?>" />
					</p>

				</form>

			<?php endif; ?>

			<?php do_action( 'bp_after_activate_content' ); ?>

		</div><!-- .page -->

		<?php do_action( 'bp_after_activation_page' ); ?>

		</div><!-- .padder -->
	</div><!-- #content -->

	<div class="paginationbox">
</div>
</div></div></div>

<?php get_footer( 'buddypress' ); ?>
