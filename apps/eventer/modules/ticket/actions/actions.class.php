<?php

/**
 * ticket actions.
 *
 * @package    toaberlin
 * @subpackage ticket
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ticketActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->tickets = Doctrine_Core::getTable('Ticket')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->ticket = Doctrine_Core::getTable('Ticket')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->ticket);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new TicketForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new TicketForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($ticket = Doctrine_Core::getTable('Ticket')->find(array($request->getParameter('id'))), sprintf('Object ticket does not exist (%s).', $request->getParameter('id')));
    $this->form = new TicketForm($ticket);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($ticket = Doctrine_Core::getTable('Ticket')->find(array($request->getParameter('id'))), sprintf('Object ticket does not exist (%s).', $request->getParameter('id')));
    $this->form = new TicketForm($ticket);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($ticket = Doctrine_Core::getTable('Ticket')->find(array($request->getParameter('id'))), sprintf('Object ticket does not exist (%s).', $request->getParameter('id')));
    $ticket->delete();

    $this->redirect('ticket/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $ticket = $form->save();

      $this->redirect('ticket/edit?id='.$ticket->getId());
    }
  }
}
