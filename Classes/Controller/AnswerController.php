<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Juerg Hunziker <juerg.hunziker@gmail.com>
 *  
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 *
 *
 * @package jh_theanswer
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class Tx_JhTheanswer_Controller_AnswerController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * answerRepository
	 *
	 * @var Tx_JhTheanswer_Domain_Repository_AnswerRepository
	 */
	protected $answerRepository;

	/**
	 * injectAnswerRepository
	 *
	 * @param Tx_JhTheanswer_Domain_Repository_AnswerRepository $answerRepository
	 * @return void
	 */
	public function injectAnswerRepository(Tx_JhTheanswer_Domain_Repository_AnswerRepository $answerRepository) {
		$this->answerRepository = $answerRepository;
	}

	/**
	 * action show
	 *
	 * @return void
	 */
	public function showAction() {
		$answerRecordUidFromSetup = $this->settings['theAnswerUid'];
		$answer = $this->answerRepository->findByUid($answerRecordUidFromSetup);

		$theAnswer = $this->calculateAnswer($answer->getValue());
		$this->view->assign('theAnswer', $theAnswer);
	}

	/**
	 * @param $value integer answer from domain object
	 * @return integer the answer
	 */
	protected function calculateAnswer($value) {
		return $value + $this->settings['magicNumber'];
	}

	/**
	 * Sets the view
	 *
	 * This function is intended to be used for unit testing purposes only
	 *
	 * @param Tx_Fluid_View_TemplateView $view The new view
	 * @return void
	 */
	public function setView(Tx_Fluid_View_TemplateView $view) {
		$this->view = $view;
	}

	/**
	 * Sets the request
	 *
	 * This function is intended to be used for unit testing purposes only
	 *
	 * @param Tx_Extbase_MVC_Request $request The new request
	 * @return void
	 */
	public function setRequest(Tx_Extbase_MVC_Request $request) {
		$this->request = $request;
	}

	/**
	 * Sets the settings
	 *
	 * This function is intended to be used for unit testing purposes only
	 *
	 * @param array $settings The new settings
	 * @return void
	 */
	public function setSettings(array $settings) {
		$this->settings = $settings;
	}

}
?>