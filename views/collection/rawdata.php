<style>
</style>
<div class="row">
  <div class="col-12">
    <table id="rawdata-table" class="table table-bordered table-hover table-sm">
      <thead>
        <tr>
          <th class="text-center px-5">Field</th>
          <th class="text-start px-3">Value</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach (TypeHelper::getRecordList($this->data->data) as $record) { ?>
      <tr>
        <td class="text-center px-5"><?= $this->escape($record['key']) ?></td>
        <td class="text-start px-3">
          <?php if (gettype($record['value']) == 'boolean') { ?>
          <?= $record['value'] ? 'true' : 'false' ?>
          <?php } else { ?>
          <?= $this->escape($record['value']) ?>
          <?php } ?>
        </td>
      </tr>
      <?php } ?>
      </tbody>
    </table>
  </div>
</div>
