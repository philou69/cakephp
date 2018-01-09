<h1>Welcome to the  blog</h1>

<?php echo $this->Html->link('add chapter', ['controller' => 'chapters', 'action' => 'add']); ?>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Created</th>
        <th>Action</th>
    </tr>
    <?php foreach ($chapters as $chapter): ?>
    <tr>
        <td><?php echo $chapter['Chapter']['id']; ?></td>
        <td><?php echo $this->Html->link($chapter['Chapter']['title'], ['controller' => 'chapters', 'action' => 'view', $chapter['Chapter']['id'] ]); ?> </td>
        <td><?php
            echo $chapter['Chapter']['publishedAt'];
            ?></td>
        <td>
            <?php echo $this->Html->link('edit', ['action' => 'edit', $chapter['Chapter']['id']]); ?>
            <?php
                echo $this->Form->postLink(
                        'Delete',
                        [
                                'action' => 'delete', $chapter['Chapter']['id']
                        ], [
                                'confirm' => 'Are you sure ?'
                    ]
                );
            ?>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($chapters); ?>
</table>