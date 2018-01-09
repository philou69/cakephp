<h1>Adding Chapter</h1>

<?php
    echo $this->Form->create('Chapter');
    echo $this->Form->input('title');
    echo $this->Form->input('chapter');
    echo $this->Form->end('Save Chapter');
?>