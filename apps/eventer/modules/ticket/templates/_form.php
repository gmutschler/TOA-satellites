<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('ticket/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('ticket/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'ticket/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['event_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['event_id']->renderError() ?>
          <?php echo $form['event_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['type']->renderLabel() ?></th>
        <td>
          <?php echo $form['type']->renderError() ?>
          <?php echo $form['type'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['price']->renderLabel() ?></th>
        <td>
          <?php echo $form['price']->renderError() ?>
          <?php echo $form['price'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['max']->renderLabel() ?></th>
        <td>
          <?php echo $form['max']->renderError() ?>
          <?php echo $form['max'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['min']->renderLabel() ?></th>
        <td>
          <?php echo $form['min']->renderError() ?>
          <?php echo $form['min'] ?>
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
        <th><?php echo $form['quantity_available']->renderLabel() ?></th>
        <td>
          <?php echo $form['quantity_available']->renderError() ?>
          <?php echo $form['quantity_available'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['quantity_sold']->renderLabel() ?></th>
        <td>
          <?php echo $form['quantity_sold']->renderError() ?>
          <?php echo $form['quantity_sold'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['visible']->renderLabel() ?></th>
        <td>
          <?php echo $form['visible']->renderError() ?>
          <?php echo $form['visible'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['eventbrite_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['eventbrite_id']->renderError() ?>
          <?php echo $form['eventbrite_id'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
