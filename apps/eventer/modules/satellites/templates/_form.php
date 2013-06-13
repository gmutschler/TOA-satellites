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
      <tr>
        <th><?php echo $form['category_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['category_id']->renderError() ?>
          <?php echo $form['category_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['eventbrite_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['eventbrite_id']->renderError() ?>
          <?php echo $form['eventbrite_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['venue_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['venue_id']->renderError() ?>
          <?php echo $form['venue_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['organiser_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['organiser_id']->renderError() ?>
          <?php echo $form['organiser_id'] ?>
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
        <th><?php echo $form['description']->renderLabel() ?></th>
        <td>
          <?php echo $form['description']->renderError() ?>
          <?php echo $form['description'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['start_date']->renderLabel() ?></th>
        <td>
          <?php echo $form['start_date']->renderError() ?>
          <?php echo $form['start_date'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['end_date']->renderLabel() ?></th>
        <td>
          <?php echo $form['end_date']->renderError() ?>
          <?php echo $form['end_date'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['timezone']->renderLabel() ?></th>
        <td>
          <?php echo $form['timezone']->renderError() ?>
          <?php echo $form['timezone'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['url']->renderLabel() ?></th>
        <td>
          <?php echo $form['url']->renderError() ?>
          <?php echo $form['url'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['capacity']->renderLabel() ?></th>
        <td>
          <?php echo $form['capacity']->renderError() ?>
          <?php echo $form['capacity'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['created']->renderLabel() ?></th>
        <td>
          <?php echo $form['created']->renderError() ?>
          <?php echo $form['created'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['eventbrite_modified']->renderLabel() ?></th>
        <td>
          <?php echo $form['eventbrite_modified']->renderError() ?>
          <?php echo $form['eventbrite_modified'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['privacy']->renderLabel() ?></th>
        <td>
          <?php echo $form['privacy']->renderError() ?>
          <?php echo $form['privacy'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['password']->renderLabel() ?></th>
        <td>
          <?php echo $form['password']->renderError() ?>
          <?php echo $form['password'] ?>
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
        <th><?php echo $form['logo_ssl']->renderLabel() ?></th>
        <td>
          <?php echo $form['logo_ssl']->renderError() ?>
          <?php echo $form['logo_ssl'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['status']->renderLabel() ?></th>
        <td>
          <?php echo $form['status']->renderError() ?>
          <?php echo $form['status'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['moderated']->renderLabel() ?></th>
        <td>
          <?php echo $form['moderated']->renderError() ?>
          <?php echo $form['moderated'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['listing_color']->renderLabel() ?></th>
        <td>
          <?php echo $form['listing_color']->renderError() ?>
          <?php echo $form['listing_color'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['tickets_list']->renderLabel() ?></th>
        <td>
          <?php echo $form['tickets_list']->renderError() ?>
          <?php echo $form['tickets_list'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
