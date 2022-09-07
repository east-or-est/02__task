<article class="graph">
    <p>
        毎朝9時に更新されます。<br />
        完了・中止タスクと、下書き状態のタスクはグラフに反映されません。
    </p>
    <div class="graph-box">
        <figure class="graph-image">
            <?php $img = isset($filename) ? $filename : 'work'; ?>
            <img src="{{ asset( 'asset/img/graph/chart-' . $img . '.png') }}" alt="">
        </figure>
    </div>
</article>
