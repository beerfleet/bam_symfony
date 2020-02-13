<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Simplex;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Simplex\ResponseEvent;

/**
 * Description of JavaScriptListener
 *
 * @author jvanbiervliet
 */
class JavaScriptListener implements EventSubscriberInterface {

  public static function getSubscribedEvents() {
    return array('response' => 'onResponse');
  }

  public function onResponse(ResponseEvent $event) {
    $response = $event->getResponse();

    if ($response->isRedirection() || ($response->headers->has('Content-Type') && false === strpos($response->headers->get('Content-Type'), 'html')) || 'html' !== $event->getRequest()->getRequestFormat()) {
      return;
    }

    $response->setContent($response->getContent() . "<script>alert('Google heeft gat cookies');</script>");
  }

}
