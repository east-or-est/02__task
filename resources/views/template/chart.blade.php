<article class="graph">
    <p>
        ※毎朝9時に更新されます。
    </p>
    <div class="graph-box">
        <figure class="graph-image">
            <?php $img = isset($filename) ? $filename : 'work'; ?>
            <img src="{{ asset( 'asset/img/graph/chart-' . $img . '.png') }}" alt="">
        </figure>
    </div>
</article>
