<div class="sidebar-wrapper columns large-2 medium-2 hide-for-small-only">
    <nav class="side-nav">
        <ul>
            <li><?= $this->Html->link(__('List Histories'), ['action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('List Contacts'), ['controller' => 'Contacts', 'action' => 'index']) ?> </li>
            <li><?= $this->Html->link(__('New Contact'), ['controller' => 'Contacts', 'action' => 'add']) ?> </li>
            <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
            <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
            <li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?> </li>
            <li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add']) ?> </li>
            <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
            <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
            <li><?= $this->Html->link(__('List Units'), ['controller' => 'Units', 'action' => 'index']) ?> </li>
            <li><?= $this->Html->link(__('New Unit'), ['controller' => 'Units', 'action' => 'add']) ?> </li>
        </ul>
    </nav>
</div>

<div class="content-wrapper large-10 medium-10 small-12 columns">
    <div class="row">
        <div class="histories form large-10 medium-9 columns">
        <?= $this->Form->create($history) ?>
            <fieldset>
                <legend><?= __('Add History') ?></legend>
            <?php
                echo $this->Form->input('contact_id', ['options' => $contacts]);
                echo $this->Form->input('date');
                echo $this->Form->input('group_id', ['options' => $groups]);
                echo $this->Form->input('event_id', ['options' => $events]);
                echo $this->Form->input('detail');
                echo $this->Form->input('quantity');
                echo $this->Form->input('unit_id', ['options' => $units]);
                echo $this->Form->input('family');
            ?>
            </fieldset>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
        </div>
    </div>
</div>
