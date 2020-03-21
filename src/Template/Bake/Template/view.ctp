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
            <?= $this->Html->link('<i class="fa fa-chevron-left"></i>'.__d('gentelella',' Back'), ['action' => 'index'], ['class' => 'btn btn-success pull-right','escape'=>false]) ?>
        </div>
    </div>
</div>

<!-- Main content -->
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="x_panel">
                <div class="x_title">
                    <h2><%= $singularHumanName %>
                        <small><?= __d('gentelella','<%= Inflector::humanize($action) %>') ?></small>
                    </h2>
                    <?= $this->element('panel-toolbox') ?>
                </div>
                <div class="x_content">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <dl class="dl-horizontal row">
                        <?php
                        <%
                        foreach ($fields as $field) {
                            if (in_array($field, $primaryKey)) {
                                continue;
                            }
                            if (isset($keyFields[$field])) {
                                $fieldData = $schema->column($field);
                                %>
                                ?>
                                    <dt><%= Inflector::humanize(Inflector::singularize($keyFields[$field])) %></dt>
                                    <dd><?= $<%= $singularVar %>-><%= $field %> ?></dd>
                                <?php
                                <%
                                continue;
                            }
                            if (!in_array($field, ['created', 'modified', 'updated'])) {
                                $fieldData = $schema->column($field);
                                %>
                                ?>
                                    <dt><%= Inflector::humanize($field) %></dt>
                                    <dd><?= $<%= $singularVar %>-><%= $field %> ?></dd>
                                <?php
                                <%
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
                        </dl>
                    </div>
                <!-- /.box-body -->
                </div>
            </div>
        </div>
    </div>

