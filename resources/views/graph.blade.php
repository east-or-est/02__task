@include( 'template.header', ['subTitle' => '対応グラフ'] )
<main class="container">
    <div class="tasks">
        <div class="tasks-inner">
            @include( 'template.task-menu', [ 'sel' => '対応グラフ'] )
            <div class="tasks-main">
                <div class="tasks-main-inner">
                    @include( 'template.chart', [ 'filename' => 'work'] )
                </div>
            </div>
            @include( 'template.task-bg' )
        </div>
    </div>
</main>
@include( 'template.footer' )