[![Build Status](https://travis-ci.org/emwi/FlashingmessageTest.svg?branch=master)](https://travis-ci.org/emwi/FlashingmessageTest)

Flashingmessage - for Anax MVC
=========

This is a message module for Anax-MVC. Can be used outside of anax too. Handles debug, error, success and warning messages/status. 
For Anax MVC, see https://github.com/mosbth/Anax-MVC.


License 
------------------

This software is free software and carries a MIT license.


How to use
----------------

First you need a area on your page where Flashingmessage can show the div elements. In anax mvc use this:

File: /theme/anax-base/index.tpl.php

<?php if ($this->views->hasContent('status')) : ?>
<div id='status'>
    <?php if(isset($status)) echo $status?>
    <?php $this->views->render('status')?>
</div>
<?php endif; ?>


Then you need to add Flashingmessage to your CDIFacrotyDefault:

$this->setShared('StatusMessage', function() {
            $module = new \TBM\StatusMessage\CStatusMessage($this);
            //$module->setDI($this);
            return $module;
        });


Then for displaying Flashingmessage on your page copy this to your code. 

$status = $app->StatusMessage;
$app->views->addString($status->messagesHtml(), 'status');

Then you can choose between four different messages:

addDebugMessage($message)
addErrorMessage($message)
addSuccessMessage($message)
addWarningMessage($message)



```
 .  
..:  Created by Emma Wiklund, wiklund_e@hotmail.com.
```
