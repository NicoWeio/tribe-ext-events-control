<?php
namespace Tribe\Extensions\EventsControl;

/**
 * Status for a Canceled Event.
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events-control/single/canceled-status.php
 *
 * See more documentation about our views templating system.
 *
 * @link {INSERT_ARTCILE_LINK_HERE}
 *
 * @version 4.9.9
 *
 * @var WP_Post $event The event post object with properties added by the `tribe_get_event` function.
 *
 * @see tribe_get_event() For the format of the event object.
 */
use Tribe__Date_Utils as Dates;
use WP_Post;

$status = get_post_meta( $event->ID, Metabox::$meta_status, true );
$canceled_reason = get_post_meta( $event->ID, Metabox::$meta_status_canceled_reason, true );

// Dont print anything when status for this event is not
if ( 'canceled' !== $status ) {
	return;
}

?>
<div class="tribe-common-b2">
	<?php echo esc_html_x( 'Canceled', 'Text next to the date to display postponed', 'tribe-ext-events-control' ); ?>

    <?php if ( $canceled_reason ) : ?>
    <div>
        <?php echo wp_kses_post( $canceled_reason ); ?>
    </div>
    <?php endif; ?>
</div>