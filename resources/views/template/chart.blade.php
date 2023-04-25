<article class="graph">
    <h1>対応グラフ</h1>
    <p>
        毎朝9時に更新されます。<br>
        完了・中止タスクと、下書き状態のタスクはグラフに反映されません。
    </p>
    <section>
        <h2>仕事対応グラフ</h2>
        @include( 'template.chart-img' )
    </section>
    <section>
        <h2>個人対応グラフ</h2>
        @include( 'template.chart-img', [ 'filename' => 'myself' ] )
    </section>
</article>
