<?php

use Cake\Utility\Text;

echo $this->Html->css('daterangepicker.css', ['block' => true]);

echo $this->Html->script('jquery.rAutocompleters.min', ['block' => true]);

// TODO remove autocompleBuilder as it does the same as rAutocompleters
echo $this->Html->script('sanga.autocompleteBuilder.js', ['block' => true]);

echo $this->Html->script('sanga.add.history.entry.min', ['block' => true]);

echo $this->Html->script('sanga.histories.index.js', ['block' => true]);
echo $this->Html->script('sanga.get.history.detail.js', ['block' => true]);

echo $this->Html->script('moment.min.js', ['block' => true]);
echo $this->Html->script('jquery.daterangepicker.js', ['block' => true]);
?>
<div class="row">
    <div class="column large-12">
        <?php
        echo $this->element('ajax-images');
        ?>
        <div class="histories index columns">

            <?= $this->Form->create(
                null,
                [
                    'id' => 'fForm',
                    'url' => [
                        'controller' => 'Histories',
                        'action' => 'index'
                    ]
                ]
            ) ?>
            <table id="fTable" cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                        <th width="15%">
                            <?php
                            echo $this->Form->input('fcontact_id', ['type' => 'hidden', 'value' => false]);
                            echo $this->Form->input('xfcontact_id', ['type' => 'text', 'value' => false, 'label' => false, 'placeholder' => __('Contact')]);
                            ?>
                        </th>
                        <th width="10%">
                            <?php
                            echo $this->Form->input(
                                'daterange',
                                [
                                    'label' => false,
                                    'value' => false,
                                    'placeholder' => __('Date'),
                                ]
                            );
                            ?>

                        </th>
                        <th width="10%">
                            <?php
                            echo $this->Form->input('fuser_id', ['type' => 'hidden', 'value' => false]);
                            echo $this->Form->input('xfuser_id', ['type' => 'text', 'value' => false, 'label' => false, 'placeholder' => __('User')]);
                            ?>
                        </th>
                        <th width="10%">
                            <?php
                            echo $this->Form->input('fgroup_id', ['type' => 'hidden', 'value' => false]);
                            echo $this->Form->input('xfgroup_id', ['label' => false, 'value' => false, 'type' => 'text', 'placeholder' => __('Group')]);
                            ?>
                        </th>
                        <th width="10%">
                            <?php
                            echo $this->Form->input('fevent_id', ['type' => 'hidden', 'value' => false]);
                            echo $this->Form->input('xfevent_id', ['label' => false, 'value' => false, 'type' => 'text', 'placeholder' => __('Event')]);
                            ?>
                        </th>
                        <th width="25%">
                            <?php
                            echo $this->Form->input('fdetail', ['label' => false, 'value' => false, 'placeholder' => __('Detail')]);
                            ?>
                        </th>
                         <th width="15%">
							<?php
							echo $this->Form->input('fquantity_id', ['type' => 'hidden', 'value' => false]); 
							echo $this->Form->input('xfquantity_id', ['type' => 'text','label' => false, 'value' => false, 'placeholder' => __('Quantity'), 'disabled' => false]) ?>
                        </th>
                        <th width="5%" class="text-center">
                            <?= $this->Form->button('<i class="fi-magnifying-glass"></i>', ['title' => __('Filter'), 'escape' => false]) ?>
                        </th>
                        <?= $this->Form->end() ?>
                    </tr>
                </thead>
            </table>

            <?= $this->Form->create(null, ['id' => 'hForm', 'url' => ['controller' => 'Histories', 'action' => 'add']]) ?>
            <table id="hTable" class="hover stack">
                <thead>
                    <tr>
                        <th width="15%" class="text-center"><?= $this->Paginator->sort('contact_id') ?></th>
                        <th width="10%" class="text-center"><?= $this->Paginator->sort('date') ?></th>
                        <th width="10%" class="text-center"><?= $this->Paginator->sort('user_id') ?></th>
                        <th width="10%" class="text-center"><?= $this->Paginator->sort('group_id') ?></th>
                        <th width="10%" class="text-center"><?= $this->Paginator->sort('event_id') ?></th>
                        <th width="25%" class="text-center"><?= $this->Paginator->sort('short_detail') ?></th>
                        <th width="15%" class="text-center"><?= $this->Paginator->sort('quantity') ?></th>
                        <th width="5%" class="text-center"> </th>
                    </tr>
                </thead>
                <tbody>

                    <?= $this->element('history-add-form') ?>

                    <?php foreach ($histories as $history) : ?>
                    <tr>
                        <td>
                            <?php
                            $cName = $history->contact->contactname;
                            if ($history->contact->legalname) {
                                $cName .= ' <span class="legalname">' . $history->contact->legalname . '</span>';
                            }
                            echo $history->has('contact') ?
                                $this->Html->link(
                                    $cName,
                                    [
                                        'controller' => 'Contacts',
                                        'action' => 'view',
                                        $history->contact->id
                                    ],
                                    ['escape' => false]
                                )
                                : '';
                            ?>
                        </td>
                        <td><?= $history->date ?></td>
                        <td>
                            <?= $history->has('user') ? $history->user->name : '' ?>
                        </td>
                        <td>
                            <?= $history->has('group') ? $history->group->name : '' ?>
                        </td>
                        <td>
                            <?= $history->has('event') ? $history->event->name : '' ?>
                        </td>
                        <td class="_hd" data-h-id="<?= $history->id ?>"><?= h($history->short_detail) ?></td>
                        <td class="r">
                            <?php
                            if (isset($history->unit->name) && $history->quantity) {
                                echo h(
                                    $this->Number->currency(
                                        $history->quantity,
                                        $history->unit->name,
                                        [
                                            'places' => 0,
                                        ]
                                    )
                                );
                            } else {
                                echo h($history->quantity);
                            }
                            ?>
                        </td>
                        <td class="text-center">
                            <?php
                            //csak akkor szerkeszthető az esemény, ha nem system eseményről van szó
                            if ($history->event->id != 1) : ?>
                            <?php /* $this->Html->link(
                                '<i class="fi-pencil"></i>',
                                ['action' => 'edit', $history->id],
                                ['escape' => false]
                            ) */?>
                            <?= $this->Form->postLink(
                                '<i class="fi-trash"></i>',
                                ['action' => 'delete', $history->id],
                                ['confirm' => __('Are you sure you want to delete # {0}?', strip_tags($cName) . ' / ' . strip_tags($history->short_detail)), 'escape' => false]
                            ) ?>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?= $this->Form->end() ?>

            <div class="paginator column">
                <ul class="pagination centered row align-center">
                    <?php
                    echo $this->Paginator->prev('< ' . __('previous'));
                    echo $this->Paginator->numbers();
                    echo $this->Paginator->next(__('next') . ' >');
                    ?>
                </ul>
                <div class="pagination-counter row align-center">
                    <?= $this->Paginator->counter() ?>
                </div>
            </div>
        </div>
    </div>
</div>