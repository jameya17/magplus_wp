<?php get_header(); ?>

<div role="main" id="pricePlanMoreInfo" class="content wrapper shadow-wrapper">
	<div class="mbox mwhats-the-price mbox-gradient">
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<?php		if ( has_post_thumbnail() ) {
				the_post_thumbnail('full');
			}
?>
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'magplus_theme' ), 'after' => '</div>' ) ); ?>
			<?php edit_post_link( __( 'Edit', 'magplus_theme' ), '<span class="edit-link">', '</span>' ); ?>
		<?php endwhile; // end of the loop. ?>

</div>
	  <div class="mbox">
  <div class="mbox3 mper-issue">
	 <img src="<?php echo get_template_directory_uri(); ?>/images/hardcoded_content/single-issue-app.png" alt="Per Issue">
    <h3>Per Issue</h3>
    <ul class="color-disc-list">
      <li>One app for all devices</li>
      <li>Pay as you publish</li>
    </ul>
    <p>
      The perfect choice when you want to
      launch a content app with only one
      issue. For instance, if you're thinking
      of launching that interactive book,
      enhanced with animation and rich media, that you haven't gotten published
      yet.
      Per Issue is also great when only publishing a few issues per year, like
      quarterly and annual reports.
    </p>
    <p>
      <strong>
        It only costs <span class="mag-color">$999</span> once you decide
        to publish your app.
      </strong>
    </p>
    <p>
      <a href="/salesforce-buy-form" data-id="Per issue" class="primary-button buy-form-button">Contact Us</a>
       </p>
  </div>

  <div class="mbox3 mmonthly">
	 <img src="<?php echo get_template_directory_uri(); ?>/images/hardcoded_content/multiple-issues-app.png" alt="Monthly">
    <h3>Monthly</h3>
    <ul class="color-disc-list">
      <li>One app for all devices</li>
      <li>Unlimited content publishing</li>
    </ul>
    <p>
      Ideal when you update your content on a regular basis.
      If you run a print magazine with
      several issues every year, being
      the editor of a customer magazine,
      the communications manager
      writing weekly newsletters or
      when your business depends on a frequently updated catalog; Monthly is
      most likely your best choice.
    </p>
    <p>
      <strong>
        <span class="mag-color">$499/month</span>
         guarantees that you always can publish at any time.
      </strong>
    </p>
    <p>
      <a href="/salesforce-buy-form" data-id="Monthly" class="primary-button buy-form-button">Contact Us</a>
    </p>
  </div>

  <div class="mbox3 munlimited last">
	<img src="<?php echo get_template_directory_uri(); ?>/images/hardcoded_content/unlimited-apps.png" alt="Unlimited">
    <h3>Unlimited</h3>
    <ul class="color-disc-list">
      <li>Unlimited apps for all devices</li>
      <li>Unlimited content publishing</li>
    </ul>
    <p>
      Unlimited is for you who have several brands and regularly update content. Publishing houses, companies with many lifestyle brands or with many major product lines - like car manufacturers - are typical users that benefits from choosing Unlimited. Create as many apps as you like and publish as much content you like.
    </p>
    <p style="margin-right: -15px;">
      <strong>
        The most cost efficient
        solution on the market for only <span class="mag-color">$2999/month.</span>
      </strong>
    </p>
    <p>
      <a href="/salesforce-buy-form" data-id="Unlimited" class="primary-button buy-form-button">Contact Us</a>
     </p>
  </div>
</div>


<?php $user = magplus_logged_in_check(); ?>
<div class="hidden">
    <form class="buy-form" id="buy_form">
      <h1>Buy <span class="change-plan">Monthly</span></h1>
      <div class="form-row">
        <label for="buy_name">Name</label>
        <input type="text" name="buy_name" id="buy_name" value="<?php if(isset($user->name)) echo $user->name; ?>" />
      </div>
      <div class="form-row">
        <label for="buy_email">Email</label>
        <input type="email" name="buy_email" id="buy_email" value="<?php if(isset($user->email)) echo $user->email; ?>" />
      </div>
      <div class="form-row">
        <label for="buy_phone">Phone</label>
        <input type="text" name="buy_phone" id="buy_phone" value="<?php if(isset($user->phone)) echo $user->phone; ?>">
      </div>
      <div class="form-row">
        <label for="buy_country_input">Country</label>
        <input type="text" name="buy_country_input" id="buy_country_input" value="<?php #echo ucfirst($country); ?>">
      </div>
      <div class="form-row">
        <label for="buy_message">Message</label>
        <textarea name="buy_message" id="buy_message"></textarea>
      </div>
      <div class="form-row">
        An order will be sent to our sales staff that will contact you within 24 hours (weekdays).
      </div>
      <div class="form-row">
        <div class="buy-eula">
          <input type="checkbox" name="eula" id="buy_eula_accept"> I accept the
          <a href="<?php get_bloginfo('url') ?>/legal/eula" target="_blank">Mag+ end user license agreement</a>
        </div>
        <input type="hidden" name="product_to_buy" id="product_to_buy" value="monthly" />
        <input type="submit" class="primary-button" id="buy_button" value="Place order now!" />
      </div>
      <div class="hidden" id="buy_loader"></div>
    </form>
  </div>
</div>
<?php get_footer(); ?>