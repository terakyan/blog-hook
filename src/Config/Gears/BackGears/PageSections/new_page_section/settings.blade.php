<div class="row">
    <div class="col-xs-12 col-sm-12">
        <div class="panel panelSettingData">
            <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#accordion"
                                           href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo"> <i
                                class="glyphicon glyphicon-chevron-right"></i>Main wrapper area</a></h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
                    <div class="form-group">
                        <div class="row">
                            <label for="navstyle" class="col-xs-3">SMain Section Color</label>
                            <div class="col-xs-9">
                                <div id="cp2" class="input-group colorpicker-component">
                                    <input name="main-wrapper-color" type="text" value="#00AABB" class="form-control" />
                                    <span class="input-group-addon"><i></i></span>
                                </div>
                               </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="panel panelSettingData">
            <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#accordion"
                                           href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo"> <i
                                class="glyphicon glyphicon-chevron-right"></i>Section 1 area</a></h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
                    <div class="form-group">
                        <div class="row">
                            <label for="navstyle" class="col-xs-3">Hide Area</label>
                           <div class="col-xs-9">
                               {!! Form::checkbox('hide_area_1') !!}
                           </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="navstyle" class="col-xs-3">Select Section</label>
                           <div class="col-xs-9">
                               {!! BBbutton('placeholder_section','sidebar_place_holder_first','Select Section',['class'=>'form-control input-md btn btn-info', 'data-type'=>'horizontal','model'=>$settings]) !!}
                           </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="panel panelSettingData">
            <div class="panel-heading" role="tab" id="headingThird">
                <h4 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#accordion"
                                           href="#collapseThird" aria-expanded="true" aria-controls="collapseThird"> <i
                                class="glyphicon glyphicon-chevron-right"></i>Placeholder 2 area</a></h4>
            </div>
            <div id="collapseThird" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThird">
                <div class="panel-body">
                    <div class="form-group">
                        <div class="row">
                            <label for="navstyle" class="col-xs-3">Hide Area</label>
                            <div class="col-xs-9">
                                {!! Form::checkbox('hide_area_2') !!}
                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label for="navstyle" class="col-xs-3">Select Section</label>
                           <div class="col-xs-9">
                               {!! BBbutton('placeholder_section','sidebar_place_holder_second','Select Section',['class'=>'form-control input-md btn btn-info', 'data-type'=>'vertical','model'=>$settings]) !!}
                           </div>
                        </div>

                    </div>
                    <div class="form-group">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<style>
    .panel-heading{z-index: 99999999}
  .panelSettingData { background-color: #3d3d3d; }
.panelSettingData .panel-heading { background-color: #1c1c1c; }
.panelSettingData label { color:#fff; }
.panelSettingData h4 a { color:#fff; }
.panelSettingData h4 a:hover, .panelSettingData h4 a:focus { text-decoration:none; }
.panelSettingData h4 a i { transition: all 0.3s; -moz-transition: all 0.3s; -webkit-transition: all 0.3s; -o-transition: all 0.3s; margin-right: 10px; }
.panelSettingData h4 a[aria-expanded="true"] i { -ms-transform: rotate(90deg); -webkit-transform: rotate(90deg); transform: rotate(90deg); }

.settingBtn { background-color: #292929; color:#fff; }
.settingBtn:hover, .settingBtn:focus { color:#fff; }
.form-control { background-color: #888383; border:none; color:#fff }
</style>