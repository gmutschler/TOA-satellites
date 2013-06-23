<?php

require_once dirname(__FILE__).'/../lib/eventGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/eventGeneratorHelper.class.php';

/**
 * event actions.
 *
 * @package    toaberlin
 * @subpackage event
 * @author     maciej@canadel.ee
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class eventActions extends autoEventActions {

	public function executeListModerate(sfWebRequest $request) {

		$event = $this->getRoute()->getObject();
		$event->toggleModerated();

		$this->getUser()->setFlash('notice', sprintf('The event "%s" moderation flag has been toggled', $event->getTitle()));
		$this->redirect('event');
	}
	public function executeBatchModerate(sfWebRequest $request) {

		$ids = $request->getParameter('ids');

		$q = Doctrine_Query::create()
			->from('Event e')
			->whereIn('e.id', $ids)
		;

		foreach($q->execute() as $event) $event->toggleModerated();

		$this->getUser()->setFlash('notice', 'The selected events moderation flag has been toggled');
		$this->redirect('event');
	}
}
