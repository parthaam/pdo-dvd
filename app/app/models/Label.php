<?php

class Label extends Eloquent {
	public function dvds() {
		return $this->hasMany('dvd');
	}
}