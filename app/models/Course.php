<?php

namespace App\Models;

class Course extends \Phalcon\Mvc\Model {

        public function initialize()
        {
                $this->setSource('Course');
        }

	public function getLevel() {
		switch ( $this->level ) {
			case 1:
				return 'easy';
			case 2:
				return 'medium';
			case 3:
			default:
				return 'hard';
		}
	}
	
	public function getStartDate() {
		if(!$this->startDate) return '';
		$date = new \DateTime( $this->startDate );
		return $date->format('d-m-Y');
	}
        public function getEndDate() {
                if(!$this->endDate) return '';
                $date = new \DateTime( $this->endDate );
                return $date->format('d-m-Y');
        }

}
