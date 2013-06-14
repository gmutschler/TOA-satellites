<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('satellites/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>

  <table>

    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'satellites/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" class="button_red" value="Create event" />
        </td>
      </tr>
    </tfoot>

    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <?php echo $form ?>
<?php /*

      <tr>
        <th><?php echo $form['organiser_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['organiser_id']->renderError() ?>
          <?php echo $form['organiser_id'] ?>
        </td>
      </tr>

      <tr>
        <th><?php echo $form['category_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['category_id']->renderError() ?>
          <?php echo $form['category_id'] ?>
        </td>
      </tr>

      <tr>
        <th><?php echo $form['title']->renderLabel() ?></th>
        <td>
          <?php echo $form['title']->renderError() ?>
          <?php echo $form['title'] ?>
        </td>
      </tr>

      <tr>
        <th><?php echo $form['start_hour']->renderLabel() ?></th>
        <td>
          <?php echo $form['start_hour']->renderError() ?>
          <?php echo $form['start_hour'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['end_hour']->renderLabel() ?></th>
        <td>
          <?php echo $form['end_hour']->renderError() ?>
          <?php echo $form['end_hour'] ?>
        </td>
      </tr>

      <tr>
        <th><?php echo $form['logo']->renderLabel() ?></th>
        <td>
          <?php echo $form['logo']->renderError() ?>
          <?php echo $form['logo'] ?>
        </td>
      </tr>

      <tr>
        <th><?php echo $form['description']->renderLabel() ?></th>
        <td>
          <?php echo $form['description']->renderError() ?>
          <?php echo $form['description'] ?>
        </td>
      </tr>

      <tr>
        <th><?php echo $form['listing_color']->renderLabel() ?></th>
        <td>
          <?php echo $form['listing_color']->renderError() ?>
          <?php echo $form['listing_color'] ?>
        </td>
      </tr>

<?php // TODO: venue and tickets as embed forms ?>
      <tr>
        <th><?php echo $form['venue_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['venue_id']->renderError() ?>
          <?php echo $form['venue_id'] ?>
	  TODO: add form
        </td>
      </tr>
*/ ?>
    </tbody>
  </table>

</form>
