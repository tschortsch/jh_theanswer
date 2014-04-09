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
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class Tx_Jh_theanswer_Controller_AnswerController.
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @package TYPO3
 * @subpackage THE ANSWER
 *
 * @author Juerg Hunziker <juerg.hunziker@gmail.com>
 */
class Tx_Jh_theanswer_Controller_AnswerControllerTest extends Tx_Extbase_Tests_Unit_BaseTestCase {
	/**
	 * Fixture
	 * @var Tx_JhTheanswer_Controller_AnswerController
	 */
	protected $controller = NULL;

	/**
	 * @var Tx_Extbase_MVC_Request
	 */
	protected $request = NULL;

	/**
	 * @var array
	 */
	protected $settings = NULL;

	/**
	 * @var Tx_Fluid_View_TemplateView
	 */
	protected $view = NULL;

	/**
	 * @var Tx_JhTheanswer_Domain_Repository_AnswerRepository
	 */
	protected $answerRepository = NULL;

	public function setUp() {
		// create controller
		$this->controller = $this->objectManager->get('Tx_JhTheanswer_Controller_AnswerController');
		$this->prepareController();
	}

	protected function prepareController() {
		$this->request = $this->getMock('Tx_Extbase_MVC_Request');
		$this->controller->setRequest($this->request);

		$this->view = $this->getMock('Tx_Fluid_View_TemplateView', array(), array(), '', FALSE);
		$this->controller->setView($this->view);

		$this->settings = array(
			'magicNumber' => 10
		);
		$this->controller->setSettings($this->settings);

		$this->answerRepository = $this->getMock('Tx_JhTheanswer_Domain_Repository_AnswerRepository', array('findByUid'));
		$this->controller->injectAnswerRepository($this->answerRepository);
	}

	public function tearDown() {
		unset($this->controller);
		unset($this->request);
		unset($this->settings);
		unset($this->view);
		unset($this->answerRepository);
		unset($this->objectManager);
	}

	/**
	 * @test
	 * @author Jürg Hunziker <juerg.hunziker@win.ch>
	 */
	public function showActionAssignsAnswer() {
		$answer = $this->mockAnswerRepositoryFindByUid();

		// the actual test
		$expectedAnswer = 42; // $answer->getValue() + $this->settings['magicNumber']
		$this->view->expects($this->at(0))->method('assign')->with('theAnswer', $expectedAnswer);

		// call the controller action
		$this->controller->showAction();

		// tear down locally defined variables
		unset($answer);
		unset($expectedAnswer);
	}

	/**
	 * Returns dummy answer
	 *
	 * @return Tx_JhTheanswer_Domain_Model_Answer $answer
	 * @author Jürg Hunziker <juerg.hunziker@win.ch>
	 */
	public function mockAnswerRepositoryFindByUid() {
		$answer = $this->objectManager->get('Tx_JhTheanswer_Domain_Model_Answer');
		$answer->setValue(32);
		$this->answerRepository->expects($this->once())->method('findByUid')->will($this->returnValue($answer));

		return $answer;
	}

}
?>