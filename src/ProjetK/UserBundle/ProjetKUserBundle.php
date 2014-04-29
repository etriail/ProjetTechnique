<?php

namespace ProjetK\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ProjetKUserBundle extends Bundle
{
	public function getParent(){
		return 'FOSUserBundle';
	}
}
