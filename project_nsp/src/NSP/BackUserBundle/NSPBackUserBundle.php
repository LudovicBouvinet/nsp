<?php

namespace NSP\BackUserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class NSPBackUserBundle extends Bundle
{
	public function getParent()
  {
    return 'FOSUserBundle';
  }
}
