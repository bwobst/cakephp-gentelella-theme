<%
use Cake\Utility\Inflector;

$fields = collection($fields)
  ->filter(function($field) use ($schema) {
    return !in_array($schema->columnType($field), ['binary', 'text']);
  })
  ->take(7);
%>
<div class="page-title">
    <div class="title_left">
        <h3>
            <%= $singularHumanName %>
            <small><?= __d('gentelella','<%= Inflector::humanize($action) %>') ?></small>
        </h3>
    </div>

    <div class="title_right">
        <div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right top_search">
            <?= $this->Html->link('<i class="fa fa-plus"></i> '.__d('gentelella','New'), ['action' => 'add'], ['class'=>'btn btn-success pull-right','escape'=>false]) ?>
        </div>
    </div>
</div>

<!-- Main content -->
  <div class="row">
    <div class="col-xs-12">
      <div class="x_panel">
          <div class="x_title">
              <h2><%= $singularHumanName %> <small><?= __d('gentelella','<%= Inflector::humanize($action) %>') ?></small></h2>
              <?= $this->element('panel-toolbox') ?>
          </div>
        <!-- /.box-header -->
        <div class="x_content">
          <?= $this->element('index-search') ?>
          <table class="table table-striped">
            <tr>
<%  foreach ($fields as $field): %>
              <th><?= $this->Paginator->sort('<%= $field %>') ?></th>
<%  endforeach; %>
              <th><?= __d('gentelella','Actions') ?></th>
            </tr>
            <?php foreach ($<%= $pluralVar %> as $<%= $singularVar %>): ?>
              <tr>
<%  foreach ($fields as $field) {
    $isKey = false;
    if (!empty($associations['BelongsTo'])) {
    foreach ($associations['BelongsTo'] as $alias => $details) {
      if ($field === $details['foreignKey']) {
        $isKey = true;
%>
                <td><?= $<%= $singularVar %>->has('<%= $details['property'] %>') ? $this->Html->link($<%= $singularVar %>-><%= $details['property'] %>-><%= $details['displayField'] %>, ['controller' => '<%= $details['controller'] %>', 'action' => 'view', $<%= $singularVar %>-><%= $details['property'] %>-><%= $details['primaryKey'][0] %>]) : '' ?></td>
<%
          break;
        }
      }
    }

    if ($isKey !== true) {
      if (!in_array($schema->columnType($field), ['integer', 'biginteger', 'decimal', 'float'])) {
%>
                <td><?= h($<%= $singularVar %>-><%= $field %>) ?></td>
<%
      } else {
%>
                <td><?= $this->Number->format($<%= $singularVar %>-><%= $field %>) ?></td>
<%
      }
    }
  }
  $pk = '$' . $singularVar . '->' . $primaryKey[0];
%>
                <td class="actions" style="white-space:nowrap">
                  <?= $this->Html->link(__d('gentelella','View'), ['action' => 'view', <%= $pk %>], ['class'=>'btn btn-info btn-xs']) ?>
                  <?= $this->Html->link(__d('gentelella','Edit'), ['action' => 'edit', <%= $pk %>], ['class'=>'btn btn-primary btn-xs']) ?>
                  <?= $this->Form->postLink(__d('gentelella','Delete'), ['action' => 'delete', <%= $pk %>], ['confirm' => __d('gentelella','Confirm to delete this entry?'), 'class'=>'btn btn-danger btn-xs']) ?>
                </td>
              </tr>
            <?php endforeach; ?>
          </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
            <?= $this->element('pagination') ?>
        </div>
      </div>
      <!-- /.box -->
    </div>
  </div>
<!-- /.content -->
