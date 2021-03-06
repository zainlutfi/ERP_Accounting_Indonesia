<div style="border-bottom:solid;border-width:1px;border-color:#D5D5D5;padding:0;margin:10px 0;">
    <h4>Learning Schedule</h4>
</div>


<?php
$this->widget('ext.EFullCalendar.EFullCalendar', array(
    // polish version available, uncomment to use it
    // 'lang'=>'pl',
    // you can create your own translation by copying locale/pl.php
    // and customizing it
    // remove to use without theme
    // this is relative path to:
    // themes/<path>
    //'themeCssFile'=>'2jui-bootstrap/jquery-ui.css',
    // raw html tags
    'htmlOptions' => array(
        // you can scale it down as well, try 80%
        'style' => 'width:100%'
    ),
    // FullCalendar's options.
    // Documentation available at
    // http://arshaw.com/fullcalendar/docs/
    'options' => array(
        'header' => array(
            'left' => 'prev,next',
            'center' => 'title',
            'right' => 'today'
        ),
        //'lazyFetching'=>true,
        'events' => Yii::app()->createUrl('/m1/gEss/calendarEvents'), // action URL for dynamic events, or
        'eventClick' => 'js:function(calEvent, jsEvent, view) {
                    $("#myModalHeader").html(calEvent.title);
                    $("#myModalBody").load("' . Yii::app()->createUrl("m1/gEss/viewDetailEss/id") . '/"+calEvent.id+"/asModal/true");
                    $("#myModal").modal();
                }',
    //'events'=>array() // pass array of events directly
    // event handling
    // mouseover for example
    //'eventMouseover'=>new CJavaScriptExpression("js:function(event, element) {
    //			element.qtip({
    //				content: event.title
    //			}); 
    //	 } "),
    )
));
?>


<br/>

<?php
$this->beginWidget(
        'bootstrap.widgets.TbModal', array('id' => 'myModal')
);
?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4 id="myModalHeader">Modal header</h4>
</div>

<div class="modal-body" id="myModalBody">
    <p>One fine body...</p>
</div>

<div class="modal-footer">
    <?php
    $this->widget(
            'bootstrap.widgets.TbButton', array(
        'label' => 'Close',
        'url' => '#',
        'htmlOptions' => array('data-dismiss' => 'modal'),
            )
    );
    ?>
</div>

<?php $this->endWidget(); ?>