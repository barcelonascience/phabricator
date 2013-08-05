<?php

final class PhabricatorMarkupPreviewController
  extends PhabricatorController {

  public function processRequest() {
    $request = $this->getRequest();
    $viewer = $request->getUser();

    $text = $request->getStr('text');

    $output = PhabricatorMarkupEngine::renderOneObject(
      id(new PhabricatorMarkupOneOff())->setContent($text),
      'default',
      $viewer);

    return id(new AphrontAjaxResponse())
      ->setContent($output);
  }
}
