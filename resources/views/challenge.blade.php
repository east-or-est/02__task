@include( 'template.header', ['subTitle' => '目標'] )
<main class="container">
    <div class="tasks">
        <div class="tasks-inner">
            @include( 'template.task-menu', ['sel' => '目標'] )
            <div class="tasks-main">
                <div class="tasks-main-inner">
                    @include( 'template.challenge' )
                </div>
            </div>
            @include( 'template.task-bg' )
        </div>
    </div>
</main>
@include( 'template.footer' )