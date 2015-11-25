<?php $app->assetter()->load('bootbox'); ?>

<div class="page-header">
    <div class="page-header-content">
        <div class="page-title">
            <h1>
                <i class="fa fa-tachometer"></i>
                <?php echo $app->t($unit->getId() ? 'measureUnitEdit' : 'measureUnitNew'); ?>
            </h1>
        </div>
        <div class="heading-elements">
            <div class="heading-btn-group">
                <a href="#" data-form-submit="form" data-form-param="apply" class="btn btn-icon-block btn-link-success">
                    <i class="fa fa-save"></i>
                    <span>{{ t('apply') }}</span>
                </a>
                <a href="#" data-form-submit="form" data-form-param="save" class="btn btn-icon-block btn-link-success">
                    <i class="fa fa-save"></i>
                    <span>{{ t('save') }}</span>
                </a>
                <a href="#" class="btn btn-icon-block btn-link-danger app-history-back">
                    <i class="fa fa-remove"></i>
                    <span>{{ t('cancel') }}</span>
                </a>
            </div>
        </div>
        <div class="heading-elements-toggle">
            <i class="fa fa-ellipsis-h"></i>
        </div>
    </div>
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="{{ createUrl() }}"><i class="fa fa-home"> </i>Verone</a></li>
            <li><a href="{{ createUrl('MeasureUnit', 'MeasureUnit', 'index') }}">{{ t('measureUnits') }}</a></li>
            @if $unit->getId()
                <li class="active"><a href="{{ createUrl('MeasureUnit', 'MeasureUnit', 'edit', [ 'id' => $unit->getId() ]) }}">{{ t('measureUnitEdit') }}</a></li>
            @else
                <li class="active"><a href="{{ createUrl('MeasureUnit', 'MeasureUnit', 'add') }}">{{ t('measureUnitNew') }}</a></li>
            @endif
        </ul>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <form action="<?php echo $app->createUrl('MeasureUnit', 'MeasureUnit', $unit->getId() ? 'update' : 'save'); ?>" method="post" id="form" class="form-validation">
                <input type="hidden" name="id" value="{{ $unit->getId() }}" />
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">{{ t('basicInformations') }}</div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label for="name" class="control-label">{{ t('measureUnitName') }}</label>
                                    <input class="form-control required" type="text" id="name" name="name" autofocus="" value="{{ $unit->getName() }}" />
                                </div>
                                <div class="form-group">
                                    <label for="unit" class="control-label">{{ t('measureUnitUnit') }}</label>
                                    <input class="form-control required" type="text" id="unit" name="unit" value="{{ $unit->getUnit() }}" />
                                </div>
                                <div class="form-group">
                                    <label for="allowFloat" class="control-label">{{ t('measureUnitAllowFloat') }} <a href="#" class="btn-unit-float help-inline" data-toggle="tooltip" title="{{ t('help') }}"><i class="fa fa-support"></i></a></label>
                                    <select class="form-control" id="allowFloat" name="allowFloat">
                                        <option value="0"<?php echo ($unit->getAllowFloat() == 0 ? ' selected="selected"' : ''); ?>>{{ t('sno') }}</option>
                                        <option value="1"<?php echo ($unit->getAllowFloat() == 1 ? ' selected="selected"' : ''); ?>>{{ t('syes') }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('.btn-unit-float').click(function() {
        bootbox.helpdialog('{{ t('measureUnitAllowFloat') }}', '{{ t('measureUnitAllowFloatHelpContent') }}');
    });
</script>
