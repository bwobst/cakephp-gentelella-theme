<%
use Cake\Utility\Inflector;
%>
<div class="row">
    <div class="col-md-6">
        <h3>
            <%= $singularHumanName %>
            <small><?= __d('gentelella','<%= Inflector::humanize($action) %>') ?></small>
        </h3>
    </div>

    <div class="col-md-6">
        <div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right top_search">
            <?= $this->Html->link('<i class="fa fa-chevron-left"></i>'.__d('gentelella',' Back'), ['action' => 'index'], ['class'=>'btn btn-success pull-right','escape'=>false]) ?>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><%= $singularHumanName %>
                    <small><?= __d('gentelella','<%= Inflector::humanize($action) %>') ?></small>
                </h2>
                <?= $this->element('panel-toolbox') ?>
            </div>
            <div class="x_content">
                <br/>
                <?= $this->Form->create($<%= $singularVar %>, array('role' => 'form', 'class' => 'form-horizontal form-label-left', 'id' => 'form')) ?>

                <?php
                <%
                foreach ($fields as $field) {
                    if (in_array($field, $primaryKey)) {
                        continue;
                    }
                    if (isset($keyFields[$field])) {
                        $fieldData = $schema->column($field);
                        if (!empty($fieldData['null'])) {
                            %>
                            echo $this->Form->control('<%= $field %>', ['options' => $<%= $keyFields[$field] %>, 'empty' => true]);
                            <%
                        } else {
                            %>
                            echo $this->Form->control('<%= $field %>', ['options' => $<%= $keyFields[$field] %>]);
                            <%
                        }
                        continue;
                    }
                    if (!in_array($field, ['created', 'modified', 'updated'])) {
                        $fieldData = $schema->column($field);
                        if (($fieldData['type'] === 'date') && (!empty($fieldData['null']))) {
                            %>
                            echo $this->Form->control('<%= $field %>', ['empty' => true, 'default' => '']);
                            <%
                        } else {
                            %>
                            echo $this->Form->control('<%= $field %>');
                            <%
                        }
                    }
                }
                if (!empty($associations['BelongsToMany'])) {
                    foreach ($associations['BelongsToMany'] as $assocName => $assocData) {
                        %>
                        echo $this->Form->control('<%= $assocData['property'] %>._ids', ['options' => $<%= $assocData['variable'] %>]);
<%
      }
                }
                %>
                ?>
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <?= $this->Form->button(__d('gentelella','Save'), ['class' => 'btn btn-success']) ?>
                    </div>
                </div>

                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
