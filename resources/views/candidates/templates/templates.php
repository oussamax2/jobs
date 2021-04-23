<script id="candidateActionTemplate" type="text/x-jsrender">
  <nobr>
  <a title="<?php echo __('cv pdf') ?>" class="btn btn-success action-btn edit-btn" target="_blank" href="{{:urlcv}}">
            <i class="fa fa-file-pdf"></i>
   </a> 
     <a title="<?php echo __('messages.common.edit') ?>" class="btn btn-warning action-btn edit-btn" href="{{:url}}">
            <i class="fa fa-edit"></i>
   </a>
   <a title="<?php echo __('messages.common.delete') ?>" class="btn btn-danger action-btn delete-btn" data-id="{{:id}}" href="#">
            <i class="fa fa-trash"></i>
   </a>  
</nobr>
</script>

<script id="isActive" type="text/x-jsrender">
   <label class="custom-switch pl-0">
        <input type="checkbox" name="Is Active" class="custom-switch-input isActive" data-id="{{:id}}" {{:checked}}>
        <span class="custom-switch-indicator"></span>
    </label>
</script>
