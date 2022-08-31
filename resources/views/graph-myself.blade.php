@include( 'template.header', ['subTitle' => '仕事対応グラフ'] )
<main class="container">
    <div class="tasks">
        <div class="tasks-inner">
            @include( 'template.task-menu', ['sel' => '個人対応グラフ'] )
            <div class="tasks-main">
                <div class="tasks-main-inner">
                    @include( 'template.chart', [ 'filename' => 'myself'] )
                </div>
            </div>
            @include( 'template.task-bg' )
        </div>
    </div>
</main>
@include( 'template.footer' )