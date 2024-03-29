<?php

/**
 * Topics Loop - Single
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;
?>

<div id="bbp-topic-<?php bbp_topic_id(); ?>" <?php bbp_topic_class(); ?>>
    <div class="bbp-topic-title">

		<?php do_action( 'bbp_theme_before_topic_title' ); ?>

        <a class="bbp-topic-permalink" href="<?php bbp_topic_permalink(); ?>"><?php bbp_topic_title(); ?></a>

		<?php do_action( 'bbp_theme_after_topic_title' ); ?>

		<?php bbp_topic_pagination(); ?>

		<?php do_action( 'bbp_theme_before_topic_meta' ); ?>

        <p class="bbp-topic-meta">

			<?php do_action( 'bbp_theme_before_topic_started_by' ); ?>

            <span class="bbp-topic-started-by"><?php printf( esc_html__( 'Started by: %1$s', 'bbpress' ), bbp_get_topic_author_link( array( 'size' => '14' ) ) ); ?></span>

			<?php do_action( 'bbp_theme_after_topic_started_by' ); ?>

			<?php if ( ! bbp_is_single_forum() || ( bbp_get_topic_forum_id() !== bbp_get_forum_id() ) ) : ?>

				<?php do_action( 'bbp_theme_before_topic_started_in' ); ?>

                <span class="bbp-topic-started-in"><?php printf( esc_html__( 'in: %1$s', 'bbpress' ), '<a href="' . bbp_get_forum_permalink( bbp_get_topic_forum_id() ) . '">' . bbp_get_forum_title( bbp_get_topic_forum_id() ) . '</a>' ); ?></span>
				<?php do_action( 'bbp_theme_after_topic_started_in' ); ?>

			<?php endif; ?>

        </p>

		<?php do_action( 'bbp_theme_after_topic_meta' ); ?>

		<?php bbp_topic_row_actions(); ?>

    </div>

<!--    <li class="bbp-topic-voice-count">--><?php //bbp_topic_voice_count(); ?><!--</li>-->
<!---->
<!--    <li class="bbp-topic-reply-count">--><?php //bbp_show_lead_topic() ? bbp_topic_reply_count() : bbp_topic_post_count(); ?><!--</li>-->

    <div class="bbp-topic-excerpt">
		<?php bbp_reply_excerpt( bbp_get_topic_last_active_id(), bbp_get_topic_id() ); ?>
    </div>
</div><!-- #bbp-topic-<?php bbp_topic_id(); ?> -->
