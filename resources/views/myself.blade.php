@include( 'template.header', ['subTitle' => '個人タスク'] )
<main class="container">
    <div class="tasks">
        <div class="tasks-inner">
            @include( 'template.task-menu', ['sel' => '個人タスク'] )
            <div class="tasks-main">
                <div class="tasks-main-inner">
                    @include( 'template.task' )
                </div>
            </div>
            @include( 'template.task-bg' )
        </div>
    </div>
</main>
@include( 'template.footer' )