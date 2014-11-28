<?php

namespace Anax\Flashingmessage;

/**
 * Class for display different type of status updates/messages in session.
 * The messages are styled in four different styles for variuos message.
 * You can display several massages at the same time. 
 *
 */
class CStatusMessageTest extends \PHPUnit_Framework_TestCase
{


public function testCreateElement()
{
    $statusMessageObj = new CStatusMessage(new FakeSession());
    $res = $statusMessageObj->isEmpty();
    $exp = true;
    $this->assertEquals($res, $exp, "Created element is created and deleted.");
}


public function testAddMessagesDebug()
{
    $statusMessageObj = new CStatusMessage(new FakeSession());
    $statusMessageObj->addDebugMessage("Debug Meddelande!");
    $res = $statusMessageObj->messagesHtml();
    $exp = "<div class='message-debug'>Debug Meddelande!</div>";
     $this->assertEquals($res, $exp, "Debug message went wrong.");
    $statusMessageObj->clearMessages();
    }
    
    public function testAddMessagesError()
{
    $statusMessageObj = new CStatusMessage(new FakeSession());
    $statusMessageObj->addErrorMessage("Fel Meddelande!");
    $res = $statusMessageObj->messagesHtml();
    $exp = "<div class='message-error'>Fel Meddelande!</div>";
      $this->assertEquals($res, $exp, "Error message went wrong.");
    $statusMessageObj->clearMessages();
    }

   public function testAddMessagesSuccess()
{
    $statusMessageObj = new CStatusMessage(new FakeSession());
    $statusMessageObj->addSuccessMessage("Godkänt Meddelande!");
    $res = $statusMessageObj->messagesHtml();
    $exp = "<div class='message-success'>Godkänt Meddelande!</div>";
      $this->assertEquals($res, $exp, "Success message went wrong.");
    $statusMessageObj->clearMessages();
}

    public function testAddMessagesWarning()
{
    $statusMessageObj = new CStatusMessage(new FakeSession());
    $statusMessageObj->addWarningMessage("Varnings Meddelande!");
    $res = $statusMessageObj->messagesHtml();
    $exp = "<div class='message-warning'>Varnings Meddelande!</div>";
      $this->assertEquals($res, $exp, "Warning message went wrong.");
    $statusMessageObj->clearMessages();
    
}

public function testEmpty()
{
    $statusMessageObj = new CStatusMessage(new FakeSession());
    $res = $statusMessageObj->isEmpty();
    $exp = true;
    $this->assertEquals($res, $exp, "Something went wrong.");
    $statusMessageObj->addDebugMessage("Debug meddelande!");
    $res = $statusMessageObj->isEmpty();
    $exp = false;
    $this->assertEquals($res, $exp, "Something went wrong.");
}
}
class FakeSession
{
    private $sessionData = array();
    public function has($sessionVariable)
    {
        return isset($this->sessionData[$sessionVariable]);
    }
        public function set($sessionVariable, $allMessages)
    {
        $this->sessionData[$sessionVariable] = $allMessages;
    }
    
    public function get($sessionVariable)
    {
        if($this->sessionData != null && $this->sessionData[$sessionVariable] != null)
        return $this->sessionData[$sessionVariable];
        return null;
}
}
