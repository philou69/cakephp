<h1>Edit Chapter</h1>
<?php
    echo $this->Form->create('Chapter');
    echo $this->Form->input('title');
    echo $this->Form->input('chapter');
    echo $this->Form->input('id', ['type' => 'hidden']);
    echo $this->Form->end('Edit chapter');
?>