<div class="wrap">

<h2><?php _e('Styles Licenses'); ?></h2>

<?php foreach ( apply_filters( 'styles_license_form_plugins', array() ) as $plugin ) : ?>

	<?php 
		$name = $license_option_key = null;
		extract( $plugin, EXTR_IF_EXISTS );

		$license = get_option( $license_option_key );
		$status = get_option( $license_option_key . '_status' );
	?>

	<h3><?php echo $name ?></h3>
	<form method="post" action="options.php">

		<?php settings_fields('styles_licenses'); ?>
		
		<table class="form-table">
			<tbody>
				<tr valign="top">	
					<th scope="row" valign="top">
						<?php _e('License Key'); ?>
					</th>
					<td>
						<input id="<?php esc_attr_e( $license_option_key ); ?>" name="<?php esc_attr_e( $license_option_key ); ?>" type="text" class="regular-text" value="<?php esc_attr_e( $license ); ?>" />
						<label class="description" for="<?php esc_attr_e( $license_option_key ); ?>"><?php _e('Enter your license key'); ?></label>
					</td>
				</tr>
				<?php if( false !== $license ) : ?>

					<tr valign="top">	
						<th scope="row" valign="top">
							<?php _e('Activate License'); ?>
						</th>
						<td>
							<?php if( $status !== false && $status == 'valid' ) : ?>

								<?php wp_nonce_field( 'edd_sample_nonce', 'edd_sample_nonce' ); ?>

								<span style="color:green;"><?php _e('active'); ?></span>
								<input type="submit" class="button-secondary" name="edd_license_deactivate" value="<?php _e('Deactivate License'); ?>"/>

							<?php else : ?>
							
								<?php wp_nonce_field( 'edd_sample_nonce', 'edd_sample_nonce' ); ?>

								<input type="submit" class="button-secondary" name="edd_license_activate" value="<?php _e('Activate License'); ?>"/>
							
							<?php endif; ?>
						</td>
					</tr>

				<?php endif; ?>

			</tbody>
		</table>	
		<?php submit_button(); ?>
	</form>

<?php endforeach; ?>