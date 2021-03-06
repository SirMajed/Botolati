<?php
/**
 * JS reference : assets/js/admin/layout.js
 */

/** @var $this Forminator_CForm_View_Page */
$count             = $this->filtered_total_entries();
$is_filter_enabled = $this->is_filter_box_enabled();

if ( $this->error_message() ) : ?>

	<span class="sui-notice sui-notice-error"><p><?php echo esc_html( $this->error_message() ); ?></p></span>

<?php endif;

if ( $this->total_entries() > 0 ) : ?>

	<form method="GET" class="forminator-entries-actions">

		<input type="hidden" name="page" value="<?php echo esc_attr( $this->get_admin_page() ); ?>">
		<input type="hidden" name="form_type" value="<?php echo esc_attr( $this->get_form_type() ); ?>">
		<input type="hidden" name="form_id" value="<?php echo esc_attr( $this->get_form_id() ); ?>">

		<div class="fui-pagination-entries sui-pagination-wrap">

			<span class="sui-pagination-results"><?php if ( 1 === $count ) { printf( esc_html__( '%s result', Forminator::DOMAIN ), $count ); } else { printf( esc_html__( '%s results', Forminator::DOMAIN ), $count ); } // phpcs:ignore ?></span>

			<?php $this->paginate(); ?>

		</div>

		<div class="sui-box fui-box-entries">

			<fieldset class="forminator-entries-nonce">
				<?php wp_nonce_field( 'forminatorCustomFormEntries', 'forminatorEntryNonce' ); ?>
			</fieldset>

			<div class="sui-box-body fui-box-actions">

				<div class="sui-box-search">

					<div class="sui-search-left">

						<?php $this->bulk_actions(); ?>

					</div>

					<div class="sui-search-right">

						<div class="sui-pagination-wrap">

							<span class="sui-pagination-results"><?php if ( 1 === $count ) { printf( esc_html__( '%s result', Forminator::DOMAIN ), $count ); } else { printf( esc_html__( '%s results', Forminator::DOMAIN ), $count ); } // phpcs:ignore ?></span>

							<?php $this->paginate(); ?>

							<button class="sui-button-icon sui-button-outlined forminator-toggle-entries-filter <?php echo( $is_filter_enabled ? 'sui-active' : '' ); ?>">
								<i class="sui-icon-filter" aria-hidden="true"></i>
							</button>

						</div>

					</div>

				</div>

				<?php $this->template( 'custom-form/entries/filter' ); ?>

			</div>

			<?php if ( true === $is_filter_enabled ) : ?>

				<div class="sui-box-body fui-box-actions-filters">

					<label class="sui-label"><?php esc_html_e( 'Active Filters', Forminator::DOMAIN ); ?></label>

					<div class="sui-pagination-active-filters forminator-entries-fields-filters">

						<?php if ( isset( $this->filters['search'] ) ) : ?>
							<div class="sui-active-filter">
								<?php printf(
									esc_html__( 'Keyword: %s', Forminator::DOMAIN ),
									esc_html( $this->filters['search'] )
								); ?>
								<button class="sui-active-filter-remove" type="submit" name="search" value="">
									<span class="sui-screen-reader-text"><?php esc_html_e( 'Remove this keyword', Forminator::DOMAIN ); ?></span>
								</button>
							</div>
						<?php endif; ?>

						<?php if ( isset( $this->filters['min_id'] ) ) : ?>
							<div class="sui-active-filter">
								<?php printf(
									esc_html__( 'From ID: %s', Forminator::DOMAIN ),
									esc_html( $this->filters['min_id'] )
								); ?>
								<button class="sui-active-filter-remove" type="submit" name="min_id" value="">
									<span class="sui-screen-reader-text"><?php esc_html_e( 'Remove this keyword', Forminator::DOMAIN ); ?></span>
								</button>
							</div>
						<?php endif; ?>

						<?php if ( isset( $this->filters['max_id'] ) ) : ?>
							<div class="sui-active-filter">
								<?php printf(
									esc_html__( 'To ID: %s', Forminator::DOMAIN ),
									esc_html( $this->filters['max_id'] )
								); ?>
                                <button class="sui-active-filter-remove" type="submit" name="max_id" value="">
									<span class="sui-screen-reader-text"><?php esc_html_e( 'Remove this keyword', Forminator::DOMAIN ); ?></span>
								</button>
							</div>
						<?php endif; ?>

						<?php if ( isset( $this->filters['date_created'][0] ) || isset( $this->filters['date_created'][1] ) ) : ?>
							<div class="sui-active-filter">
								<?php printf(
									esc_html__( 'Submission Date Range: %1$s to %2$s', Forminator::DOMAIN ),
									esc_html( $this->filters['date_created'][0] ),
									esc_html( $this->filters['date_created'][1] )
								); ?>
								<button class="sui-active-filter-remove" type="submit" name="date_range" value="">
									<span class="sui-screen-reader-text"><?php esc_html_e( 'Remove this keyword', Forminator::DOMAIN ); ?></span>
								</button>
							</div>
						<?php endif; ?>

						<div class="sui-active-filter">
							<?php
							esc_html_e( 'Sort Order', Forminator::DOMAIN );
							echo ': ';
							if ( 'DESC' === $this->order['order'] ) {
								esc_html_e( 'Descending', Forminator::DOMAIN );
							} else {
								esc_html_e( 'Ascending', Forminator::DOMAIN );
							} ?>
						</div>

					</div>

				</div>

			<?php endif; ?>

			<table class="sui-table sui-table-flushed sui-accordion fui-table-entries">

				<?php $this->entries_header(); ?>

				<tbody>

					<?php
					foreach ( $this->entries_iterator() as $entries ) {

						$entry_id    = $entries['id'];
						$db_entry_id = isset( $entries['entry_id'] ) ? $entries['entry_id'] : '';

						$summary       = $entries['summary'];
						$summary_items = $summary['items'];

						$detail       = $entries['detail'];
						$detail_items = $detail['items'];
						?>

						<tr class="sui-accordion-item" data-entry-id="<?php echo esc_attr( $db_entry_id ); ?>">

							<?php foreach ( $summary_items as $key => $summary_item ) { ?>

								<?php if ( 1 === $summary_item['colspan'] ) : ?>
									<td class="sui-accordion-item-title"><label class="sui-checkbox">
										<input type="checkbox"
											name="entry[]"
											value="<?php echo esc_attr( $db_entry_id ); ?>"
											id="wpf-cform-module-<?php echo esc_attr( $db_entry_id ); ?>" />
										<span></span>
										<span class="sui-screen-reader-text"><?php printf( esc_html__( "Select entry number %s", Forminator::DOMAIN ), esc_html( $db_entry_id ) ); ?></span>
									</label>
									<?php echo esc_html( $db_entry_id ); ?></td>
								<?php else : ?>
									<td><?php echo esc_html( $summary_item['value'] ); ?>
									<span class="sui-accordion-open-indicator fui-mobile-only" aria-hidden="true">
										<i class="sui-icon-chevron-down"></i>
									</span></td>
								<?php endif; ?>
								<?php if ( ! $summary['num_fields_left'] && ( count( $summary_items ) - 1 ) === $key ) { ?>
									<td><span class="sui-accordion-open-indicator">
										<i class="sui-icon-chevron-down"></i>
									</span></td>
								<?php } ?>

							<?php } ?>

							<?php if ( $summary['num_fields_left'] ) { ?>

								<td><?php printf( esc_html__( "+ %s other fields", Forminator::DOMAIN ), esc_html( $summary['num_fields_left'] ) ); ?>
								<span class="sui-accordion-open-indicator">
									<i class="sui-icon-chevron-down"></i>
								</span></td>

							<?php } ?>

						</tr>

						<tr class="sui-accordion-item-content">

							<td colspan="<?php echo esc_attr( $detail['colspan'] ); ?>">

								<div class="sui-box fui-entry-content">

									<div class="sui-box-body">

										<h2 class="fui-entry-title"><?php echo '#' . esc_attr( $db_entry_id ); ?></h2>

										<?php foreach ( $detail_items as $detail_item ) { ?>

											<?php $sub_entries = $detail_item['sub_entries']; ?>

											<div class="sui-box-settings-slim-row sui-sm">

												<?php if ( 'stripe' === $detail_item['type'] || 'paypal' === $detail_item['type'] ) {

													if ( ! empty( $sub_entries ) ) { ?>

														<div class="sui-box-settings-col-2">

															<span class="sui-settings-label sui-dark sui-sm"><?php echo esc_html( $detail_item['label'] ); ?></span>

															<table class="sui-table fui-table-details">

																<thead>

																	<tr>

																		<?php
																		$end = count( $sub_entries );
																		foreach ( $sub_entries as $sub_key => $sub_entry ) {

																			$sub_key++;

																			if ( $sub_key === $end ) {

																				echo '<th colspan="2">' . esc_html( $sub_entry['label'] ) . '</th>';

																			} else {

																				echo '<th>' . esc_html( $sub_entry['label'] ) . '</th>';

																			}

																		} ?>

																	</tr>

																</thead>

																<tbody>

																	<tr>

																		<?php
																		$end = count( $sub_entries );
																		foreach ( $sub_entries as $sub_key => $sub_entry ) {

																			$sub_key++;

																			if ( $sub_key === $end ) {

																				echo '<td colspan="2">' . ( $sub_entry['value'] ) . '</td>'; // wpcs xss ok. html output intended

																			} else {

																				echo '<td>' . esc_html( $sub_entry['value'] ) . '</td>';

																			}

																		} ?>

																	</tr>

																</tbody>

															</table>

														</div>

													<?php }

												} else { ?>

													<div class="sui-box-settings-col-1">
														<span class="sui-settings-label sui-sm"><?php echo esc_html( $detail_item['label'] ); ?></span>
													</div>

													<div class="sui-box-settings-col-2">

														<?php if ( empty( $sub_entries ) ) { ?>

															<span class="sui-description"><?php echo ( $detail_item['value'] ); // wpcs xss ok. html output intended ?></span>

														<?php } else { ?>

															<?php foreach ( $sub_entries as $sub_entry ) { ?>

																<div class="sui-form-field">
																	<span class="sui-settings-label"><?php echo esc_html( $sub_entry['label'] ); ?></span>
																	<span class="sui-description"><?php echo ( $sub_entry['value'] ); // wpcs xss ok. html output intended ?></span>
																</div>

															<?php } ?>

														<?php } ?>

													</div>

												<?php } ?>

											</div>

										<?php } ?>

									</div>

									<div class="sui-box-footer">

										<button
											type="button"
											class="sui-button sui-button-ghost sui-button-red wpmudev-open-modal"
											data-modal="delete-module"
											data-modal-title="<?php esc_attr_e( 'Delete Submission', Forminator::DOMAIN ); ?>"
											data-modal-content="<?php esc_attr_e( 'Are you sure you wish to permanently delete this submission?', Forminator::DOMAIN ); ?>"
											data-form-id="<?php echo esc_attr( $db_entry_id ); ?>"
											data-nonce="<?php echo wp_create_nonce( 'forminatorCustomFormEntries' ); // WPCS: XSS ok. ?>"
										>
											<i class="sui-icon-trash" aria-hidden="true"></i> <?php esc_html_e( "Delete", Forminator::DOMAIN ); ?>
										</button>

									</div>

								</div>

							</td>

						</tr>

					<?php } ?>

				</tbody>

			</table>

			<div class="sui-box-body fui-box-actions">

				<div class="sui-box-search">

					<?php $this->bulk_actions( 'bottom' ); ?>

				</div>

			</div>

		</div>

	</form>

<?php else : ?>

	<div class="sui-box sui-message">

		<?php if ( forminator_is_show_branding() ): ?>
			<img src="<?php echo esc_url( forminator_plugin_url() . 'assets/img/forminator-submissions.png' ); ?>"
				 srcset="<?php echo esc_url( forminator_plugin_url() . 'assets/img/forminator-submissions.png' ); ?> 1x, <?php echo esc_url( forminator_plugin_url() . 'assets/img/forminator-submissions@2x.png' ); ?> 2x"
				 alt="<?php esc_html_e( 'Forminator', Forminator::DOMAIN ); ?>"
				 class="sui-image"
				 aria-hidden="true"/>
		<?php endif; ?>

		<div class="sui-message-content">

			<h2><?php echo forminator_get_form_name( $this->form_id, 'custom_form' ); // WPCS: XSS ok. ?></h2>

			<p><?php esc_html_e( "You haven???t received any submissions for this form yet. When you do, you???ll be able to view all the data here.", Forminator::DOMAIN ); ?></p>

		</div>

	</div>

<?php endif; ?>
